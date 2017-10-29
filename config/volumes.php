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

      'downloads' => [
        'hasUrls' => true,
        'url' => '//s3.' . getenv('CRAFTENV_AWS_REGION') . '.amazonaws.com/' . getenv('CRAFTENV_AWS_BUCKET') . '/',
        'subfolder' => 'downloads',
        'keyId' => getenv('CRAFTENV_AWS_KEY'),
        'secret' => getenv('CRAFTENV_AWS_SECRET'),
        'bucket' => getenv('CRAFTENV_AWS_BUCKET'),
        'region' => getenv('CRAFTENV_AWS_REGION'),
      ],

      'assetsArticles' => [
        'hasUrls' => true,
        'url' => '//s3.' . getenv('CRAFTENV_AWS_REGION') . '.amazonaws.com/' . getenv('CRAFTENV_AWS_BUCKET') . '/',
        'subfolder' => 'assets/articles',
        'keyId' => getenv('CRAFTENV_AWS_KEY'),
        'secret' => getenv('CRAFTENV_AWS_SECRET'),
        'bucket' => getenv('CRAFTENV_AWS_BUCKET'),
        'region' => getenv('CRAFTENV_AWS_REGION'),
      ],

      'assetsGeneral' => [
        'hasUrls' => true,
        'url' => '//s3.' . getenv('CRAFTENV_AWS_REGION') . '.amazonaws.com/' . getenv('CRAFTENV_AWS_BUCKET') . '/',
        'subfolder' => 'assets/general',
        'keyId' => getenv('CRAFTENV_AWS_KEY'),
        'secret' => getenv('CRAFTENV_AWS_SECRET'),
        'bucket' => getenv('CRAFTENV_AWS_BUCKET'),
        'region' => getenv('CRAFTENV_AWS_REGION'),
      ],

      'imagesPageHeaders' => [
        'hasUrls' => true,
        'url' => '//s3.' . getenv('CRAFTENV_AWS_REGION') . '.amazonaws.com/' . getenv('CRAFTENV_AWS_BUCKET') . '/',
        'subfolder' => 'images/page-headers',
        'keyId' => getenv('CRAFTENV_AWS_KEY'),
        'secret' => getenv('CRAFTENV_AWS_SECRET'),
        'bucket' => getenv('CRAFTENV_AWS_BUCKET'),
        'region' => getenv('CRAFTENV_AWS_REGION'),
      ],

      'imagesStaff' => [
        'hasUrls' => true,
        'url' => '//s3.' . getenv('CRAFTENV_AWS_REGION') . '.amazonaws.com/' . getenv('CRAFTENV_AWS_BUCKET') . '/',
        'subfolder' => 'images/staff',
        'keyId' => getenv('CRAFTENV_AWS_KEY'),
        'secret' => getenv('CRAFTENV_AWS_SECRET'),
        'bucket' => getenv('CRAFTENV_AWS_BUCKET'),
        'region' => getenv('CRAFTENV_AWS_REGION'),
      ],

      'imagesUser' => [
        'hasUrls' => true,
        'url' => '//s3.' . getenv('CRAFTENV_AWS_REGION') . '.amazonaws.com/' . getenv('CRAFTENV_AWS_BUCKET') . '/',
        'subfolder' => 'images/user',
        'keyId' => getenv('CRAFTENV_AWS_KEY'),
        'secret' => getenv('CRAFTENV_AWS_SECRET'),
        'bucket' => getenv('CRAFTENV_AWS_BUCKET'),
        'region' => getenv('CRAFTENV_AWS_REGION'),
      ],

      'svgLogos' => [
        'hasUrls' => true,
        'url' => '//s3.' . getenv('CRAFTENV_AWS_REGION') . '.amazonaws.com/' . getenv('CRAFTENV_AWS_BUCKET') . '/',
        'subfolder' => 'images/svg/logos',
        'keyId' => getenv('CRAFTENV_AWS_KEY'),
        'secret' => getenv('CRAFTENV_AWS_SECRET'),
        'bucket' => getenv('CRAFTENV_AWS_BUCKET'),
        'region' => getenv('CRAFTENV_AWS_REGION'),
      ],

      'svgIcons' => [
        'hasUrls' => true,
        'url' => '//s3.' . getenv('CRAFTENV_AWS_REGION') . '.amazonaws.com/' . getenv('CRAFTENV_AWS_BUCKET') . '/',
        'subfolder' => 'images/svg/icons',
        'keyId' => getenv('CRAFTENV_AWS_KEY'),
        'secret' => getenv('CRAFTENV_AWS_SECRET'),
        'bucket' => getenv('CRAFTENV_AWS_BUCKET'),
        'region' => getenv('CRAFTENV_AWS_REGION'),
      ],
    ],
];
