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
    ],

    // Live (production) environment
    'live'  => [
    ],

    // Staging (pre-production) environment
    'staging'  => [
    ],

    // Local (development) environment
    'local'  => [
      'siteAssets' => [
        'url' => getenv('CRAFTENV_BASE_URL') . 'volumes/site',
        'path' => getenv('CRAFTENV_BASE_PATH') . 'volumes/site',
      ],
      'pageHeaderImages' => [
        'url' => getenv('CRAFTENV_BASE_URL') . 'volumes/site/headers',
        'path' => getenv('CRAFTENV_BASE_PATH') . 'volumes/site/headers',
      ],
      'newsEventsAssets' => [
        'url' => getenv('CRAFTENV_BASE_URL') . 'volumes/news-events',
        'path' => getenv('CRAFTENV_BASE_PATH') . 'volumes/news-events',
      ],
      'staffPhotos' => [
        'url' => getenv('CRAFTENV_BASE_URL') . 'volumes/site/staff',
        'path' => getenv('CRAFTENV_BASE_PATH') . 'volumes/site/staff',
      ],
      'logos' => [
        'url' => getenv('CRAFTENV_BASE_URL') . 'volumes/site/logos',
        'path' => getenv('CRAFTENV_BASE_PATH') . 'volumes/site/logos',
      ],
      'icons' => [
        'url' => getenv('CRAFTENV_BASE_URL') . 'volumes/site/icons',
        'path' => getenv('CRAFTENV_BASE_PATH') . 'volumes/site/icons',
      ],
      'fileAttachments' => [
        'url' => getenv('CRAFTENV_BASE_URL') . 'volumes/downloads',
        'path' => getenv('CRAFTENV_BASE_PATH') . 'volumes/downloads',
      ],
    ],
];
