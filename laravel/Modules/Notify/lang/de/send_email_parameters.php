<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'send_email_parameters'],
    'navigation' => [
        'name' => 'E-Mail-Sendeparameter',
        'plural' => 'E-Mail-Sendeparameter',
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
<<<<<<< .merge_file_5G5wkf
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
>>>>>>> .merge_file_Av3Yw0
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
<<<<<<< .merge_file_5G5wkf
                'parent_name' => 'Nome area livello superiore']]],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 6ed19256f (.)
];
>>>>>>> .merge_file_Av3Yw0
