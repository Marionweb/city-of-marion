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
 * Don't edit this file, instead copy it to 'craft/config' as
 * 'image-optimize.php' and make your changes there to override default
 * settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just
 * as
 * you do for 'general.php'
 */

return [
    
    '*' => [
        //  What transform method should be used for image transforms?
        'transformMethod' => 'craft',
        // Domain for the Imgix transform service
        'imgixDomain' => '',
        // Should image variant be created on Asset save (aka BeforePageLoad)
        'generateTransformsBeforePageLoad' => true,
        // Controls whether a dominant color palette should be created for image variants
        // It takes a bit of time, so if you never plan to use it, you can turn it off
        'createColorPalette' => true,
         // Controls whether SVG placeholder silhouettes should be created for image variants
         // It takes a bit of time, so if you never plan to use them, you can turn it off
        'createPlaceholderSilhouettes' => true,
      
        // Default image variants
        'defaultVariants'            => [
            [
                'width'          => 1690,
                'useAspectRatio' => true,
                'aspectRatioX'   => 16.0,
                'aspectRatioY'   => 9.0,
                'retinaSizes'    => ['1'],
                'quality'        => 82,
                'format'         => 'jpg',
            ],
            [
                'width'          => 1280,
                'useAspectRatio' => true,
                'aspectRatioX'   => 16.0,
                'aspectRatioY'   => 9.0,
                'retinaSizes'    => ['1'],
                'quality'        => 82,
                'format'         => 'jpg',
            ],
            [
                'width'          => 980,
                'useAspectRatio' => true,
                'aspectRatioX'   => 4.0,
                'aspectRatioY'   => 3.0,
                'retinaSizes'    => ['1'],
                'quality'        => 60,
                'format'         => 'jpg',
            ],
            [
                'width'          => 736,
                'useAspectRatio' => true,
                'aspectRatioX'   => 4.0,
                'aspectRatioY'   => 3.0,
                'retinaSizes'    => ['1'],
                'quality'        => 60,
                'format'         => 'jpg',
            ],
            [
                'width'          => 480,
                'useAspectRatio' => true,
                'aspectRatioX'   => 4.0,
                'aspectRatioY'   => 3.0,
                'retinaSizes'    => ['1'],
                'quality'        => 60,
                'format'         => 'jpg',
            ],
        ],

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
      ],

      // Active image variant creators
      'activeImageVariantCreators' => [
          'jpg' => [
              'cwebp',
          ],
          'png' => [
              'cwebp',
          ],
          'gif' => [
              'cwebp',
          ],
      ],

    ],

    // Live (production) environment
    'live' => [
      // Preset image processors
      "imageProcessors" => [
        // jpeg optimizers
        "jpegoptim" => [
            "commandPath"           => "/usr/bin/jpegoptim",
            'commandOptions'        => '-s',
            'commandOutputFileFlag' => '',
        ],
        // png optimizers
        "optipng" => [
            "commandPath"           => "/usr/bin/optipng",
            'commandOptions'        => '-o7 -strip all',
            'commandOutputFileFlag' => '',
        ],
        // svg optimizers
        "svgo" => [
            "commandPath"           => "/usr/bin/svgo",
            'commandOptions'        => '',
            'commandOutputFileFlag' => '',
        ],
        // gif optimizers
        "gifsicle" => [
            "commandPath"           => "/usr/bin/gifsicle",
            'commandOptions'        => '-O3 -k 256',
            'commandOutputFileFlag' => '',
        ],
      ],

      'imageVariantCreators' => [
          // webp variant creator
          'cwebp' => [
              'commandPath'           => '/usr/bin/cwebp',
              'commandOptions'        => '',
              'commandOutputFileFlag' => '-o',
              'commandQualityFlag'    => '-q',
              'imageVariantExtension' => 'webp',
          ],
      ],
    ],

    // Staging (pre-production) environment
    'staging' => [
      // Preset image processors
      "imageProcessors" => [
        // jpeg optimizers
        "jpegoptim" => [
            "commandPath"           => "/usr/bin/jpegoptim",
            'commandOptions'        => '-s',
            'commandOutputFileFlag' => '',
        ],
        // png optimizers
        "optipng" => [
            "commandPath"           => "/usr/bin/optipng",
            'commandOptions'        => '-o7 -strip all',
            'commandOutputFileFlag' => '',
        ],
        // svg optimizers
        "svgo" => [
            "commandPath"           => "/usr/bin/svgo",
            'commandOptions'        => '',
            'commandOutputFileFlag' => '',
        ],
        // gif optimizers
        "gifsicle" => [
            "commandPath"           => "/usr/bin/gifsicle",
            'commandOptions'        => '-O3 -k 256',
            'commandOutputFileFlag' => '',
        ],
      ],

      'imageVariantCreators' => [
          // webp variant creator
          'cwebp' => [
              'commandPath'           => '/usr/bin/cwebp',
              'commandOptions'        => '',
              'commandOutputFileFlag' => '-o',
              'commandQualityFlag'    => '-q',
              'imageVariantExtension' => 'webp',
          ],
      ],
    ],

    // Local (development) environment
    'local' => [
      // Preset image processors
      "imageProcessors" => [
        // jpeg optimizers
        "jpegoptim" => [
            "commandPath"           => "/usr/local/bin/jpegoptim",
            'commandOptions'        => '-s',
            'commandOutputFileFlag' => '',
        ],
        // png optimizers
        "optipng" => [
            "commandPath"           => "/usr/local/bin/optipng",
            'commandOptions'        => '-o7 -strip all',
            'commandOutputFileFlag' => '',
        ],
        // svg optimizers
        "svgo" => [
            "commandPath"           => "/usr/local/bin/svgo",
            'commandOptions'        => '',
            'commandOutputFileFlag' => '',
        ],
        // gif optimizers
        "gifsicle" => [
            "commandPath"           => "/usr/local/bin/gifsicle",
            'commandOptions'        => '-O3 -k 256',
            'commandOutputFileFlag' => '',
        ],
      ],

      'imageVariantCreators' => [
          // webp variant creator
          'cwebp' => [
              'commandPath'           => '/usr/local/bin/cwebp',
              'commandOptions'        => '',
              'commandOutputFileFlag' => '-o',
              'commandQualityFlag'    => '-q',
              'imageVariantExtension' => 'webp',
          ],
      ],
    ],

];
