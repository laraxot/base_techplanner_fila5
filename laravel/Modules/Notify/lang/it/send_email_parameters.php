<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'send_email_parameters'],
    'navigation' => [
        'name' => 'Parametri invio email',
        'plural' => 'Parametri invio email',
        'group' => [
            'name' => 'Invia']],
    'fields' => [
<<<<<<< HEAD
        'name' => [
            'label' => 'Nome Area',
            'tooltip' => '',
            'helper_text' => '',
            'description' => ''],
        'parent' => [
            'label' => 'Settore di appartenenza',
            'tooltip' => '',
            'helper_text' => '',
            'description' => ''],
        'parent.name' => [
            'label' => 'Settore di appartenenza',
            'tooltip' => '',
            'helper_text' => '',
            'description' => ''],
        'parent_name' => [
            'label' => 'Settore di appartenenza',
            'tooltip' => '',
            'helper_text' => '',
            'description' => ''],
        'assets' => [
            'label' => 'Quantità di asset',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< .merge_file_73NJ75
            'description' => '']],
=======
            'description' => '',
        ],
=======
        'name' => 'Nome Area',
        'parent' => 'Settore di appartenenza',
        'parent.name' => 'Settore di appartenenza',
        'parent_name' => 'Settore di appartenenza',
        'assets' => 'Quantità di asset',
>>>>>>> 6ed19256f (.)
    ],
>>>>>>> .merge_file_sq1meP
    'actions' => [
        'import' => [
            'name' => 'Importa da file',
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare']],
        'export' => [
            'name' => 'Esporta dati',
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
<<<<<<< .merge_file_73NJ75
                'parent_name' => 'Nome area livello superiore']]],
    'label' => 'Send Email Parameters',
    'plural_label' => 'Send Email Parameters (Plurale)'];
=======
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
    ],
<<<<<<< HEAD
    'label' => 'Send Email Parameters',
    'plural_label' => 'Send Email Parameters (Plurale)',
=======
>>>>>>> 6ed19256f (.)
];
>>>>>>> .merge_file_sq1meP
