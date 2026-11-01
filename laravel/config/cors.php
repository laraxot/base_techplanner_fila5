<?php

declare(strict_types=1);

/*
 * CORS esplicito (SEC-015). Senza questo file il framework usa il default con `allowed_origins => ['*']`:
 * qualunque sito poteva chiamare `api/*` dal browser dell'utente.
 *
 * Origini consentite: variabile `CORS_ALLOWED_ORIGINS`, elenco separato da virgole (es. `https://app.example.org,https://admin.example.org`).
 * Vuota (default) = nessuna origine esterna: le chiamate dallo stesso dominio e quelle senza browser (app mobile, server) non sono toccate.
 * `supports_credentials` resta false: i cookie di sessione non vengono mai esposti a un'altra origine.
 */
return [
    'paths' => ['api/*'],

    'allowed_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'],

    'allowed_origins' => array_values(array_filter(array_map('trim', explode(',', (string) env('CORS_ALLOWED_ORIGINS', ''))))),

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['Accept', 'Authorization', 'Content-Type', 'Origin', 'X-Requested-With'],

    'exposed_headers' => [],

    'max_age' => 600,

    'supports_credentials' => false,
];
