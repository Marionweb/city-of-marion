<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   https://craftcms.github.io/license
 */

namespace barrelstrength\sproutbasesentemail\elements;

use barrelstrength\sproutbaseemail\SproutBaseEmail;
use barrelstrength\sproutbaseemail\web\assets\email\EmailAsset;
use barrelstrength\sproutbasesentemail\elements\actions\DeleteEmail;
use barrelstrength\sproutbasesentemail\elements\db\SentEmailQuery;
use barrelstrength\sproutbasesentemail\models\SentEmailInfoTable;
use barrelstrength\sproutbasesentemail\records\SentEmail as SentEmailRecord;
use Craft;
use craft\base\Element;
use craft\elements\db\ElementQueryInterface;
use craft\errors\MissingComponentException;
use craft\helpers\Json;
use craft\helpers\UrlHelper;
use DateTime;
use yii\base\Exception;
use yii\base\InvalidConfigException;

/**
 * Class SentEmail
 *
 * @package barrelstrength\sproutbasesentemail\elements
 *
 * @property string $localeNiceDateTime
 */
class SentEmail extends Element
{
    const SENT = 'sent';
    const FAILED = 'failed';

    /**
     * @var bool
     */
    public $saveAsNew;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $emailSubject;

    /**
     * @var bool
     */
    public $enableFileAttachments;

    // Sender Info

    /**
     * @var string
     */
    public $fromName;

    /**
     * @var string
     */
    public $fromEmail;

    /**
     * @var string
     */
    public $toEmail;

    /**
     * @var string
     */
    public $body;

    /**
     * @var string
     */
    public $htmlBody;

    /**
     * @var string
     */
    public $info;

    /**
     * @var string
     */
    public $status;

    /**
     * @var DateTime
     */
    public $dateSent;

