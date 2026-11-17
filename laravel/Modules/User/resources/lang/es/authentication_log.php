<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Registros de Autenticación',
        'group' => 'Seguridad',
        'icon' => 'heroicon-o-lock-closed',
        'sort' => 36,
    ],
    'label' => 'Registro de Autenticación',
    'plural_label' => 'Registros de Autenticación',
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
        'ip_address' => [
            'label' => 'Dirección IP',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'user_agent' => [
            'label' => 'Agente de Usuario',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'login_at' => [
            'label' => 'Inicio de Sesión',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'logout_at' => [
            'label' => 'Cierre de Sesión',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'login_method' => [
            'label' => 'Método de Inicio de Sesión',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'success' => [
            'label' => 'Éxito',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'user_id' => [
            'label' => 'Usuario',
        ],
        'ip_address' => [
            'label' => 'Dirección IP',
        ],
        'user_agent' => [
            'label' => 'Agente de Usuario',
        ],
        'login_at' => [
            'label' => 'Inicio de Sesión',
        ],
        'logout_at' => [
            'label' => 'Cierre de Sesión',
        ],
        'login_method' => [
            'label' => 'Método de Inicio de Sesión',
        ],
        'success' => [
            'label' => 'Éxito',
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'view_details' => [
            'label' => 'Ver Detalles',
        ],
        'export_logs' => [
            'label' => 'Exportar Registros',
        ],
        'reorderRecords' => [
            'tooltip' => 'Reordenar registros',
        ],
    ],
];
