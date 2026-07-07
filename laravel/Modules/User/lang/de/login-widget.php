<?php

declare(strict_types=1);

return [
    'name' => 'Login',
    'fields' => [
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Inserisci la tua email',
            'helper_text' => 'Indirizzo email per accedere',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Inserisci la tua password',
            'helper_text' => 'Password di accesso',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'remember' => [
            'label' => 'Ricordami',
            'helper_text' => 'Mantieni la sessione attiva',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'login' => [
            'label' => 'Accedi',
            'tooltip' => 'Effettua il login',
        ],
        'forgot_password' => [
            'label' => 'Password dimenticata?',
            'tooltip' => 'Recupera la password',
        ],
        'register' => [
            'label' => 'Registrati',
            'tooltip' => 'Crea un nuovo account',
        ],
    ],
    'messages' => [
        'success' => [
            'login' => 'Login effettuato con successo',
        ],
        'error' => [
            'invalid_credentials' => 'Credenziali non valide',
            'account_locked' => 'Account bloccato',
            'too_many_attempts' => 'Troppi tentativi, riprova più tardi',
        ],
    ],
<<<<<<< HEAD
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 6ed19256f (.)
];
