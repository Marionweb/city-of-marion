<?php

/**
 * Dukt Facebook Connector settings
 */

// $_ENV constants are loaded by craft3-multi-environment from .env.php via web/index.php
return [

    // All environments
    '*' => [
      /**
       * Graph API version used to request the Facebook API.
       */
      'apiVersion' => 'v2.12',

      /**
       * The amount of time cache should last.
       *
       * @see http://www.php.net/manual/en/dateinterval.construct.php
       */
      'cacheDuration' => 'PT1H',


      /**
       * Whether request to APIs should be cached or not.
       */
      'enableCache' => true,

      /**
       * OAuth client ID.
       */
      'oauthClientId' => getenv('CRAFTENV_FACEBOOK_CLIENT_ID'),

      /**
       * OAuth client secret.
       */
      'oauthClientSecret' => getenv('CRAFTENV_FACEBOOK_CLIENT_SECRET'),

      /**
       * OAuth provider authorization options.
       */
      'oauthAuthorizationOptions' => [],

      /**
       * OAuth scope.
       */
      'oauthScope' => ['public_profile', 'manage_pages', 'read_insights'],
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
