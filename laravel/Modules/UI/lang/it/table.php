<?php

declare(strict_types=1);

<<<<<<< HEAD
// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/table.php
=======
>>>>>>> laraxot/dev
return [
    'columns' => [
        'state_actions' => [
            'label' => 'Azioni Stato',
            'placeholder' => '',
            'helper_text' => 'Azioni disponibili per la transizione di stato',
        ],
    ],
    'label' => 'Table',
    'plural_label' => 'Table (Plurale)',
    'navigation' => [
        'name' => 'Table',
        'plural' => 'Table',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Table',
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
            'label' => 'Crea Table',
        ],
        'edit' => [
            'label' => 'Modifica Table',
        ],
        'delete' => [
            'label' => 'Elimina Table',
        ],
    ],
];
