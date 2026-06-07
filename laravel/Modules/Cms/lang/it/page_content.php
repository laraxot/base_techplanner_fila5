<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Contenuti Pagina',
        'plural' => 'Contenuti Pagina',
        'group' => [
            'name' => 'Gestione Contenuti',
            'description' => 'Gestione dei contenuti delle pagine del sito',
        ],
        'label' => 'Contenuti Pagina',
        'sort' => 87,
        'icon' => 'heroicon-o-document-text',
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
            'placeholder' => 'ID del contenuto pagina',
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
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Nome del contenuto',
            'helper_text' => 'name',
            'description' => 'name',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'slug' => [
            'label' => 'Slug',
            'placeholder' => 'Slug del contenuto pagina',
            'description' => 'slug',
            'helper_text' => 'slug',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'blocks' => [
            'label' => 'Blocchi',
            'placeholder' => 'Blocchi di contenuto',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'tooltip' => '',
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
<<<<<<< HEAD
=======
        ],
        'created_at' => [
            'label' => 'Data Creazione',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
        'created_by' => [
            'label' => 'Creato da',
            'placeholder' => 'Creato da',
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
        'updated_by' => [
            'label' => 'Aggiornato da',
            'placeholder' => 'Aggiornato da',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'tooltip' => '',
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
        ],
        'openFilters' => [
            'label' => 'openFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'delete' => [
            'label' => 'delete',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'edit' => [
            'label' => 'edit',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'view' => [
            'label' => 'view',
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
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
        ],
        'openFilters' => [
            'label' => 'openFilters',
        ],
        'delete' => [
            'label' => 'delete',
        ],
        'edit' => [
            'label' => 'edit',
        ],
        'view' => [
            'label' => 'view',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
    ],
    'actions' => [
        'view' => 'Visualizza Contenuto',
        'create' => [
            'label' => 'create',
        ],
        'edit' => 'Modifica Contenuto',
        'delete' => 'Elimina Contenuto',
        'activeLocale' => [
            'label' => 'activeLocale',
        ],
    ],
    'messages' => [
        'created' => 'Contenuto creato con successo',
        'updated' => 'Contenuto aggiornato con successo',
        'deleted' => 'Contenuto eliminato con successo',
    ],
    'validation' => [
        'name_required' => 'Il nome è obbligatorio',
        'slug_unique' => 'Lo slug deve essere unico',
        'blocks_required' => 'I blocchi di contenuto sono obbligatori',
    ],
    'model' => [
        'label' => 'page content.model',
    ],
    'sections' => [
        'Content' => [
            'label' => 'Content',
            'heading' => 'Content',
        ],
    ],
<<<<<<< HEAD
<<<<<<< HEAD
    'label' => 'Page Content',
    'plural_label' => 'Page Content (Plurale)',
=======
>>>>>>> 4b6b99016 (first commit)
=======
    'label' => 'Page Content',
    'plural_label' => 'Page Content (Plurale)',
>>>>>>> dev
];
