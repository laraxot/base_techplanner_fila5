<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/en/heading.php
return [
    'fields' => [
        'level' => [
            'label' => 'level',
            'description' => 'level',
            'helper_text' => 'level',
            'placeholder' => 'level',
            'tooltip' => '',
        ],
        'content' => [
            'label' => 'content',
            'description' => 'content',
            'helper_text' => 'content',
            'placeholder' => 'content',
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
