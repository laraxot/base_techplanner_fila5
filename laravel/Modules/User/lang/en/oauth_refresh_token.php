<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'OAuth Refresh Token',
<<<<<<< HEAD
        'group' => '',
=======
        'group' => 'OAuth',
>>>>>>> 6ed19256f (.)
        'icon' => 'heroicon-o-arrow-path',
        'sort' => 34,
    ],
    'label' => 'OAuth Refresh Token',
    'plural_label' => 'OAuth Refresh Tokens',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'access_token_id' => [
            'label' => 'Access Token',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'revoked' => [
            'label' => 'Revoked',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'expires_at' => [
            'label' => 'Expires At',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'access_token_id' => [
            'label' => 'Access Token',
        ],
        'revoked' => [
            'label' => 'Revoked',
        ],
        'expires_at' => [
            'label' => 'Expires At',
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'revoke' => [
            'label' => 'Revoke',
        ],
    ],
];
