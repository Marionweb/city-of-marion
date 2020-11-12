<?php

return [

  // All environments
  '*' => [
    'toEmail' => 'mike@stecker.me',
  ],

  // Live (production) environment
  'live'  => [
    'email' => true,
    'slack' => true,
    'slackWebhook' => 'https://hooks.slack.com/services/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',
  ],

  // Staging (pre-production) environment
  'staging'  => [
    'email' => false,
    'slack' => false,
  ],

  // Local (development) environment
  'local'  => [
    'email' => false,
    'slack' => false,
  ],
];
