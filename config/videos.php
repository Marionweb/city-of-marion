<?php

return array(
  'cacheDuration' => 'PT15M',
  'enableCache' => true,

  /**
   * Number of videos per page in the explorer.
   */
  'videosPerPage' => 30,

  /**
   * OAuth provider options.
   */
  'oauthProviderOptions' => [
    'youtube' => [
      'clientId' => getenv('CRAFTENV_GOOGLE_OAUTH_CLIENT_ID'),
      'clientSecret' => getenv('CRAFTENV_GOOGLE_OAUTH_CLIENT_SECRET')
    ],
    'vimeo' => [
      'clientId' => getenv('CRAFTENV_VIMEO_OAUTH_CLIENT_ID'),
      'clientSecret' => getenv('CRAFTENV_VIMEO_OAUTH_CLIENT_SECRET')
    ],
  ],
);
