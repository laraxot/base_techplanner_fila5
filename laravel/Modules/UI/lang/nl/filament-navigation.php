<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/nl/filament-navigation.php
return [
    'attributes' => [
        'external-link' => 'Externe link',
        'url' => 'URL',
        'target' => 'Doel',
        'name' => 'Naam',
        'items' => 'Elementen',
        'handle' => 'Sleutel',
        'created_at' => 'Aangemaakt op',
        'updated_at' => 'Aangepast op',
    ],
    'select-options' => [
        'same-tab' => 'Dezelfde tab',
        'new-tab' => 'Nieuwe tab',
    ],
    'items' => [
        'empty' => 'Geen elementen.',
        'add-item' => 'Nieuw element',
        'add-child' => 'Voeg kind toe',
        'move-up' => 'Verplaats omhoog',
        'move-down' => 'Verplaats omlaag',
        'indent' => 'Inspringen',
        'dedent' => 'Terugspringen',
        'remove' => 'Verwijderen',
    ],
    'items-modal' => [
        'title' => 'Element',
        'label' => 'Label',
        'type' => 'Type',
        'btn' => 'Bewaar',
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
