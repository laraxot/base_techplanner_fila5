<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/table_layout.php
return [
    'values' => [
        'list' => ['label' => 'Elenco', 'icon' => 'heroicon-o-list-bullet', 'color' => 'primary', 'description' => 'Elenco'],
        'grid' => ['label' => 'Griglia', 'icon' => 'heroicon-o-squares-2x2', 'color' => 'secondary', 'description' => 'Griglia'],
    ],
    'actions' => [
        'toggle' => [
            'label' => 'Cambia Layout',
            'tooltip' => 'Passa da vista a elenco a vista a griglia',
            'helper_text' => 'Cambia il tipo di visualizzazione',
        ],
    ],
    'label' => 'Table Layout',
    'plural_label' => 'Table Layout (Plurale)',
    'navigation' => [
        'name' => 'Table Layout',
        'plural' => 'Table Layout',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Table Layout',
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
        'list' => [
            'label' => 'Elenco',
            'placeholder' => 'Elenco',
            'helper_text' => 'Visualizzazione a elenco',
            'description' => 'Elenco',
        ],
        'grid' => [
            'label' => 'Griglia',
            'placeholder' => 'Griglia',
            'helper_text' => 'Visualizzazione a griglia',
            'description' => 'Griglia',
        ],
    ],
];
