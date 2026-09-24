<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/fallback.php
return [
    'label' => 'Fallback',
    'plural_label' => 'Fallback (Plurale)',
    'navigation' => [
        'name' => 'Fallback',
        'plural' => 'Fallback',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Fallback',
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
            'label' => 'Crea Fallback',
        ],
        'edit' => [
            'label' => 'Modifica Fallback',
        ],
        'delete' => [
            'label' => 'Elimina Fallback',
        ],
    ],
];
