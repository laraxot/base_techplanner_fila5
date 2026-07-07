<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Esportazione',
        'plural' => 'Esportazioni',
        'group' => [
            'name' => 'Sistema',
            'description' => 'Gestione delle esportazioni di dati',
        ],
        'label' => 'Esportazione Dati',
        'sort' => '97',
        'icon' => 'job-export',
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'tooltip' => 'Inserisci il nome dell\'esportazione',
            'placeholder' => 'Esporta i tuoi dati',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'format' => [
            'label' => 'Formato',
            'tooltip' => 'Scegli il formato di esportazione (CSV, Excel, etc.)',
            'placeholder' => 'Seleziona formato',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'filters' => [
            'label' => 'Filtri',
            'tooltip' => 'Applica filtri per selezionare i dati da esportare',
            'placeholder' => 'Filtra i dati',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'columns' => [
            'label' => 'Colonne',
            'tooltip' => 'Seleziona le colonne da includere nell\'esportazione',
            'placeholder' => 'Seleziona colonne',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'total_records' => [
            'label' => 'Totale Record',
            'tooltip' => 'Numero totale di record da esportare',
            'placeholder' => 'Totale',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'status' => [
            'label' => 'Stato',
            'tooltip' => 'Stato dell\'esportazione',
            'placeholder' => 'Stato in corso',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'created_at' => [
            'label' => 'Creato il',
            'tooltip' => 'Data di creazione dell\'esportazione',
            'placeholder' => 'Data di creazione',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'completed_at' => [
            'label' => 'Completato il',
            'tooltip' => 'Data di completamento dell\'esportazione',
            'placeholder' => 'Data di completamento',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'download_url' => [
            'label' => 'URL Download',
            'tooltip' => 'URL per scaricare il file esportato',
            'placeholder' => 'URL del file',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'source' => [
            'label' => 'Sorgente',
            'tooltip' => 'Origine dei dati per l\'esportazione',
            'placeholder' => 'Seleziona la sorgente',
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
>>>>>>> 6ed19256f (.)
        ],
    ],
    'formats' => [
        'csv' => 'CSV',
        'excel' => 'Excel',
        'json' => 'JSON',
        'xml' => 'XML',
        'pdf' => 'PDF',
        'standard' => 'Standard',
        'extended' => 'Esteso',
        'minimal' => 'Minimo',
        'custom' => 'Personalizzato',
    ],
    'options' => [
        'include_headers' => 'Includi intestazioni',
        'delimiter' => 'Delimitatore',
        'encoding' => 'Codifica',
        'worksheet_name' => 'Nome foglio di lavoro',
        'chunk_size' => 'Dimensione chunk',
    ],
    'actions' => [
        'create' => [
            'label' => 'Nuova Esportazione',
            'icon' => 'plus',
            'color' => 'success',
            'tooltip' => 'Crea una nuova esportazione di dati',
        ],
        'download' => [
            'label' => 'Scarica',
            'icon' => 'download',
            'color' => 'primary',
            'tooltip' => 'Scarica il file esportato',
        ],
        'cancel' => [
            'label' => 'Annulla',
            'icon' => 'times',
            'color' => 'danger',
            'tooltip' => 'Annulla l\'operazione corrente',
        ],
        'delete' => [
            'label' => 'Elimina',
            'icon' => 'trash',
            'color' => 'danger',
            'tooltip' => 'Elimina l\'esportazione selezionata',
        ],
    ],
    'messages' => [
        'export_queued' => 'Esportazione in coda',
        'export_processing' => 'Esportazione in corso',
        'export_completed' => 'Esportazione completata',
        'export_failed' => 'Esportazione fallita',
        'export_started' => 'Esportazione avviata',
        'no_exports' => 'Nessuna esportazione presente',
        'file_not_found' => 'File non trovato',
        'invalid_format' => 'Formato non valido',
    ],
    'statuses' => [
        'pending' => 'In Attesa',
        'processing' => 'In Elaborazione',
        'completed' => 'Completato',
        'failed' => 'Fallito',
        'downloaded' => 'Scaricato',
    ],
    'types' => [
        'csv' => 'CSV',
        'excel' => 'Excel',
        'json' => 'JSON',
        'xml' => 'XML',
        'pdf' => 'PDF',
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 6ed19256f (.)
];
