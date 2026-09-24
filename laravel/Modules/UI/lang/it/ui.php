<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/ui.php
return [
    'navigation' => [
        'name' => 'Interfaccia',
        'plural' => 'Interfacce',
        'group' => 'Sistema',
        'label' => 'ui',
        'sort' => 70,
        'icon' => 'heroicon-o-squares-2x2',
    ],
    'label' => 'Ui',
    'plural_label' => 'Ui (Plurale)',
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
            'label' => 'Crea Ui',
        ],
        'edit' => [
            'label' => 'Modifica Ui',
        ],
        'delete' => [
            'label' => 'Elimina Ui',
        ],
    ],
];
