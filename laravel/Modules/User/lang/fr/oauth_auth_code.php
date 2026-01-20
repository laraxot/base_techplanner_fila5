<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Code d\'Autorisation OAuth',
        'group' => '',
        'icon' => 'heroicon-o-key',
        'sort' => 32,
    ],
    'label' => 'Code d\'Autorisation OAuth',
    'plural_label' => 'Codes d\'Autorisation OAuth',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'user_id' => [
            'label' => 'Utilisateur',
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
            'label' => 'Nom',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'scopes' => [
            'label' => 'Portées',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'revoked' => [
            'label' => 'Révoqué',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'expires_at' => [
            'label' => 'Expire À',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'user_id' => [
            'label' => 'Utilisateur',
        ],
        'client_id' => [
            'label' => 'Client',
        ],
        'name' => [
            'label' => 'Nom',
        ],
        'scopes' => [
            'label' => 'Portées',
        ],
        'revoked' => [
            'label' => 'Révoqué',
        ],
        'expires_at' => [
            'label' => 'Expire À',
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'revoke' => [
            'label' => 'Révoquer',
        ],
        'view_scopes' => [
            'label' => 'Voir les Portées',
        ],
    ],
];
