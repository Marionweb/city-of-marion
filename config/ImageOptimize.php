<?php
/**
 * ImageOptimize plugin for Craft CMS 3.x
 *
 * Automatically optimize images after they've been transformed
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

/**
 * ImageOptimize config.php
 *
 * This file exists only as a template for the ImageOptimize settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'imageoptimize.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */

return [

    '*' => [

      // Active image processors
      "activeImageProcessors" => [
          "jpg" => [
              "jpegoptim",
          ],
          "png" => [
              "optipng",
          ],
          "svg" => [
              "svgo",
          ],
          "gif" => [
              "gifsicle",
          ],
          "webp" => [
              "cwebp",
          ],
      ],

    ],

    // Live (production) environment
    'live' => [
    ],

    // Staging (pre-production) environment
    'staging' => [
    ],

    // Local (development) environment
    'local' => [
      // Preset image processors
      "imageProcessors" => [
        // jpeg optimizers
        "jpegoptim" => [
            "commandPath" => "/usr/local/bin/jpegoptim",
            "commandOptions" => "-s",
        ],
        "jpegtran" => [
            "commandPath" => "/usr/local/bin/jpegtran",
            "commandOptions" => "-optimize -copy none",
        ],
        // png optimizers
        "optipng" => [
            "commandPath" => "/usr/local/bin/optipng",
            "commandOptions" => "-o7 -strip all",
        ],
        "pngcrush" => [
            "commandPath" => "/usr/local/bin/pngcrush",
            "commandOptions" => "-brute -ow",
        ],
        "pngquant" => [
            "commandPath" => "/usr/local/bin/pngquant",
            "commandOptions" => "--strip --skip-if-larger",
        ],
        // svg optimizers
        "svgo" => [
            "commandPath" => "/usr/local/bin/svgo",
            "commandOptions" => "",
        ],
        // gif optimizers
        "gifsicle" => [
            "commandPath" => "/usr/local/bin/gifsicle",
            "commandOptions" => "-O3 -k 256",
        ],
        // webp optimizers
        "cwebp" => [
            "commandPath" => "/usr/local/bin/cwebp",
            "commandOptions" => "",
        ],
      ],
    ],

];
