<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/title.php
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
    'label' => 'Title',
    'plural_label' => 'Title (Plurale)',
    'navigation' => [
        'name' => 'Title',
        'plural' => 'Title',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Title',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Title',
        ],
        'edit' => [
            'label' => 'Modifica Title',
        ],
        'delete' => [
            'label' => 'Elimina Title',
        ],
    ],
];
