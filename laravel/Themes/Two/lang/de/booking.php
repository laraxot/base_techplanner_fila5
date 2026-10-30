<?php

declare(strict_types=1);

return [
    'defaults' => [
        'service' => [
            'label' => 'Dienstleistung',
        ],
    ],
    'header' => [
        'title' => [
            'title' => ':service buchen',
        ],
        'subtitle' => [
            'message' => 'Wählen Sie Datum und Uhrzeit für Ihren Termin',
        ],
    ],
    'steps' => [
        'date_time' => [
            'label' => 'Datum und Uhrzeit wählen',
        ],
        'personal_data' => [
            'label' => 'Persönliche Daten',
        ],
        'confirm' => [
            'label' => 'Bestätigen',
        ],
    ],
    'date' => [
        'select' => [
            'label' => 'Datum auswählen',
        ],
    ],
    'time' => [
        'select' => [
            'label' => 'Uhrzeit auswählen',
        ],
        'unavailable' => [
            'label' => 'Nicht verf.',
        ],
    ],
    'summary' => [
        'selected' => [
            'title' => 'Ausgewählter Termin:',
        ],
        'at' => [
            'label' => 'um',
        ],
    ],
    'actions' => [
        'confirm' => [
            'label' => 'Buchung bestätigen',
        ],
    ],
    'form' => [
        'first_name' => [
            'label' => 'Vorname *',
        ],
        'last_name' => [
            'label' => 'Nachname *',
        ],
        'email' => [
            'label' => 'E-Mail *',
        ],
        'phone' => [
            'label' => 'Telefon *',
        ],
        'fiscal_code' => [
            'label' => 'Steuernummer',
        ],
        'notes' => [
            'label' => 'Zusätzliche Hinweise',
            'placeholder' => 'Geben Sie eventuelle Hinweise oder besondere Wünsche ein...',
        ],
    ],
    'recap' => [
        'title' => [
            'title' => 'Zusammenfassung der Buchung',
        ],
        'appointment' => [
            'title' => 'Termindetails',
        ],
        'service' => [
            'label' => 'Dienstleistung:',
        ],
        'datetime' => [
            'label' => 'Datum und Uhrzeit:',
        ],
        'name' => [
            'label' => 'Name:',
        ],
        'email' => [
            'label' => 'E-Mail:',
        ],
        'phone' => [
            'label' => 'Telefon:',
        ],
        'cost' => [
            'label' => 'Kosten:',
        ],
    ],
    'consent' => [
        'prefix' => [
            'label' => 'Ich akzeptiere die',
        ],
        'terms' => [
            'label' => 'Nutzungsbedingungen',
        ],
        'conjunction' => [
            'label' => 'und die ',
        ],
        'privacy' => [
            'label' => 'Datenschutzerklärung',
        ],
    ],
    'notice' => [
        'note' => [
            'label' => 'Hinweis:',
        ],
        'confirmation' => [
            'message' => 'Sie erhalten eine Bestätigung per E-Mail und SMS. Sie können die Buchung bis zu 24 Stunden vor dem Termin stornieren.',
        ],
    ],
    'loading' => [
        'progress' => [
            'title' => 'Buchung wird durchgeführt...',
            'message' => 'Wir bearbeiten Ihre Anfrage',
        ],
    ],
    'success' => [
        'confirmed' => [
            'title' => 'Buchung bestätigt!',
            'message' => 'Wir haben Ihnen eine E-Mail mit allen Termindetails gesendet.',
        ],
    ],
    'validation' => [
        'email' => [
            'message' => 'Geben Sie eine gültige E-Mail-Adresse ein',
        ],
        'fiscal_code' => [
            'message' => 'Die Steuernummer muss 16 Zeichen haben',
        ],
    ],
];
