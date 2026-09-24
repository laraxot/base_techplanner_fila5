<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/de/select_state.php
return [
    'fields' => [
        'state' => [
            'label' => 'Zustand',
            'placeholder' => 'Wählen Sie einen Zustand',
            'help' => 'Aktueller Zustand der Auswahl',
            'description' => 'Auswählbarer Zustand',
            'helper_text' => '',
            'tooltip' => '',
        ],
        'message' => [
            'label' => 'Nachricht',
            'placeholder' => 'Geben Sie eine Nachricht ein',
            'help' => 'Informative Nachricht für die Auswahl',
            'description' => 'Nachrichtentext',
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
