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
<<<<<<< HEAD
            'name' => 'Notifiche',
            'description' => 'Gestione dell\'invio di notifiche SMS',
=======
            'name' => 'Notifications',
            'description' => 'Manage sending SMS notifications',
>>>>>>> laraxot/dev
        ],
        'label' => 'Invio SMS',
        'icon' => 'heroicon-o-chat-bubble-left-right',
        'sort' => '15',
    ],
    'fields' => [
        'driver' => [
            'description' => 'Driver SMS',
<<<<<<< HEAD
            'helper_text' => 'Seleziona il provider per l\'invio SMS',
=======
            'helper_text' => 'Select the provider used to send SMS',
>>>>>>> laraxot/dev
            'placeholder' => 'Seleziona un driver',
            'label' => 'Driver',
            'tooltip' => '',
        ],
        'message' => [
<<<<<<< HEAD
            'description' => 'Contenuto del messaggio',
            'helper_text' => 'Testo del messaggio da inviare',
            'placeholder' => 'Scrivi il messaggio',
            'label' => 'Messaggio',
            'tooltip' => '',
        ],
        'phone' => [
            'description' => 'Numero di telefono',
            'helper_text' => 'Numero del destinatario',
            'placeholder' => 'Inserisci il numero',
=======
            'description' => 'Message content',
            'helper_text' => 'Message text to send',
            'placeholder' => 'Write the message',
            'label' => 'Message',
            'tooltip' => '',
        ],
        'phone' => [
            'description' => 'Phone number',
            'helper_text' => 'Recipient number',
            'placeholder' => 'Enter the number',
>>>>>>> laraxot/dev
            'label' => 'Numero telefono',
            'tooltip' => '',
        ],
        'gateway' => [
            'description' => 'Gateway SMS',
<<<<<<< HEAD
            'helper_text' => 'Gateway utilizzato per l\'invio',
=======
            'helper_text' => 'Gateway used for sending',
>>>>>>> laraxot/dev
            'placeholder' => 'Gateway SMS',
            'label' => 'Gateway',
            'tooltip' => '',
        ],
    ],
    'actions' => [
        'send' => [
<<<<<<< HEAD
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
=======
            'label' => 'Send SMS',
            'tooltip' => 'Send an SMS message to the recipient',
            'success_message' => 'SMS sent successfully',
            'error_message' => 'Error sending the SMS',
        ],
        'test' => [
            'label' => 'Test connessione',
            'tooltip' => 'Check the connection with the provider',
            'success_message' => 'Connection verified successfully',
            'error_message' => 'Error verifying the connection',
        ],
    ],
    'messages' => [
        'success' => 'SMS sent successfully',
        'error' => 'An error occurred while sending the SMS',
        'confirmation' => 'Are you sure you want to send this SMS?',
>>>>>>> laraxot/dev
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'sections' => [
        'page' => [
            'title' => 'SMS Sending Test',
            'description' => 'Use this form to test sending SMS messages through different providers.',
        ],
    ],
];
