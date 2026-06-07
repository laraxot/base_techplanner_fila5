<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Dashboard Geo',
        'plural' => 'Dashboard Geo',
        'group' => [
            'name' => 'Geo',
            'description' => 'Panoramica delle informazioni geografiche',
        ],
        'label' => 'Dashboard',
        'sort' => 30,
<<<<<<< HEAD
<<<<<<< HEAD
        'icon' => 'ui-dashboard',
=======
        'icon' => 'ui-dashboard', // Aggiornamento dell'icona della dashboard usando la nuova icona dashboard
>>>>>>> 4b6b99016 (first commit)
=======
        'icon' => 'ui-dashboard',
>>>>>>> dev
    ],
    'widgets' => [
        'total_locations' => 'Totale Località',
        'total_places' => 'Totale Luoghi',
        'recent_activity' => 'Attività Recente',
        'popular_places' => 'Luoghi Popolari',
    ],
    'charts' => [
        'locations_by_type' => 'Località per Tipo',
        'places_by_category' => 'Luoghi per Categoria',
        'activity_timeline' => 'Timeline Attività',
    ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    'label' => 'Dashboard',
    'plural_label' => 'Dashboard (Plurale)',
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
            'label' => 'Crea Dashboard',
        ],
        'edit' => [
            'label' => 'Modifica Dashboard',
        ],
        'delete' => [
            'label' => 'Elimina Dashboard',
        ],
    ],
<<<<<<< HEAD
=======
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
];
