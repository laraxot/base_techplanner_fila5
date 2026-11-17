<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'OAuth Access Token',
<<<<<<< HEAD
        'group' => '',
=======
        'group' => 'OAuth',
>>>>>>> 6ed19256f (.)
        'icon' => 'heroicon-o-key',
        'sort' => 33,
    ],
    'label' => 'OAuth Access Token',
    'plural_label' => 'OAuth Access Tokens',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'user_id' => [
            'label' => 'User',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'client_id' => [
            'label' => 'Client',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'Name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'scopes' => [
            'label' => 'Scopes',
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
        'user_id' => [
            'label' => 'User',
        ],
        'client_id' => [
            'label' => 'Client',
        ],
        'name' => [
            'label' => 'Name',
        ],
        'scopes' => [
            'label' => 'Scopes',
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
        'refresh' => [
            'label' => 'Refresh',
        ],
    ],
];
