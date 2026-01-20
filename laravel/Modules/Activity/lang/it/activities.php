<?php

declare(strict_types=1);

return [
    'breadcrumb' => 'Cronologia',
<<<<<<< HEAD
    'title' => 'Cronologia :record',
    'default_datetime_format' => 'd/m/Y, H:i:s',
=======

    'title' => 'Cronologia :record',

    'default_datetime_format' => 'd/m/Y, H:i:s',

>>>>>>> 4b6b99016 (first commit)
    'table' => [
        'field' => 'Campo',
        'old' => 'Vecchio',
        'new' => 'Nuovo',
        'restore' => 'Ripristina',
    ],
<<<<<<< HEAD
=======

>>>>>>> 4b6b99016 (first commit)
    'events' => [
        'updated' => 'Aggiornato',
        'created' => 'Creato',
        'deleted' => 'Eliminato',
        'restored' => 'Ripristinato',
        'restore_successful' => 'Ripristinato con successo',
        'restore_failed' => 'Ripristino fallito',
    ],
<<<<<<< HEAD
=======

>>>>>>> 4b6b99016 (first commit)
    'subject' => [
        'type' => 'Tipo',
        'id' => 'ID',
        'unknown' => 'Sconosciuto',
    ],
<<<<<<< HEAD
=======

>>>>>>> 4b6b99016 (first commit)
    'metadata' => [
        'log_name' => 'Log',
        'batch_uuid' => 'Batch UUID',
        'properties' => 'Proprietà',
    ],
<<<<<<< HEAD
    'no_changes' => 'Nessuna modifica registrata',
    'no_description' => 'Nessuna descrizione disponibile',
    'modified' => 'Modificato',
    'fields_modified' => ':count campo modificato|:count campi modificati',
    'anonymous' => 'Utente Anonimo',
    'label' => 'Activities',
    'plural_label' => 'Activities (Plurale)',
    'navigation' => [
        'name' => 'Activities',
        'plural' => 'Activities',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Activities',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
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
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Activities',
        ],
        'edit' => [
            'label' => 'Modifica Activities',
        ],
        'delete' => [
            'label' => 'Elimina Activities',
        ],
    ],
=======

    'no_changes' => 'Nessuna modifica registrata',
    'no_description' => 'Nessuna descrizione disponibile',

    'modified' => 'Modificato',
    'fields_modified' => ':count campo modificato|:count campi modificati',
    'anonymous' => 'Utente Anonimo',
>>>>>>> 4b6b99016 (first commit)
];
