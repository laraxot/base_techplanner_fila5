<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Redefinição de Senha',
        'group' => 'Segurança',
        'icon' => 'heroicon-o-key',
        'sort' => 42,
    ],
    'label' => 'Redefinição de Senha',
    'plural_label' => 'Redefinições de Senha',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'email' => [
            'label' => 'Email',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'token' => [
            'label' => 'Token',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Criado Em',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'email' => [
            'label' => 'Email',
        ],
        'token' => [
            'label' => 'Token',
        ],
        'created_at' => [
            'label' => 'Criado Em',
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'resend_email' => [
            'label' => 'Reenviar Email',
        ],
        'view_request' => [
            'label' => 'Ver Solicitação',
        ],
    ],
];
