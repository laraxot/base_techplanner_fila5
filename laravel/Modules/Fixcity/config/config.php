<?php

declare(strict_types=1);

return [
    'name' => 'Fixcity',
    'description' => 'Modulo per la gestione delle segnalazioni e ticket cittadini',
    'icon' => 'fixcity-icon',
    'navigation' => [
        'enabled' => true,
        'sort' => 30,
    ],
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
        'Modules\\Fixcity\\Providers\\FixcityServiceProvider',
    ],
];