<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'WhatsApp',
        'plural' => 'WhatsApp',
    ],
    'navigation' => [
        'name' => 'Invio WhatsApp',
        'plural' => 'Invio WhatsApp',
        'group' => [
            'name' => 'Notifiche',
            'description' => 'Gestione delle notifiche WhatsApp',
        ],
        'label' => 'Invio WhatsApp',
        'icon' => 'heroicon-o-chat-bubble-left-right',
        'sort' => 20,
    ],
    'fields' => [
        'to' => [
            'label' => 'Numero di telefono',
            'placeholder' => 'Inserisci il numero di telefono',
<<<<<<< HEAD
            'helper_text' => 'Inserisci il numero di telefono con prefisso internazionale (es. +39]',
            'tooltip' => '',
            'description' => '',
=======
            'helper_text' => 'Inserisci il numero di telefono con prefisso internazionale (es. +39)',
>>>>>>> 6ed19256f (.)
        ],
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Inserisci il messaggio',
            'helper_text' => 'Il messaggio non può superare i 4096 caratteri',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'driver' => [
            'label' => 'Provider WhatsApp',
            'placeholder' => 'Seleziona il provider WhatsApp',
            'helper_text' => 'Seleziona il provider WhatsApp da utilizzare',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'template' => [
            'label' => 'Template',
            'placeholder' => 'Inserisci il nome del template',
<<<<<<< HEAD
            'helper_text' => 'Nome del template (opzionale]',
            'tooltip' => '',
            'description' => '',
=======
            'helper_text' => 'Nome del template (opzionale)',
>>>>>>> 6ed19256f (.)
        ],
        'parameters' => [
            'label' => 'Parametri',
            'placeholder' => 'Inserisci i parametri',
<<<<<<< HEAD
            'helper_text' => 'Parametri per il template (opzionale]',
            'tooltip' => '',
            'description' => '',
=======
            'helper_text' => 'Parametri per il template (opzionale)',
>>>>>>> 6ed19256f (.)
        ],
        'media_url' => [
            'label' => 'URL Media',
            'placeholder' => 'Inserisci l\'URL del media',
<<<<<<< HEAD
            'helper_text' => 'URL del media (opzionale]',
            'tooltip' => '',
            'description' => '',
=======
            'helper_text' => 'URL del media (opzionale)',
>>>>>>> 6ed19256f (.)
        ],
        'media_type' => [
            'label' => 'Tipo Media',
            'placeholder' => 'Seleziona il tipo di media',
            'helper_text' => 'Seleziona il tipo di media',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
    'drivers' => [
        'twilio' => 'Twilio',
        'messagebird' => 'MessageBird',
        'vonage' => 'Vonage',
        'infobip' => 'Infobip',
    ],
    'media_types' => [
        'image' => 'Immagine',
        'video' => 'Video',
        'document' => 'Documento',
        'audio' => 'Audio',
    ],
    'actions' => [
        'send' => 'Invia WhatsApp',
        'cancel' => 'Annulla',
    ],
    'messages' => [
        'success' => 'WhatsApp inviato con successo',
        'error' => 'Si è verificato un errore durante l\'invio del WhatsApp',
    ],
<<<<<<< HEAD
    'label' => 'Whatsapp',
    'plural_label' => 'Whatsapp (Plurale)',
=======
>>>>>>> 6ed19256f (.)
];
