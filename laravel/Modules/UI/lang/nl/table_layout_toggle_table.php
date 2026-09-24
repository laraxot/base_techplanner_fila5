<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/nl/table_layout_toggle_table.php
return [
    'actions' => [
        'toggle' => [
            'label' => 'Tabelindeling wisselen',
        ],
    ],
    'table_layout' => [
        'actions' => [
            'toggle' => [
                'label' => 'Indeling wisselen',
                'tooltip' => 'Wisselen tussen lijst- en rasterweergave',
                'helper_text' => 'Wijzig het weergavetype',
            ],
        ],
    ],
    'fields' => [
        'layout' => [
            'label' => 'Indeling',
            'placeholder' => 'Selecteer indelingstype',
            'tooltip' => 'Kies tussen lijst- en rasterweergave',
            'help' => 'Kies het meest geschikte indelingstype om de gegevens weer te geven',
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
