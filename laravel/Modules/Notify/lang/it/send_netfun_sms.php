<?php

declare(strict_types=1);

return [
    'resource' => ['name' => 'Invio SMS Netfun', 'plural' => 'Invio SMS Netfun'],
    'navigation' => [
        'name' => 'Invio SMS (Netfun]',
        'plural' => 'Invio SMS (Netfun]',
<<<<<<< .merge_file_1vlahg
        'group' => [
            'name' => 'Notifiche',
            'description' => 'Gestione dell\'invio di notifiche SMS tramite Netfun',
        ],
=======
        'group' => ['name' => 'Notifiche', 'description' => 'Gestione dell\'invio di notifiche SMS tramite Netfun'],
>>>>>>> .merge_file_3OjvuY
        'label' => 'Invio SMS (Netfun]',
        'icon' => 'heroicon-o-chat-bubble-left-right',
        'sort' => 15,
    ],
    'fields' => [
<<<<<<< .merge_file_1vlahg
        'to' => [
            'label' => 'Destinatario',
            'placeholder' => 'Inserisci il numero di telefono',
            'helper_text' => 'Numero di telefono del destinatario',
            'tooltip' => '',
            'description' => '',
        ],
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Scrivi il testo del messaggio',
            'helper_text' => 'Contenuto del messaggio SMS',
            'tooltip' => '',
            'description' => '',
        ],
=======
        'to' => ['label' => 'Destinatario', 'placeholder' => 'Inserisci il numero di telefono', 'helper_text' => 'Numero di telefono del destinatario', 'tooltip' => '', 'description' => ''],
        'message' => ['label' => 'Messaggio', 'placeholder' => 'Scrivi il testo del messaggio', 'helper_text' => 'Contenuto del messaggio SMS', 'tooltip' => '', 'description' => ''],
        'recipient' => ['label' => 'recipient', 'placeholder' => 'recipient', 'helper_text' => 'recipient', 'description' => 'recipient'],
        'from' => ['label' => 'from', 'placeholder' => 'from', 'helper_text' => 'from', 'description' => 'from'],
        'body' => ['label' => 'body', 'placeholder' => 'body', 'helper_text' => 'body', 'description' => 'body'],
        'provider' => ['label' => 'provider', 'placeholder' => 'provider', 'helper_text' => 'provider', 'description' => 'provider'],
>>>>>>> .merge_file_3OjvuY
    ],
    'actions' => [
        'send' => ['label' => 'Invia', 'tooltip' => 'Invia un messaggio SMS tramite Netfun', 'success_message' => 'Messaggio SMS inviato con successo', 'error_message' => 'Errore nell\'invio del messaggio SMS'],
        'sendSms' => ['label' => 'sendSms', 'icon' => 'sendSms', 'tooltip' => 'sendSms'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
    ],
<<<<<<< .merge_file_1vlahg
=======
    'messages' => ['success' => 'Messaggio SMS inviato con successo tramite Netfun', 'error' => 'Si è verificato un errore durante l\'invio del messaggio SMS', 'confirmation' => 'Sei sicuro di voler inviare questo messaggio SMS?'],
>>>>>>> .merge_file_3OjvuY
    'label' => 'Send Netfun Sms',
    'plural_label' => 'Send Netfun Sms (Plurale)',
];
