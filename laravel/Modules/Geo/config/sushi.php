<?php

declare(strict_types=1);

return [
    /*
     * |--------------------------------------------------------------------------
     * | Sushi Configuration
     * |--------------------------------------------------------------------------
     * |
     * | Qui puoi configurare le impostazioni per il pacchetto Sushi.
     * |
     */

    /*
     * |--------------------------------------------------------------------------
     * | Cache Configuration
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione della cache per i modelli Sushi.
     * |
     */
    'cache' => [
        'enabled' => Illuminate\Support\Env::get('SUSHI_CACHE_ENABLED', true),
        'duration' => Illuminate\Support\Env::get('SUSHI_CACHE_DURATION', 60 * 24 * 7), // 7 giorni
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Database Configuration
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione del database SQLite per i modelli Sushi.
     * |
     */
    'database' => [
<<<<<<< .merge_file_AACHb6
        'connection' => Illuminate\Support\Env::get('SUSHI_DB_CONNECTION', 'mysql'),
        'database' => Illuminate\Support\Env::get('SUSHI_DB_DATABASE', 'quaeris_data_test'),
=======
<<<<<<< HEAD
        'connection' => env('SUSHI_DB_CONNECTION', 'mysql'),
        'database' => env('SUSHI_DB_DATABASE', 'quaeris_data_test'),
=======
        'connection' => env('SUSHI_DB_CONNECTION', 'sqlite'),
        'database' => env('SUSHI_DB_DATABASE', ':memory:'),
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_uTp3eD
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Models Configuration
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione specifica per i modelli Sushi.
     * |
     */
    'models' => [
        'comune' => [
            'file' => 'database/content/comuni.json',
            'schema' => [
                'id' => 'integer',
                'regione' => 'string',
                'provincia' => 'string',
                'comune' => 'string',
                'cap' => 'string',
                'lat' => 'float',
                'lng' => 'float',
                'created_at' => 'datetime',
                'updated_at' => 'datetime',
            ],
            'casts' => [
                'lat' => 'float',
                'lng' => 'float',
                'created_at' => 'datetime',
                'updated_at' => 'datetime',
            ],
            'fillable' => [
                'regione',
                'provincia',
                'comune',
                'cap',
                'lat',
                'lng',
            ],
        ],
    ],
];
