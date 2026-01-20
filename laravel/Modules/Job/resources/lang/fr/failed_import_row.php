<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Ligne d\'Importation Échouée',
        'group' => 'Lignes d\'Importation',
        'icon' => 'heroicon-o-exclamation-circle',
        'sort' => 28,
    ],
    'label' => 'Ligne d\'Importation Échouée',
    'plural_label' => 'Lignes d\'Importation Échouées',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'import_batch_id' => [
            'label' => 'ID du Lot d\'Importation',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'row_index' => [
            'label' => 'Index de Ligne',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'errors' => [
            'label' => 'Erreurs',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'data' => [
            'label' => 'Données',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Créé À',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'import_batch_id' => [
            'label' => 'ID du Lot d\'Importation',
        ],
        'row_index' => [
            'label' => 'Index de Ligne',
        ],
        'errors' => [
            'label' => 'Erreurs',
        ],
        'data' => [
            'label' => 'Données',
        ],
        'created_at' => [
            'label' => 'Créé À',
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'view_errors' => [
            'label' => 'Voir les Erreurs',
        ],
        'fix_row' => [
            'label' => 'Corriger la Ligne',
        ],
    ],
];
