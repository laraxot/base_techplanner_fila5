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
        'sort' => '34',
        'icon' => 'ui-settings',
    ],
    'fields' => [
<<<<<<< HEAD
        'default_map_provider' => [
            'label' => 'Provider Mappa Predefinito',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
=======
        'default_map_provider' => 'Provider Mappa Predefinito',
>>>>>>> 4b6b99016 (first commit)
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
>>>>>>> 4b6b99016 (first commit)
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
>>>>>>> 4b6b99016 (first commit)
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
>>>>>>> 4b6b99016 (first commit)
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
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'actions' => [
    ],
=======
>>>>>>> 4b6b99016 (first commit)
];
