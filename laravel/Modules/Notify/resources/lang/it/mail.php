<?php

declare(strict_types=1);

return [
    'template' => [
        'navigation' => [
            'label' => 'Template Email',
            'plural' => 'Template Email',
            'singular' => 'Template Email',
            'group' => 'Notifiche',
            'icon' => 'heroicon-o-envelope',
        ],
        'fields' => [
            'name' => [
                'label' => 'Nome',
                'placeholder' => 'Inserisci il nome del template',
                'tooltip' => 'Nome identificativo del template',
            ],
            'code' => [
                'label' => 'Codice',
                'placeholder' => 'Inserisci il codice del template',
                'tooltip' => 'Codice univoco del template',
            ],
            'description' => [
                'label' => 'Descrizione',
                'placeholder' => 'Inserisci una descrizione',
                'tooltip' => 'Descrizione dettagliata del template',
            ],
            'subject' => [
                'label' => 'Oggetto',
                'placeholder' => 'Inserisci l\'oggetto dell\'email',
                'tooltip' => 'Oggetto dell\'email',
            ],
            'body_html' => [
                'label' => 'Corpo HTML',
                'placeholder' => 'Inserisci il contenuto HTML',
                'tooltip' => 'Contenuto HTML dell\'email',
            ],
            'body_text' => [
                'label' => 'Corpo Testo',
                'placeholder' => 'Inserisci il contenuto testuale',
                'tooltip' => 'Contenuto testuale dell\'email',
            ],
            'channels' => [
                'label' => 'Canali',
                'placeholder' => 'Seleziona i canali',
                'tooltip' => 'Canali di invio disponibili',
                'options' => [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
                    'email' => [
                        'label' => 'Email',
                    ],
                    'sms' => [
                        'label' => 'SMS',
                    ],
                    'push' => [
                        'label' => 'Push Notification',
                    ],
                    'whatsapp' => [
                        'label' => 'WhatsApp',
                    ],
                    'telegram' => [
                        'label' => 'Telegram',
                    ],
<<<<<<< HEAD
=======
                    'email' => ['label' => 'Email'],
                    'sms' => ['label' => 'SMS'],
                    'push' => ['label' => 'Push Notification'],
                    'whatsapp' => ['label' => 'WhatsApp'],
                    'telegram' => ['label' => 'Telegram'],
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
                ],
            ],
            'variables' => [
                'label' => 'Variabili',
                'placeholder' => 'Aggiungi variabili',
                'tooltip' => 'Variabili disponibili nel template',
            ],
            'conditions' => [
                'label' => 'Condizioni',
                'placeholder' => 'Aggiungi condizioni',
                'tooltip' => 'Condizioni di invio',
            ],
            'preview_data' => [
                'label' => 'Dati Anteprima',
                'placeholder' => 'Aggiungi dati per l\'anteprima',
                'tooltip' => 'Dati per testare il template',
            ],
            'category' => [
                'label' => 'Categoria',
                'placeholder' => 'Inserisci la categoria',
                'tooltip' => 'Categoria del template',
            ],
            'is_active' => [
                'label' => 'Attivo',
                'tooltip' => 'Stato di attivazione del template',
            ],
        ],
        'filters' => [
            'category' => [
                'label' => 'Categoria',
                'options' => [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
                    'welcome' => [
                        'label' => 'Benvenuto',
                    ],
                    'reminder' => [
                        'label' => 'Promemoria',
                    ],
                    'notification' => [
                        'label' => 'Notifica',
                    ],
<<<<<<< HEAD
=======
                    'welcome' => ['label' => 'Benvenuto'],
                    'reminder' => ['label' => 'Promemoria'],
                    'notification' => ['label' => 'Notifica'],
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
                ],
            ],
            'is_active' => [
                'label' => 'Stato',
                'options' => [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
                    'active' => [
                        'label' => 'Attivo',
                    ],
                    'inactive' => [
                        'label' => 'Inattivo',
                    ],
<<<<<<< HEAD
=======
                    'active' => ['label' => 'Attivo'],
                    'inactive' => ['label' => 'Inattivo'],
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
                ],
            ],
        ],
        'actions' => [
            'edit' => [
                'label' => 'Modifica',
                'icon' => 'heroicon-o-pencil',
                'color' => 'primary',
            ],
            'delete' => [
                'label' => 'Elimina',
                'icon' => 'heroicon-o-trash',
                'color' => 'danger',
            ],
            'preview' => [
                'label' => 'Anteprima',
                'icon' => 'heroicon-o-eye',
                'color' => 'success',
            ],
        ],
        'preview' => [
            'title' => 'Anteprima Template',
            'subject' => 'Oggetto',
            'body_html' => 'Contenuto HTML',
            'body_text' => 'Contenuto Testuale',
            'variables' => 'Variabili',
            'actions' => [
                'back' => [
                    'label' => 'Torna indietro',
                    'icon' => 'heroicon-o-arrow-left',
                    'color' => 'secondary',
                ],
            ],
        ],
    ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
    'actions' => [
    ],
<<<<<<< HEAD
=======
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
];
