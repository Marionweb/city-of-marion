<?php

$vendorDir = dirname(__DIR__);
$rootDir = dirname(dirname(__DIR__));

return array (
  'mmikkel/retcon' => 
  array (
    'class' => 'mmikkel\\retcon\\Retcon',
    'basePath' => $vendorDir . '/mmikkel/retcon/src',
    'handle' => 'retcon',
    'aliases' => 
    array (
      '@mmikkel/retcon' => $vendorDir . '/mmikkel/retcon/src',
    ),
    'name' => 'Retcon',
    'version' => 'v2.x-dev',
    'schemaVersion' => '1.0.0',
    'description' => 'Powerful Twig filters for mutating and querying HTML',
    'developer' => 'Mats Mikkel Rummelhoff',
    'developerUrl' => 'https://vaersaagod.no',
    'documentationUrl' => 'https://github.com/mmikkel/Retcon-Craft/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/mmikkel/Retcon-Craft/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
    'components' => 
    array (
    ),
  ),
  'aelvan/craft-cp-element-count' => 
  array (
    'class' => 'aelvan\\cpelementcount\\CpElementCount',
    'basePath' => $vendorDir . '/aelvan/craft-cp-element-count/src',
    'handle' => 'cp-element-count',
    'aliases' => 
    array (
      '@aelvan/cpelementcount' => $vendorDir . '/aelvan/craft-cp-element-count/src',
    ),
    'name' => 'CP Element Count',
    'version' => '1.1.0',
    'description' => 'Adds an element count to sections, categories, user groups and asset folders in the Craft control panel',
    'developer' => 'André Elvan',
    'developerUrl' => 'https://www.vaersaagod.no/',
    'documentationUrl' => 'https://github.com/aelvan/craft-cp-element-count/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/aelvan/craft-cp-element-count/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
  ),
  'aelvan/inlin' => 
  array (
    'class' => 'aelvan\\inlin\\Inlin',
    'basePath' => $vendorDir . '/aelvan/inlin/src',
    'handle' => 'inlin',
    'aliases' => 
    array (
      '@aelvan/inlin' => $vendorDir . '/aelvan/inlin/src',
    ),
    'name' => 'Inlin',
    'version' => '2.1.1',
    'schemaVersion' => '2.0.0',
    'description' => 'A simple plugin for inlining stuff in your templates.',
    'developer' => 'André Elvan',
    'developerUrl' => 'https://www.vaersaagod.no',
    'documentationUrl' => 'https://github.com/aelvan/Inlin-Craft/blob/craft3/README.md',
    'changelogUrl' => 'https://github.com/aelvan/Inlin-Craft/blob/craft3/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
  ),
  'aelvan/stamp' => 
  array (
    'class' => 'aelvan\\stamp\\Stamp',
    'basePath' => $vendorDir . '/aelvan/stamp/src',
    'handle' => 'stamp',
    'aliases' => 
    array (
      '@aelvan/stamp' => $vendorDir . '/aelvan/stamp/src',
    ),
    'name' => 'Stamp',
    'version' => '2.1.0',
    'schemaVersion' => '2.0.0',
    'description' => 'A simple plugin for adding timestamps to filenames.',
    'developer' => 'André Elvan',
    'developerUrl' => 'https://www.vaersaagod.no',
    'documentationUrl' => 'https://github.com/aelvan/Stamp-Craft/blob/craft3/README.md',
    'changelogUrl' => 'https://github.com/aelvan/Stamp-Craft/blob/craft3/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
  ),
  'barrelstrength/sprout-encode-email' => 
  array (
    'class' => 'barrelstrength\\sproutencodeemail\\SproutEncodeEmail',
    'basePath' => $vendorDir . '/barrelstrength/sprout-encode-email/src',
    'handle' => 'sprout-encode-email',
    'aliases' => 
    array (
      '@barrelstrength/sproutencodeemail' => $vendorDir . '/barrelstrength/sprout-encode-email/src',
    ),
    'name' => 'Sprout Encode Email',
    'version' => '2.0.7',
    'description' => 'Encode the email addresses in your templates so they can\'t be harvested by evil spam bots.',
    'developer' => 'Barrel Strength',
    'developerUrl' => 'https://barrelstrengthdesign.com',
    'developerEmail' => 'support@barrelstrengthdesign.com',
    'documentationUrl' => 'https://sprout.barrelstrengthdesign.com/craft-plugins/encode-email',
    'changelogUrl' => 'https://raw.githubusercontent.com/barrelstrength/sprout-encode-email/master/CHANGELOG.md',
    'downloadUrl' => 'https://github.com/barrelstrength/sprout-encode-email/archive/master.zip',
  ),
  'barrelstrength/sprout-fields' => 
  array (
    'class' => 'barrelstrength\\sproutfields\\SproutFields',
    'basePath' => $vendorDir . '/barrelstrength/sprout-fields/src',
    'handle' => 'sprout-fields',
    'aliases' => 
    array (
      '@barrelstrength/sproutfields' => $vendorDir . '/barrelstrength/sprout-fields/src',
    ),
    'name' => 'Sprout Fields',
    'version' => '3.8.4',
    'description' => 'International, Craft-friendly field types.',
    'developer' => 'Barrel Strength',
    'developerUrl' => 'https://www.barrelstrengthdesign.com/',
    'developerEmail' => 'sprout@barrelstrengthdesign.com',
    'documentationUrl' => 'https://sprout.barrelstrengthdesign.com/docs/fields',
  ),
  'barrelstrength/sprout-forms-us-states' => 
  array (
    'class' => 'barrelstrength\\sproutformsusstates\\SproutFormsUsStates',
    'basePath' => $vendorDir . '/barrelstrength/sprout-forms-us-states/src',
    'handle' => 'sprout-forms-us-states',
    'aliases' => 
    array (
      '@barrelstrength/sproutformsusstates' => $vendorDir . '/barrelstrength/sprout-forms-us-states/src',
    ),
    'name' => 'US States Field for Sprout Forms',
    'version' => '1.1.0',
    'description' => 'US States Field for Sprout Forms',
    'developer' => 'Barrel Strength',
    'developerUrl' => 'https://www.barrelstrengthdesign.com/',
    'developerEmail' => 'sprout@barrelstrengthdesign.com',
    'documentationUrl' => 'https://sprout.barrelstrengthdesign.com/docs/forms',
  ),
  'barrelstrength/sprout-lists' => 
  array (
    'class' => 'barrelstrength\\sproutlists\\SproutLists',
    'basePath' => $vendorDir . '/barrelstrength/sprout-lists/src',
    'handle' => 'sprout-lists',
    'aliases' => 
    array (
      '@barrelstrength/sproutlists' => $vendorDir . '/barrelstrength/sprout-lists/src',
    ),
    'name' => 'Sprout Lists',
    'version' => '3.2.0',
    'description' => 'Subscribe and unsubscribe to things.',
    'developer' => 'Barrel Strength',
    'developerUrl' => 'https://www.barrelstrengthdesign.com/',
    'developerEmail' => 'sprout@barrelstrengthdesign.com',
    'documentationUrl' => 'https://sprout.barrelstrengthdesign.com/docs/lists',
  ),
  'barrelstrength/sprout-forms' => 
  array (
    'class' => 'barrelstrength\\sproutforms\\SproutForms',
    'basePath' => $vendorDir . '/barrelstrength/sprout-forms/src',
    'handle' => 'sprout-forms',
    'aliases' => 
    array (
      '@barrelstrength/sproutforms' => $vendorDir . '/barrelstrength/sprout-forms/src',
    ),
    'name' => 'Sprout Forms',
    'version' => '3.12.2',
    'description' => 'Simple, beautiful forms. 100% control.',
    'developer' => 'Barrel Strength',
    'developerUrl' => 'https://www.barrelstrengthdesign.com/',
    'developerEmail' => 'sprout@barrelstrengthdesign.com',
    'documentationUrl' => 'https://sprout.barrelstrengthdesign.com/docs/forms',
  ),
  'codemonauts/craft-instagram-feed' => 
  array (
    'class' => 'codemonauts\\instagramfeed\\InstagramFeed',
    'basePath' => $vendorDir . '/codemonauts/craft-instagram-feed/src',
    'handle' => 'instagramfeed',
    'aliases' => 
    array (
      '@codemonauts/instagramfeed' => $vendorDir . '/codemonauts/craft-instagram-feed/src',
    ),
    'name' => 'Instagram Feed',
    'version' => '1.0.5',
    'description' => 'Receive Instagram feeds.',
    'developer' => 'codemonauts',
    'developerUrl' => 'https://codemonauts.com',
    'documentationUrl' => 'https://github.com/codemonauts/craft-instagram-feed/blob/master/README.md',
    'hasCpSection' => false,
  ),
  'craftcms/anchors' => 
  array (
    'class' => 'craft\\anchors\\Plugin',
    'basePath' => $vendorDir . '/craftcms/anchors/src',
    'handle' => 'anchors',
    'aliases' => 
    array (
      '@craft/anchors' => $vendorDir . '/craftcms/anchors/src',
    ),
    'name' => 'Anchors',
    'version' => '2.2.0',
    'description' => 'Add anchor links to headings in your Craft CMS website content.',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/anchors',
    'changelogUrl' => 'https://raw.githubusercontent.com/craftcms/anchors/v2/CHANGELOG.md',
    'downloadUrl' => 'https://github.com/craftcms/anchors/archive/v2.zip',
  ),
  'craftcms/aws-s3' => 
  array (
    'class' => 'craft\\awss3\\Plugin',
    'basePath' => $vendorDir . '/craftcms/aws-s3/src',
    'handle' => 'aws-s3',
    'aliases' => 
    array (
      '@craft/awss3' => $vendorDir . '/craftcms/aws-s3/src',
    ),
    'name' => 'Amazon S3',
    'version' => '1.2.9',
    'description' => 'Amazon S3 integration for Craft CMS',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/aws-s3/blob/master/README.md',
  ),
  'craftcms/contact-form' => 
  array (
    'class' => 'craft\\contactform\\Plugin',
    'basePath' => $vendorDir . '/craftcms/contact-form/src',
    'handle' => 'contact-form',
    'aliases' => 
    array (
      '@craft/contactform' => $vendorDir . '/craftcms/contact-form/src',
    ),
    'name' => 'Contact Form',
    'version' => '2.2.7',
    'description' => 'Add a simple contact form to your Craft CMS site',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/contact-form/blob/v2/README.md',
    'components' => 
    array (
      'mailer' => 'craft\\contactform\\Mailer',
    ),
  ),
  'craftcms/contact-form-honeypot' => 
  array (
    'class' => 'craft\\contactform\\honeypot\\Plugin',
    'basePath' => $vendorDir . '/craftcms/contact-form-honeypot/src',
    'handle' => 'contact-form-honeypot',
    'aliases' => 
    array (
      '@craft/contactform/honeypot' => $vendorDir . '/craftcms/contact-form-honeypot/src',
    ),
    'name' => 'Contact Form Honeypot',
    'version' => '1.0.2',
    'description' => 'Add a honeypot captcha to your Craft CMS contact form',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/contact-form-honeypot',
    'changelogUrl' => 'https://raw.githubusercontent.com/craftcms/contact-form-honeypot/master/CHANGELOG.md',
    'downloadUrl' => 'https://github.com/craftcms/contact-form-honeypot/archive/master.zip',
  ),
  'craftcms/element-api' => 
  array (
    'class' => 'craft\\elementapi\\Plugin',
    'basePath' => $vendorDir . '/craftcms/element-api/src',
    'handle' => 'element-api',
    'aliases' => 
    array (
      '@craft/elementapi' => $vendorDir . '/craftcms/element-api/src',
    ),
    'name' => 'Element API',
    'version' => '2.6.0',
    'description' => 'Create a JSON API for your elements in Craft',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/element-api/blob/v2/README.md',
  ),
  'craftcms/hexdec' => 
  array (
    'class' => 'craft\\hexdec\\Plugin',
    'basePath' => $vendorDir . '/craftcms/hexdec/src',
    'handle' => 'hexdec',
    'aliases' => 
    array (
      '@craft/hexdec' => $vendorDir . '/craftcms/hexdec/src',
    ),
    'name' => 'Hexdec',
    'version' => '2.0.2',
    'description' => 'Adds a new hexdec filter to Craft, which will convert a hexadecimal value to a decimal.',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/hexdec',
    'changelogUrl' => 'https://raw.githubusercontent.com/craftcms/hexdec/v2/CHANGELOG.md',
    'downloadUrl' => 'https://github.com/craftcms/hexdec/archive/v2.zip',
  ),
  'craftcms/feed-me' => 
  array (
    'class' => 'craft\\feedme\\Plugin',
    'basePath' => $vendorDir . '/craftcms/feed-me/src',
    'handle' => 'feed-me',
    'aliases' => 
    array (
      '@craft/feedme' => $vendorDir . '/craftcms/feed-me/src',
    ),
    'name' => 'Feed Me',
    'version' => '4.3.4',
    'description' => 'Import content from XML, RSS, CSV or JSON feeds into entries, categories, Craft Commerce products, and more.',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://docs.craftcms.com/feed-me/v4/',
  ),
  'craftcms/mailgun' => 
  array (
    'class' => 'craft\\mailgun\\Plugin',
    'basePath' => $vendorDir . '/craftcms/mailgun/src',
    'handle' => 'mailgun',
    'aliases' => 
    array (
      '@craft/mailgun' => $vendorDir . '/craftcms/mailgun/src',
    ),
    'name' => 'Mailgun',
    'version' => '1.4.3',
    'description' => 'Mailgun integration for Craft CMS',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/mailgun/blob/v1/README.md',
  ),
  'craftcms/query' => 
  array (
    'class' => 'craft\\query\\Plugin',
    'basePath' => $vendorDir . '/craftcms/query/src',
    'handle' => 'query',
    'aliases' => 
    array (
      '@craft/query' => $vendorDir . '/craftcms/query/src',
    ),
    'name' => 'Query',
    'version' => '2.0.3',
    'description' => 'Execute database queries from the Control Panel',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/query',
    'changelogUrl' => 'https://raw.githubusercontent.com/craftcms/query/v2/CHANGELOG.md',
    'downloadUrl' => 'https://github.com/craftcms/query/archive/v2.zip',
  ),
  'craftcms/redactor' => 
  array (
    'class' => 'craft\\redactor\\Plugin',
    'basePath' => $vendorDir . '/craftcms/redactor/src',
    'handle' => 'redactor',
    'aliases' => 
    array (
      '@craft/redactor' => $vendorDir . '/craftcms/redactor/src',
    ),
    'name' => 'Redactor',
    'version' => '2.8.5',
    'description' => 'Edit rich text content in Craft CMS using Redactor by Imperavi.',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/redactor/blob/v2/README.md',
  ),
  'craftcms/simple-text' => 
  array (
    'class' => 'craft\\simpletext\\Plugin',
    'basePath' => $vendorDir . '/craftcms/simple-text/src',
    'handle' => 'simple-text',
    'aliases' => 
    array (
      '@craft/simpletext' => $vendorDir . '/craftcms/simple-text/src',
    ),
    'name' => 'Simple Text',
    'version' => '2.0.2',
    'schemaVersion' => '1.0.2',
    'description' => 'This plugin adds a new “Simple Text” field type to Craft, which provides a textarea that’s optimized for entering documentation.',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/simple-text',
    'changelogUrl' => 'https://raw.githubusercontent.com/craftcms/simple-text/v2/CHANGELOG.md',
    'downloadUrl' => 'https://github.com/craftcms/simple-text/archive/v2.zip',
  ),
  'craftcms/store-hours' => 
  array (
    'class' => 'craft\\storehours\\Plugin',
    'basePath' => $vendorDir . '/craftcms/store-hours/src',
    'handle' => 'store-hours',
    'aliases' => 
    array (
      '@craft/storehours' => $vendorDir . '/craftcms/store-hours/src',
    ),
    'name' => 'Store Hours',
    'version' => '2.1.1.1',
    'schemaVersion' => '1.0.2',
    'description' => 'This plugin adds a new “Store Hours” field type to Craft, for collecting the opening and closing hours of a business for each day of the week.',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/store-hours',
    'changelogUrl' => 'https://raw.githubusercontent.com/craftcms/store-hours/v2/CHANGELOG.md',
    'downloadUrl' => 'https://github.com/craftcms/store-hours/archive/v2.zip',
  ),
  'dolphiq/titleentriesfield' => 
  array (
    'class' => 'dolphiq\\titleentriesfield\\TitleEntriesFieldPlugin',
    'basePath' => $vendorDir . '/dolphiq/titleentriesfield/src',
    'handle' => 'linkfield',
    'aliases' => 
    array (
      '@dolphiq/titleentriesfield' => $vendorDir . '/dolphiq/titleentriesfield/src',
    ),
    'name' => 'Title Entries Field',
    'version' => '1.0.6',
    'schemaVersion' => '1.0.0',
    'description' => 'Offers users a field type with an easy way to set a different title for the relation than the related page title. Useful in menus, submenus or related lists if you are linking to other content but want to use shorter or different titles in the lists.',
    'developer' => 'Dolphiq',
    'developerUrl' => 'https://dolphiq.nl/',
    'documentationUrl' => 'https://github.com/Dolphiq/craft3-plugin-title-entries-field/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/Dolphiq/craft3-plugin-title-entries-field/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
  ),
  'dukt/facebook' => 
  array (
    'class' => 'dukt\\facebook\\Plugin',
    'basePath' => $vendorDir . '/dukt/facebook/src',
    'handle' => 'facebook',
    'aliases' => 
    array (
      '@dukt/facebook' => $vendorDir . '/dukt/facebook/src',
    ),
    'name' => 'Facebook',
    'version' => '2.0.3',
    'schemaVersion' => '1.0.1',
    'description' => 'Facebook Insights widget for the dashboard.',
    'developer' => 'Dukt',
    'developerUrl' => 'https://dukt.net/',
    'developerEmail' => 'support@dukt.net',
    'documentationUrl' => 'https://docs.dukt.net/facebook/v2/',
    'changelogUrl' => 'https://raw.githubusercontent.com/dukt/facebook/v2/CHANGELOG.md',
  ),
  'dukt/twitter' => 
  array (
    'class' => 'dukt\\twitter\\Plugin',
    'basePath' => $vendorDir . '/dukt/twitter/src',
    'handle' => 'twitter',
    'aliases' => 
    array (
      '@dukt/twitter' => $vendorDir . '/dukt/twitter/src',
    ),
    'name' => 'Twitter',
    'version' => '2.1.4',
    'schemaVersion' => '1.0.1',
    'description' => 'Tweet field, search widget, embeds, and authenticated Twitter API requests.',
    'developer' => 'Dukt',
    'developerUrl' => 'https://dukt.net/',
    'developerEmail' => 'support@dukt.net',
    'documentationUrl' => 'https://docs.dukt.net/twitter/v2',
    'changelogUrl' => 'https://raw.githubusercontent.com/dukt/twitter/master/CHANGELOG.md',
  ),
  'glue-agency/craft-fingerprint-assets' => 
  array (
    'class' => 'GlueAgency\\FingerprintAssets\\Plugin',
    'basePath' => $vendorDir . '/glue-agency/craft-fingerprint-assets/src',
    'handle' => 'fingerprint-assets',
    'aliases' => 
    array (
      '@GlueAgency/FingerprintAssets' => $vendorDir . '/glue-agency/craft-fingerprint-assets/src',
    ),
    'name' => 'Fingerprint Assets',
    'version' => '1.0.1',
    'description' => 'Add fingerprints to your assets on update',
    'developer' => 'glue-agency',
  ),
  'jalendport/craft-readtime' => 
  array (
    'class' => 'jalendport\\readtime\\ReadTime',
    'basePath' => $vendorDir . '/jalendport/craft-readtime/src',
    'handle' => 'read-time',
    'aliases' => 
    array (
      '@jalendport/readtime' => $vendorDir . '/jalendport/craft-readtime/src',
    ),
    'name' => 'Read Time',
    'version' => '1.6.0',
    'description' => 'Calculate the estimated read time for content.',
    'developer' => 'Jalen Davenport',
    'developerUrl' => 'https://jalendport.com',
    'documentationUrl' => 'https://github.com/jalendport/craft-readtime/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/jalendport/craft-readtime/master/CHANGELOG.md',
    'hasCpSettings' => true,
    'hasCpSection' => false,
  ),
  'jalendport/craft-updatechecker' => 
  array (
    'class' => 'jalendport\\updatechecker\\UpdateChecker',
    'basePath' => $vendorDir . '/jalendport/craft-updatechecker/src',
    'handle' => 'update-checker',
    'aliases' => 
    array (
      '@jalendport/updatechecker' => $vendorDir . '/jalendport/craft-updatechecker/src',
    ),
    'name' => 'Update Checker',
    'version' => '1.3.0',
    'description' => 'Automated update checker that notifies you of any pending updates',
    'developer' => 'Jalen Davenport',
    'developerUrl' => 'https://jalendport.com',
    'documentationUrl' => 'https://github.com/jalendport/craft-updatechecker/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/jalendport/craft-updatechecker/master/CHANGELOG.md',
    'hasCpSettings' => true,
    'hasCpSection' => false,
  ),
  'mblode/svgplaceholder' => 
  array (
    'class' => 'mblode\\svgplaceholder\\Svgplaceholder',
    'basePath' => $vendorDir . '/mblode/svgplaceholder/src',
    'handle' => 'svgplaceholder',
    'aliases' => 
    array (
      '@mblode/svgplaceholder' => $vendorDir . '/mblode/svgplaceholder/src',
    ),
    'name' => 'SVG Placeholder',
    'version' => '1.0.3',
    'schemaVersion' => '1.0.0',
    'description' => 'A plugin which generates an invisible SVG of specific dimensions for use when lazyloading images in Craft CMS templates.',
    'developer' => 'Matthew Blode',
    'developerUrl' => 'https://matthewblode.com',
    'documentationUrl' => 'https://github.com/mblode/svgplaceholder/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/MBLODE/svgplaceholder/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
  ),
  'mikestecker/craft-readability' => 
  array (
    'class' => 'mikestecker\\readability\\Readability',
    'basePath' => $vendorDir . '/mikestecker/craft-readability/src',
    'handle' => 'readability',
    'aliases' => 
    array (
      '@mikestecker/readability' => $vendorDir . '/mikestecker/craft-readability/src',
    ),
    'name' => 'Readability',
    'version' => '1.0.4',
    'schemaVersion' => '1.0.0',
    'description' => 'Get statistics on your text.',
    'developer' => 'Mike Stecker',
    'developerUrl' => 'https://github.com/mikestecker',
    'documentationUrl' => 'https://github.com/mikestecker/craft-readability/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/mikestecker/craft-readability/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
    'components' => 
    array (
      'readability' => 'mikestecker\\readability\\services\\ReadabilityService',
    ),
  ),
  'mikestecker/craft-videoembedder' => 
  array (
    'class' => 'mikestecker\\videoembedder\\VideoEmbedder',
    'basePath' => $vendorDir . '/mikestecker/craft-videoembedder/src',
    'handle' => 'video-embedder',
    'aliases' => 
    array (
      '@mikestecker/videoembedder' => $vendorDir . '/mikestecker/craft-videoembedder/src',
    ),
    'name' => 'Video Embedder',
    'version' => '1.1.4',
    'schemaVersion' => '1.0.0',
    'description' => 'Craft plugin to generate an embed URL from a YouTube or Vimeo URL.',
    'developer' => 'Mike Stecker',
    'developerUrl' => 'http://github.com/mikestecker',
    'documentationUrl' => 'https://github.com/mikestecker/craft-videoembedder/blob/v1/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/mikestecker/craft-videoembedder/v1/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
  ),
  'newism/craft3-fields' => 
  array (
    'class' => 'newism\\fields\\NsmFields',
    'basePath' => $vendorDir . '/newism/craft3-fields/src',
    'handle' => 'nsm-fields',
    'aliases' => 
    array (
      '@newism/fields' => $vendorDir . '/newism/craft3-fields/src',
    ),
    'name' => 'NSM Fields',
    'version' => '0.0.17',
    'schemaVersion' => '1.0.0',
    'description' => 'Address, telephone and email fields for CraftCMS 3.x',
    'developer' => 'Newism',
    'developerUrl' => 'http://newism.com.au',
    'documentationUrl' => 'https://github.com/newism/craft3-fields/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/newism/craft3-fields/master/CHANGELOG.md',
    'hasCpSettings' => true,
    'hasCpSection' => false,
  ),
  'nfourtythree/vcard' => 
  array (
    'class' => 'nfourtythree\\vcard\\VCard',
    'basePath' => $vendorDir . '/nfourtythree/vcard/src',
    'handle' => 'vcard',
    'aliases' => 
    array (
      '@nfourtythree/vcard' => $vendorDir . '/nfourtythree/vcard/src',
    ),
    'name' => 'vCard',
    'version' => '1.1.0',
    'description' => 'vCard generator plugin for Craft cms 3',
    'developer' => 'Nathaniel Hammond (nfourtythree)',
    'developerUrl' => 'http://n43.me',
    'documentationUrl' => 'https://github.com/nfourtythree/craft3-vcard/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/nfourtythree/craft3-vcard/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
    'components' => 
    array (
      'vCardService' => 'nfourtythree\\vcard\\services\\VCardService',
    ),
  ),
  'nystudio107/craft-cookies' => 
  array (
    'class' => 'nystudio107\\cookies\\Cookies',
    'basePath' => $vendorDir . '/nystudio107/craft-cookies/src',
    'handle' => 'cookies',
    'aliases' => 
    array (
      '@nystudio107/cookies' => $vendorDir . '/nystudio107/craft-cookies/src',
    ),
    'name' => 'Cookies',
    'version' => '1.1.12',
    'schemaVersion' => '1.0.0',
    'description' => 'A simple plugin for setting and getting cookies from within Craft CMS templates.',
    'developer' => 'nystudio107',
    'developerUrl' => 'https://nystudio107.com/',
    'documentationUrl' => 'https://nystudio107.com/plugins/cookies/documentation',
    'changelogUrl' => 'https://raw.githubusercontent.com/nystudio107/craft-cookies/v1/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
    'components' => 
    array (
      'cookies' => 'nystudio107\\cookies\\services\\CookiesService',
    ),
  ),
  'nystudio107/craft-fastcgicachebust' => 
  array (
    'class' => 'nystudio107\\fastcgicachebust\\FastcgiCacheBust',
    'basePath' => $vendorDir . '/nystudio107/craft-fastcgicachebust/src',
    'handle' => 'fastcgi-cache-bust',
    'aliases' => 
    array (
      '@nystudio107/fastcgicachebust' => $vendorDir . '/nystudio107/craft-fastcgicachebust/src',
    ),
    'name' => 'FastCGI Cache Bust',
    'version' => '1.0.9',
    'schemaVersion' => '1.0.0',
    'description' => 'Bust the Nginx FastCGI Cache when entries are saved or created.',
    'developer' => 'nystudio107',
    'developerUrl' => 'https://nystudio107.com',
    'documentationUrl' => 'https://nystudio107.com/plugins/fastcgi-cache-bust/documentation',
    'changelogUrl' => 'https://raw.githubusercontent.com/nystudio107/craft-fastcgicachebust/v1/CHANGELOG.md',
    'hasCpSettings' => true,
    'hasCpSection' => false,
    'components' => 
    array (
      'cache' => 'nystudio107\\fastcgicachebust\\services\\Cache',
    ),
  ),
  'nystudio107/craft-icalendar' => 
  array (
    'class' => 'nystudio107\\icalendar\\ICalendar',
    'basePath' => $vendorDir . '/nystudio107/craft-icalendar/src',
    'handle' => 'icalendar',
    'aliases' => 
    array (
      '@nystudio107/icalendar' => $vendorDir . '/nystudio107/craft-icalendar/src',
    ),
    'name' => 'iCalendar',
    'version' => '1.1.0',
    'description' => 'Tools for parsing & formatting the RFC 2445 iCalendar (.ics) specification',
    'developer' => 'nystudio107',
    'developerUrl' => 'https://nystudio107.com',
    'documentationUrl' => 'https://github.com/nystudio107/craft-icalendar/blob/v1/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/nystudio107/craft-icalendar/v1/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
    'components' => 
    array (
      'convert' => 'nystudio107\\icalendar\\services\\Convert',
      'parse' => 'nystudio107\\icalendar\\services\\Parse',
    ),
  ),
  'nystudio107/craft-minify' => 
  array (
    'class' => 'nystudio107\\minify\\Minify',
    'basePath' => $vendorDir . '/nystudio107/craft-minify/src',
    'handle' => 'minify',
    'aliases' => 
    array (
      '@nystudio107/minify' => $vendorDir . '/nystudio107/craft-minify/src',
    ),
    'name' => 'Minify',
    'version' => '1.2.10',
    'schemaVersion' => '1.0.0',
    'description' => 'A simple plugin that allows you to minify blocks of HTML, CSS, and JS inline in Craft CMS templates.',
    'developer' => 'nystudio107',
    'developerUrl' => 'https://nystudio107.com/',
    'documentationUrl' => 'https://nystudio107.com/plugins/minify/documentation',
    'changelogUrl' => 'https://raw.githubusercontent.com/nystudio107/craft-minify/v1/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
    'components' => 
    array (
      'minify' => 'nystudio107\\minify\\services\\MinifyService',
    ),
  ),
  'nystudio107/craft-pathtools' => 
  array (
    'class' => 'nystudio107\\pathtools\\PathTools',
    'basePath' => $vendorDir . '/nystudio107/craft-pathtools/src',
    'handle' => 'path-tools',
    'aliases' => 
    array (
      '@nystudio107/pathtools' => $vendorDir . '/nystudio107/craft-pathtools/src',
    ),
    'name' => 'PathTools',
    'version' => '1.0.7',
    'schemaVersion' => '1.0.0',
    'description' => 'This twig plugin for the Craft CMS brings convenient path & url manipulation functions & filters to your Twig templates.',
    'developer' => 'nystudio107',
    'developerUrl' => 'https://nystudio107.com',
    'documentationUrl' => 'https://github.com/nystudio107/craft-pathtools/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/nystudio107/craft-pathtools/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
  ),
  'nystudio107/craft-imageoptimize' => 
  array (
    'class' => 'nystudio107\\imageoptimize\\ImageOptimize',
    'basePath' => $vendorDir . '/nystudio107/craft-imageoptimize/src',
    'handle' => 'image-optimize',
    'aliases' => 
    array (
      '@nystudio107/imageoptimize' => $vendorDir . '/nystudio107/craft-imageoptimize/src',
    ),
    'name' => 'ImageOptimize',
    'version' => '1.6.20',
    'schemaVersion' => '1.0.0',
    'description' => 'Automatically create & optimize responsive image transforms, using either native Craft transforms or a service like imgix, with zero template changes.',
    'developer' => 'nystudio107',
    'developerUrl' => 'https://nystudio107.com',
    'documentationUrl' => 'https://nystudio107.com/plugins/imageoptimize/documentation',
    'changelogUrl' => 'https://raw.githubusercontent.com/nystudio107/craft-imageoptimize/v1/CHANGELOG.md',
    'hasCpSettings' => true,
    'hasCpSection' => false,
    'components' => 
    array (
      'optimize' => 'nystudio107\\imageoptimize\\services\\Optimize',
      'optimizedImages' => 'nystudio107\\imageoptimize\\services\\OptimizedImages',
      'placeholder' => 'nystudio107\\imageoptimize\\services\\Placeholder',
    ),
  ),
  'nystudio107/craft-typogrify' => 
  array (
    'class' => 'nystudio107\\typogrify\\Typogrify',
    'basePath' => $vendorDir . '/nystudio107/craft-typogrify/src',
    'handle' => 'typogrify',
    'aliases' => 
    array (
      '@nystudio107/typogrify' => $vendorDir . '/nystudio107/craft-typogrify/src',
    ),
    'name' => 'Typogrify',
    'version' => '1.1.18',
    'schemaVersion' => '1.0.0',
    'description' => 'Typogrify prettifies your web typography by preventing ugly quotes and \'widows\' and more',
    'developer' => 'nystudio107',
    'developerUrl' => 'https://nystudio107.com/',
    'documentationUrl' => 'https://github.com/nystudio107/craft-typogrify/blob/v1/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/nystudio107/craft-typogrify/v1/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
    'components' => 
    array (
      'typogrify' => 'nystudio107\\typogrify\\services\\TypogrifyService',
    ),
  ),
  'nystudio107/craft-youtubeliveembed' => 
  array (
    'class' => 'nystudio107\\youtubeliveembed\\YoutubeLiveEmbed',
    'basePath' => $vendorDir . '/nystudio107/craft-youtubeliveembed/src',
    'handle' => 'youtubeliveembed',
    'aliases' => 
    array (
      '@nystudio107/youtubeliveembed' => $vendorDir . '/nystudio107/craft-youtubeliveembed/src',
    ),
    'name' => 'YouTube Live Embed',
    'version' => '1.0.8',
    'description' => 'This plugin allows you to embed a YouTube live stream and/or live chat on your webpage',
    'developer' => 'nystudio107',
    'developerUrl' => 'https://nystudio107.com',
    'documentationUrl' => 'https://nystudio107.com/plugins/youtube-live-embed/documentation',
    'changelogUrl' => 'https://raw.githubusercontent.com/nystudio107/craft-youtubeliveembed/master/CHANGELOG.md',
    'hasCpSettings' => true,
    'hasCpSection' => false,
    'components' => 
    array (
      'embed' => 'nystudio107\\youtubeliveembed\\services\\Embed',
      'stream' => 'nystudio107\\youtubelivembed\\services\\Stream',
    ),
  ),
  'percipioglobal/craft-password-policy' => 
  array (
    'class' => 'percipioglobal\\passwordpolicy\\PasswordPolicy',
    'basePath' => $vendorDir . '/percipioglobal/craft-password-policy/src',
    'handle' => 'password-policy',
    'aliases' => 
    array (
      '@percipioglobal/passwordpolicy' => $vendorDir . '/percipioglobal/craft-password-policy/src',
    ),
    'name' => 'Password Policy',
    'version' => '1.0.6',
    'description' => 'Enforce a password policy on your users.',
    'developer' => 'Percipio Global Ltd.',
    'developerUrl' => 'https://percipio.london',
    'documentationUrl' => 'https://github.com/percipioglobal/craft-password-policy/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/percipioglobal/craft-password-policy/master/CHANGELOG.md',
    'hasCpSettings' => true,
    'hasCpSection' => false,
    'components' => 
    array (
      'passwordService' => 'percipioglobal\\passwordpolicy\\services\\PasswordService',
    ),
  ),
  'rias/craft-position-fieldtype' => 
  array (
    'class' => 'rias\\positionfieldtype\\PositionFieldtype',
    'basePath' => $vendorDir . '/rias/craft-position-fieldtype/src',
    'handle' => 'position-fieldtype',
    'aliases' => 
    array (
      '@rias/positionfieldtype' => $vendorDir . '/rias/craft-position-fieldtype/src',
    ),
    'name' => 'Position Fieldtype',
    'version' => '1.0.16',
    'schemaVersion' => '1.0.0',
    'description' => 'Brings back the Position fieldtype from Craft 2',
    'developer' => 'Hybrid Interactive',
    'developerUrl' => 'https://hybridinteractive.io',
    'documentationUrl' => 'https://github.com/hybridinteractive/craft-position-fieldtype/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/riasvdv/craft-position-fieldtype/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
  ),
  'rias/craft-scout' => 
  array (
    'class' => 'rias\\scout\\Scout',
    'basePath' => $vendorDir . '/rias/craft-scout/src',
    'handle' => 'scout',
    'aliases' => 
    array (
      '@rias/scout' => $vendorDir . '/rias/craft-scout/src',
    ),
    'name' => 'Scout',
    'version' => '2.3.1',
    'schemaVersion' => '0.1.0',
    'description' => 'Craft Scout provides a simple solution for adding full-text search to your entries. Scout will automatically keep your search indexes in sync with your entries.',
    'developer' => 'Rias',
    'developerUrl' => 'https://rias.be',
    'documentationUrl' => 'https://github.com/riasvdv/craft-scout/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/riasvdv/craft-scout/master/CHANGELOG.md',
    'hasCpSettings' => true,
    'hasCpSection' => false,
  ),
  'selvinortiz/patrol' => 
  array (
    'class' => 'selvinortiz\\patrol\\Patrol',
    'basePath' => $vendorDir . '/selvinortiz/patrol/src',
    'handle' => 'patrol',
    'aliases' => 
    array (
      '@selvinortiz/patrol' => $vendorDir . '/selvinortiz/patrol/src',
    ),
    'name' => 'Patrol',
    'version' => '3.1.3',
    'schemaVersion' => '3.0.0',
    'description' => 'Maintenance Mode & SSL Routing for Craft 3',
    'developer' => 'Selvin Ortiz',
    'developerUrl' => 'https://selvinortiz.com',
    'documentationUrl' => 'https://github.com/selvinortiz/patrol/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/selvinortiz/patrol/CHANGELOG.md',
    'hasCpSettings' => true,
    'components' => 
    array (
      'defaultService' => 'selvinortiz\\patrol\\services\\PatrolService',
    ),
  ),
  'superbig/craft3-calendarlinks' => 
  array (
    'class' => 'superbig\\calendarlinks\\CalendarLinks',
    'basePath' => $vendorDir . '/superbig/craft3-calendarlinks/src',
    'handle' => 'calendar-links',
    'aliases' => 
    array (
      '@superbig/calendarlinks' => $vendorDir . '/superbig/craft3-calendarlinks/src',
    ),
    'name' => 'Calendar Links',
    'version' => '1.0.1',
    'schemaVersion' => '1.0.0',
    'description' => 'Generate add to calendar links for Google, iCal and other calendar systems',
    'developer' => 'Superbig',
    'developerUrl' => 'https://superbig.co',
    'documentationUrl' => 'https://github.com/sjelfull/craft3-calendarlinks/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/sjelfull/craft3-calendarlinks/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
    'components' => 
    array (
      'calendarLinksService' => 'superbig\\calendarlinks\\services\\CalendarLinksService',
    ),
  ),
  'superbig/craft3-shortcut' => 
  array (
    'class' => 'superbig\\shortcut\\Shortcut',
    'basePath' => $vendorDir . '/superbig/craft3-shortcut/src',
    'handle' => 'shortcut',
    'aliases' => 
    array (
      '@superbig/shortcut' => $vendorDir . '/superbig/craft3-shortcut/src',
    ),
    'name' => 'Shortcut',
    'version' => '2.0.3',
    'description' => 'Simple URL shortening',
    'developer' => 'Superbig',
    'developerUrl' => 'https://superbig.co',
    'documentationUrl' => 'https://github.com/sjelfull/craft3-shortcut/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/sjelfull/craft3-shortcut/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
    'components' => 
    array (
      'shortcutService' => 'superbig\\shortcut\\services\\ShortcutService',
    ),
  ),
  'supercool/tablemaker' => 
  array (
    'class' => 'supercool\\tablemaker\\TableMaker',
    'basePath' => $vendorDir . '/supercool/tablemaker/src',
    'handle' => 'tablemaker',
    'aliases' => 
    array (
      '@supercool/tablemaker' => $vendorDir . '/supercool/tablemaker/src',
    ),
    'name' => 'Table Maker',
    'version' => '2.0.1',
    'schemaVersion' => '1.0.0',
    'description' => 'A user-definable table field type for Craft CMS',
    'developer' => 'Supercool Ltd',
    'developerUrl' => 'http://www.supercooldesign.co.uk/',
    'documentationUrl' => 'https://github.com/supercool/tablemaker/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/supercool/tablemaker/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
  ),
  'topshelfcraft/wordsmith' => 
  array (
    'class' => 'topshelfcraft\\wordsmith\\Wordsmith',
    'basePath' => $vendorDir . '/topshelfcraft/wordsmith/src',
    'handle' => 'wordsmith',
    'aliases' => 
    array (
      '@topshelfcraft/wordsmith' => $vendorDir . '/topshelfcraft/wordsmith/src',
    ),
    'name' => 'Wordsmith',
    'version' => '3.3.0',
    'schemaVersion' => '0.0.0.0',
    'description' => '...because you have the best words.',
    'developer' => 'Michael Rog',
    'developerUrl' => 'https://topshelfcraft.com',
    'documentationUrl' => 'https://wordsmith.docs.topshelfcraft.com/',
    'changelogUrl' => 'https://raw.githubusercontent.com/topshelfcraft/wordsmith/master/CHANGELOG.md',
  ),
  'unionco/calendarize' => 
  array (
    'class' => 'unionco\\calendarize\\Calendarize',
    'basePath' => $vendorDir . '/unionco/calendarize/src',
    'handle' => 'calendarize',
    'aliases' => 
    array (
      '@unionco/calendarize' => $vendorDir . '/unionco/calendarize/src',
    ),
    'name' => 'Calendarize',
    'version' => '1.2.18',
    'description' => 'A calendar field type providing functionality for recurrence.',
    'developer' => 'Franco Valdes',
    'developerUrl' => 'https://union.co',
    'documentationUrl' => 'https://github.com/unionco/calendarize/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/unionco/calendarize/master/CHANGELOG.md',
  ),
  'nystudio107/craft-seomatic' => 
  array (
    'class' => 'nystudio107\\seomatic\\Seomatic',
    'basePath' => $vendorDir . '/nystudio107/craft-seomatic/src',
    'handle' => 'seomatic',
    'aliases' => 
    array (
      '@nystudio107/seomatic' => $vendorDir . '/nystudio107/craft-seomatic/src',
    ),
    'name' => 'SEOmatic',
    'version' => '3.3.26',
    'description' => 'SEOmatic facilitates modern SEO best practices & implementation for Craft CMS 3. It is a turnkey SEO system that is comprehensive, powerful, and flexible.',
    'developer' => 'nystudio107',
    'developerUrl' => 'https://nystudio107.com',
    'documentationUrl' => 'https://nystudio107.com/plugins/seomatic/documentation',
    'changelogUrl' => 'https://raw.githubusercontent.com/nystudio107/craft-seomatic/v3/CHANGELOG.md',
    'hasCpSettings' => true,
    'hasCpSection' => true,
    'components' => 
    array (
      'frontendTemplates' => 'nystudio107\\seomatic\\services\\FrontendTemplates',
      'helper' => 'nystudio107\\seomatic\\services\\Helper',
      'jsonLd' => 'nystudio107\\seomatic\\services\\JsonLd',
      'link' => 'nystudio107\\seomatic\\services\\Link',
      'metaBundles' => 'nystudio107\\seomatic\\services\\MetaBundles',
      'metaContainers' => 'nystudio107\\seomatic\\services\\MetaContainers',
      'seoElements' => 'nystudio107\\seomatic\\services\\SeoElements',
      'script' => 'nystudio107\\seomatic\\services\\Script',
      'sitemaps' => 'nystudio107\\seomatic\\services\\Sitemaps',
      'tag' => 'nystudio107\\seomatic\\services\\Tag',
      'title' => 'nystudio107\\seomatic\\services\\Title',
    ),
  ),
  'verbb/cp-nav' => 
  array (
    'class' => 'verbb\\cpnav\\CpNav',
    'basePath' => $vendorDir . '/verbb/cp-nav/src',
    'handle' => 'cp-nav',
    'aliases' => 
    array (
      '@verbb/cpnav' => $vendorDir . '/verbb/cp-nav/src',
    ),
    'name' => 'Control Panel Nav',
    'version' => '3.0.13.1',
    'description' => 'Control Panel Nav helps you managing your Control Panel navigation.',
    'developer' => 'Verbb',
    'developerUrl' => 'http://verbb.io',
    'developerEmail' => 'support@verbb.io',
    'documentationUrl' => 'https://github.com/verbb/cp-nav',
    'changelogUrl' => 'https://raw.githubusercontent.com/verbb/cp-nav/craft-3/CHANGELOG.md',
  ),
  'verbb/events' => 
  array (
    'class' => 'verbb\\events\\Events',
    'basePath' => $vendorDir . '/verbb/events/src',
    'handle' => 'events',
    'aliases' => 
    array (
      '@verbb/events' => $vendorDir . '/verbb/events/src',
    ),
    'name' => 'Events',
    'version' => '1.4.12',
    'description' => 'Events is a full-featured Craft CMS Plugin for event management and ticketing. Events integrates with Craft Commerce so you can easily sell tickets to your events.',
    'developer' => 'Verbb',
    'developerUrl' => 'https://verbb.io',
    'developerEmail' => 'support@verbb.io',
    'documentationUrl' => 'https://github.com/verbb/events',
    'changelogUrl' => 'https://raw.githubusercontent.com/verbb/events/craft-3/CHANGELOG.md',
  ),
  'verbb/expanded-singles' => 
  array (
    'class' => 'verbb\\expandedsingles\\ExpandedSingles',
    'basePath' => $vendorDir . '/verbb/expanded-singles/src',
    'handle' => 'expanded-singles',
    'aliases' => 
    array (
      '@verbb/expandedsingles' => $vendorDir . '/verbb/expanded-singles/src',
    ),
    'name' => 'Expanded Singles',
    'version' => '1.1.3',
    'description' => 'Alters the Entries Index sidebar to list all Singles, rather than grouping them under a \'Singles\' link.',
    'developer' => 'Verbb',
    'developerUrl' => 'https://verbb.io',
    'developerEmail' => 'support@verbb.io',
    'documentationUrl' => 'https://github.com/verbb/expanded-singles',
    'changelogUrl' => 'https://raw.githubusercontent.com/verbb/expanded-singles/craft-3/CHANGELOG.md',
  ),
  'verbb/smith' => 
  array (
    'class' => 'verbb\\smith\\Smith',
    'basePath' => $vendorDir . '/verbb/smith/src',
    'handle' => 'smith',
    'aliases' => 
    array (
      '@verbb/smith' => $vendorDir . '/verbb/smith/src',
    ),
    'name' => 'Smith',
    'version' => '1.1.10',
    'description' => 'Add copy, paste and clone functionality to Matrix blocks.',
    'developer' => 'Verbb',
    'developerUrl' => 'https://verbb.io',
    'developerEmail' => 'support@verbb.io',
    'documentationUrl' => 'https://github.com/verbb/smith',
    'changelogUrl' => 'https://raw.githubusercontent.com/verbb/smith/craft-3/CHANGELOG.md',
  ),
  'craftcms/commerce' => 
  array (
    'class' => 'craft\\commerce\\Plugin',
    'basePath' => $vendorDir . '/craftcms/commerce/src',
    'handle' => 'commerce',
    'aliases' => 
    array (
      '@craft/commerce' => $vendorDir . '/craftcms/commerce/src',
      '@craftcommercetests/fixtures' => $vendorDir . '/craftcms/commerce/tests/fixtures',
    ),
    'name' => 'Craft Commerce',
    'version' => '3.2.0.2',
    'description' => 'Create beautifully bespoke ecommerce experiences',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://craftcommerce.com',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://craftcms.com/docs/commerce/3.x/',
  ),
);
