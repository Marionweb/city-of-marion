<?php

/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here.
 * You can see a list of the default settings in src/config/defaults/general.php
 */

// $_ENV constants are loaded by craft3-multi-environment from .env.php via web/index.php
return [

    // All environments
    '*' => [
        'omitScriptNameInUrls' => true,
        'usePathInfo' => true,
        'cacheDuration' => false,
        'useEmailAsUsername' => true,
        'generateTransformsBeforePageLoad' => true,
        'siteUrl' => getenv('CRAFTENV_SITE_URL'),
        'craftEnv' => CRAFT_ENVIRONMENT,

        // Control Panel trigger word
        'cpTrigger' => 'admin',

        // Default Week Start Day (0 = Sunday, 1 = Monday...)
        'defaultWeekStartDay' => 0,

        // Enable CSRF Protection (recommended, will be enabled by default in Craft 3)
        'enableCsrfProtection' => true,
    ],

    // Live (production) environment
    'live' => [
        'devMode' => false,
        'enableTemplateCaching' => true,
        'allowAutoUpdates' => false,
        'appId' => 'cerulean',
        'cacheDuration' => '0',
    ],

    // Staging (pre-production) environment
    'staging' => [
        'devMode' => false,
        'enableTemplateCaching' => true,
        'allowAutoUpdates' => false,
    ],

    // Local (development) environment
    'local' => [
        'devMode' => true,
        'enableTemplateCaching' => false,
        'allowAutoUpdates' => true,
        'rememberUsernameDuration' => 'P101Y',
        'rememberedUserSessionDuration' => 'P101Y',
        'userSessionDuration' => 'P101Y',
    ],
];
