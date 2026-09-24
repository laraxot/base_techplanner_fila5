<?php

declare(strict_types=1);

<<<<<<< HEAD
// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/txt.php
=======
>>>>>>> laraxot/dev
return [
    'delete' => 'elimina',
    'edit' => 'modifica',
    'view' => 'vedi',
    'note' => 'note',
    'label' => 'Txt',
    'plural_label' => 'Txt (Plurale)',
    'navigation' => [
        'name' => 'Txt',
        'plural' => 'Txt',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Txt',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
    ],
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
            'label' => 'Crea Txt',
        ],
        'edit' => [
            'label' => 'Modifica Txt',
        ],
        'delete' => [
            'label' => 'Elimina Txt',
        ],
    ],
];
