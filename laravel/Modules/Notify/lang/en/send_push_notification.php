<?php

declare(strict_types=1);

return [
    'resource' => [
<<<<<<< HEAD
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
=======
        'name' => 'Send Push Notification',
    ],
    'navigation' => [
        'name' => 'Send Push Notification',
        'plural' => 'Send Push Notifications',
        'group' => [
            'name' => 'Sistema',
            'description' => 'Send push notifications via Firebase',
        ],
        'label' => 'Send Push Notifications',
>>>>>>> laraxot/dev
        'icon' => 'notify-push-animated',
        'sort' => '51',
    ],
    'fields' => [
        'device_token' => [
            'label' => 'Token Dispositivo',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'type' => [
            'label' => 'Tipo',
            'options' => [
<<<<<<< HEAD
                'notification' => 'Notifica',
=======
                'notification' => 'Notification',
>>>>>>> laraxot/dev
                'data' => 'Dati',
                'both' => 'Entrambi',
            ],
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
        ],
        'data' => [
            'label' => 'Dati Aggiuntivi',
<<<<<<< HEAD
            'description' => 'Dati in formato JSON da inviare con la notifica',
=======
            'description' => 'JSON data to send with the notification',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'helper_text' => '',
        ],
    ],
    'actions' => [
        'send' => [
<<<<<<< HEAD
            'label' => 'Invia Notifica',
            'success' => 'Notifica push inviata con successo',
            'error' => 'Errore durante l\'invio della notifica push',
=======
            'label' => 'Send Notification',
            'success' => 'Push notification sent successfully',
            'error' => 'Error while sending the push notification',
>>>>>>> laraxot/dev
        ],
        'preview' => [
            'label' => 'Anteprima',
        ],
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'sections' => [
        'page' => [
            'title' => 'Push Notification Sending Test',
            'description' => 'Use this form to test sending push notifications to mobile devices through different services.',
        ],
    ],
];
