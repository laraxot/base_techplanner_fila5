<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/de/table_layout_toggle_table.php
return [
    'actions' => [
        'toggle' => [
            'label' => 'Tabellenlayout umschalten',
        ],
    ],
    'table_layout' => [
        'actions' => [
            'toggle' => [
                'label' => 'Layout wechseln',
                'tooltip' => 'Zwischen Listen- und Rasteransicht wechseln',
                'helper_text' => 'Anzeigetyp ändern',
            ],
        ],
    ],
    'fields' => [
        'layout' => [
            'label' => 'Layout',
            'placeholder' => 'Layout-Typ auswählen',
            'tooltip' => 'Zwischen Listen- und Rasteransicht wählen',
            'help' => 'Wählen Sie den am besten geeigneten Layout-Typ zur Anzeige der Daten',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
