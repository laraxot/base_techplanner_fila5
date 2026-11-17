<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Trabajos en Espera',
        'group' => 'Trabajos',
        'icon' => 'heroicon-o-clock',
        'sort' => 30,
    ],
    'label' => 'Trabajo en Espera',
    'plural_label' => 'Trabajos en Espera',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'connection' => [
            'label' => 'Conexión',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'queue' => [
            'label' => 'Cola',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'payload' => [
            'label' => 'Carga Útil',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'attempts' => [
            'label' => 'Intentos',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reserved_at' => [
            'label' => 'Reservado En',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'available_at' => [
            'label' => 'Disponible En',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Creado En',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'connection' => [
            'label' => 'Conexión',
        ],
        'queue' => [
            'label' => 'Cola',
        ],
        'payload' => [
            'label' => 'Carga Útil',
        ],
        'attempts' => [
            'label' => 'Intentos',
        ],
        'reserved_at' => [
            'label' => 'Reservado En',
        ],
        'available_at' => [
            'label' => 'Disponible En',
        ],
        'created_at' => [
            'label' => 'Creado En',
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'process' => [
            'label' => 'Procesar',
        ],
        'retry' => [
            'label' => 'Reintentar',
        ],
    ],
];
