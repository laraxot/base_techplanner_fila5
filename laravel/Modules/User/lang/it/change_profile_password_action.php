<?php

declare(strict_types=1);

return [
<<<<<<< HEAD
    'navigation' => [
        'label' => 'Azione Cambia Password',
        'plural_label' => 'Azione Cambia Password',
        'group' => 'Profilo',
        'icon' => 'heroicon-o-lock-closed',
        'sort' => 13,
    ],
    'label' => 'Azione Cambia Password',
    'plural_label' => 'Azione Cambia Password',
    'fields' => [
        'new_password_confirmation' => [
            'label' => 'Conferma Nuova Password',
            'tooltip' => 'Ripeti la nuova password per sicurezza',
            'placeholder' => 'Reinserisci la nuova password',
            'helper_text' => 'Devi inserire la stessa password per conferma',
            'description' => 'Digita nuovamente la nuova password per conferma',
=======
    'fields' => [
        'new_password_confirmation' => [
            'label' => 'Conferma nuova password',
            'placeholder' => 'Reinserisci la nuova password',
            'helper_text' => '',
            'description' => 'Digita nuovamente la nuova password per conferma',
            'tooltip' => 'Ripeti la nuova password per sicurezza',
>>>>>>> 4b6b99016 (first commit)
            'icon' => 'heroicon-o-lock-closed',
            'color' => 'warning',
        ],
    ],
<<<<<<< HEAD
    'actions' => [
        'create' => [
            'label' => 'Crea Azione',
            'tooltip' => 'Crea una nuova azione',
            'helper_text' => 'Crea una nuova azione di cambio password',
            'description' => 'Azione per creare',
        ],
        'execute' => [
            'label' => 'Esegui',
            'tooltip' => 'Esegui il cambio password',
            'helper_text' => 'Esegui l\'azione di cambio password',
            'description' => 'Azione per eseguire',
        ],
    ],
    'messages' => [
        'executed' => 'Password cambiata con successo',
        'error' => 'Si è verificato un errore',
    ],
=======
    'navigation' => [],
    'label' => '',
    'plural_label' => '',
    'actions' => [],
>>>>>>> 4b6b99016 (first commit)
];
