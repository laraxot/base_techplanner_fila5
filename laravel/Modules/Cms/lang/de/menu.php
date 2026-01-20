<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Menu',
        'plural' => 'Menu',
        'group' => [
            'name' => 'Gestione Menu',
            'description' => 'Gestione dei menu del sito',
        ],
        'label' => 'Menu',
        'sort' => '57',
        'icon' => 'heroicon-o-bars-3',
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
            'placeholder' => 'ID del menu',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Nome del menu',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'slug' => [
            'label' => 'Slug',
            'placeholder' => 'Slug del menu',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'description' => [
            'label' => 'Descrizione',
            'placeholder' => 'Descrizione del menu',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'type' => [
            'label' => 'Tipo',
            'placeholder' => 'Tipo di menu',
            'options' => [
                'main' => 'Principale',
                'footer' => 'Footer',
                'sidebar' => 'Barra laterale',
            ],
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'status' => [
            'label' => 'Stato',
            'placeholder' => 'Stato del menu',
            'options' => [
                'active' => 'Attivo',
                'inactive' => 'Inattivo',
                'draft' => 'Bozza',
            ],
<<<<<<< HEAD
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
        'message' => [
            'label' => 'message',
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
        'applyFilters' => [
            'label' => 'applyFilters',
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
        'reorderRecords' => [
            'label' => 'reorderRecords',
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
        'title' => [
            'label' => 'title',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'message' => [
            'label' => 'message',
        ],
        'openFilters' => [
            'label' => 'openFilters',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
        ],
        'delete' => [
            'label' => 'delete',
        ],
        'title' => [
            'label' => 'title',
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'create' => 'Crea Menu',
        'edit' => 'Modifica Menu',
        'delete' => 'Elimina Menu',
        'sort' => 'Ordina Voci',
        'add_item' => 'Aggiungi Voce',
    ],
    'messages' => [
        'created' => 'Menu creato con successo',
        'updated' => 'Menu aggiornato con successo',
        'deleted' => 'Menu eliminato con successo',
        'sorted' => 'Voci del menu ordinate con successo',
        'item_added' => 'Voce aggiunta con successo',
    ],
    'validation' => [
        'name_required' => 'Der Name ist erforderlich',
        'slug_unique' => 'Lo slug deve essere unico',
        'type_in' => 'Il tipo deve essere uno tra: main, footer, sidebar',
    ],
    'model' => [
        'label' => 'menu.model',
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 4b6b99016 (first commit)
];
