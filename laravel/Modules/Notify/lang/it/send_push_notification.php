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
>>>>>>> 6ed19256f (.)
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
            'placeholder' => 'type',
        ],
        'title' => [
            'label' => 'Titolo',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
            'placeholder' => 'title',
        ],
        'body' => [
            'label' => 'Contenuto',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
<<<<<<< .merge_file_sksAtq
            'placeholder' => 'body',
=======
=======
        ],
        'title' => [
            'label' => 'Titolo',
        ],
        'body' => [
            'label' => 'Contenuto',
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_ZuhVQy
        ],
        'data' => [
            'label' => 'Dati Aggiuntivi',
            'description' => 'Dati in formato JSON da inviare con la notifica',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< .merge_file_sksAtq
            'placeholder' => 'data',
        ],
        'deviceToken' => [
            'label' => 'deviceToken',
            'placeholder' => 'deviceToken',
            'helper_text' => 'deviceToken',
            'description' => 'deviceToken',
        ],
        'name' => [
            'label' => 'name',
            'placeholder' => 'name',
            'helper_text' => 'name',
            'description' => 'name',
        ],
        'value' => [
            'label' => 'value',
            'placeholder' => 'value',
            'helper_text' => '',
            'description' => 'value',
=======
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_ZuhVQy
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
        'save' => [
            'label' => 'save',
            'icon' => 'save',
            'tooltip' => 'save',
        ],
        'notificationFormActions' => [
            'label' => 'notificationFormActions',
            'icon' => 'notificationFormActions',
            'tooltip' => 'notificationFormActions',
        ],
        'add' => [
            'label' => 'add',
            'icon' => 'add',
            'tooltip' => 'add',
        ],
        'addBetween' => [
            'label' => 'addBetween',
            'icon' => 'addBetween',
            'tooltip' => 'addBetween',
        ],
        'clone' => [
            'label' => 'clone',
            'icon' => 'clone',
            'tooltip' => 'clone',
        ],
        'collapse' => [
            'label' => 'collapse',
            'icon' => 'collapse',
            'tooltip' => 'collapse',
        ],
        'collapseAll' => [
            'label' => 'collapseAll',
            'icon' => 'collapseAll',
            'tooltip' => 'collapseAll',
        ],
        'delete' => [
            'label' => 'delete',
            'icon' => 'delete',
            'tooltip' => 'delete',
        ],
        'expand' => [
            'label' => 'expand',
            'icon' => 'expand',
            'tooltip' => 'expand',
        ],
        'expandAll' => [
            'label' => 'expandAll',
            'icon' => 'expandAll',
            'tooltip' => 'expandAll',
        ],
        'moveDown' => [
            'label' => 'moveDown',
            'icon' => 'moveDown',
            'tooltip' => 'moveDown',
        ],
        'moveUp' => [
            'label' => 'moveUp',
            'icon' => 'moveUp',
            'tooltip' => 'moveUp',
        ],
        'reorder' => [
            'label' => 'reorder',
            'icon' => 'reorder',
            'tooltip' => 'reorder',
        ],
        'profile' => [
            'label' => 'profile',
            'icon' => 'profile',
            'tooltip' => 'profile',
        ],
        'logout' => [
            'label' => 'logout',
            'icon' => 'logout',
            'tooltip' => 'logout',
        ],
    ],
<<<<<<< HEAD
    'label' => 'Send Push Notification',
    'plural_label' => 'Send Push Notification (Plurale)',
<<<<<<< .merge_file_sksAtq
    'sections' => [
        'page' => [
            'title' => 'Test Invio Notifiche Push',
            'description' => 'Utilizza questo form per testare l\'invio di notifiche push ai dispositivi mobili tramite diversi servizi.',
        ],
    ],
=======
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_ZuhVQy
];
