<?php

declare(strict_types=1);

return [
    'fields' => [
        'latitude' => [
            'label' => 'Latitudine',
            'placeholder' => 'Inserisci la latitudine',
            'help' => 'Coordinate geografiche - latitudine',
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
        'longitude' => [
            'label' => 'Longitudine',
            'placeholder' => 'Inserisci la longitudine',
            'help' => 'Coordinate geografiche - longitudine',
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
        'altitude' => [
            'label' => 'Altitudine',
            'placeholder' => 'Inserisci l\'altitudine',
            'help' => 'Altitudine sopra il livello del mare',
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
        'accuracy' => [
            'label' => 'Precisione',
            'placeholder' => 'Seleziona la precisione',
            'help' => 'Livello di precisione delle coordinate',
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
        'coordinate_system' => [
            'label' => 'Sistema di coordinate',
            'placeholder' => 'Seleziona il sistema',
            'help' => 'Sistema di coordinate utilizzato',
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
        'datum' => [
            'label' => 'Datum',
            'placeholder' => 'Seleziona il datum',
            'help' => 'Datum geodetico di riferimento',
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
        'zone' => [
            'label' => 'Zona',
            'placeholder' => 'Inserisci la zona',
            'help' => 'Zona UTM o altro sistema',
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
        'easting' => [
            'label' => 'Est',
            'placeholder' => 'Inserisci la coordinata est',
            'help' => 'Coordinata est nel sistema UTM',
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
        'northing' => [
            'label' => 'Nord',
            'placeholder' => 'Inserisci la coordinata nord',
            'help' => 'Coordinata nord nel sistema UTM',
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
    ],
    'validation' => [
        'latitude_required' => 'La latitudine è obbligatoria',
        'longitude_required' => 'La longitudine è obbligatoria',
        'latitude_range' => 'La latitudine deve essere tra -90 e 90',
        'longitude_range' => 'La longitudine deve essere tra -180 e 180',
        'altitude_range' => 'L\'altitudine deve essere tra -10000 e 10000',
        'coordinates_invalid' => 'Le coordinate geografiche non sono valide',
    ],
    'messages' => [
        'coordinates_created' => 'Coordinate create con successo',
        'coordinates_updated' => 'Coordinate aggiornate con successo',
        'coordinates_deleted' => 'Coordinate eliminate con successo',
        'coordinates_converted' => 'Coordinate convertite con successo',
        'coordinates_validated' => 'Coordinate validate con successo',
        'format_changed' => 'Formato delle coordinate cambiato con successo',
    ],
    'coordinate_systems' => [
        'wgs84' => 'WGS84',
        'nad83' => 'NAD83',
        'etrs89' => 'ETRS89',
        'osgb36' => 'OSGB36',
        'custom' => 'Personalizzato',
    ],
    'accuracy_levels' => [
        'exact' => 'Esatto',
        'high' => 'Alto',
        'medium' => 'Medio',
        'low' => 'Basso',
        'approximate' => 'Approssimativo',
    ],
    'units' => [
        'degrees' => 'Gradi',
        'decimal_degrees' => 'Gradi decimali',
        'dms' => 'Gradi, minuti, secondi',
        'meters' => 'Metri',
        'feet' => 'Piedi',
        'nautical_miles' => 'Miglia nautiche',
    ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    'label' => 'Coordinates',
    'plural_label' => 'Coordinates (Plurale)',
    'navigation' => [
        'name' => 'Coordinates',
        'plural' => 'Coordinates',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Coordinates',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Coordinates',
        ],
        'edit' => [
            'label' => 'Modifica Coordinates',
        ],
        'delete' => [
            'label' => 'Elimina Coordinates',
        ],
    ],
<<<<<<< HEAD
=======
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
];
