<?php
/**
 * Inlin plugin for Craft CMS 3.x
 *
 * A tiny plugin for inlining files in Craft templates.
 *
 * @link      http://github.com/mikestecker
 * @copyright Copyright (c) 2017 Mike Stecker
 */

/**
 * Inlin config.php
 *
 * This file exists only as a template for the Inlin settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'Inlin.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */

return [

    // All environments
    '*' => [
      'inlinPublicRoot' => getenv('CRAFTENV_BASE_PATH'),
    ],

    // Live (production) environment
    'live'  => [
    ],

    // Staging (pre-production) environment
    'staging'  => [
    ],

    // Local (development) environment
    'local'  => [
      'inlinPublicRoot' => getenv('CRAFTENV_BASE_PATH'),
    ],
];
