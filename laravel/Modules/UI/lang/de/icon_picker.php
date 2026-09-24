<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/de/icon_picker.php
return [
    'fields' => [
        'newstate' => [
            'label' => 'newstate',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'pack' => [
            'label' => 'pack',
            'description' => 'pack',
            'helper_text' => 'pack',
            'placeholder' => 'pack',
            'tooltip' => '',
        ],
        'icon' => [
            'label' => 'icon',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
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
