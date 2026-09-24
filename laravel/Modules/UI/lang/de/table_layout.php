<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/de/table_layout.php
return [
    'values' => [
        'list' => [
            'label' => 'Liste',
            'icon' => 'heroicon-o-list-bullet',
            'color' => 'primary',
            'description' => 'Liste',
        ],
        'grid' => [
            'label' => 'Raster',
            'icon' => 'heroicon-o-squares-2x2',
            'color' => 'secondary',
            'description' => 'Raster',
        ],
    ],
    'actions' => [
        'toggle' => [
            'label' => 'Layout wechseln',
            'tooltip' => 'Zwischen Listen- und Rasteransicht wechseln',
            'helper_text' => 'Anzeigetyp ändern',
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
