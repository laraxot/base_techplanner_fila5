<?php

declare(strict_types=1);

return [
    'pages' => 'Pagine',
    'widgets' => 'Widgets',
    'navigation' => [
        'name' => 'Importazione',
        'plural' => 'Importazioni',
        'group' => [
            'name' => 'Sistema',
            'description' => 'Gestione delle importazioni di dati',
        ],
        'label' => 'Importazione Dati',
        'sort' => '10',
        'icon' => 'job-import',
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => 'Identificativo unico dell\'importazione',
            'placeholder' => 'ID Importazione',
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
        'file' => [
            'label' => 'File',
            'tooltip' => 'Seleziona il file da importare',
            'placeholder' => 'Scegli un file',
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
        'source' => [
            'label' => 'Sorgente',
            'tooltip' => 'Indica la sorgente del file importato',
            'placeholder' => 'Sorgente del file',
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
        'format' => [
            'label' => 'Formato',
            'tooltip' => 'Formato del file importato (CSV, Excel, etc.)',
            'placeholder' => 'Seleziona formato',
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
        'rows' => [
            'label' => 'Righe',
            'tooltip' => 'Numero totale di righe nel file',
            'placeholder' => 'Numero righe',
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
        'processed' => [
            'label' => 'Righe Processate',
            'tooltip' => 'Numero di righe processate con successo',
            'placeholder' => 'Righe processate',
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
        'failed' => [
            'label' => 'Righe Fallite',
            'tooltip' => 'Numero di righe che hanno causato errore durante l\'importazione',
            'placeholder' => 'Righe fallite',
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
        'started_at' => [
            'label' => 'Iniziato il',
            'tooltip' => 'Data e ora di inizio dell\'importazione',
            'placeholder' => 'Data inizio importazione',
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
        'completed_at' => [
            'label' => 'Completato il',
            'tooltip' => 'Data e ora di completamento dell\'importazione',
            'placeholder' => 'Data completamento importazione',
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
        'options' => [
            'label' => 'Opzioni',
            'tooltip' => 'Impostazioni avanzate per l\'importazione',
            'placeholder' => 'Seleziona le opzioni',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
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
<<<<<<< HEAD
=======
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
    ],
    'formats' => [
        'csv' => 'CSV',
        'excel' => 'Excel',
        'json' => 'JSON',
        'xml' => 'XML',
    ],
    'options' => [
        'headers' => 'Prima riga contiene intestazioni',
        'delimiter' => 'Delimitatore',
        'encoding' => 'Codifica',
        'sheet' => 'Foglio di lavoro',
        'chunk_size' => 'Dimensione chunk',
    ],
    'actions' => [
        'upload' => [
            'label' => 'Carica File',
            'modal' => [
                'heading' => 'Carica un file da importare',
                'description' => 'Seleziona un file dal tuo computer',
            ],
            'messages' => [
                'success' => 'File caricato con successo',
            ],
            'icon' => 'upload',
            'color' => 'primary',
        ],
        'start' => [
            'label' => 'Avvia Importazione',
            'modal' => [
                'heading' => 'Avvia Importazione',
                'description' => 'Avvia il processo di importazione del file selezionato',
            ],
            'messages' => [
                'success' => 'Importazione avviata con successo',
            ],
            'icon' => 'play-circle',
            'color' => 'success',
        ],
        'download_template' => [
            'label' => 'Scarica Template',
            'modal' => [
                'heading' => 'Scarica Template',
                'description' => 'Scarica il template per caricare i dati',
            ],
            'messages' => [
                'success' => 'Template scaricato con successo',
            ],
            'icon' => 'file-download',
            'color' => 'info',
        ],
        'download_failed' => [
            'label' => 'Scarica Righe Fallite',
            'modal' => [
                'heading' => 'Scarica Righe Fallite',
                'description' => 'Scarica un file con tutte le righe che hanno causato errori',
            ],
            'messages' => [
                'success' => 'Righe fallite scaricate con successo',
            ],
            'icon' => 'download-error',
            'color' => 'danger',
        ],
        'import' => [
            'label' => 'Importa',
            'modal' => [
                'heading' => 'Importa Dati',
                'description' => 'Seleziona un file da importare',
            ],
            'messages' => [
                'success' => 'Importazione avviata con successo',
            ],
            'fields' => [
                'import_file' => [
                    'label' => 'Seleziona un file XLS o CSV da caricare',
                    'tooltip' => 'Seleziona il file che desideri importare',
                    'placeholder' => 'Carica un file XLS o CSV',
                ],
            ],
            'icon' => 'import',
            'color' => 'primary',
        ],
        'retry' => [
            'label' => 'Riprova',
            'modal' => [
                'heading' => 'Riprova Importazione',
                'description' => 'Vuoi riprovare l\'importazione delle righe fallite?',
            ],
            'messages' => [
                'success' => 'Importazione riprovata con successo',
            ],
            'icon' => 'redo',
            'color' => 'warning',
        ],
        'delete' => [
            'label' => 'Elimina',
            'modal' => [
                'heading' => 'Elimina Import',
                'description' => 'Sei sicuro di voler eliminare questa importazione?',
            ],
            'messages' => [
                'success' => 'Import eliminato con successo',
            ],
            'icon' => 'trash',
            'color' => 'danger',
        ],
        'download_errors' => [
            'label' => 'Scarica Errori',
            'modal' => [
                'heading' => 'Scarica Log Errori',
                'description' => 'Vuoi scaricare il log degli errori di importazione?',
            ],
            'messages' => [
                'success' => 'Log errori scaricato con successo',
            ],
            'icon' => 'file-text',
            'color' => 'secondary',
        ],
        'export' => [
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
    ],
    'messages' => [
        'no_imports' => 'Nessuna importazione presente',
        'upload_success' => 'File caricato con successo',
        'import_started' => 'Importazione avviata',
        'import_completed' => 'Importazione completata',
        'import_failed' => 'Importazione fallita',
        'file_not_found' => 'File non trovato',
        'invalid_format' => 'Formato non valido',
        'row_error' => 'Errore alla riga :row: :message',
    ],
    'statuses' => [
        'pending' => 'In Attesa',
        'processing' => 'In Elaborazione',
        'completed' => 'Completato',
        'failed' => 'Fallito',
        'partial' => 'Completato Parzialmente',
    ],
    'types' => [
        'csv' => 'CSV',
        'excel' => 'Excel',
        'json' => 'JSON',
        'xml' => 'XML',
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
