<?php

declare(strict_types=1);

return [
    'name' => 'Notify',
    'description' => 'Modulo per la gestione delle notifiche e comunicazioni',
    'icon' => 'heroicon-o-bell',
    'navigation' => [
        'enabled' => true,
<<<<<<< HEAD
        'sort' => 70,
    ],
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
        'Modules\\Notify\\Providers\\NotifyServiceProvider',
    ],
];
=======
        'sort' => 70],
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth']],
    'providers' => [
        'Modules\\Notify\\Providers\\NotifyServiceProvider']];
>>>>>>> laraxot/dev
