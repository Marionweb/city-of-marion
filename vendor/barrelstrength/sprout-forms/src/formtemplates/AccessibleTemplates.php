<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   https://craftcms.github.io/license
 */

namespace barrelstrength\sproutforms\formtemplates;

use barrelstrength\sproutforms\base\FormTemplates;
use Craft;

/**
 * Class AccessibleTemplates
 */
class AccessibleTemplates extends FormTemplates
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return Craft::t('sprout-forms', 'Accessible Templates (Sprout, Default)');
    }

    public function getTemplateRoot(): string
    {
        return Craft::getAlias('@barrelstrength/sproutforms/templates');
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return '_components/formtemplates/accessible';
    }
}



