<?php

declare(strict_types=1);

return [
    'contact' => [
        'form' => [
            'title' => 'Richiedi una Consulenza',
            'subtitle' => 'Compila il form e ti ricontatteremo entro 24 ore',
            'submit_label' => 'Invia Richiesta',
            'privacy_text' => 'Inviando questo form accetti la nostra Privacy Policy.',
            'required_note' => 'I campi contrassegnati con * sono obbligatori.',
            'submit_aria' => 'Invia il form di contatto',
            'privacy_help' => 'Devi accettare la privacy policy per inviare il form',
            'fields' => [
                'name' => [
                    'label' => 'Nome e Cognome',
                    'placeholder' => 'Inserisci il tuo nome completo',
                    'help' => 'Inserisci il tuo nome e cognome completo',
                ],
                'email' => [
                    'label' => 'Email',
                    'help' => 'Inserisci il tuo indirizzo email',
                ],
                'phone' => [
                    'label' => 'Telefono',
                    'help' => 'Inserisci il tuo numero di telefono',
                ],
                'studio' => [
                    'label' => 'Nome Studio',
                    'placeholder' => 'Nome del tuo studio',
                    'help' => 'Inserisci il nome del tuo studio professionale',
                ],
                'type' => [
                    'label' => 'Tipo di Studio',
                    'placeholder' => 'Seleziona tipo di studio',
                    'help' => 'Seleziona il tipo di studio professionale',
                ],
                'message' => [
                    'label' => 'Messaggio',
                    'placeholder' => 'Descrivi la tua richiesta...',
                    'help' => 'Descrivi la tua richiesta di consulenza',
                ],
            ],
        ],
        'info' => [
            'title' => 'Come Contattarci',
            'subtitle' => 'Scegli il modo più comodo per raggiungerci',
            'phone' => 'Telefono',
            'mobile' => 'Cellulare / WhatsApp',
            'email' => 'Email',
            'address' => 'Indirizzo',
            'hours' => 'Orari',
            'follow_social' => 'Seguici sui Social',
            'linkedin_aria' => 'LinkedIn - Profilo LinkedIn di Marco Sottana',
            'facebook_aria' => 'Facebook - Pagina Facebook di Marco Sottana',
        ],
    ],
    'sections' => [
        'map' => [
            'title' => 'Dove Siamo',
        ],
        'team' => [
            'title' => 'Il Nostro Team',
            'description' => 'Esperti qualificati al tuo servizio per garantire la massima sicurezza.',
        ],
        'values' => [
            'title' => 'I Nostri Valori',
            'description' => 'I principi cardine che guidano ogni nostra azione e consulenza.',
        ],
        'benefits' => [
            'title' => 'Perché Sceglierci',
            'description' => 'I vantaggi concreti di affidarsi alla nostra esperienza.',
        ],
        'company' => [
            'title' => 'Dati Aziendali',
        ],
    ],
    'map' => [
        'open_sr' => [
            'label' => 'Apri :address su Google Maps',
        ],
        'open' => [
            'helper_text' => 'Apri la posizione su Google Maps',
        ],
        'directions' => [
            'label' => 'Ottieni Indicazioni su Google Maps',
        ],
        'open_in_google' => [
            'label' => 'Apri in Google Maps',
        ],
        'directions_short' => [
            'label' => 'Ottieni Indicazioni',
        ],
        'attribution' => [
            'label' => 'Mappa © :link contributors',
        ],
    ],
    'fields' => [
        'map' => [
            'alt' => 'Mappa: :address',
        ],
    ],
    'sectors' => [
        'badge' => [
            'label' => 'Settore Specializzato',
        ],
        'focus_areas' => [
            'label' => 'Aree di Focus:',
        ],
        'compliance' => [
            'label' => 'Conformità:',
        ],
    ],
    'cta' => [
        'banner' => [
            'primary' => 'Inizia',
            'secondary' => 'Scopri',
        ],
    ],
    'blog' => [
        'recent_articles' => [
            'label' => 'Articoli Recenti',
        ],
        'all_articles' => [
            'label' => 'Tutti gli Articoli',
        ],
        'featured_articles' => [
            'label' => 'Articoli in Evidenza',
        ],
        'read' => [
            'label' => 'Leggi',
        ],
        'read_article' => [
            'label' => 'Leggi Articolo',
        ],
        'view_all' => [
            'label' => 'Vedi Tutti gli Articoli',
        ],
    ],
    'company' => [
        'pec' => [
            'label' => 'PEC',
        ],
        'registered_office' => [
            'label' => 'Sede',
        ],
    ],
    'resources' => [
        'download_pdf' => [
            'label' => 'Scarica PDF',
        ],
    ],
    'newsletter' => [
        'blog' => [
            'title' => 'Rimani Aggiornato',
            'description' => 'Iscriviti per ricevere gli ultimi articoli e aggiornamenti normativi direttamente nella tua casella email.',
            'cta_label' => 'Iscriviti alla Newsletter',
            'email_placeholder' => 'La tua email',
            'privacy_note' => 'Niente spam, solo contenuti di qualità. Puoi disiscriverti quando vuoi.',
        ],
        'form' => [
            'cta_label' => 'Iscriviti',
            'email_placeholder' => 'La tua email professionale',
        ],
    ],
    'sidebar' => [
        'system_active' => [
            'label' => 'Sistema Attivo',
        ],
    ],
    'service_card' => [
        'status' => [
            'active' => 'Attivo',
            'inactive' => 'Non disponibile',
            'maintenance' => 'In manutenzione',
        ],
        'featured' => [
            'label' => 'In evidenza',
        ],
        'access' => [
            'label' => 'Accedi',
            'aria_label' => 'Accedi al servizio: :title',
        ],
    ],
];
