<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Impostazioni Geo',
        'plural' => 'Impostazioni Geo',
        'group' => [
            'name' => 'Geo',
            'description' => 'Configurazione del modulo geografico',
        ],
        'label' => 'Impostazioni',
        'sort' => 34,
<<<<<<< HEAD
        'icon' => 'ui-settings',
    ],
    'fields' => [
        'default_map_provider' => [
            'label' => 'Provider Mappa Predefinito',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
=======
        'icon' => 'ui-settings', // Aggiornamento dell'icona delle impostazioni
    ],
    'fields' => [
        'default_map_provider' => 'Provider Mappa Predefinito',
>>>>>>> 6ed19256f (.)
        'api_keys' => [
            'google_maps' => 'API Key Google Maps',
            'mapbox' => 'API Key Mapbox',
            'here' => 'API Key HERE Maps',
<<<<<<< HEAD
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'default_location' => [
            'lat' => 'Latitudine Predefinita',
            'lng' => 'Longitudine Predefinita',
            'zoom' => 'Zoom Predefinito',
<<<<<<< HEAD
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'display_options' => [
            'units' => 'Unità di Misura',
            'language' => 'Lingua Mappe',
            'theme' => 'Tema Mappe',
<<<<<<< HEAD
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
    'providers' => [
        'google' => 'Google Maps',
        'mapbox' => 'Mapbox',
        'here' => 'HERE Maps',
        'osm' => 'OpenStreetMap',
    ],
    'units' => [
        'metric' => 'Metrico',
        'imperial' => 'Imperiale',
    ],
<<<<<<< HEAD
    'label' => 'Setting',
    'plural_label' => 'Setting (Plurale)',
    'actions' => [
        'create' => [
            'label' => 'Crea Setting',
        ],
        'edit' => [
            'label' => 'Modifica Setting',
        ],
        'delete' => [
            'label' => 'Elimina Setting',
        ],
    ],
=======
>>>>>>> 6ed19256f (.)
];
