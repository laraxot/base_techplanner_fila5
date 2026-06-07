<?php

declare(strict_types=1);

return [
    'fields' => [
        'email' => [
<<<<<<< HEAD
            'label' => 'Email',
            'placeholder' => 'Inserisci la tua email',
            'help' => 'Inserisci l\'indirizzo email con cui ti sei registrato',
            'description' => 'Indirizzo email per l\'accesso',
            'helper_text' => 'email',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Inserisci la tua password',
            'help' => 'Inserisci la password del tuo account',
            'description' => 'Password per l\'accesso',
            'helper_text' => 'password',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'remember' => [
            'label' => 'Ricordami',
            'placeholder' => 'Mantieni la sessione attiva',
            'help' => 'Seleziona per mantenere la sessione attiva per 30 giorni',
            'description' => 'Opzione per ricordare l\'accesso',
            'helper_text' => 'remember',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'login' => [
            'label' => 'Accedi',
            'tooltip' => 'Clicca per accedere al tuo account',
        ],
    ],
    'messages' => [
        'login_success' => 'Accesso effettuato con successo',
        'login_error' => 'Errore durante l\'accesso',
        'validation_error' => 'Errore di validazione',
        'credentials_incorrect' => 'Credenziali non corrette',
    ],
    'ui' => [
        'login_button' => 'Accedi',
        'forgot_password' => 'Password dimenticata?',
        'errors_title' => 'Si sono verificati degli errori',
    ],
<<<<<<< HEAD
    'navigation' => [
        'name' => 'Login Widget',
        'plural' => 'Login Widget',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Login Widget',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Login Widget',
    'plural_label' => 'Login Widget (Plurale)',
=======
    'navigation' => [],
    'label' => '',
    'plural_label' => '',
>>>>>>> 4b6b99016 (first commit)
=======
            'label' => 'Indirizzo email',
            'placeholder' => 'esempio@comune.it',
            'helper_text' => 'Email usata per registrarti ai servizi online',
            'tooltip' => 'Inserisci l’indirizzo email dell’account',
            'description' => 'Campo email per l’autenticazione',
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Inserisci la password',
            'helper_text' => '',
            'tooltip' => 'Password associata all’account',
            'description' => 'Campo password per l’autenticazione',
        ],
        'remember' => [
            'label' => 'Ricordami',
            'placeholder' => '',
            'helper_text' => 'Mantieni la sessione attiva su questo dispositivo',
            'tooltip' => 'Sessione prolungata',
            'description' => 'Opzione ricorda accesso',
        ],
    ],
    'actions' => [
        'hidePassword' => [
            'label' => 'Nascondi password',
            'tooltip' => 'Nascondi password',
            'icon' => 'hidePassword',
        ],
        'showPassword' => [
            'label' => 'Mostra password',
            'tooltip' => 'Mostra password',
            'icon' => 'showPassword',
        ],
    ],
>>>>>>> dev
];
