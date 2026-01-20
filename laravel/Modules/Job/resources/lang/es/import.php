<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Importación',
        'group' => 'Importaciones',
        'icon' => 'heroicon-o-arrow-up-tray',
        'sort' => 26,
    ],
    'label' => 'Importación',
    'plural_label' => 'Importaciones',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'job_id' => [
            'label' => 'ID de Trabajo',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'importable_type' => [
            'label' => 'Tipo Importable',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'file_path' => [
            'label' => 'Ruta del Archivo',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'status' => [
            'label' => 'Estado',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Creado En',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'completed_at' => [
            'label' => 'Completado En',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'job_id' => [
            'label' => 'ID de Trabajo',
        ],
        'importable_type' => [
            'label' => 'Tipo Importable',
        ],
        'file_path' => [
            'label' => 'Ruta del Archivo',
        ],
        'status' => [
            'label' => 'Estado',
        ],
        'created_at' => [
            'label' => 'Creado En',
        ],
        'completed_at' => [
            'label' => 'Completado En',
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'import' => [
            'label' => 'Importar',
        ],
        'upload' => [
            'label' => 'Cargar',
        ],
        'create' => [
            'label' => 'Crear',
        ],
    ],
];
