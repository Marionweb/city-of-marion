<?php

/**
 * Boostrap
 */

// $_ENV constants are loaded by craft3-multi-environment from .env.php via web/index.php
return [

    // All environments
    '*' => [
    ],

    // Live (production) environment
    'live'  => [
    ],

    // Staging (pre-production) environment
    'staging'  => [
      'bootstrap' => [ '\pinfirestudios\craft3bugsnag\Bootstrap' ]
    ],

    // Local (development) environment
    'local'  => [
      'bootstrap' => [ '\pinfirestudios\craft3bugsnag\Bootstrap' ]
      // $bugsnag = Bugsnag\Client::make("d5ca17b5fb346c7877b18e79f0f3c49a");
    ],
];
