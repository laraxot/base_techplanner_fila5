<?php

declare(strict_types=1);

/**
 * Pagina 404 del tema Two (`resources/views/errors/404.blade.php`).
 * La vista e' resa da `laravel/resources/views/errors/404.blade.php` quando il tema attivo la offre.
 */
return [
    'not_found' => [
        'page_title' => [
            'title' => 'Pagina non trovata',
        ],
        'code' => [
            'label' => 'Errore 404',
        ],
        'heading' => [
            'title' => 'Pagina non trovata',
        ],
        'intro' => [
            'description' => 'L\'indirizzo che hai aperto non esiste oppure la pagina è stata spostata. Riparti dalla home o scegli una sezione del sito.',
        ],
    ],
    'suggestions' => [
        'intro' => [
            'label' => 'Da qui puoi ripartire',
        ],
    ],
    'actions' => [
        'home' => [
            'label' => 'Torna alla home',
        ],
        'services' => [
            'label' => 'Vedi i servizi',
        ],
        'contacts' => [
            'label' => 'Contattaci',
        ],
    ],
];
