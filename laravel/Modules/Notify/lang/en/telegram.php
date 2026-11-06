<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Telegram',
        'plural' => 'Telegram'],
    'navigation' => [
        'name' => 'Invio Telegram',
        'plural' => 'Invio Telegram',
        'group' => [
            'name' => 'Notifiche',
            'description' => 'Gestione delle notifiche Telegram'],
        'label' => 'Invio Telegram',
        'icon' => 'notify-telegram-animated',
        'sort' => '30'],
    'fields' => [
        'chat_id' => [
            'label' => 'ID Chat',
            'placeholder' => 'Inserisci l\'ID della chat',
            'helper_text' => 'ID della chat Telegram a cui inviare il messaggio',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_QSacIn
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_g3CjRl
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Inserisci il messaggio',
            'helper_text' => 'Testo del messaggio da inviare',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_QSacIn
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_g3CjRl
        'parse_mode' => [
            'label' => 'Formato',
            'placeholder' => 'Seleziona il formato',
            'helper_text' => 'Formato di parsing del messaggio',
            'options' => [
                'text' => 'Testo semplice',
                'html' => 'HTML',
<<<<<<< .merge_file_QSacIn
                'markdown' => 'Markdown'],
            'tooltip' => '',
            'description' => ''],
=======
                'markdown' => 'Markdown',
            ],
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_g3CjRl
        'driver' => [
            'label' => 'Provider Telegram',
            'placeholder' => 'Seleziona il provider Telegram',
            'helper_text' => 'Seleziona il provider Telegram da utilizzare',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_QSacIn
            'description' => '']],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
>>>>>>> .merge_file_g3CjRl
    'drivers' => [
        'telegram' => 'Telegram',
        'botapi' => 'Bot API',
        'laravel_telegram' => 'Laravel Telegram'],
    'actions' => [
        'send' => 'Send Telegram',
        'cancel' => 'Annulla'],
    'messages' => [
        'success' => 'Messaggio Telegram inviato con successo',
<<<<<<< .merge_file_QSacIn
        'error' => 'Si è verificato un errore durante l\'invio del messaggio Telegram'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
        'error' => 'Si è verificato un errore durante l\'invio del messaggio Telegram',
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 6ed19256f (.)
];
>>>>>>> .merge_file_g3CjRl
