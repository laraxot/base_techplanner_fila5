<?php

declare(strict_types=1);

<<<<<<< HEAD
return [];
=======
return [
    'name' => 'Job',
    'description' => 'Modulo per la gestione dei lavori in background e code',
    'icon' => 'heroicon-o-queue-list',
    'navigation' => [
        'enabled' => true,
        'sort' => 40,
    ],
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
        'Modules\\Job\\Providers\\JobServiceProvider',
    ],
];
>>>>>>> 6ed19256f (.)
