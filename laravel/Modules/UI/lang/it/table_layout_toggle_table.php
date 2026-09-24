<?php

declare(strict_types=1);

<<<<<<< HEAD
// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/table_layout_toggle_table.php
=======
>>>>>>> laraxot/dev
return [
    'actions' => [
        'toggle' => [
            'label' => 'Cambia Layout Tabella',
        ],
    ],
    'table_layout' => [
        'actions' => [
            'toggle' => [
                'label' => 'Cambia Layout',
                'tooltip' => 'Passa da vista a elenco a vista a griglia',
                'helper_text' => 'Cambia il tipo di visualizzazione',
            ],
        ],
    ],
    'fields' => [
        'layout' => [
            'label' => 'Layout',
            'placeholder' => 'Seleziona tipo di layout',
            'tooltip' => 'Scegli tra vista a elenco e vista a griglia',
            'help' => 'Scegli il tipo di layout più adatto per visualizzare i dati',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'label' => 'Table Layout Toggle Table',
    'plural_label' => 'Table Layout Toggle Table (Plurale)',
    'navigation' => [
        'name' => 'Table Layout Toggle Table',
        'plural' => 'Table Layout Toggle Table',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Table Layout Toggle Table',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
    ],
];
