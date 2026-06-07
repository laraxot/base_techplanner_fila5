<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Attività',
        'plural' => 'Attività',
        'group' => [
            'name' => 'Monitoraggio',
            'description' => 'Gestione delle attività di sistema',
        ],
        'label' => 'Attività',
        'sort' => 60,
        'icon' => 'activity-animated',
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
            'help' => 'Identificativo unico dell\'attività',
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
        'log_name' => [
            'label' => 'Nome Log',
            'help' => 'Nome del log di attività',
            'placeholder' => 'log_name',
            'helper_text' => 'log_name',
            'description' => 'log_name',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'description' => [
            'label' => 'Descrizione',
            'help' => 'Descrizione dell\'attività',
            'placeholder' => 'description',
            'helper_text' => 'description',
            'description' => 'description',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'subject_type' => [
            'label' => 'Tipo Soggetto',
            'help' => 'Tipo di entità coinvolta',
            'placeholder' => 'subject_type',
            'helper_text' => 'subject_type',
            'description' => 'subject_type',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'subject_id' => [
            'label' => 'ID Soggetto',
            'help' => 'Identificativo dell\'entità coinvolta',
            'placeholder' => 'subject_id',
            'helper_text' => 'subject_id',
            'description' => 'subject_id',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'causer_type' => [
            'label' => 'Tipo Causatore',
            'help' => 'Tipo di entità che ha causato l\'attività',
            'placeholder' => 'causer_type',
            'helper_text' => 'causer_type',
            'description' => 'causer_type',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'causer_id' => [
            'label' => 'ID Causatore',
            'help' => 'Identificativo dell\'entità che ha causato l\'attività',
            'placeholder' => 'causer_id',
            'helper_text' => 'causer_id',
            'description' => 'causer_id',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'properties' => [
            'label' => 'Proprietà',
            'help' => 'Proprietà aggiuntive dell\'attività',
            'placeholder' => 'properties',
            'helper_text' => 'properties',
            'description' => 'properties',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'batch_uuid' => [
            'label' => 'Batch UUID',
            'help' => 'Identificativo del batch di attività',
            'placeholder' => 'batch_uuid',
            'helper_text' => 'batch_uuid',
            'description' => 'batch_uuid',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'help' => 'Data e ora di creazione dell\'attività',
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
        'updated_at' => [
            'label' => 'Data Aggiornamento',
            'help' => 'Data e ora di aggiornamento dell\'attività',
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
    ],
    'actions' => [
        'view' => [
            'label' => 'Visualizza',
            'tooltip' => 'Visualizza dettagli attività',
        ],
        'restore' => [
            'label' => 'Ripristina',
            'tooltip' => 'Ripristina stato precedente',
        ],
    ],
    'messages' => [
        'no_activities' => 'Nessuna attività trovata',
        'activity_restored' => 'Attività ripristinata con successo',
    ],
<<<<<<< HEAD
<<<<<<< HEAD
    'label' => 'Activity',
    'plural_label' => 'Activity (Plurale)',
=======
>>>>>>> 4b6b99016 (first commit)
=======
    'label' => 'Activity',
    'plural_label' => 'Activity (Plurale)',
>>>>>>> dev
];
