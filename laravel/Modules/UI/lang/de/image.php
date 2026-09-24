<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/de/image.php
return [
    'fields' => [
        'caption' => [
            'label' => 'caption',
            'description' => 'caption',
            'helper_text' => 'caption',
            'placeholder' => 'caption',
            'tooltip' => '',
        ],
        'alt' => [
            'label' => 'alt',
            'description' => 'alt',
            'helper_text' => 'alt',
            'placeholder' => 'alt',
            'tooltip' => '',
        ],
        'ratio' => [
            'label' => 'ratio',
            'description' => 'ratio',
            'tooltip' => '',
            'helper_text' => '',
        ],
        'url' => [
            'label' => 'url',
            'description' => 'url',
            'helper_text' => 'url',
            'placeholder' => 'url',
            'tooltip' => '',
        ],
        'image' => [
            'label' => 'image',
            'description' => 'image',
            'helper_text' => 'image',
            'placeholder' => 'image',
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
