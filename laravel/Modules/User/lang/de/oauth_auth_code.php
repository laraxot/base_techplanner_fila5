<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'OAuth-Autorisierungscode',
        'group' => '',
        'icon' => 'heroicon-o-key',
        'sort' => 32,
    ],
    'label' => 'OAuth-Autorisierungscode',
    'plural_label' => 'OAuth-Autorisierungscodes',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'user_id' => [
            'label' => 'Benutzer',
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
            'label' => 'Bereiche',
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
        'user_id' => [
            'label' => 'Benutzer',
        ],
        'client_id' => [
            'label' => 'Client',
        ],
        'name' => [
            'label' => 'Name',
        ],
        'scopes' => [
            'label' => 'Bereiche',
        ],
        'revoked' => [
            'label' => 'Widerrufen',
        ],
        'expires_at' => [
            'label' => 'Läuft Ab Am',
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'revoke' => [
            'label' => 'Widerrufen',
        ],
        'view_scopes' => [
            'label' => 'Bereiche Anzeigen',
        ],
    ],
];
