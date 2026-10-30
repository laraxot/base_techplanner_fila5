<?php

declare(strict_types=1);

return [
    'contact' => [
        'form' => [
            'title' => 'Beratung anfragen',
            'subtitle' => 'Füllen Sie das Formular aus, wir melden uns innerhalb von 24 Stunden bei Ihnen',
            'submit_label' => 'Anfrage senden',
            'privacy_text' => 'Mit dem Absenden dieses Formulars akzeptieren Sie unsere Datenschutzerklärung.',
            'required_note' => 'Mit * gekennzeichnete Felder sind Pflichtfelder.',
            'submit_aria' => 'Kontaktformular absenden',
            'privacy_help' => 'Zum Absenden des Formulars müssen Sie die Datenschutzerklärung akzeptieren',
            'fields' => [
                'name' => [
                    'label' => 'Vor- und Nachname',
                    'placeholder' => 'Geben Sie Ihren vollständigen Namen ein',
                    'help' => 'Geben Sie Ihren Vor- und Nachnamen ein',
                ],
                'email' => [
                    'label' => 'E-Mail',
                    'help' => 'Geben Sie Ihre E-Mail-Adresse ein',
                ],
                'phone' => [
                    'label' => 'Telefon',
                    'help' => 'Geben Sie Ihre Telefonnummer ein',
                ],
                'studio' => [
                    'label' => 'Name der Praxis',
                    'placeholder' => 'Name Ihrer Praxis',
                    'help' => 'Geben Sie den Namen Ihrer Praxis ein',
                ],
                'type' => [
                    'label' => 'Praxistyp',
                    'placeholder' => 'Praxistyp auswählen',
                    'help' => 'Wählen Sie den Typ Ihrer Praxis aus',
                ],
                'message' => [
                    'label' => 'Nachricht',
                    'placeholder' => 'Beschreiben Sie Ihr Anliegen...',
                    'help' => 'Beschreiben Sie Ihre Beratungsanfrage',
                ],
            ],
        ],
        'info' => [
            'title' => 'So erreichen Sie uns',
            'subtitle' => 'Wählen Sie den bequemsten Weg, uns zu erreichen',
            'phone' => 'Telefon',
            'mobile' => 'Mobil / WhatsApp',
            'email' => 'E-Mail',
            'address' => 'Adresse',
            'hours' => 'Öffnungszeiten',
            'follow_social' => 'Folgen Sie uns in den sozialen Medien',
            'linkedin_aria' => 'LinkedIn - LinkedIn-Profil von Marco Sottana',
            'facebook_aria' => 'Facebook - Facebook-Seite von Marco Sottana',
        ],
    ],
    'sections' => [
        'map' => [
            'title' => 'So finden Sie uns',
        ],
        'team' => [
            'title' => 'Unser Team',
            'description' => 'Qualifizierte Experten stehen Ihnen zur Seite, um höchste Sicherheit zu gewährleisten.',
        ],
        'values' => [
            'title' => 'Unsere Werte',
            'description' => 'Die Grundprinzipien, die all unser Handeln und jede Beratung leiten.',
        ],
        'benefits' => [
            'title' => 'Warum wir',
            'description' => 'Die konkreten Vorteile, wenn man auf unsere Erfahrung setzt.',
        ],
        'company' => [
            'title' => 'Unternehmensdaten',
        ],
    ],
    'map' => [
        'open_sr' => [
            'label' => ':address in Google Maps öffnen',
        ],
        'open' => [
            'helper_text' => 'Standort in Google Maps öffnen',
        ],
        'directions' => [
            'label' => 'Route in Google Maps abrufen',
        ],
        'open_in_google' => [
            'label' => 'In Google Maps öffnen',
        ],
        'directions_short' => [
            'label' => 'Route abrufen',
        ],
        'attribution' => [
            'label' => 'Karte © :link-Mitwirkende',
        ],
    ],
    'fields' => [
        'map' => [
            'alt' => 'Karte: :address',
        ],
    ],
    'sectors' => [
        'badge' => [
            'label' => 'Spezialisierter Bereich',
        ],
        'focus_areas' => [
            'label' => 'Schwerpunkte:',
        ],
        'compliance' => [
            'label' => 'Konformität:',
        ],
    ],
    'cta' => [
        'banner' => [
            'primary' => 'Loslegen',
            'secondary' => 'Entdecken',
        ],
    ],
    'blog' => [
        'recent_articles' => [
            'label' => 'Aktuelle Artikel',
        ],
        'all_articles' => [
            'label' => 'Alle Artikel',
        ],
        'featured_articles' => [
            'label' => 'Ausgewählte Artikel',
        ],
        'read' => [
            'label' => 'Lesen',
        ],
        'read_article' => [
            'label' => 'Artikel lesen',
        ],
        'view_all' => [
            'label' => 'Alle Artikel ansehen',
        ],
    ],
    'company' => [
        'pec' => [
            'label' => 'PEC (zertifizierte E-Mail)',
        ],
        'registered_office' => [
            'label' => 'Firmensitz',
        ],
    ],
    'resources' => [
        'download_pdf' => [
            'label' => 'PDF herunterladen',
        ],
    ],
    'newsletter' => [
        'blog' => [
            'title' => 'Immer auf dem Laufenden',
            'description' => 'Abonnieren Sie den Newsletter und erhalten Sie die neuesten Artikel und regulatorischen Neuigkeiten direkt in Ihr Postfach.',
            'cta_label' => 'Newsletter abonnieren',
            'email_placeholder' => 'Ihre E-Mail-Adresse',
            'privacy_note' => 'Kein Spam, nur hochwertige Inhalte. Sie können sich jederzeit abmelden.',
        ],
        'form' => [
            'cta_label' => 'Abonnieren',
            'email_placeholder' => 'Ihre geschäftliche E-Mail-Adresse',
        ],
    ],
    'sidebar' => [
        'system_active' => [
            'label' => 'System aktiv',
        ],
    ],
    'service_card' => [
        'status' => [
            'active' => 'Aktiv',
            'inactive' => 'Nicht verfügbar',
            'maintenance' => 'In Wartung',
        ],
        'featured' => [
            'label' => 'Hervorgehoben',
        ],
        'access' => [
            'label' => 'Zugreifen',
            'aria_label' => 'Auf den Service zugreifen: :title',
        ],
    ],
];
