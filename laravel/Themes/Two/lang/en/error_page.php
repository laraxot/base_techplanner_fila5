<?php

declare(strict_types=1);

/**
 * Pagina 404 del tema Two (`resources/views/errors/404.blade.php`).
 * La vista e' resa da `laravel/resources/views/errors/404.blade.php` quando il tema attivo la offre.
 */
return [
    'not_found' => [
        'page_title' => [
            'title' => 'Page not found',
        ],
        'code' => [
            'label' => 'Error 404',
        ],
        'heading' => [
            'title' => 'Page not found',
        ],
        'intro' => [
            'description' => 'The address you opened does not exist, or the page has moved. Start again from the home page or pick a section of the site.',
        ],
    ],
    'suggestions' => [
        'intro' => [
            'label' => 'You can start again from here',
        ],
    ],
    'actions' => [
        'home' => [
            'label' => 'Back to the home page',
        ],
        'services' => [
            'label' => 'View our services',
        ],
        'contacts' => [
            'label' => 'Contact us',
        ],
    ],
];
