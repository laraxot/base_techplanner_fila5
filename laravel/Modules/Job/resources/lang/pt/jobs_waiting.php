<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Trabalhos em Espera',
        'group' => 'Trabalhos',
        'icon' => 'heroicon-o-clock',
        'sort' => 30,
    ],
    'label' => 'Trabalho em Espera',
    'plural_label' => 'Trabalhos em Espera',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'connection' => [
            'label' => 'Conexão',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'queue' => [
            'label' => 'Fila',
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
            'label' => 'Tentativas',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'status' => [
            'label' => 'Status',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'display_name' => [
            'label' => 'Nome de Exibição',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reserved_at' => [
            'label' => 'Reservado Em',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'available_at' => [
            'label' => 'Disponível Em',
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
        'connection' => [
            'label' => 'Conexão',
        ],
        'queue' => [
            'label' => 'Fila',
        ],
        'payload' => [
            'label' => 'Carga Útil',
        ],
        'attempts' => [
            'label' => 'Tentativas',
        ],
        'status' => [
            'label' => 'Status',
        ],
        'display_name' => [
            'label' => 'Nome de Exibição',
        ],
        'reserved_at' => [
            'label' => 'Reservado Em',
        ],
        'available_at' => [
            'label' => 'Disponível Em',
        ],
        'created_at' => [
            'label' => 'Criado Em',
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'process' => [
            'label' => 'Processar',
        ],
        'retry' => [
            'label' => 'Tentar Novamente',
        ],
    ],
];
