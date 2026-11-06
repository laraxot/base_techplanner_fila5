<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Coordinate GPS',
        'group' => 'Gestione Territorio',
        'icon' => 'heroicon-o-map-pin',
        'sort' => '30',
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
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
<<<<<<< .merge_file_D84iMT
    'widget' => [
        'locating' => [
            'label' => 'Standort wird ermittelt...',
        ],
        'heading' => [
            'title' => 'Breiten-/Längengrad',
        ],
        'latitude' => [
            'label' => 'Breite',
        ],
        'longitude' => [
            'label' => 'Länge',
        ],
        'error_code' => [
            'label' => 'Fehlercode',
        ],
        'error_message' => [
            'label' => 'Fehlermeldung',
        ],
    ],
=======
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_HFUplu
];
