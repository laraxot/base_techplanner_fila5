<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/en/title.php
return [
    'fields' => [
        'text' => [
            'label' => 'Testo',
            'description' => 'text',
            'placeholder' => 'text',
            'helper_text' => 'text',
            'tooltip' => '',
        ],
        'level' => [
            'label' => 'Grandezza',
            'description' => 'level',
            'helper_text' => 'level',
            'placeholder' => 'level',
            'tooltip' => '',
        ],
        '_tpl' => [
            'label' => '_tpl',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'view' => [
            'label' => 'view',
            'description' => 'view',
            'helper_text' => 'view',
            'placeholder' => 'view',
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
