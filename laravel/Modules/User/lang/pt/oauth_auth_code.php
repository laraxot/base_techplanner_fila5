<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Código de Autorização OAuth',
        'group' => '',
        'icon' => 'heroicon-o-key',
        'sort' => 32,
    ],
    'label' => 'Código de Autorização OAuth',
    'plural_label' => 'Códigos de Autorização OAuth',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'user_id' => [
            'label' => 'Usuário',
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
            'label' => 'Nome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'scopes' => [
            'label' => 'Escopos',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'revoked' => [
            'label' => 'Revogado',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'expires_at' => [
            'label' => 'Expira Em',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'user_id' => [
            'label' => 'Usuário',
        ],
        'client_id' => [
            'label' => 'Cliente',
        ],
        'name' => [
            'label' => 'Nome',
        ],
        'scopes' => [
            'label' => 'Escopos',
        ],
        'revoked' => [
            'label' => 'Revogado',
        ],
        'expires_at' => [
            'label' => 'Expira Em',
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'revoke' => [
            'label' => 'Revogar',
        ],
        'view_scopes' => [
            'label' => 'Ver Escopos',
        ],
    ],
];
