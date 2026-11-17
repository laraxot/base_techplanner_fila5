<?php

declare(strict_types=1);

return [
    'auth' => [
        'required' => [
            'label' => 'Autenticazione richiesta',
        ],
        'with' => [
            'label' => 'Con autenticazione',
        ],
        'without' => [
            'label' => 'Senza autenticazione',
        ],
    ],
    'grid_search' => [
        'field' => [
            'label' => 'Cerca servizi',
            'placeholder' => 'Cerca servizi...',
        ],
        'field_description' => [
            'label' => 'Cerca servizi per nome o descrizione',
        ],
    ],
    'grid_filter' => [
        'category' => [
            'label' => 'Filtra per categoria',
        ],
        'category_description' => [
            'label' => 'Filtra servizi per categoria',
        ],
    ],
    'grid_sort' => [
        'field' => [
            'label' => 'Ordina servizi',
        ],
        'name_asc' => [
            'label' => 'Nome (A-Z)',
        ],
        'name_desc' => [
            'label' => 'Nome (Z-A)',
        ],
        'popular' => [
            'label' => 'Più popolari',
        ],
        'recent' => [
            'label' => 'Recenti',
        ],
    ],
    'grid_view' => [
        'grid' => [
            'label' => 'Mostra servizi in vista griglia',
        ],
        'list' => [
            'label' => 'Mostra servizi in vista elenco',
        ],
    ],
    'grid_active' => [
        'title' => [
            'label' => 'Filtri attivi:',
        ],
        'clear_description' => [
            'label' => 'Rimuovi tutti i filtri attivi',
        ],
        'clear' => [
            'label' => 'Rimuovi tutti',
        ],
    ],
    'grid_summary' => [
        'showing' => [
            'label' => 'Mostrando',
        ],
        'services' => [
            'label' => 'servizi',
        ],
    ],
    'grid_item' => [
        'featured' => [
            'label' => 'In evidenza',
        ],
        'access' => [
            'label' => 'Accedi',
        ],
    ],
    'grid_empty' => [
        'title' => [
            'title' => 'Nessun servizio trovato',
        ],
        'hint' => [
            'message' => 'Prova a modificare i filtri o la ricerca',
        ],
        'reset_description' => [
            'label' => 'Rimuovi tutti i filtri e mostra tutti i servizi',
        ],
        'reset' => [
            'label' => 'Rimuovi filtri',
        ],
    ],
    'search_box' => [
        'clear' => [
            'label' => 'Cancella testo di ricerca',
        ],
        'submit_description' => [
            'label' => 'Esegui ricerca servizi',
        ],
        'hint' => [
            'help' => 'Inserisci il nome del servizio o parole chiave per trovare quello che cerchi',
        ],
        'popular' => [
            'title' => 'Categorie popolari:',
        ],
        'toggle' => [
            'label' => 'Mostra/Nascondi filtri avanzati di ricerca',
        ],
    ],
    'advanced' => [
        'title' => [
            'title' => 'Filtri avanzati',
        ],
    ],
    'advanced_status' => [
        'field' => [
            'label' => 'Stato del servizio',
        ],
        'all' => [
            'label' => 'Tutti gli stati',
        ],
        'active' => [
            'label' => 'Attivo',
        ],
        'maintenance' => [
            'label' => 'In manutenzione',
        ],
        'coming_soon' => [
            'label' => 'Prossimamente',
        ],
    ],
    'advanced_availability' => [
        'field' => [
            'label' => 'Disponibilità',
        ],
        'all' => [
            'label' => 'Tutte le disponibilità',
        ],
        'business_hours' => [
            'label' => 'Orari lavorativi',
        ],
        'appointment' => [
            'label' => 'Su appuntamento',
        ],
    ],
    'advanced_audience' => [
        'field' => [
            'label' => 'Destinatari',
        ],
        'citizens' => [
            'label' => 'Cittadini',
        ],
        'businesses' => [
            'label' => 'Imprese',
        ],
        'associations' => [
            'label' => 'Associazioni',
        ],
        'professionals' => [
            'label' => 'Professionisti',
        ],
    ],
    'advanced_priority' => [
        'field' => [
            'label' => 'Priorità',
        ],
        'all' => [
            'label' => 'Tutte le priorità',
        ],
        'high' => [
            'label' => 'Alta',
        ],
        'medium' => [
            'label' => 'Media',
        ],
        'low' => [
            'label' => 'Bassa',
        ],
    ],
    'advanced_actions' => [
        'reset_description' => [
            'label' => 'Ripristina tutti i filtri ai valori predefiniti',
        ],
        'reset' => [
            'label' => 'Resetta filtri',
        ],
        'apply_description' => [
            'label' => 'Applica i filtri selezionati',
        ],
        'apply' => [
            'label' => 'Applica filtri',
        ],
    ],
    'results' => [
        'title' => [
            'title' => 'Risultati della ricerca',
        ],
    ],
    'js_results' => [
        'loading' => [
            'message' => 'Ricerca in corso...',
        ],
        'empty' => [
            'message' => 'Nessun risultato trovato',
        ],
        'count' => [
            'label' => 'risultati trovati',
        ],
        'access' => [
            'label' => 'Accedi al servizio',
        ],
    ],
];
