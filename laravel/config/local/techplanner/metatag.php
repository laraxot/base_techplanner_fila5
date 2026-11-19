<?php

declare(strict_types=1);

return [
    'author' => '',
    'charset' => 'UTF-8',
    'color_banner' => '#000',
    'color_hamburger' => '#000',
    'color_megamenu' => '#d60021',
    'color_primary' => '#0071b0',
    'color_title' => 'white',
    'description' => '',
    'facebook_href' => 'https://facebook.com/marcosottana',
    'fastlink' => false,
    'favicon' => 'xot::img/favicon.ico',
    'generator' => '',
    'hero_type' => 'with_megamenu_bottom',
    'hide_megamenu' => false,
    'keywords' => '',
    'logo_alt' => 'Sottana Service',
    'logo_footer_img' => '/img/sottana.com/logo.svg',
    'logo_header' => '/img/sottana.com/logo.svg',
    'logo_header_dark' => '/img/sottana.com/logo-dark.svg',
    'logo_img' => '/img/sottana.com/logo.svg',
    'logo_square' => '/img/sottana.com/logo.svg',
    'nome_comune' => '',
    'nome_regione' => '',
    'site_title' => '',
    'sitename' => 'Sottana',
    'sottotitolo_comune' => '',
    'subtitle' => 'Find Solutions',
    'title' => 'Sottana',
    'twitter_href' => '',
    'youtube_href' => '',

    /*
     * Dati pubblici dell'attività per il JSON-LD della home (Cms BuildHeadSchemaAction): Google li usa per le ricerche
     * locali («radioprotezione studio dentistico Treviso»). Nome, indirizzo e telefono devono essere identici a quelli
     * del piè di pagina e della scheda Google Business Profile.
     */
    'business' => [
        'type' => 'ProfessionalService',
        'legalName' => 'Sottana Service di Sottana Marco',
        'description' => 'Radioprotezione, verifiche di sicurezza elettrica degli elettromedicali (CEI EN 62353) e autorizzazioni sanitarie per studi dentistici e cliniche veterinarie in Veneto.',
        'telephone' => '+39 041 455552',
        'email' => 'studio@sottana.com',
        'vatID' => 'IT05532540266',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Via Augusto Vanzo 86 A',
            'addressLocality' => 'Mogliano Veneto',
            'addressRegion' => 'TV',
            'postalCode' => '31021',
            'addressCountry' => 'IT',
        ],
        'hasMap' => 'https://www.google.com/maps/search/?api=1&query=Via+Augusto+Vanzo+86+A%2C+31021+Mogliano+Veneto+%28TV%29',
        'areaServed' => [
            ['@type' => 'AdministrativeArea', 'name' => 'Veneto'],
            ['@type' => 'City', 'name' => 'Treviso'],
            ['@type' => 'City', 'name' => 'Venezia'],
            ['@type' => 'City', 'name' => 'Padova'],
        ],
        'founder' => ['@type' => 'Person', 'name' => 'Marco Sottana'],
        'sameAs' => [
            'https://linkedin.com/in/marcosottana',
            'https://facebook.com/marcosottana',
            'https://instagram.com/marcosottana',
        ],
        'knowsAbout' => [
            'Radioprotezione',
            'D.Lgs 101/2020',
            'Verifiche di sicurezza elettrica CEI EN 62353',
            'Apparecchiature elettromedicali',
            'Autorizzazioni sanitarie',
            'Radiologia odontoiatrica',
            'Radiologia veterinaria',
        ],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Servizi per studi dentistici e cliniche veterinarie',
            'itemListElement' => [
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Radioprotezione per studi dentistici e veterinari', 'url' => 'https://sottana.com/it/services/radioprotezione']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Verifiche di sicurezza elettrica degli elettromedicali (CEI EN 62353)', 'url' => 'https://sottana.com/it/services/elettromedicali']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Documentazione e autorizzazioni sanitarie', 'url' => 'https://sottana.com/it/services/documentazione']],
            ],
        ],
    ],
];
