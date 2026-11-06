<?php

declare(strict_types=1);

// SettingPage del modulo (BaseSettingPage, Xot). Tutte le chiavi che AutoLabelAction legge sono
// scritte qui: senza, il primo render le crea con valori grezzi.
return [
    'navigation' => [
        'label' => 'Impostazioni Notifiche',
        'group' => 'Notifiche',
        'icon' => 'heroicon-o-document-text',
        'sort' => 99,
    ],
<<<<<<< .merge_file_iuiZIQ
    'title' => 'Impostazioni Notifiche',
    'actions' => [
        'save' => [
            'label' => 'Salva',
            'icon' => 'heroicon-o-check',
            'tooltip' => 'Salva',
        ],
        'profile' => [
            'label' => 'Profilo',
            'icon' => 'heroicon-o-user-circle',
            'tooltip' => 'Profilo',
        ],
        'logout' => [
            'label' => 'Esci',
            'icon' => 'heroicon-o-arrow-left-on-rectangle',
            'tooltip' => 'Esci',
=======
<<<<<<< HEAD
    'label' => 'Setting',
    'plural_label' => 'Setting (Plurale)',
    'fields' => [
        'id' => [
            'label' => 'Identificativo',
            'tooltip' => 'Identificativo univoco del record',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> .merge_file_yIjiTt
        ],
    ],
    'fields' => [
        'cleanup_enabled' => [
            'label' => 'Pulizia automatica dei log',
        ],
        'cleanup_older_than_days' => [
            'label' => 'Elimina i log piu vecchi di (giorni)',
        ],
        'cleanup_batch_size' => [
            'label' => 'Dimensione del batch di eliminazione',
        ],
        'cleanup_keep_failed' => [
            'label' => 'Conserva i log degli invii falliti',
        ],
        'fcm_url' => [
            'label' => 'Endpoint FCM',
        ],
    ],
=======
>>>>>>> 6ed19256f (.)
];
