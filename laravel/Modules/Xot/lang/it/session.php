<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'sessione',
        'plural' => 'sessioni',
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
    'label' => 'Session',
    'plural_label' => 'Session (Plurale)',
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
            'label' => 'Crea Session',
        ],
        'edit' => [
            'label' => 'Modifica Session',
        ],
        'delete' => [
            'label' => 'Elimina Session',
        ],
    ],
=======
>>>>>>> 4b6b99016 (first commit)
];
