<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Token de Acceso OAuth',
<<<<<<< HEAD
        'group' => '',
=======
        'group' => 'OAuth',
>>>>>>> 6ed19256f (.)
        'icon' => 'heroicon-o-key',
        'sort' => 33,
    ],
    'label' => 'Token de Acceso OAuth',
    'plural_label' => 'Tokens de Acceso OAuth',
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
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'revoke' => [
            'label' => 'Revocar',
        ],
        'refresh' => [
            'label' => 'Actualizar',
        ],
    ],
];
