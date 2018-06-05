<?php

return [

  // All environments
  '*' => [
    'hashRemoteUrl' => true,
    'hashFilename' => true,
    'hashPath' => true,

    'storageConfig' => [
      'aws' => [
          'accessKey' => getenv('CRAFTENV_AWS_KEY'),
          'secretAccessKey' => getenv('CRAFTENV_AWS_SECRET'),
          'region' => getenv('CRAFTENV_AWS_REGION'),
          'bucket' => getenv('CRAFTENV_AWS_BUCKET'),
          'folder' => 'images/_transformed'
      ],
    ],

    'imagerSystemPath' => '@webroot/transforms/',
    'imagerUrl' => '/transforms/',
    // 'imagerUrl' => '//s3.' . getenv('CRAFTENV_AWS_REGION') . '.amazonaws.com/' . getenv('CRAFTENV_AWS_BUCKET') . '/images/_transformed/',
  ],

  // Live (production) environment
  'live'  => [
  ],

  // Staging (pre-production) environment
  'staging'  => [
  ],

  // Local (development) environment
  'local'  => [
  ],
];
