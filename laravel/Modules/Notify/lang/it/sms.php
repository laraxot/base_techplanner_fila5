<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'SMS',
        'plural' => 'SMS',
    ],
    'navigation' => [
        'name' => 'Invio SMS',
        'plural' => 'Invio SMS',
        'group' => [
            'name' => 'Notifiche',
            'description' => 'Gestione delle notifiche SMS',
        ],
        'label' => 'Invio SMS',
        'icon' => 'heroicon-o-device-phone-mobile',
        'sort' => 10,
    ],
    'fields' => [
        'to' => [
            'label' => 'Numero di telefono',
            'placeholder' => 'Inserisci il numero di telefono',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => 'Inserisci il numero di telefono con prefisso internazionale (es. +39]',
            'tooltip' => '',
            'description' => '',
=======
            'helper_text' => 'Inserisci il numero di telefono con prefisso internazionale (es. +39)',
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => 'Inserisci il numero di telefono con prefisso internazionale (es. +39]',
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Inserisci il messaggio',
            'helper_text' => 'Il messaggio non può superare i 160 caratteri',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'driver' => [
            'label' => 'Provider SMS',
            'placeholder' => 'Seleziona il provider SMS',
            'helper_text' => 'Seleziona il provider SMS da utilizzare',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
    ],
    'drivers' => [
        'smsfactor' => 'SMSFactor',
        'twilio' => 'Twilio',
        'nexmo' => 'Nexmo',
        'plivo' => 'Plivo',
        'gammu' => 'Gammu',
        'netfun' => 'Netfun',
        'agiletelecom' => 'Agile Telecom',
    ],
    'actions' => [
        'send' => 'Invia SMS',
        'cancel' => 'Annulla',
    ],
    'messages' => [
        'success' => 'SMS inviato con successo',
        'error' => 'Si è verificato un errore durante l\'invio dell\'SMS',
    ],
<<<<<<< HEAD
<<<<<<< HEAD
    'label' => 'Sms',
    'plural_label' => 'Sms (Plurale)',
=======
>>>>>>> 4b6b99016 (first commit)
=======
    'label' => 'Sms',
    'plural_label' => 'Sms (Plurale)',
>>>>>>> dev
];
