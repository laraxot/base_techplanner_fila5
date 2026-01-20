<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'WhatsApp',
        'group' => 'Notify',
        'icon' => 'heroicon-o-chat-bubble-left-right',
        'sort' => 10,
    ],
    'fields' => [
        'phone_number' => [
            'label' => 'Numero Telefono',
            'placeholder' => 'Inserisci numero WhatsApp',
            'helper_text' => 'Numero di telefono per l\'invio WhatsApp',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Inserisci messaggio WhatsApp',
            'helper_text' => 'Testo del messaggio da inviare',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'template' => [
            'label' => 'Template',
            'placeholder' => 'Seleziona template',
            'help' => 'Template predefinito per il messaggio',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'send' => [
            'label' => 'Invia WhatsApp',
            'tooltip' => 'Invia messaggio WhatsApp',
            'success' => 'Messaggio WhatsApp inviato con successo',
            'error' => 'Errore nell\'invio del messaggio WhatsApp',
        ],
    ],
<<<<<<< HEAD
    'label' => 'Send Whats App',
    'plural_label' => 'Send Whats App (Plurale)',
=======
>>>>>>> 4b6b99016 (first commit)
];
