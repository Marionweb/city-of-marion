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
        'google' => [
            'clientId' => getenv('GOOGLE_OAUTH_CLIENT_ID'),
            'clientSecret' => getenv('GOOGLE_OAUTH_CLIENT_SECRET')
        ],
        'vimeo' => [
            'clientId' => getenv('VIMEO_OAUTH_CLIENT_ID'),
            'clientSecret' => getenv('VIMEO_OAUTH_CLIENT_SECRET')
        ],
    ],
);
