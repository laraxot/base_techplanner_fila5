<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Invio WhatsApp',
        'plural' => 'Invio WhatsApp',
    ],
    'navigation' => [
        'name' => 'Invio WhatsApp',
        'plural' => 'Invio WhatsApp',
        'group' => [
<<<<<<< HEAD
            'name' => 'Notifiche',
            'description' => 'Gestione dell\'invio di notifiche WhatsApp',
=======
            'name' => 'Notifications',
            'description' => 'Manage sending WhatsApp notifications',
>>>>>>> laraxot/dev
        ],
        'label' => 'Invio WhatsApp',
        'icon' => 'heroicon-o-paper-airplane',
        'sort' => '20',
    ],
    'fields' => [
        'to' => [
<<<<<<< HEAD
            'label' => 'Destinatario',
            'placeholder' => 'Inserisci il numero',
            'helper_text' => 'Numero di telefono del destinatario',
=======
            'label' => 'Recipient',
            'placeholder' => 'Enter the number',
            'helper_text' => 'Recipient phone number',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '',
        ],
        'message' => [
<<<<<<< HEAD
            'label' => 'Messaggio',
            'placeholder' => 'Scrivi il messaggio',
            'helper_text' => 'Contenuto del messaggio WhatsApp',
=======
            'label' => 'Message',
            'placeholder' => 'Write the message',
            'helper_text' => 'WhatsApp message content',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'send' => [
<<<<<<< HEAD
            'label' => 'Invia',
            'tooltip' => 'Invia un messaggio WhatsApp al destinatario',
            'success_message' => 'Messaggio WhatsApp inviato con successo',
            'error_message' => 'Errore nell\'invio del messaggio WhatsApp',
        ],
    ],
    'messages' => [
        'success' => 'Messaggio WhatsApp inviato con successo',
        'error' => 'Si è verificato un errore durante l\'invio del messaggio WhatsApp',
        'confirmation' => 'Sei sicuro di voler inviare questo messaggio WhatsApp?',
=======
            'label' => 'Send',
            'tooltip' => 'Send a WhatsApp message to the recipient',
            'success_message' => 'WhatsApp message sent successfully',
            'error_message' => 'Error sending the WhatsApp message',
        ],
    ],
    'messages' => [
        'success' => 'WhatsApp message sent successfully',
        'error' => 'An error occurred while sending the WhatsApp message',
        'confirmation' => 'Are you sure you want to send this WhatsApp message?',
>>>>>>> laraxot/dev
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'sections' => [
        'page' => [
            'title' => 'WhatsApp Sending Test',
            'description' => 'Use this form to test sending WhatsApp messages through different providers.',
        ],
    ],
];
