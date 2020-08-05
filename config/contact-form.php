<?php

/**
 * Contact Form Settings
 */

$config = [
  '*' => [
    'prependSubject'      => 'New message from City of Marion Website',
    'prependSender'       => 'On behalf of',
    'allowAttachments'    => false,
    'successFlashMessage' => 'Message sent!'
  ],
];
$request = Craft::$app->request;

if (
    !$request->getIsConsoleRequest() &&
    ($toEmail = $request->getValidatedBodyParam('toEmail')) !== null
) {
    $config['toEmail'] = $toEmail;
}

return $config;
