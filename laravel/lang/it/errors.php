<?php

declare(strict_types=1);

return [
    'http' => [
        401 => [
            'title' => 'Non autorizzato',
            'message' => 'Non autorizzato',
        ],
        402 => [
            'title' => 'Pagamento richiesto',
            'message' => 'Pagamento richiesto',
        ],
        403 => [
            'title' => 'Accesso negato',
            'message' => 'Accesso negato',
        ],
        404 => [
            'title' => 'Pagina non trovata',
            'message' => 'Pagina non trovata',
        ],
        419 => [
            'title' => 'Pagina scaduta',
            'message' => 'Pagina scaduta',
        ],
        429 => [
            'title' => 'Troppe richieste',
            'message' => 'Troppe richieste',
        ],
        500 => [
            'title' => 'Errore del server',
            'message' => 'Errore del server',
        ],
        503 => [
            'title' => 'Servizio non disponibile',
            'message' => 'Servizio non disponibile',
        ],
    ],
];
