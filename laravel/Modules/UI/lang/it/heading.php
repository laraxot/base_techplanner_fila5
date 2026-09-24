<?php

declare(strict_types=1);

<<<<<<< HEAD
// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/heading.php
=======
>>>>>>> laraxot/dev
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
    'label' => 'Heading',
    'plural_label' => 'Heading (Plurale)',
    'navigation' => [
        'name' => 'Heading',
        'plural' => 'Heading',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Heading',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Heading',
        ],
        'edit' => [
            'label' => 'Modifica Heading',
        ],
        'delete' => [
            'label' => 'Elimina Heading',
        ],
    ],
];
