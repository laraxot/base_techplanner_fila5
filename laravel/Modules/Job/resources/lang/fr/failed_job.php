<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Emploi Échoué',
        'group' => 'Emplois Échoués',
        'icon' => 'heroicon-o-exclamation-triangle',
        'sort' => 27,
    ],
    'label' => 'Emploi Échoué',
    'plural_label' => 'Emplois Échoués',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'connection' => [
            'label' => 'Connexion',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'queue' => [
            'label' => 'File d\'attente',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'payload' => [
            'label' => 'Charge Utile',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'exception' => [
            'label' => 'Exception',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'failed_at' => [
            'label' => 'Échoué À',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
<<<<<<< HEAD
=======
        ],
        'connection' => [
            'label' => 'Connexion',
        ],
        'queue' => [
            'label' => 'File d\'attente',
        ],
        'payload' => [
            'label' => 'Charge Utile',
        ],
        'exception' => [
            'label' => 'Exception',
        ],
        'failed_at' => [
            'label' => 'Échoué À',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
    ],
    'actions' => [
        'retry' => [
            'label' => 'Réessayer',
        ],
        'delete' => [
            'label' => 'Supprimer',
        ],
        'retry_all' => [
            'label' => 'Réessayer Tous',
        ],
        'delete_all' => [
            'label' => 'Supprimer Tous',
        ],
    ],
];
