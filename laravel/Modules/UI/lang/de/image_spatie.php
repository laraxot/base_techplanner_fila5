<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/de/image_spatie.php
return [
    'fields' => [
        'caption' => [
            'label' => 'caption',
            'description' => 'caption',
            'helper_text' => 'caption',
            'placeholder' => 'caption',
            'tooltip' => '',
        ],
        'image' => [
            'label' => 'image',
            'description' => 'image',
            'helper_text' => 'image',
            'placeholder' => 'image',
            'tooltip' => '',
        ],
        'img_uuid' => [
            'label' => 'img_uuid',
            'description' => 'img_uuid',
            'helper_text' => 'img_uuid',
            'placeholder' => 'img_uuid',
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