    /**
     * @var array
     */
    protected $fields;

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('sprout-base-sent-email', 'Sent Email');
    }

    /**
     * @return string
     */
    public static function pluralDisplayName(): string
    {
        return Craft::t('sprout-base-sent-email', 'Sent Emails');
    }

    /**
     * @return ElementQueryInterface
     */
    public static function find(): ElementQueryInterface
    {
        return new SentEmailQuery(static::class);
    }

    /**
     * @param ElementQueryInterface $elementQuery
     * @param array|null            $disabledElementIds
     * @param array                 $viewState
     * @param string|null           $sourceKey
     * @param string|null           $context
     * @param bool                  $includeContainer
     * @param bool                  $showCheckboxes
     *
     * @return string
     * @throws InvalidConfigException
     *
     */
    public static function indexHtml(
        ElementQueryInterface $elementQuery, /** @noinspection PhpOptionalBeforeRequiredParametersInspection */
        array $disabledElementIds = null, array $viewState, /** @noinspection PhpOptionalBeforeRequiredParametersInspection */
        string $sourceKey = null, /** @noinspection PhpOptionalBeforeRequiredParametersInspection */
        string $context = null, bool $includeContainer, bool $showCheckboxes
    ): string {
        $html = parent::indexHtml($elementQuery, $disabledElementIds, $viewState, $sourceKey, $context, $includeContainer,
            $showCheckboxes);

        Craft::$app->getView()->registerAssetBundle(EmailAsset::class);

        Craft::$app->getView()->registerJs('new SproutModal();');

        SproutBaseEmail::$app->mailers->includeMailerModalResources();

        return $html;
    }

    /**
     * @inheritdoc
     */
    protected static function defineSources(string $context = null): array
    {
        $sources = [
            [
                'key' => '*',
                'label' => Craft::t('sprout-base-sent-email', 'All Sent Emails'),
                'defaultSort' => ['dateCreated', 'desc']
            ]
        ];

        return $sources;
    }

    /**
     * @inheritdoc
     */
    protected static function defineSearchableAttributes(): array
    {
        return ['toEmail', 'emailSubject'];
    }

    /**
     * @inheritdoc
     */
    protected static function defineSortOptions(): array
    {
        $attributes = [
            'elements.dateCreated' => Craft::t('sprout-base-sent-email', 'Date Sent')
        ];

        return $attributes;
    }

    /**
     * @inheritdoc
     */
    protected static function defineTableAttributes(): array
    {
        $attributes = [
            'dateSent' => ['label' => Craft::t('sprout-base-sent-email', 'Date Sent')],
            'toEmail' => ['label' => Craft::t('sprout-base-sent-email', 'Recipient')],
            'emailSubject' => ['label' => Craft::t('sprout-base-sent-email', 'Subject')],
            'info' => ['label' => Craft::t('sprout-base-sent-email', 'Details')],
        ];

        if (Craft::$app->getUser()->checkPermission('sproutEmail-resendEmails')) {
            $attributes['resend'] = ['label' => Craft::t('sprout-base-sent-email', 'Resend')];
        }

        $attributes['preview'] = ['label' => Craft::t('sprout-base-sent-email', 'Preview'), 'icon' => 'view'];

        return $attributes;
    }

    /**
     * @inheritdoc
     */
    protected static function defineActions(string $source = null): array
    {
        $actions = [];

        $actions[] = DeleteEmail::class;

        return $actions;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getLocaleNiceDateTime();
    }

    /**
     * @inheritdoc
     */
    public function getIsEditable(): bool
    {
        return true;
    }

    /**
     * @param string $attribute
     *
     * @return string
     * @throws MissingComponentException
     */
    public function getTableAttributeHtml(string $attribute): string
    {
        switch ($attribute) {
            case 'preview':

                $pluginHandle = Craft::$app->getSession()->get('sprout.sentEmail.pluginHandle');

                $previewUrl = UrlHelper::cpUrl($pluginHandle.'/sent-email/preview/'.$this->id);

                return '<a class="email-preview" '.
                    'data-email-id="'.$this->id.'" '.
                    'data-preview-url="'.$previewUrl.'" '.
                    'href="'.$previewUrl.'" '.
                    '" data-icon="view"></a>';

                break;
            case 'resend':

                return '<a class="prepare btn small formsubmit" 
                                data-action="sprout-base-sent-email/sent-email/get-resend-modal" 
                                data-email-id="'.$this->id.'">'.
                    Craft::t('sprout-base-sent-email', 'Prepare').
                    '</a>';

                break;

            case 'info':

                return '<a class="prepare btn small formsubmit"
                                data-action="sprout-base-sent-email/sent-email/get-info-html" 
                                data-email-id="'.$this->id.'" 
                                data-type="'.get_class($this).'"
                                data-id="'.$this->id.'"
                                data-site-id="'.$this->siteId.'"
                                data-status="'.$this->getStatus().'"
                                data-label="'.$this.'"
                                data-url="'.$this->getUrl().'"              
                                data-level="'.$this->level.'">'.
                    Craft::t('sprout-base-sent-email', 'Details').
                    '</a>';
                break;

            default:
        }

        return parent::getTableAttributeHtml($attribute);
    }

    /**
     * @return string
     */
    public function getLocaleNiceDateTime(): string
    {
        return $this->dateCreated->format('M j, Y H:i:s A');
    }

    /**
     * @param bool $isNew
     *
     * @throws \Exception
     */
    public function afterSave(bool $isNew)
    {
        // Get the entry record
        if (!$isNew) {
            $record = SentEmailRecord::findOne($this->id);

            if (!$record) {
                throw new Exception('Invalid campaign email ID: '.$this->id);
            }
        } else {
            $record = new SentEmailRecord();
            $record->id = $this->id;
        }

        $record->title = $this->title;
        $record->emailSubject = $this->emailSubject;
        $record->fromEmail = $this->fromEmail;
        $record->fromName = $this->fromName;
        $record->toEmail = $this->toEmail;
        $record->body = $this->body;
        $record->htmlBody = $this->htmlBody;
        $record->info = $this->info;
        $record->status = $this->status;
        $record->dateCreated = $this->dateCreated;
        $record->dateUpdated = $this->dateUpdated;

        $record->save(false);

        // Update the entry's descendants, who may be using this entry's URI in their own URIs
        Craft::$app->getElements()->updateElementSlugAndUri($this);

        parent::afterSave($isNew);
    }

    /**
     * @return SentEmailInfoTable
     */
    public function getInfo(): SentEmailInfoTable
    {
        $infoTable = new SentEmailInfoTable();
        $infoTable->setAttributes(Json::decode($this->info), false);

        return $infoTable;
    }
}
