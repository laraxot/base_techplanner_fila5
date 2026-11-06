<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Coordinate GPS',
        'group' => 'Gestione Territorio',
        'icon' => 'heroicon-o-map-pin',
        'sort' => 30,
    ],
    'fields' => [
<<<<<<< HEAD
        'latitude' => [
            'label' => 'Latitudine',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'longitude' => [
            'label' => 'Longitudine',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
=======
        'latitude' => 'Latitudine',
        'longitude' => 'Longitudine',
>>>>>>> 6ed19256f (.)
    ],
    'actions' => [
        'select_position' => 'Seleziona Posizione',
        'update_coordinates' => 'Aggiorna Coordinate',
    ],
    'messages' => [
        'coordinates_updated' => 'Coordinate aggiornate con successo',
        'invalid_coordinates' => 'Coordinate non valide',
    ],
<<<<<<< HEAD
    'label' => 'Lat Lng',
    'plural_label' => 'Lat Lng (Plurale)',
<<<<<<< .merge_file_p1OewO
    'widget' => [
        'locating' => [
            'label' => 'Recupero posizione...',
        ],
        'heading' => [
            'title' => 'Lat-lng',
        ],
        'latitude' => [
            'label' => 'lat',
        ],
        'longitude' => [
            'label' => 'lng',
        ],
        'error_code' => [
            'label' => 'err_code',
        ],
        'error_message' => [
            'label' => 'err_message',
        ],
    ],
=======
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_DpoD6i
];
