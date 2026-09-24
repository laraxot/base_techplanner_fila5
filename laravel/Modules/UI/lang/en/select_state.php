<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/en/select_state.php
return [
    'fields' => [
        'state' => [
            'label' => 'State',
            'placeholder' => 'Select a state',
            'help' => 'Current state of the selection',
            'description' => 'Selectable state',
            'helper_text' => '',
            'tooltip' => '',
        ],
        'message' => [
            'label' => 'Message',
            'placeholder' => 'Enter a message',
            'help' => 'Informative message for the selection',
            'description' => 'Message text',
            'helper_text' => '',
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
