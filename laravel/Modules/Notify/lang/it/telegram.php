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
        'sort' => 30],
    'fields' => [
        'chat_id' => [
            'label' => 'ID Chat',
            'placeholder' => 'Inserisci l\'ID della chat',
            'helper_text' => 'ID della chat Telegram a cui inviare il messaggio',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_Cyk2S2
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_oVOSgc
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Inserisci il messaggio',
            'helper_text' => 'Testo del messaggio da inviare',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_Cyk2S2
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_oVOSgc
        'parse_mode' => [
            'label' => 'Formato',
            'placeholder' => 'Seleziona il formato',
            'helper_text' => 'Formato di parsing del messaggio',
            'options' => [
                'text' => 'Testo semplice',
                'html' => 'HTML',
<<<<<<< .merge_file_Cyk2S2
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
>>>>>>> .merge_file_oVOSgc
        'driver' => [
            'label' => 'Provider Telegram',
            'placeholder' => 'Seleziona il provider Telegram',
            'helper_text' => 'Seleziona il provider Telegram da utilizzare',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_Cyk2S2
            'description' => '']],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
>>>>>>> .merge_file_oVOSgc
    'drivers' => [
        'telegram' => 'Telegram',
        'botapi' => 'Bot API',
        'laravel_telegram' => 'Laravel Telegram'],
    'actions' => [
        'send' => 'Invia Telegram',
        'cancel' => 'Annulla'],
    'messages' => [
        'success' => 'Messaggio Telegram inviato con successo',
<<<<<<< .merge_file_Cyk2S2
        'error' => 'Si è verificato un errore durante l\'invio del messaggio Telegram'],
    'label' => 'Telegram',
    'plural_label' => 'Telegram (Plurale)'];
=======
        'error' => 'Si è verificato un errore durante l\'invio del messaggio Telegram',
    ],
<<<<<<< HEAD
    'label' => 'Telegram',
    'plural_label' => 'Telegram (Plurale)',
=======
>>>>>>> 6ed19256f (.)
];
>>>>>>> .merge_file_oVOSgc
