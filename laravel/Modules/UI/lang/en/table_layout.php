<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/en/table_layout.php
return [
    'values' => [
        'list' => [
            'label' => 'List',
            'icon' => 'heroicon-o-list-bullet',
            'color' => 'primary',
            'description' => 'List',
        ],
        'grid' => [
            'label' => 'Grid',
            'icon' => 'heroicon-o-squares-2x2',
            'color' => 'secondary',
            'description' => 'Grid',
        ],
    ],
    'actions' => [
        'toggle' => [
            'label' => 'Toggle Layout',
            'tooltip' => 'Switch between list and grid view',
            'helper_text' => 'Change the display type',
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
    'fields' => [
    ],
];
