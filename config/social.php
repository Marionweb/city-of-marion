<?php

return array(
  'enableCpLogin' => true,
  'showCpSection' => true,

  'lockDomains' => [
    'stecker.me',
    'cityofmarion.in.gov',
    'cityofmarion.in.localhost'
  ],

  /**
   * OAuth provider options.
   */
  'loginProviders' => [
    'google' => [
        'clientId' => getenv('CRAFTENV_GOOGLE_OAUTH_CLIENT_ID'),
        'clientSecret' => getenv('CRAFTENV_GOOGLE_OAUTH_CLIENT_SECRET')
    ],
  ],
);
