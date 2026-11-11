<?php

declare(strict_types=1);

return [
    'navigation' => [
        'group' => 'Lavoro quotidiano',
        'label' => 'Clienti',
        'plural_label' => 'Clienti',
        'icon' => 'techplanner-client',
        'sort' => 10,
    ],
    'actions' => [
        'create' => [
            'label' => 'Nuovo Cliente',
            'tooltip' => '',
            'icon' => 'create',
        ],
        'import' => [
            'label' => 'Importa Clienti',
        ],
        'importClient' => [
            'label' => 'Importa clienti',
            'tooltip' => '',
            'icon' => 'importClient',
        ],
        'populateCoordinates' => [
            'label' => 'Aggiorna coordinate',
            'tooltip' => '',
            'icon' => 'populateCoordinates',
            'modal' => [
                'heading' => 'Aggiorna Coordinate',
                'description' => 'Questa azione aggiornerà le coordinate per tutti i clienti basandosi sui loro indirizzi. Vuoi continuare?',
                'submit_label' => 'Sì, Aggiorna Tutto',
            ],
        ],
        'updateCoordinates' => [
            'label' => 'Aggiorna Coordinate',
            'tooltip' => '',
            'icon' => 'updateCoordinates',
        ],
        'sortByDistance' => [
            'label' => 'Ordina per distanza',
            'tooltip' => 'Mette in cima i clienti più vicini a questo',
            'icon' => 'heroicon-o-map',
            'no_coordinates' => [
                'title' => 'Mancano le coordinate',
                'body' => 'Questo cliente non ha coordinate: usa prima «Aggiorna coordinate».',
            ],
            'done' => [
                'title' => 'Elenco ordinato per distanza',
                'body' => 'In cima trovi i clienti più vicini a :name.',
            ],
        ],
        'downloadExample' => [
            'label' => 'Scarica Esempio',
            'tooltip' => '',
            'icon' => 'downloadExample',
        ],
        'logout' => [
            'tooltip' => '',
            'icon' => 'logout',
            'label' => 'logout',
        ],
        'profile' => [
            'tooltip' => '',
            'icon' => 'profile',
            'label' => 'profile',
        ],
        'cancel' => [
            'tooltip' => '',
            'icon' => 'cancel',
            'label' => 'cancel',
        ],
        'save' => [
            'tooltip' => '',
            'icon' => 'save',
            'label' => 'save',
        ],
        'reorderRecords' => [
            'tooltip' => '',
            'icon' => 'reorderRecords',
            'label' => 'reorderRecords',
        ],
        'openColumnManager' => [
            'tooltip' => '',
            'icon' => 'openColumnManager',
            'label' => 'openColumnManager',
        ],
        'applyTableColumnManager' => [
            'tooltip' => '',
            'icon' => 'applyTableColumnManager',
            'label' => 'applyTableColumnManager',
        ],
        'resetFilters' => [
            'tooltip' => '',
            'icon' => 'resetFilters',
            'label' => 'resetFilters',
        ],
        'applyFilters' => [
            'tooltip' => '',
            'icon' => 'applyFilters',
            'label' => 'applyFilters',
        ],
        'openFilters' => [
            'tooltip' => '',
            'icon' => 'openFilters',
            'label' => 'openFilters',
        ],
        'delete' => [
            'tooltip' => '',
            'icon' => 'delete',
            'label' => 'delete',
        ],
        'edit' => [
            'tooltip' => '',
            'icon' => 'edit',
            'label' => 'edit',
        ],
        'view' => [
            'tooltip' => '',
            'icon' => 'view',
            'label' => 'view',
        ],
        'layout' => [
            'tooltip' => '',
            'icon' => 'layout',
            'label' => 'layout',
        ],
        'SendNotificationBulkAction' => [
            'tooltip' => '',
            'label' => 'SendNotificationBulkAction',
            'icon' => 'SendNotificationBulkAction',
        ],
        'UpdateCoordinatesBulkAction' => [
            'tooltip' => '',
            'icon' => 'UpdateCoordinatesBulkAction',
            'label' => 'UpdateCoordinatesBulkAction',
        ],
        'send_notification_bulk' => [
            'tooltip' => '',
            'icon' => 'send_notification_bulk',
            'label' => 'Invia notifica',
        ],
        'update_coordinates_bulk' => [
            'tooltip' => '',
            'icon' => 'update_coordinates_bulk',
            'label' => 'Aggiorna coordinate',
        ],
        'SendRecordsNotificationBulkAction' => [
            'tooltip' => '',
            'icon' => 'SendRecordsNotificationBulkAction',
            'label' => 'SendRecordsNotificationBulkAction',
        ],
        'sendRecordsNotification' => [
            'tooltip' => '',
            'icon' => 'sendRecordsNotification',
            'label' => 'sendRecordsNotification',
        ],
        'removeAllFilters' => [
            'tooltip' => '',
            'icon' => 'removeAllFilters',
            'label' => 'removeAllFilters',
        ],
        'resetColumnManager' => [
            'tooltip' => '',
            'icon' => 'resetColumnManager',
            'label' => 'resetColumnManager',
        ],
        'createAnother' => [
            'label' => 'createAnother',
            'icon' => 'createAnother',
            'tooltip' => '',
        ],
        'submit' => [
            'label' => 'submit',
            'icon' => 'submit',
            'tooltip' => '',
        ],
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
        ],
        'business_closed' => [
            'label' => 'Attività Cessata',
            'description' => 'business_closed',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'company_name' => [
            'label' => 'Ragione Sociale',
            'description' => 'company_name',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'latitude' => [
            'label' => 'Latitudine',
            'description' => 'latitude',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'longitude' => [
            'label' => 'Longitudine',
            'description' => 'longitude',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'distance' => [
            'label' => 'Distanza',
        ],
        'distance_km' => [
            'label' => 'Km',
        ],
        'is_active' => [
            'label' => 'Attivo',
        ],
        'full_address' => [
            'label' => 'Indirizzo Completo',
        ],
        'country' => [
            'label' => 'Paese',
            'description' => 'country',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'tax_code' => [
            'label' => 'Codice Fiscale',
            'description' => 'tax_code',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'vat_number' => [
            'label' => 'Partita IVA',
            'description' => 'vat_number',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'fiscal_code' => [
            'label' => 'Codice Fiscale',
            'description' => 'fiscal_code',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'competent_health_unit' => [
            'label' => 'ASL Competente',
            'description' => 'competent_health_unit',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'address' => [
            'label' => 'Indirizzo',
            'description' => 'address',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'street_number' => [
            'label' => 'Numero Civico',
            'description' => 'street_number',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'postal_code' => [
            'label' => 'CAP',
            'description' => 'postal_code',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'province' => [
            'label' => 'Provincia',
            'description' => 'province',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'phone' => [
            'label' => 'Telefono',
        ],
        'fax' => [
            'label' => 'Fax',
        ],
        'mobile' => [
            'label' => 'Cellulare',
        ],
        'email' => [
            'label' => 'Email',
        ],
        'notes' => [
            'label' => 'Note',
            'description' => 'notes',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'activity' => [
            'label' => 'Attività',
            'description' => 'activity',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'name' => [
            'label' => 'Nome',
        ],
        'city' => [
            'label' => 'Città',
            'description' => 'city',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'company_office' => [
            'label' => 'Sede Legale',
            'description' => 'company_office',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'sortByDistance' => [
            'label' => 'Ordina per Distanza',
        ],
        'toggleColumns' => [
            'label' => 'Attiva/Disattiva Colonne',
        ],
        'reorderRecords' => [
            'label' => 'Riorganizza Record',
        ],
        'resetFilters' => [
            'label' => 'Resetta Filtro',
        ],
        'applyFilters' => [
            'label' => 'Applica Filtro',
        ],
        'openFilters' => [
            'label' => 'Apri Filtri',
        ],
        'value' => [
            'label' => 'Valore',
            'description' => 'value',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'delete' => [
            'label' => 'Elimina',
        ],
        'edit' => [
            'label' => 'Modifica',
        ],
        'values' => [
            'label' => 'Valori',
            'description' => 'values',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'view' => [
            'label' => 'Visualizza',
        ],
        'create' => [
            'label' => 'Crea',
        ],
        'file' => [
            'label' => 'File',
            'placeholder' => '',
            'helper_text' => '',
            'description' => 'file',
        ],
        'distance_calc' => [
            'label' => 'Distanza',
        ],
        'contacts' => [
            'label' => 'Contatti',
            'description' => 'contacts',
            'helper_text' => '',
            'placeholder' => '',
        ],
        'layout' => [
            'label' => 'layout',
        ],
        'street_address' => [
            'description' => 'street_address',
            'helper_text' => '',
            'placeholder' => '',
            'label' => 'Indirizzo',
        ],
        'created_at' => [
            'description' => 'created_at',
            'helper_text' => '',
            'placeholder' => '',
            'label' => 'Creato il',
        ],
        'updated_at' => [
            'description' => 'updated_at',
            'helper_text' => '',
            'placeholder' => '',
            'label' => 'Modificato il',
        ],
        'contact' => [
            'label' => 'Contatto',
        ],
    ],
    'import' => [
        'label' => 'Importa Clienti',
        'name' => [
            'label' => 'Nome',
        ],
        'vat_number' => [
            'label' => 'Partita IVA',
        ],
        'fiscal_code' => [
            'label' => 'Codice Fiscale',
        ],
        'city' => [
            'label' => 'Città',
        ],
        'province' => [
            'label' => 'Provincia',
        ],
        'phone' => [
            'label' => 'Telefono',
        ],
        'email' => [
            'label' => 'Email',
        ],
        'is_active' => [
            'label' => 'Attivo',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
        ],
        'updated_at' => [
            'label' => 'Data Aggiornamento',
        ],
        'view' => [
            'label' => 'Visualizza',
        ],
        'edit' => [
            'label' => 'Modifica',
        ],
        'activity' => [
            'label' => 'Attività',
        ],
    ],
    'messages' => [
        'coordinates_updated' => 'Coordinate aggiornate con successo',
        'coordinates_update_failed' => 'Aggiornamento coordinate fallito',
        'import_success' => 'Importazione completata con successo',
        'import_failed' => 'Importazione fallita',
    ],
    'model' => [
        'label' => 'Cliente',
        'plural' => 'Clienti',
    ],
    'sections' => [
        'contacts' => [
            'heading' => 'contacts',
            'label' => 'Contatti',
        ],
        'address' => [
            'heading' => 'address',
            'label' => 'Indirizzo',
        ],
        'company' => [
            'heading' => 'company',
            'label' => 'Informazioni Azienda',
        ],
        'contact_info' => [
            'label' => 'Informazioni Contatto',
        ],
        'additional_info' => [
            'label' => 'Informazioni Aggiuntive',
        ],
        'tech_planner::client' => [
            'sections' => [
                'additional_info' => [
                    'label' => [
                        'heading' => 'tech_planner::client.sections.additional_info.label',
                    ],
                ],
            ],
        ],
    ],
    'label' => 'Cliente',
    'plural_label' => 'Clienti',
];
