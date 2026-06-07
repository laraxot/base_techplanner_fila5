<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Stato Jobs',
        'plural' => 'Stati Jobs',
        'group' => [
            'name' => 'Sistema',
            'description' => 'Monitoraggio dello stato dei jobs',
        ],
        'label' => 'Stato Jobs',
        'sort' => 73,
        'icon' => 'job-status-animated',
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome del job monitorato',
            'placeholder' => 'Inserisci nome del job',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'guard_name' => [
            'label' => 'Guard',
            'tooltip' => 'Guard associato al job',
            'placeholder' => 'Seleziona guard',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'permissions' => [
            'label' => 'Permessi',
            'tooltip' => 'Permessi associati al job',
            'placeholder' => 'Seleziona permessi',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'updated_at' => [
            'label' => 'Aggiornato il',
            'tooltip' => 'Data dell\'ultimo aggiornamento dello stato del job',
            'placeholder' => 'Data di aggiornamento',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'first_name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome dell\'utente che ha creato o gestisce il job',
            'placeholder' => 'Nome responsabile',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'last_name' => [
            'label' => 'Cognome',
            'tooltip' => 'Cognome dell\'utente che ha creato o gestisce il job',
            'placeholder' => 'Cognome responsabile',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
    ],
    'actions' => [
        'start' => [
            'label' => 'Avvia',
            'modal' => [
                'heading' => 'Avvia Job Status',
                'description' => 'Vuoi avviare il monitoraggio per questo job?',
            ],
            'messages' => [
                'success' => 'Monitoraggio avviato con successo',
            ],
            'icon' => 'play',
            'color' => 'primary',
        ],
        'pause' => [
            'label' => 'Pausa',
            'modal' => [
                'heading' => 'Pausa Job Status',
                'description' => 'Vuoi mettere in pausa il monitoraggio di questo job?',
            ],
            'messages' => [
                'success' => 'Monitoraggio messo in pausa con successo',
            ],
            'icon' => 'pause',
            'color' => 'warning',
        ],
        'resume' => [
            'label' => 'Riprendi',
            'modal' => [
                'heading' => 'Riprendi Job Status',
                'description' => 'Vuoi riprendere il monitoraggio di questo job?',
            ],
            'messages' => [
                'success' => 'Monitoraggio ripreso con successo',
            ],
            'icon' => 'redo',
            'color' => 'success',
        ],
        'stop' => [
            'label' => 'Ferma',
            'modal' => [
                'heading' => 'Ferma Job Status',
                'description' => 'Sei sicuro di voler fermare il monitoraggio di questo job?',
            ],
            'messages' => [
                'success' => 'Monitoraggio fermato con successo',
            ],
            'icon' => 'stop',
            'color' => 'danger',
        ],
        'export' => [
            'label' => 'Esporta',
            'modal' => [
                'heading' => 'Esporta Dati Job Status',
                'description' => 'Seleziona il formato per esportare i dati del job',
            ],
            'messages' => [
                'success' => 'Dati esportati con successo',
            ],
            'icon' => 'download',
            'color' => 'info',
        ],
        'label' => 'Stato Jobs',
        'sort' => 73,
        'icon' => 'job-status-animated',
    ],
    'messages' => [
        'no_jobs' => 'Nessun job monitorato al momento',
        'job_started' => 'Monitoraggio del job avviato',
        'job_paused' => 'Monitoraggio del job messo in pausa',
        'job_resumed' => 'Monitoraggio del job ripreso',
        'job_stopped' => 'Monitoraggio del job fermato',
        'job_exported' => 'Dati esportati correttamente',
    ],
    'title' => 'job status',
<<<<<<< HEAD
<<<<<<< HEAD
    'label' => 'Job Status',
    'plural_label' => 'Job Status (Plurale)',
=======
>>>>>>> 4b6b99016 (first commit)
=======
    'label' => 'Job Status',
    'plural_label' => 'Job Status (Plurale)',
>>>>>>> dev
];
