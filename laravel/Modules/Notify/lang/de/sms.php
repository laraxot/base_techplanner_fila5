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
        'sort' => '10',
    ],
    'fields' => [
        'to' => [
            'label' => 'Numero di telefono',
            'placeholder' => 'Inserisci il numero di telefono',
            'helper_text' => 'Inserisci il numero di telefono con prefisso internazionale (es. +39)',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Inserisci il messaggio',
            'helper_text' => 'Il messaggio non può superare i 160 caratteri',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'driver' => [
            'label' => 'Provider SMS',
            'placeholder' => 'Seleziona il provider SMS',
            'helper_text' => 'Seleziona il provider SMS da utilizzare',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'drivers' => [
        'smsfactor' => 'SMSFactor',
        'twilio' => 'Twilio',
        'nexmo' => 'Nexmo',
        'plivo' => 'Plivo',
        'gammu' => 'Gammu',
        'netfun' => 'Netfun',
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
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 4b6b99016 (first commit)
];
