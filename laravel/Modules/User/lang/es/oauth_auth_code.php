<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Código de Autorización OAuth',
        'group' => '',
        'icon' => 'heroicon-o-key',
        'sort' => 32,
    ],
    'label' => 'Código de Autorización OAuth',
    'plural_label' => 'Códigos de Autorización OAuth',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'user_id' => [
            'label' => 'Usuario',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'client_id' => [
            'label' => 'Cliente',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'Nombre',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'scopes' => [
            'label' => 'Ámbitos',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'revoked' => [
            'label' => 'Revocado',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'expires_at' => [
            'label' => 'Expira En',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'user_id' => [
            'label' => 'Usuario',
        ],
        'client_id' => [
            'label' => 'Cliente',
        ],
        'name' => [
            'label' => 'Nombre',
        ],
        'scopes' => [
            'label' => 'Ámbitos',
        ],
        'revoked' => [
            'label' => 'Revocado',
        ],
        'expires_at' => [
            'label' => 'Expira En',
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'revoke' => [
            'label' => 'Revocar',
        ],
        'view_scopes' => [
            'label' => 'Ver Ámbitos',
        ],
    ],
];
