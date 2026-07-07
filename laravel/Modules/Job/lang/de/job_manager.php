<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Gestione Jobs',
        'plural' => 'Gestione Jobs',
        'group' => [
            'name' => 'Sistema',
            'description' => 'Gestione centralizzata di tutti i jobs',
        ],
        'label' => 'Job Manager',
        'sort' => '1',
        'icon' => 'job-manager-animated',
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => 'Identificativo unico del Job Manager',
            'placeholder' => 'ID del Manager',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome del Job Manager',
            'placeholder' => 'Inserisci nome',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'description' => [
            'label' => 'Descrizione',
            'tooltip' => 'Breve descrizione del job manager',
            'placeholder' => 'Descrizione del Job Manager',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'status' => [
            'label' => 'Stato',
            'tooltip' => 'Stato corrente del Job Manager',
            'placeholder' => 'Seleziona stato',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'type' => [
            'label' => 'Tipo',
            'tooltip' => 'Tipo di Job Manager',
            'placeholder' => 'Seleziona tipo',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'priority' => [
            'label' => 'Priorità',
            'tooltip' => 'Priorità di esecuzione del job manager',
            'placeholder' => 'Seleziona priorità',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'max_attempts' => [
            'label' => 'Tentativi Massimi',
            'tooltip' => 'Numero massimo di tentativi per eseguire il job manager',
            'placeholder' => 'Tentativi massimi',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'timeout' => [
            'label' => 'Timeout',
            'tooltip' => 'Tempo massimo per l\'esecuzione del job manager',
            'placeholder' => 'Timeout',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'created_at' => [
            'label' => 'Creato il',
            'tooltip' => 'Data di creazione del Job Manager',
            'placeholder' => 'Data di creazione',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'updated_at' => [
            'label' => 'Aggiornato il',
            'tooltip' => 'Data dell\'ultimo aggiornamento',
            'placeholder' => 'Data aggiornamento',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'last_run' => [
            'label' => 'Ultima Esecuzione',
            'tooltip' => 'Data e ora dell\'ultima esecuzione',
            'placeholder' => 'Ultima esecuzione',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'next_run' => [
            'label' => 'Prossima Esecuzione',
            'tooltip' => 'Data e ora della prossima esecuzione',
            'placeholder' => 'Prossima esecuzione',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'cron_expression' => [
            'label' => 'Espressione Cron',
            'tooltip' => 'Espressione cron per la pianificazione del job',
            'placeholder' => 'Inserisci espressione cron',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'output' => [
            'label' => 'Output',
            'tooltip' => 'Output dell\'esecuzione del job',
            'placeholder' => 'Output',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'error' => [
            'label' => 'Errore',
            'tooltip' => 'Messaggio di errore se il job fallisce',
            'placeholder' => 'Errore',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'guard_name' => [
            'label' => 'Guard',
            'tooltip' => 'Guard a cui è associato il Job Manager',
            'placeholder' => 'Seleziona Guard',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'permissions' => [
            'label' => 'Permessi',
            'tooltip' => 'Permessi associati al Job Manager',
            'placeholder' => 'Seleziona permessi',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'first_name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome dell\'utente associato',
            'placeholder' => 'Inserisci nome',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'last_name' => [
            'label' => 'Cognome',
            'tooltip' => 'Cognome dell\'utente associato',
            'placeholder' => 'Inserisci cognome',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'import' => [
            'label' => 'Importa',
            'modal' => [
                'heading' => 'Importa Job Manager',
                'description' => 'Seleziona un file XLS o CSV da caricare per importare il Job Manager',
            ],
            'messages' => [
                'success' => 'Importazione del Job Manager avviata con successo',
            ],
            'icon' => 'upload',
            'color' => 'primary',
        ],
        'export' => [
            'label' => 'Esporta',
            'modal' => [
                'heading' => 'Esporta Job Manager',
                'description' => 'Esporta i dati del Job Manager in un file',
            ],
            'messages' => [
                'success' => 'Job Manager esportato con successo',
            ],
            'icon' => 'download',
            'color' => 'success',
        ],
        'run' => [
            'label' => 'Esegui',
            'modal' => [
                'heading' => 'Esegui Job Manager',
                'description' => 'Vuoi eseguire questo Job Manager?',
            ],
            'messages' => [
                'success' => 'Job Manager avviato con successo',
            ],
            'icon' => 'play',
            'color' => 'primary',
        ],
        'pause' => [
            'label' => 'Pausa',
            'modal' => [
                'heading' => 'Metti in Pausa',
                'description' => 'Vuoi mettere in pausa questo Job Manager?',
            ],
            'messages' => [
                'success' => 'Job Manager messo in pausa con successo',
            ],
            'icon' => 'pause',
            'color' => 'warning',
        ],
        'resume' => [
            'label' => 'Riprendi',
            'modal' => [
                'heading' => 'Riprendi Esecuzione',
                'description' => 'Vuoi riprendere l\'esecuzione di questo Job Manager?',
            ],
            'messages' => [
                'success' => 'Job Manager ripreso con successo',
            ],
            'icon' => 'redo',
            'color' => 'success',
        ],
        'delete' => [
            'label' => 'Elimina',
            'modal' => [
                'heading' => 'Elimina Job Manager',
                'description' => 'Sei sicuro di voler eliminare questo Job Manager?',
            ],
            'messages' => [
                'success' => 'Job Manager eliminato con successo',
            ],
            'icon' => 'trash',
            'color' => 'danger',
        ],
    ],
    'messages' => [
        'no_jobs' => 'Nessun Job Manager presente',
        'manager_started' => 'Job Manager avviato',
        'manager_paused' => 'Job Manager in pausa',
        'manager_resumed' => 'Job Manager ripreso',
        'manager_completed' => 'Job Manager completato',
        'manager_failed' => 'Job Manager fallito',
    ],
    'statuses' => [
        'active' => 'Attivo',
        'paused' => 'In Pausa',
        'completed' => 'Completato',
        'failed' => 'Fallito',
    ],
    'types' => [
        'scheduler' => 'Schedulatore',
        'queue' => 'Coda',
        'worker' => 'Worker',
        'monitor' => 'Monitor',
    ],
    'priorities' => [
        'low' => 'Bassa',
        'normal' => 'Normale',
        'high' => 'Alta',
        'urgent' => 'Urgente',
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 6ed19256f (.)
];
