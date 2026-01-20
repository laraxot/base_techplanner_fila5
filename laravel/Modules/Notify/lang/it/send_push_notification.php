<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Invio Notifica Push',
    ],
    'navigation' => [
        'name' => 'Invio Notifica Push',
        'plural' => 'Invio Notifiche Push',
        'group' => [
            'name' => 'Sistema',
            'description' => 'Funzionalità per l\'invio di notifiche push tramite Firebase',
        ],
        'label' => 'Invio Notifiche Push',
        'icon' => 'notify-push-animated',
        'sort' => 51,
    ],
    'fields' => [
        'device_token' => [
            'label' => 'Token Dispositivo',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'type' => [
            'label' => 'Tipo',
            'options' => [
                'notification' => 'Notifica',
                'data' => 'Dati',
                'both' => 'Entrambi',
            ],
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'title' => [
            'label' => 'Titolo',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'body' => [
            'label' => 'Contenuto',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'title' => [
            'label' => 'Titolo',
        ],
        'body' => [
            'label' => 'Contenuto',
>>>>>>> 4b6b99016 (first commit)
        ],
        'data' => [
            'label' => 'Dati Aggiuntivi',
            'description' => 'Dati in formato JSON da inviare con la notifica',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'send' => [
            'label' => 'Invia Notifica',
            'success' => 'Notifica push inviata con successo',
            'error' => 'Errore durante l\'invio della notifica push',
        ],
        'preview' => [
            'label' => 'Anteprima',
        ],
    ],
<<<<<<< HEAD
    'label' => 'Send Push Notification',
    'plural_label' => 'Send Push Notification (Plurale)',
=======
>>>>>>> 4b6b99016 (first commit)
];
