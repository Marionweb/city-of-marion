<?php

/**
 * Dukt Facebook Connector settings
 */

// $_ENV constants are loaded by craft3-multi-environment from .env.php via web/index.php
return [

    // All environments
    '*' => [
      /**
       * OAuth consumer key.
       */
      'oauthConsumerKey' => getenv('CRAFTENV_TWITTER_CONSUMER_KEY'),
      /**
       * OAuth consumer secret.
       */
      'oauthConsumerSecret' => getenv('CRAFTENV_TWITTER_CONSUMER_SECRET'),
      /**
       * The amount of time cache should last
       *
       * @see http://www.php.net/manual/en/dateinterval.construct.php
       */
      'cacheDuration' => 'PT10M',
      /**
       * Whether request to APIs should be cached or not
       */
      'enableCache' => true,
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
