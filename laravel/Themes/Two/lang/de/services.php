<?php

declare(strict_types=1);

return [
    'auth' => [
        'required' => [
            'label' => 'Authentifizierung erforderlich',
        ],
        'with' => [
            'label' => 'Mit Authentifizierung',
        ],
        'without' => [
            'label' => 'Ohne Authentifizierung',
        ],
    ],
    'grid_search' => [
        'field' => [
            'label' => 'Dienste suchen',
            'placeholder' => 'Dienste suchen...',
        ],
        'field_description' => [
            'label' => 'Dienste nach Name oder Beschreibung suchen',
        ],
    ],
    'grid_filter' => [
        'category' => [
            'label' => 'Nach Kategorie filtern',
        ],
        'category_description' => [
            'label' => 'Dienste nach Kategorie filtern',
        ],
    ],
    'grid_sort' => [
        'field' => [
            'label' => 'Dienste sortieren',
        ],
        'name_asc' => [
            'label' => 'Name (A-Z)',
        ],
        'name_desc' => [
            'label' => 'Name (Z-A)',
        ],
        'popular' => [
            'label' => 'Beliebteste',
        ],
        'recent' => [
            'label' => 'Neueste',
        ],
    ],
    'grid_view' => [
        'grid' => [
            'label' => 'Dienste in Rasteransicht anzeigen',
        ],
        'list' => [
            'label' => 'Dienste in Listenansicht anzeigen',
        ],
    ],
    'grid_active' => [
        'title' => [
            'label' => 'Aktive Filter:',
        ],
        'clear_description' => [
            'label' => 'Alle aktiven Filter entfernen',
        ],
        'clear' => [
            'label' => 'Alle entfernen',
        ],
    ],
    'grid_summary' => [
        'showing' => [
            'label' => 'Angezeigt werden',
        ],
        'services' => [
            'label' => 'Dienste',
        ],
    ],
    'grid_item' => [
        'featured' => [
            'label' => 'Hervorgehoben',
        ],
        'access' => [
            'label' => 'Zugang',
        ],
    ],
    'grid_empty' => [
        'title' => [
            'title' => 'Keine Dienste gefunden',
        ],
        'hint' => [
            'message' => 'Versuchen Sie, die Filter oder die Suche zu ändern',
        ],
        'reset_description' => [
            'label' => 'Alle Filter entfernen und alle Dienste anzeigen',
        ],
        'reset' => [
            'label' => 'Filter entfernen',
        ],
    ],
    'search_box' => [
        'clear' => [
            'label' => 'Suchtext löschen',
        ],
        'submit_description' => [
            'label' => 'Dienstesuche ausführen',
        ],
        'hint' => [
            'help' => 'Geben Sie den Namen des Dienstes oder Stichwörter ein, um zu finden, was Sie suchen',
        ],
        'popular' => [
            'title' => 'Beliebte Kategorien:',
        ],
        'toggle' => [
            'label' => 'Erweiterte Suchfilter ein-/ausblenden',
        ],
    ],
    'advanced' => [
        'title' => [
            'title' => 'Erweiterte Filter',
        ],
    ],
    'advanced_status' => [
        'field' => [
            'label' => 'Status des Dienstes',
        ],
        'all' => [
            'label' => 'Alle Status',
        ],
        'active' => [
            'label' => 'Aktiv',
        ],
        'maintenance' => [
            'label' => 'In Wartung',
        ],
        'coming_soon' => [
            'label' => 'Demnächst',
        ],
    ],
    'advanced_availability' => [
        'field' => [
            'label' => 'Verfügbarkeit',
        ],
        'all' => [
            'label' => 'Alle Verfügbarkeiten',
        ],
        'business_hours' => [
            'label' => 'Geschäftszeiten',
        ],
        'appointment' => [
            'label' => 'Nach Vereinbarung',
        ],
    ],
    'advanced_audience' => [
        'field' => [
            'label' => 'Zielgruppen',
        ],
        'citizens' => [
            'label' => 'Bürger',
        ],
        'businesses' => [
            'label' => 'Unternehmen',
        ],
        'associations' => [
            'label' => 'Vereine',
        ],
        'professionals' => [
            'label' => 'Fachleute',
        ],
    ],
    'advanced_priority' => [
        'field' => [
            'label' => 'Priorität',
        ],
        'all' => [
            'label' => 'Alle Prioritäten',
        ],
        'high' => [
            'label' => 'Hoch',
        ],
        'medium' => [
            'label' => 'Mittel',
        ],
        'low' => [
            'label' => 'Niedrig',
        ],
    ],
    'advanced_actions' => [
        'reset_description' => [
            'label' => 'Alle Filter auf die Standardwerte zurücksetzen',
        ],
        'reset' => [
            'label' => 'Filter zurücksetzen',
        ],
        'apply_description' => [
            'label' => 'Ausgewählte Filter anwenden',
        ],
        'apply' => [
            'label' => 'Filter anwenden',
        ],
    ],
    'results' => [
        'title' => [
            'title' => 'Suchergebnisse',
        ],
    ],
    'js_results' => [
        'loading' => [
            'message' => 'Suche läuft...',
        ],
        'empty' => [
            'message' => 'Keine Ergebnisse gefunden',
        ],
        'count' => [
            'label' => 'Ergebnisse gefunden',
        ],
        'access' => [
            'label' => 'Zum Dienst',
        ],
    ],
];
