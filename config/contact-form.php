<?php

/**
 * Contact Form Settings
 */

// $_ENV constants are loaded by craft3-multi-environment from .env.php via web/index.php
return [

    // All environments
    '*' => [
      'toEmail'             => Craft::$app->request->getValidatedBodyParam('toEmail'),
      'prependSubject'      => 'New message from City of Marion Website',
      'prependSender'       => 'On behalf of',
      'allowAttachments'    => false,
      'successFlashMessage' => 'Your message has been sent.'
    ],
];
