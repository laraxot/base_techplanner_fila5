<?php

declare(strict_types=1);

/**
 * Pagina 404 del tema Two (`resources/views/errors/404.blade.php`).
 * La vista e' resa da `laravel/resources/views/errors/404.blade.php` quando il tema attivo la offre.
 */
return [
    'not_found' => [
        'page_title' => [
            'title' => 'Página no encontrada',
        ],
        'code' => [
            'label' => 'Error 404',
        ],
        'heading' => [
            'title' => 'Página no encontrada',
        ],
        'intro' => [
            'description' => 'La dirección que has abierto no existe o la página se ha movido. Empieza de nuevo desde la página de inicio o elige una sección del sitio.',
        ],
    ],
    'suggestions' => [
        'intro' => [
            'label' => 'Puedes continuar desde aquí',
        ],
    ],
    'actions' => [
        'home' => [
            'label' => 'Volver al inicio',
        ],
        'services' => [
            'label' => 'Ver los servicios',
        ],
        'contacts' => [
            'label' => 'Contáctanos',
        ],
    ],
];
