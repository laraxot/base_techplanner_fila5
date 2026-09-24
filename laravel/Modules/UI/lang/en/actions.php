<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/en/actions.php
return [
    'confirm' => 'Confirm',
    'cancel' => 'Cancel',
    'test_action' => [
        'title' => 'Test Action',
        'body' => 'This is a test message for record with ID: :id',
    ],
    'prova' => [
        'title' => 'Test',
        'body' => 'This is a test message for record with ID: :id',
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
