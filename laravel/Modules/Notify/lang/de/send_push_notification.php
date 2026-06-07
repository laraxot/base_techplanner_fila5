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
        'sort' => '51',
    ],
    'fields' => [
        'device_token' => [
            'label' => 'Token Dispositivo',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'type' => [
            'label' => 'Tipo',
            'options' => [
                'notification' => 'Notifica',
                'data' => 'Dati',
                'both' => 'Entrambi',
            ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
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
<<<<<<< HEAD
=======
        ],
        'title' => [
            'label' => 'Titolo',
        ],
        'body' => [
            'label' => 'Contenuto',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
        'data' => [
            'label' => 'Dati Aggiuntivi',
            'description' => 'Dati in formato JSON da inviare con la notifica',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
>>>>>>> dev
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
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 4b6b99016 (first commit)
=======
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
>>>>>>> dev
];
