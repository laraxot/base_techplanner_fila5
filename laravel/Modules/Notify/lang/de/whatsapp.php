<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'WhatsApp',
        'plural' => 'WhatsApp'],
    'navigation' => [
        'name' => 'Invio WhatsApp',
        'plural' => 'Invio WhatsApp',
        'group' => [
            'name' => 'Notifiche',
            'description' => 'Gestione delle notifiche WhatsApp'],
        'label' => 'Invio WhatsApp',
        'icon' => 'heroicon-o-chat-bubble-left-right',
        'sort' => '20'],
    'fields' => [
        'to' => [
            'label' => 'Numero di telefono',
            'placeholder' => 'Inserisci il numero di telefono',
            'helper_text' => 'Inserisci il numero di telefono con prefisso internazionale (es. +39)',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_lYQYLO
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_C5HXbT
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Inserisci il messaggio',
            'helper_text' => 'Il messaggio non può superare i 4096 caratteri',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_lYQYLO
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_C5HXbT
        'driver' => [
            'label' => 'Provider WhatsApp',
            'placeholder' => 'Seleziona il provider WhatsApp',
            'helper_text' => 'Seleziona il provider WhatsApp da utilizzare',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_lYQYLO
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_C5HXbT
        'template' => [
            'label' => 'Template',
            'placeholder' => 'Inserisci il nome del template',
            'helper_text' => 'Nome del template (opzionale)',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_lYQYLO
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_C5HXbT
        'parameters' => [
            'label' => 'Parametri',
            'placeholder' => 'Inserisci i parametri',
            'helper_text' => 'Parametri per il template (opzionale)',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_lYQYLO
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_C5HXbT
        'media_url' => [
            'label' => 'URL Media',
            'placeholder' => 'Inserisci l\'URL del media',
            'helper_text' => 'URL del media (opzionale)',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_lYQYLO
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_C5HXbT
        'media_type' => [
            'label' => 'Tipo Media',
            'placeholder' => 'Seleziona il tipo di media',
            'helper_text' => 'Seleziona il tipo di media',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_lYQYLO
            'description' => '']],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
>>>>>>> .merge_file_C5HXbT
    'drivers' => [
        'twilio' => 'Twilio',
        'messagebird' => 'MessageBird',
        'vonage' => 'Vonage',
        'infobip' => 'Infobip'],
    'media_types' => [
        'image' => 'Immagine',
        'video' => 'Video',
        'document' => 'Documento',
        'audio' => 'Audio'],
    'actions' => [
        'send' => 'WhatsApp senden',
        'cancel' => 'Annulla'],
    'messages' => [
        'success' => 'WhatsApp inviato con successo',
<<<<<<< .merge_file_lYQYLO
        'error' => 'Si è verificato un errore durante l\'invio del WhatsApp'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
        'error' => 'Si è verificato un errore durante l\'invio del WhatsApp',
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 6ed19256f (.)
];
>>>>>>> .merge_file_C5HXbT
