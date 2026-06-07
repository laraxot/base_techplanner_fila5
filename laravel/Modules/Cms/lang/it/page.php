<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Pagine',
        'plural' => 'Pagine',
        'group' => [
            'name' => 'Gestione Contenuti',
            'description' => 'Gestione delle pagine del sito',
        ],
        'label' => 'Pagine',
        'sort' => 5,
        'icon' => 'heroicon-o-document',
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
            'placeholder' => 'ID della pagina',
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
        'title' => [
            'label' => 'Titolo',
            'placeholder' => 'Titolo della pagina',
            'helper_text' => 'title',
            'description' => 'title',
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
            'placeholder' => 'Slug della pagina',
            'helper_text' => 'slug',
            'description' => 'slug',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'content' => [
            'label' => 'Contenuto',
            'placeholder' => 'Contenuto della pagina',
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
        'meta_title' => [
            'label' => 'Meta Titolo',
            'placeholder' => 'Meta titolo per SEO',
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
        'meta_description' => [
            'label' => 'Meta Descrizione',
            'placeholder' => 'Meta descrizione per SEO',
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
        'status' => [
            'label' => 'Stato',
            'placeholder' => 'Stato della pagina',
            'options' => [
                'published' => 'Pubblicata',
                'draft' => 'Bozza',
                'scheduled' => 'Programmata',
                'archived' => 'Archiviata',
            ],
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
        'layout' => [
            'label' => 'Layout',
            'placeholder' => 'Layout della pagina',
            'options' => [
                'default' => 'Predefinito',
                'full-width' => 'Larghezza piena',
                'sidebar' => 'Con barra laterale',
            ],
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
        'parent_id' => [
            'label' => 'Pagina Genitore',
            'placeholder' => 'Seleziona la pagina genitore',
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
        'order' => [
            'label' => 'Ordine',
            'placeholder' => 'Ordine di visualizzazione',
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
        'lang' => [
            'label' => 'Lingua',
            'placeholder' => 'Seleziona la lingua della pagina',
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
            'label' => 'Ultima Modifica',
            'placeholder' => 'Data e ora ultima modifica',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'label' => 'Attiva/Disattiva Colonne',
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
        ],
        'create' => [
            'label' => 'create',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'message' => [
            'label' => 'message',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'footer_blocks' => [
            'label' => 'footer_blocks',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'caption' => [
            'label' => 'caption',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
<<<<<<< HEAD
=======
        ],
        'toggleColumns' => [
            'label' => 'Attiva/Disattiva Colonne',
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
        ],
        'create' => [
            'label' => 'create',
        ],
        'message' => [
            'label' => 'message',
        ],
        'footer_blocks' => [
            'label' => 'footer_blocks',
        ],
        'caption' => [
            'label' => 'caption',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Pagina',
        ],
        'edit' => 'Modifica Pagina',
        'delete' => 'Elimina Pagina',
        'publish' => 'Pubblica',
        'unpublish' => 'Ritira',
        'archive' => 'Archivia',
        'restore' => 'Ripristina',
        'preview' => 'Anteprima',
        'activeLocale' => [
            'label' => 'activeLocale',
        ],
    ],
    'messages' => [
        'created' => 'Pagina creata con successo',
        'updated' => 'Pagina aggiornata con successo',
        'deleted' => 'Pagina eliminata con successo',
        'published' => 'Pagina pubblicata con successo',
        'unpublished' => 'Pagina ritirata con successo',
        'archived' => 'Pagina archiviata con successo',
        'restored' => 'Pagina ripristinata con successo',
    ],
    'validation' => [
        'title_required' => 'Il titolo è obbligatorio',
        'slug_unique' => 'Lo slug deve essere unico',
        'content_required' => 'Il contenuto è obbligatorio',
    ],
    'model' => [
        'label' => 'page.model',
    ],
    'sections' => [
        'Content' => [
            'label' => 'Content',
            'heading' => 'Content',
        ],
        'Sidebar' => [
            'label' => 'Sidebar',
            'heading' => 'Sidebar',
        ],
        'Footer' => [
            'label' => 'Footer',
            'heading' => 'Footer',
        ],
    ],
<<<<<<< HEAD
<<<<<<< HEAD
    'label' => 'Page',
    'plural_label' => 'Page (Plurale)',
=======
>>>>>>> 4b6b99016 (first commit)
=======
    'label' => 'Page',
    'plural_label' => 'Page (Plurale)',
>>>>>>> dev
];
