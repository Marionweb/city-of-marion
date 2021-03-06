<?php
/**
 * $_ENV constants are loaded by craft3-multi-environment from .env.php via web/index.php
 *
 * @author    nystudio107
 * @copyright Copyright (c) 2017 nystudio107
 * @link      https://nystudio107.com/
 * @package   craft3-multi-environment
 * @since     1.0.3
 * @license   MIT
 */

return [

    // All environments
    '*' => [
        'omitScriptNameInUrls' => true,
        'usePathInfo' => true,
        'cacheDuration' => false,
        'useEmailAsUsername' => true,
        'generateTransformsBeforePageLoad' => true,
        'enableCsrfProtection' => true,
        'siteUrl' => getenv('CRAFTENV_SITE_URL'),
        'craftEnv' => CRAFT_ENVIRONMENT,
        'securityKey' => getenv('CRAFTENV_SECURITY_KEY'),
        'maxUploadFileSize' => 104857600,

        // change default number of slugs
        'maxSlugIncrement' => 100000,

        // Control Panel trigger word
        'cpTrigger' => 'admin',

        // Default Week Start Day (0 = Sunday, 1 = Monday...)
        'defaultWeekStartDay' => 1,

        // Enable CSRF Protection (recommended, will be enabled by default in Craft 3)
        'enableCsrfProtection' => true,

        'googleApiKey' => getenv('CRAFTENV_GOOGLE_API_KEY'),
    ],

    // Live (production) environment
    'live' => [
        'isSystemLive' => true,
        'devMode' => false,
        'backupOnUpdate' => false,
        'enableTemplateCaching' => true,
        'allowUpdates' => false,
        'appId' => 'cerulean',
        'cacheDuration' => '0',
    ],

    // Staging (pre-production) environment
    'staging' => [
        'isSystemLive' => false,
        'devMode' => false,
        'backupOnUpdate' => false,
        'enableTemplateCaching' => true,
        'allowUpdates' => false,
        'rememberUsernameDuration' => 'P101Y',
        'rememberedUserSessionDuration' => 'P101Y',
        'userSessionDuration' => 'P101Y',
    ],

    // Local (development) environment
    'local' => [
        'isSystemLive' => true,
        'devMode' => true,
        'backupOnUpdate' => true,
        'enableTemplateCaching' => false,
        'allowUpdates' => true,
        'rememberUsernameDuration' => 'P101Y',
        'rememberedUserSessionDuration' => 'P101Y',
        'userSessionDuration' => 'P101Y',
    ],
];
