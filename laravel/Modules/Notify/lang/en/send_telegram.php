<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Invio Telegram',
        'plural' => 'Invio Telegram',
    ],
    'navigation' => [
        'name' => 'Invio Telegram',
        'plural' => 'Invio Telegram',
        'group' => [
            'name' => 'Sistema',
<<<<<<< HEAD
            'description' => 'Funzionalità per l\'invio di messaggi attraverso Telegram',
=======
            'description' => 'Send messages through Telegram',
>>>>>>> laraxot/dev
        ],
        'label' => 'Invio Telegram',
        'icon' => 'notify-telegram-animated',
        'sort' => '50',
    ],
    'fields' => [
        'chat_id' => [
            'label' => 'ID Chat',
<<<<<<< HEAD
            'placeholder' => 'Inserisci l\'ID della chat',
            'helper_text' => 'ID della chat Telegram di destinazione',
            'description' => 'Identificativo univoco della chat Telegram',
            'tooltip' => '',
        ],
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Inserisci il messaggio da inviare',
            'helper_text' => 'Contenuto del messaggio Telegram',
            'description' => 'Testo del messaggio da inviare tramite Telegram',
=======
            'placeholder' => 'Enter the chat ID',
            'helper_text' => 'Destination Telegram chat ID',
            'description' => 'Unique Telegram chat identifier',
            'tooltip' => '',
        ],
        'message' => [
            'label' => 'Message',
            'placeholder' => 'Enter the message to send',
            'helper_text' => 'Telegram message content',
            'description' => 'Message text to send via Telegram',
>>>>>>> laraxot/dev
            'tooltip' => '',
        ],
        'parse_mode' => [
            'label' => 'Formato',
<<<<<<< HEAD
            'placeholder' => 'Seleziona il formato',
            'helper_text' => 'Formato di interpretazione del messaggio',
            'description' => 'Modalità di formattazione del messaggio',
            'options' => [
                'text' => 'Testo semplice',
=======
            'placeholder' => 'Select the format',
            'helper_text' => 'Message parsing format',
            'description' => 'Message formatting mode',
            'options' => [
                'text' => 'Plain text',
>>>>>>> laraxot/dev
                'html' => 'HTML',
                'markdown' => 'Markdown',
            ],
            'tooltip' => '',
        ],
    ],
    'actions' => [
        'send' => [
<<<<<<< HEAD
            'label' => 'Invia Messaggio',
            'tooltip' => 'Invia un messaggio tramite Telegram',
            'success_message' => 'Messaggio inviato con successo',
            'error_message' => 'Errore nell\'invio del messaggio',
            'success' => 'Messaggio inviato con successo',
            'error' => 'Errore durante l\'invio del messaggio',
        ],
        'preview' => [
            'label' => 'Anteprima',
            'tooltip' => 'Visualizza un\'anteprima del messaggio',
            'success_message' => 'Anteprima generata',
            'error_message' => 'Errore nella generazione dell\'anteprima',
        ],
    ],
    'messages' => [
        'success' => 'Messaggio Telegram inviato con successo',
        'error' => 'Si è verificato un errore durante l\'invio del messaggio Telegram',
        'confirmation' => 'Sei sicuro di voler inviare questo messaggio Telegram?',
=======
            'label' => 'Send Message',
            'tooltip' => 'Send a message via Telegram',
            'success_message' => 'Message sent successfully',
            'error_message' => 'Error sending the message',
            'success' => 'Message sent successfully',
            'error' => 'Error while sending the message',
        ],
        'preview' => [
            'label' => 'Anteprima',
            'tooltip' => 'Show a message preview',
            'success_message' => 'Anteprima generata',
            'error_message' => 'Error generating the preview',
        ],
    ],
    'messages' => [
        'success' => 'Telegram message sent successfully',
        'error' => 'An error occurred while sending the Telegram message',
        'confirmation' => 'Are you sure you want to send this Telegram message?',
>>>>>>> laraxot/dev
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'sections' => [
        'page' => [
            'title' => 'Telegram Sending Test',
            'description' => 'Use this form to test sending Telegram messages through different providers.',
        ],
    ],
];
