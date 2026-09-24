<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/cs/filament-navigation.php
return [
    'attributes' => [
        'external-link' => 'Odkaz',
        'url' => 'URL/Adresa',
        'target' => 'Cíl',
        'name' => 'Název',
        'items' => 'Položky',
        'handle' => 'Identifikátor',
        'created_at' => 'Vytvořeno',
        'updated_at' => 'Upraveno',
    ],
    'select-options' => [
        'same-tab' => 'Ve stejném okně',
        'new-tab' => 'V novém okně',
    ],
    'items' => [
        'empty' => 'Žádné položky',
        'add-item' => 'Přidat položku',
        'add-child' => 'Přidat pod-položku',
        'move-up' => 'Posunout nahoru',
        'move-down' => 'Posunout dolu',
        'indent' => 'Přidružit',
        'dedent' => 'Oddělit',
        'remove' => 'Odstranit',
    ],
    'items-modal' => [
        'title' => 'Nová položka',
        'label' => 'Název',
        'type' => 'Typ',
        'btn' => 'Uložit',
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
