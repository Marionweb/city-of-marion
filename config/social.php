<?php

return array(
  'enableCpLogin' => true,
  'showCpSection' => true,

  'lockDomains' => [
    'stecker.me',
    'cityofmarion.in.gov',
    'cityofmarion.in.dev'
  ],

  /**
   * OAuth provider options.
   */
  'loginProviders' => [
    'google' => [
        'clientId' => getenv('GOOGLE_OAUTH_CLIENT_ID'),
        'clientSecret' => getenv('GOOGLE_OAUTH_CLIENT_SECRET')
    ],
  ],
);
