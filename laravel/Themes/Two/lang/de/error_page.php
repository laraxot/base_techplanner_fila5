<?php

declare(strict_types=1);

/**
 * Pagina 404 del tema Two (`resources/views/errors/404.blade.php`).
 * La vista e' resa da `laravel/resources/views/errors/404.blade.php` quando il tema attivo la offre.
 */
return [
    'not_found' => [
        'page_title' => [
            'title' => 'Seite nicht gefunden',
        ],
        'code' => [
            'label' => 'Fehler 404',
        ],
        'heading' => [
            'title' => 'Seite nicht gefunden',
        ],
        'intro' => [
            'description' => 'Die aufgerufene Adresse existiert nicht, oder die Seite wurde verschoben. Beginnen Sie auf der Startseite oder wählen Sie einen Bereich der Website.',
        ],
    ],
    'suggestions' => [
        'intro' => [
            'label' => 'Von hier aus geht es weiter',
        ],
    ],
    'actions' => [
        'home' => [
            'label' => 'Zur Startseite',
        ],
        'services' => [
            'label' => 'Unsere Leistungen ansehen',
        ],
        'contacts' => [
            'label' => 'Kontakt aufnehmen',
        ],
    ],
];
