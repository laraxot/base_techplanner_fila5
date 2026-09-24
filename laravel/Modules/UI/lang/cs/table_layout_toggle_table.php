<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/cs/table_layout_toggle_table.php
return [
    'actions' => [
        'toggle' => [
            'label' => 'Přepnout rozložení tabulky',
        ],
    ],
    'table_layout' => [
        'actions' => [
            'toggle' => [
                'label' => 'Přepnout rozložení',
                'tooltip' => 'Přepnout mezi zobrazením seznamu a mřížky',
                'helper_text' => 'Změnit typ zobrazení',
            ],
        ],
    ],
    'fields' => [
        'layout' => [
            'label' => 'Rozložení',
            'placeholder' => 'Vyberte typ rozložení',
            'tooltip' => 'Zvolte mezi zobrazením seznamu a mřížky',
            'help' => 'Vyberte vhodný typ rozložení pro zobrazení dat',
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
