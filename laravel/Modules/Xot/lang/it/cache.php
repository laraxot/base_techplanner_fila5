<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'cache',
        'plural' => 'cache',
        'group' => [
            'name' => 'Admin',
        ],
    ],
    'pages' => [
        'health_check_results' => [
            'buttons' => [
                'refresh' => 'Refresh',
            ],
<<<<<<< HEAD
            'heading' => 'Application Health',
=======

            'heading' => 'Application Health',

>>>>>>> 4b6b99016 (first commit)
            'navigation' => [
                'group' => 'Settings',
                'label' => 'Application Health',
            ],
<<<<<<< HEAD
=======

>>>>>>> 4b6b99016 (first commit)
            'notifications' => [
                'check_results' => 'Check results from',
            ],
        ],
    ],
<<<<<<< HEAD
    'label' => 'Cache',
    'plural_label' => 'Cache (Plurale)',
    'fields' => [
        'id' => [
            'label' => 'Identificativo',
            'tooltip' => 'Identificativo univoco del record',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Cache',
        ],
        'edit' => [
            'label' => 'Modifica Cache',
        ],
        'delete' => [
            'label' => 'Elimina Cache',
        ],
    ],
=======
>>>>>>> 4b6b99016 (first commit)
];
