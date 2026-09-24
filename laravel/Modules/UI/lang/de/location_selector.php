<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/de/location_selector.php
return [
    'region' => [
        'label' => 'Region',
        'placeholder' => 'Region auswählen',
        'help' => 'Wählen Sie die Region von Interesse',
    ],
    'province' => [
        'label' => 'Provinz',
        'placeholder' => 'Provinz auswählen',
        'help' => 'Zuerst eine Region auswählen',
    ],
    'cap' => [
        'label' => 'PLZ',
        'placeholder' => 'PLZ auswählen',
        'help' => 'Zuerst Region und Provinz auswählen',
    ],
    'validation' => [
        'region_required_for_province' => 'Sie müssen eine Region auswählen, bevor Sie die Provinz wählen',
        'region_province_required_for_cap' => 'Sie müssen Region und Provinz auswählen, bevor Sie die PLZ wählen',
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
