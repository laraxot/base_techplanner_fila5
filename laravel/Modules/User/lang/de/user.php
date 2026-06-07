<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Utenti',
        'plural' => 'Utenti',
        'group' => [
            'name' => 'Gestione Utenti',
            'description' => 'Gestione degli utenti e dei loro permessi',
        ],
        'label' => 'Utenti',
        'sort' => '26',
        'icon' => 'user-main',
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
            'description' => 'name',
            'helper_text' => '',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Inserisci l\'email',
            'description' => 'email',
            'helper_text' => '',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Inserisci la password',
            'description' => 'password',
            'helper_text' => '',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'password_confirmation' => [
            'label' => 'Conferma Password',
            'placeholder' => 'Conferma la password',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'current_password' => [
            'label' => 'Password Attuale',
            'placeholder' => 'Inserisci la password attuale',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'role' => [
            'label' => 'Ruolo',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'roles' => [
            'label' => 'Ruoli',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'permissions' => [
            'label' => 'Permessi',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
<<<<<<< HEAD
=======
        ],
        'role' => [
            'label' => 'Ruolo',
        ],
        'roles' => [
            'label' => 'Ruoli',
        ],
        'permissions' => [
            'label' => 'Permessi',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
        'status' => [
            'label' => 'Stato',
            'options' => [
                'active' => 'Attivo',
                'inactive' => 'Inattivo',
                'blocked' => 'Bloccato',
            ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_login' => [
            'label' => 'Ultimo Accesso',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'avatar' => [
            'label' => 'Avatar',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'language' => [
            'label' => 'Lingua',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'timezone' => [
            'label' => 'Fuso Orario',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'password_expires_at' => [
            'label' => 'Scadenza Password',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'verified' => [
            'label' => 'Verificato',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'unverified' => [
            'label' => 'Non Verificato',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'openFilters' => [
            'label' => 'openFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'isActive' => [
            'label' => 'isActive',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'deactivate' => [
            'label' => 'deactivate',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'delete' => [
            'label' => 'delete',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'edit' => [
            'label' => 'edit',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'view' => [
            'label' => 'view',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'create' => [
            'label' => 'create',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'email_verified_at' => [
            'label' => 'Email Verificata il',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'detach' => [
            'label' => 'detach',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'attach' => [
            'label' => 'attach',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
<<<<<<< HEAD
=======
        ],
        'last_login' => [
            'label' => 'Ultimo Accesso',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
        ],
        'avatar' => [
            'label' => 'Avatar',
        ],
        'language' => [
            'label' => 'Lingua',
        ],
        'timezone' => [
            'label' => 'Fuso Orario',
        ],
        'password_expires_at' => [
            'label' => 'Scadenza Password',
        ],
        'verified' => [
            'label' => 'Verificato',
        ],
        'unverified' => [
            'label' => 'Non Verificato',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'openFilters' => [
            'label' => 'openFilters',
        ],
        'isActive' => [
            'label' => 'isActive',
        ],
        'deactivate' => [
            'label' => 'deactivate',
        ],
        'delete' => [
            'label' => 'delete',
        ],
        'edit' => [
            'label' => 'edit',
        ],
        'view' => [
            'label' => 'view',
        ],
        'create' => [
            'label' => 'create',
        ],
        'email_verified_at' => [
            'label' => 'Email Verificata il',
        ],
        'detach' => [
            'label' => 'detach',
        ],
        'attach' => [
            'label' => 'attach',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
    ],
    'actions' => [
        'create' => 'Crea Utente',
        'edit' => 'Modifica Utente',
        'delete' => 'Elimina Utente',
        'impersonate' => 'Impersona Utente',
        'stop_impersonating' => 'Termina Impersonificazione',
        'block' => 'Blocca',
        'unblock' => 'Sblocca',
        'send_reset_link' => 'Invia Link Reset Password',
        'verify_email' => 'Verifica Email',
    ],
    'messages' => [
        'created' => 'Utente creato con successo',
        'updated' => 'Utente aggiornato con successo',
        'deleted' => 'Utente eliminato con successo',
        'blocked' => 'Utente bloccato con successo',
        'unblocked' => 'Utente sbloccato con successo',
        'reset_link_sent' => 'Link per il reset della password inviato',
        'email_verified' => 'Email verificata con successo',
        'impersonating' => 'Stai impersonando l\'utente :name',
<<<<<<< HEAD
<<<<<<< HEAD
=======
        // Added for LoginWidget
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        'credentials_incorrect' => 'Die angegebenen Anmeldedaten sind nicht korrekt',
        'login_success' => 'Anmeldung erfolgreich',
        'validation_error' => 'Validierungsfehler',
        'login_error' => 'Bei der Anmeldung ist ein Fehler aufgetreten. Versuchen Sie es später erneut',
    ],
    'validation' => [
        'email_unique' => 'Questa email è già in uso',
        'password_min' => 'La password deve essere di almeno :min caratteri',
        'password_confirmed' => 'Le password non coincidono',
        'current_password' => 'La password attuale non è corretta',
    ],
    'permissions' => [
        'view_users' => 'Visualizza utenti',
        'create_users' => 'Crea utenti',
        'edit_users' => 'Modifica utenti',
        'delete_users' => 'Elimina utenti',
        'impersonate_users' => 'Impersona utenti',
        'manage_roles' => 'Gestisci ruoli',
    ],
    'model' => [
        'label' => 'Utente',
    ],
<<<<<<< HEAD
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 4b6b99016 (first commit)
=======
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
>>>>>>> dev
];
