<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Invio SMS Netfun',
        'plural' => 'Invio SMS Netfun',
    ],
    'navigation' => [
<<<<<<< HEAD
        'name' => 'Invio SMS (Netfun]',
        'plural' => 'Invio SMS (Netfun]',
=======
        'name' => 'Invio SMS (Netfun)',
        'plural' => 'Invio SMS (Netfun)',
>>>>>>> 6ed19256f (.)
        'group' => [
            'name' => 'Notifiche',
            'description' => 'Gestione dell\'invio di notifiche SMS tramite Netfun',
        ],
<<<<<<< HEAD
        'label' => 'Invio SMS (Netfun]',
=======
        'label' => 'Invio SMS (Netfun)',
>>>>>>> 6ed19256f (.)
        'icon' => 'heroicon-o-chat-bubble-left-right',
        'sort' => 15,
    ],
    'fields' => [
        'to' => [
            'label' => 'Destinatario',
            'placeholder' => 'Inserisci il numero di telefono',
            'helper_text' => 'Numero di telefono del destinatario',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Scrivi il testo del messaggio',
            'helper_text' => 'Contenuto del messaggio SMS',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'send' => [
            'label' => 'Invia',
            'tooltip' => 'Invia un messaggio SMS tramite Netfun',
            'success_message' => 'Messaggio SMS inviato con successo',
            'error_message' => 'Errore nell\'invio del messaggio SMS',
        ],
    ],
    'messages' => [
        'success' => 'Messaggio SMS inviato con successo tramite Netfun',
        'error' => 'Si è verificato un errore durante l\'invio del messaggio SMS',
        'confirmation' => 'Sei sicuro di voler inviare questo messaggio SMS?',
    ],
<<<<<<< HEAD
    'label' => 'Send Netfun Sms',
    'plural_label' => 'Send Netfun Sms (Plurale)',
=======
>>>>>>> 6ed19256f (.)
];
