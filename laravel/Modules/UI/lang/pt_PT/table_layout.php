<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/pt_PT/table_layout.php
return [
    'values' => [
        'list' => [
            'label' => 'Lista',
            'icon' => 'heroicon-o-list-bullet',
            'color' => 'primary',
            'description' => 'Lista',
        ],
        'grid' => [
            'label' => 'Grelha',
            'icon' => 'heroicon-o-squares-2x2',
            'color' => 'secondary',
            'description' => 'Grelha',
        ],
    ],
    'actions' => [
        'toggle' => [
            'label' => 'Alternar layout',
            'tooltip' => 'Alternar entre visualização em lista e em grelha',
            'helper_text' => 'Alterar o tipo de visualização',
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
