<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/es/table_layout.php
return [
    'values' => [
        'list' => [
            'label' => 'Lista',
            'icon' => 'heroicon-o-list-bullet',
            'color' => 'primary',
            'description' => 'Lista',
        ],
        'grid' => [
            'label' => 'Cuadrícula',
            'icon' => 'heroicon-o-squares-2x2',
            'color' => 'secondary',
            'description' => 'Cuadrícula',
        ],
    ],
    'actions' => [
        'toggle' => [
            'label' => 'Cambiar diseño',
            'tooltip' => 'Cambiar entre vista de lista y vista de cuadrícula',
            'helper_text' => 'Cambiar el tipo de visualización',
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
