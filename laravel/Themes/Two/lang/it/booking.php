<?php

declare(strict_types=1);

return [
    'defaults' => [
        'service' => [
            'label' => 'Servizio',
        ],
    ],
    'header' => [
        'title' => [
            'title' => 'Prenota :service',
        ],
        'subtitle' => [
            'message' => 'Scegli data e ora per il tuo appuntamento',
        ],
    ],
    'steps' => [
        'date_time' => [
            'label' => 'Scegli data e ora',
        ],
        'personal_data' => [
            'label' => 'Dati personali',
        ],
        'confirm' => [
            'label' => 'Conferma',
        ],
    ],
    'date' => [
        'select' => [
            'label' => 'Seleziona la data',
        ],
    ],
    'time' => [
        'select' => [
            'label' => 'Seleziona l\'orario',
        ],
        'unavailable' => [
            'label' => 'Non disp.',
        ],
    ],
    'summary' => [
        'selected' => [
            'title' => 'Appuntamento selezionato:',
        ],
        'at' => [
            'label' => 'alle',
        ],
    ],
    'actions' => [
        'confirm' => [
            'label' => 'Conferma prenotazione',
        ],
    ],
    'form' => [
        'first_name' => [
            'label' => 'Nome *',
        ],
        'last_name' => [
            'label' => 'Cognome *',
        ],
        'email' => [
            'label' => 'Email *',
        ],
        'phone' => [
            'label' => 'Telefono *',
        ],
        'fiscal_code' => [
            'label' => 'Codice Fiscale',
        ],
        'notes' => [
            'label' => 'Note aggiuntive',
            'placeholder' => 'Inserisci eventuali note o richieste specifiche...',
        ],
    ],
    'recap' => [
        'title' => [
            'title' => 'Riepilogo prenotazione',
        ],
        'appointment' => [
            'title' => 'Dettagli appuntamento',
        ],
        'service' => [
            'label' => 'Servizio:',
        ],
        'datetime' => [
            'label' => 'Data e ora:',
        ],
        'name' => [
            'label' => 'Nome:',
        ],
        'email' => [
            'label' => 'Email:',
        ],
        'phone' => [
            'label' => 'Telefono:',
        ],
        'cost' => [
            'label' => 'Costo:',
        ],
    ],
    'consent' => [
        'prefix' => [
            'label' => 'Accetto i',
        ],
        'terms' => [
            'label' => 'termini di servizio',
        ],
        'conjunction' => [
            'label' => 'e l\'',
        ],
        'privacy' => [
            'label' => 'informativa sulla privacy',
        ],
    ],
    'notice' => [
        'note' => [
            'label' => 'Nota:',
        ],
        'confirmation' => [
            'message' => 'Riceverai una conferma via email e SMS. Puoi cancellare la prenotazione fino a 24 ore prima dell\'appuntamento.',
        ],
    ],
    'loading' => [
        'progress' => [
            'title' => 'Prenotazione in corso...',
            'message' => 'Stiamo elaborando la tua richiesta',
        ],
    ],
    'success' => [
        'confirmed' => [
            'title' => 'Prenotazione confermata!',
            'message' => 'Ti abbiamo inviato una email con tutti i dettagli dell\'appuntamento.',
        ],
    ],
    'validation' => [
        'email' => [
            'message' => 'Inserisci un\'email valida',
        ],
        'fiscal_code' => [
            'message' => 'Il codice fiscale deve avere 16 caratteri',
        ],
    ],
];
