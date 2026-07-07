<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'OAuth-Aktualisierungstoken',
<<<<<<< HEAD
        'group' => '',
=======
        'group' => 'OAuth',
>>>>>>> 6ed19256f (.)
        'icon' => 'heroicon-o-arrow-path',
        'sort' => 34,
    ],
    'label' => 'OAuth-Aktualisierungstoken',
    'plural_label' => 'OAuth-Aktualisierungstoken',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'access_token_id' => [
            'label' => 'Zugriffstoken',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'revoked' => [
            'label' => 'Widerrufen',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'expires_at' => [
            'label' => 'Läuft Ab Am',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'access_token_id' => [
            'label' => 'Zugriffstoken',
        ],
        'revoked' => [
            'label' => 'Widerrufen',
        ],
        'expires_at' => [
            'label' => 'Läuft Ab Am',
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'revoke' => [
            'label' => 'Widerrufen',
        ],
    ],
];
