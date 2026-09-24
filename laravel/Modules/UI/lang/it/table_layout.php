<?php

declare(strict_types=1);

<<<<<<< HEAD
// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/table_layout.php
=======
>>>>>>> laraxot/dev
return [
    'values' => [
        'list' => ['label' => 'Elenco', 'icon' => 'heroicon-o-list-bullet', 'color' => 'primary', 'description' => 'Elenco'],
        'grid' => ['label' => 'Griglia', 'icon' => 'heroicon-o-squares-2x2', 'color' => 'secondary', 'description' => 'Griglia'],
    ],
    'actions' => [
<<<<<<< HEAD
        'toggle' => [
            'label' => 'Cambia Layout',
            'tooltip' => 'Passa da vista a elenco a vista a griglia',
            'helper_text' => 'Cambia il tipo di visualizzazione',
        ],
=======
        'toggle' => ['label' => 'Cambia Layout', 'tooltip' => 'Passa da vista a elenco a vista a griglia', 'helper_text' => 'Cambia il tipo di visualizzazione'],
>>>>>>> laraxot/dev
    ],
    'label' => 'Table Layout',
    'plural_label' => 'Table Layout (Plurale)',
    'navigation' => [
        'name' => 'Table Layout',
        'plural' => 'Table Layout',
<<<<<<< HEAD
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
=======
        'group' => ['name' => 'General', 'description' => 'General Settings'],
>>>>>>> laraxot/dev
        'label' => 'Table Layout',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
    ],
    'fields' => [
<<<<<<< HEAD
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
=======
        'id' => ['label' => 'Identificativo', 'tooltip' => 'Identificativo univoco del record', 'helper_text' => '', 'description' => ''],
        'created_at' => ['label' => 'Data Creazione', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'updated_at' => ['label' => 'Ultima Modifica', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'list' => ['label' => 'list', 'placeholder' => 'list', 'helper_text' => 'list', 'description' => 'list'],
        'grid' => ['label' => 'grid', 'placeholder' => 'grid', 'helper_text' => 'grid', 'description' => 'grid'],
>>>>>>> laraxot/dev
    ],
];
