<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/en/table-layout.php
return [
    'list' => [
        'label' => 'List',
        'description' => 'Traditional list view',
        'tooltip' => 'Show items in list format',
        'helper_text' => 'Traditional layout with rows and columns',
        'color' => 'primary',
        'icon' => 'heroicon-o-list-bullet',
    ],
    'grid' => [
        'label' => 'Grid',
        'description' => 'Grid view with cards',
        'tooltip' => 'Show items in grid format',
        'helper_text' => 'Grid layout with responsive cards',
        'color' => 'secondary',
        'icon' => 'heroicon-o-squares-2x2',
    ],
    'toggle' => [
        'label' => 'Toggle Layout',
        'tooltip' => 'Switch between list and grid view',
        'helper_text' => 'Change the display type',
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
    'actions' => [
    ],
];
