<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'SMS',
        'plural' => 'SMS'],
    'navigation' => [
        'name' => 'Invio SMS',
        'plural' => 'Invio SMS',
        'group' => [
            'name' => 'Notifiche',
            'description' => 'Gestione delle notifiche SMS'],
        'label' => 'Invio SMS',
        'icon' => 'heroicon-o-device-phone-mobile',
        'sort' => 10],
    'fields' => [
        'to' => [
            'label' => 'Numero di telefono',
            'placeholder' => 'Inserisci il numero di telefono',
<<<<<<< HEAD
            'helper_text' => 'Inserisci il numero di telefono con prefisso internazionale (es. +39]',
            'tooltip' => '',
<<<<<<< .merge_file_VzM0N8
            'description' => ''],
=======
            'description' => '',
=======
            'helper_text' => 'Inserisci il numero di telefono con prefisso internazionale (es. +39)',
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_S2A8Sh
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Inserisci il messaggio',
            'helper_text' => 'Il messaggio non può superare i 160 caratteri',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_VzM0N8
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_S2A8Sh
        'driver' => [
            'label' => 'Provider SMS',
            'placeholder' => 'Seleziona il provider SMS',
            'helper_text' => 'Seleziona il provider SMS da utilizzare',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_VzM0N8
            'description' => '']],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
>>>>>>> .merge_file_S2A8Sh
    'drivers' => [
        'smsfactor' => 'SMSFactor',
        'twilio' => 'Twilio',
        'nexmo' => 'Nexmo',
        'plivo' => 'Plivo',
        'gammu' => 'Gammu',
        'netfun' => 'Netfun',
        'agiletelecom' => 'Agile Telecom'],
    'actions' => [
        'send' => 'Invia SMS',
        'cancel' => 'Annulla'],
    'messages' => [
        'success' => 'SMS inviato con successo',
<<<<<<< .merge_file_VzM0N8
        'error' => 'Si è verificato un errore durante l\'invio dell\'SMS'],
    'label' => 'Sms',
    'plural_label' => 'Sms (Plurale)'];
=======
        'error' => 'Si è verificato un errore durante l\'invio dell\'SMS',
    ],
<<<<<<< HEAD
    'label' => 'Sms',
    'plural_label' => 'Sms (Plurale)',
=======
>>>>>>> 6ed19256f (.)
];
>>>>>>> .merge_file_S2A8Sh
