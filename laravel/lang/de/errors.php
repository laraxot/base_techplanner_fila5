<?php

declare(strict_types=1);

return [
    'http' => [
        401 => [
            'title' => 'Nicht autorisiert',
            'message' => 'Nicht autorisiert',
        ],
        402 => [
            'title' => 'Zahlung erforderlich',
            'message' => 'Zahlung erforderlich',
        ],
        403 => [
            'title' => 'Zugriff verweigert',
            'message' => 'Zugriff verweigert',
        ],
        404 => [
            'title' => 'Nicht gefunden',
            'message' => 'Nicht gefunden',
        ],
        419 => [
            'title' => 'Seite abgelaufen',
            'message' => 'Seite abgelaufen',
        ],
        429 => [
            'title' => 'Zu viele Anfragen',
            'message' => 'Zu viele Anfragen',
        ],
        500 => [
            'title' => 'Serverfehler',
            'message' => 'Serverfehler',
        ],
        503 => [
            'title' => 'Dienst nicht verfügbar',
            'message' => 'Dienst nicht verfügbar',
        ],
    ],
];
