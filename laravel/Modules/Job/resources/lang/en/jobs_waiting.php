<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Jobs Waiting',
        'group' => 'Jobs',
        'icon' => 'heroicon-o-clock',
        'sort' => 30,
    ],
    'label' => 'Job Waiting',
    'plural_label' => 'Jobs Waiting',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'connection' => [
            'label' => 'Connection',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'queue' => [
            'label' => 'Queue',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'payload' => [
            'label' => 'Payload',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'attempts' => [
            'label' => 'Attempts',
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
            'label' => 'Display Name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reserved_at' => [
            'label' => 'Reserved At',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'available_at' => [
            'label' => 'Available At',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Created At',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'connection' => [
            'label' => 'Connection',
        ],
        'queue' => [
            'label' => 'Queue',
        ],
        'payload' => [
            'label' => 'Payload',
        ],
        'attempts' => [
            'label' => 'Attempts',
        ],
        'status' => [
            'label' => 'Status',
        ],
        'display_name' => [
            'label' => 'Display Name',
        ],
        'reserved_at' => [
            'label' => 'Reserved At',
        ],
        'available_at' => [
            'label' => 'Available At',
        ],
        'created_at' => [
            'label' => 'Created At',
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'process' => [
            'label' => 'Process',
        ],
        'retry' => [
            'label' => 'Retry',
        ],
    ],
];
