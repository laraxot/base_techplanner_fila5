<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/de/navigation.php
return [
    'fields' => [
        'items' => [
            'label' => 'items',
            'placeholder' => 'items',
            'helper_text' => 'items',
            'description' => 'items',
            'tooltip' => '',
        ],
        'label' => [
            'label' => 'label',
            'placeholder' => 'label',
            'helper_text' => 'label',
            'description' => 'label',
            'tooltip' => '',
        ],
        'url' => [
            'label' => 'url',
            'placeholder' => 'url',
            'helper_text' => 'url',
            'description' => 'url',
            'tooltip' => '',
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
    'actions' => [
    ],
];
