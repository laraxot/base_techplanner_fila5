<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Invia SMS',
        'group' => 'Test'],
    'fields' => [
        'to' => [
            'label' => 'Destinatario',
            'placeholder' => 'Inserisci numero di telefono',
            'helper_text' => 'Inserisci il numero con prefisso internazionale (es. +39)',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_ul50CL
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_fivMpm
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Inserisci testo del messaggio',
            'helper_text' => 'Il messaggio non può superare i 160 caratteri',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_ul50CL
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_fivMpm
        'driver' => [
            'label' => 'Provider',
            'placeholder' => 'Seleziona provider SMS',
            'helper_text' => 'Seleziona il provider da utilizzare per l\'invio',
            'options' => [
                'smsfactor' => 'SMSFactor',
                'twilio' => 'Twilio',
                'nexmo' => 'Nexmo',
                'plivo' => 'Plivo',
                'gammu' => 'Gammu',
<<<<<<< .merge_file_ul50CL
                'netfun' => 'Netfun'],
            'tooltip' => '',
            'description' => '']],
=======
                'netfun' => 'Netfun',
            ],
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
>>>>>>> .merge_file_fivMpm
    'actions' => [
        'send' => [
            'label' => 'Invia SMS',
            'tooltip' => 'Invia un messaggio SMS al destinatario']],
    'messages' => [
        'success' => 'SMS inviato con successo',
<<<<<<< .merge_file_ul50CL
        'error' => 'Errore nell\'invio dell\'SMS: :error'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
        'error' => 'Errore nell\'invio dell\'SMS: :error',
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 6ed19256f (.)
];
>>>>>>> .merge_file_fivMpm
