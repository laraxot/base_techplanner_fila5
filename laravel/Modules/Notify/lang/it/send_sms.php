<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Invio SMS',
        'plural' => 'Invio SMS',
    ],
    'navigation' => [
        'name' => 'Invio SMS',
        'plural' => 'Invio SMS',
        'group' => [
            'name' => 'Notifiche',
            'description' => 'Gestione dell\'invio di notifiche SMS',
        ],
        'label' => 'Invio SMS',
        'icon' => 'heroicon-o-chat-bubble-left-right',
        'sort' => 15,
    ],
    'fields' => [
        'driver' => [
            'description' => 'Driver SMS',
            'helper_text' => 'Seleziona il provider per l\'invio SMS',
            'placeholder' => 'Seleziona un driver',
            'label' => 'Driver',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'message' => [
            'description' => 'Contenuto del messaggio',
            'helper_text' => 'Testo del messaggio da inviare',
            'placeholder' => 'Scrivi il messaggio',
            'label' => 'Messaggio',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'phone' => [
            'description' => 'Numero di telefono',
            'helper_text' => 'Numero del destinatario',
            'placeholder' => 'Inserisci il numero',
            'label' => 'Numero telefono',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'gateway' => [
            'description' => 'Gateway SMS',
            'helper_text' => 'Gateway utilizzato per l\'invio',
            'placeholder' => 'Gateway SMS',
            'label' => 'Gateway',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'to' => [
            'description' => 'to',
            'helper_text' => 'to',
            'placeholder' => 'to',
            'label' => 'to',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'template_slug' => [
            'description' => 'template_slug',
            'helper_text' => 'template_slug',
            'placeholder' => 'template_slug',
            'label' => 'template_slug',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'send' => [
            'label' => 'Invia SMS',
            'tooltip' => 'Invia un messaggio SMS al destinatario',
            'success_message' => 'SMS inviato con successo',
            'error_message' => 'Errore nell\'invio dell\'SMS',
        ],
        'test' => [
            'label' => 'Test connessione',
            'tooltip' => 'Verifica la connessione con il provider',
            'success_message' => 'Connessione verificata con successo',
            'error_message' => 'Errore nella verifica della connessione',
        ],
    ],
    'messages' => [
        'success' => 'SMS inviato con successo',
        'error' => 'Si è verificato un errore durante l\'invio dell\'SMS',
        'confirmation' => 'Sei sicuro di voler inviare questo SMS?',
    ],
<<<<<<< HEAD
    'label' => 'Send Sms',
    'plural_label' => 'Send Sms (Plurale)',
=======
>>>>>>> 4b6b99016 (first commit)
];
