<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/fr/table_layout_toggle_table.php
return [
    'actions' => [
        'toggle' => [
            'label' => 'Basculer la disposition du tableau',
        ],
    ],
    'table_layout' => [
        'actions' => [
            'toggle' => [
                'label' => 'Basculer la disposition',
                'tooltip' => 'Basculer entre la vue liste et la vue grille',
                'helper_text' => 'Changer le type d\'affichage',
            ],
        ],
    ],
    'fields' => [
        'layout' => [
            'label' => 'Disposition',
            'placeholder' => 'Sélectionner le type de disposition',
            'tooltip' => 'Choisir entre la vue liste et la vue grille',
            'help' => 'Choisissez le type de disposition le plus adapté pour afficher les données',
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
];
