<?php

declare(strict_types=1);

return [
    'name' => 'UI',
    'description' => 'Modulo per la gestione dell\'interfaccia utente e componenti',
<<<<<<< HEAD
    'icon' => 'heroicon-o-squares-2x2',
=======
    'icon' => 'ui-icon',
>>>>>>> laraxot/dev
    'navigation' => [
        'enabled' => true,
        'sort' => 90,
    ],
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
        'Modules\\UI\\Providers\\UIServiceProvider',
    ],
];
