<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/en/paragraph.php
return [
    'fields' => [
        'title' => [
            'label' => 'Titolo',
            'description' => 'title',
            'helper_text' => 'title',
            'placeholder' => 'title',
            'tooltip' => '',
        ],
        'text' => [
            'label' => 'Testo',
            'description' => 'text',
            'helper_text' => 'text',
            'placeholder' => 'text',
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
