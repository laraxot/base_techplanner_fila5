<?php

declare(strict_types=1);

return [
    'fields' => [
<<<<<<< HEAD
=======
        // Core Content Fields
>>>>>>> 4b6b99016 (first commit)
        'title' => [
            'label' => 'Titolo',
            'placeholder' => 'Inserisci il titolo principale',
            'help' => 'Titolo principale',
            'helper_text' => 'Titolo che apparirà come intestazione principale',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'slug' => [
            'label' => 'Slug',
            'placeholder' => 'testo-per-url',
<<<<<<< HEAD
            'help' => 'Versione dell\'URL del titolo (solo lettere minuscole, trattini e numeri]',
            'helper_text' => 'URL SEO-friendly generato automaticamente dal titolo',
            'tooltip' => '',
            'description' => '',
=======
            'help' => 'Versione dell\'URL del titolo (solo lettere minuscole, trattini e numeri)',
            'helper_text' => 'URL SEO-friendly generato automaticamente dal titolo',
>>>>>>> 4b6b99016 (first commit)
        ],
        'subtitle' => [
            'label' => 'Sottotitolo',
            'placeholder' => 'Inserisci un sottotitolo',
            'help' => 'Sottotitolo opzionale',
            'helper_text' => 'Testo secondario che accompagna il titolo principale',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'description' => [
            'label' => 'Descrizione',
            'placeholder' => 'Inserisci una descrizione',
            'help' => 'Testo descrittivo',
            'helper_text' => 'Descrizione utilizzata per SEO e preview social',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'content' => [
            'label' => 'Contenuto',
            'placeholder' => 'Scrivi il contenuto principale qui...',
            'helper_text' => 'Contenuto principale dell\'articolo o pagina',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'text' => [
            'label' => 'Testo',
            'placeholder' => 'Inserisci il testo',
            'helper_text' => 'Contenuto testuale semplice senza formattazione',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
        ],
=======
        ],
        // Media & Visual Elements
>>>>>>> 4b6b99016 (first commit)
        'image' => [
            'label' => 'Immagine',
            'help' => 'Carica un\'immagine',
            'placeholder' => 'Seleziona o carica immagine',
            'helper_text' => 'Immagine principale associata al contenuto',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'alt' => [
            'label' => 'Testo Alternativo',
            'placeholder' => 'Descrizione immagine per accessibilità',
            'helper_text' => 'Testo letto dagli screen reader per utenti non vedenti',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'width' => [
            'label' => 'Larghezza',
            'placeholder' => '100%, 500px, auto',
            'helper_text' => 'Larghezza dell\'elemento in pixel, percentuale o auto',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'height' => [
            'label' => 'Altezza',
            'placeholder' => '300px, auto, 50vh',
            'helper_text' => 'Altezza dell\'elemento in pixel, percentuale o viewport',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
        ],
=======
        ],
        // Layout & Design
>>>>>>> 4b6b99016 (first commit)
        'style' => [
            'label' => 'Stile',
            'help' => 'Stile di visualizzazione',
            'placeholder' => 'Seleziona stile di visualizzazione',
            'helper_text' => 'Stile predefinito per la visualizzazione dell\'elemento',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'size' => [
            'label' => 'Dimensione',
            'placeholder' => 'Piccolo, Medio, Grande',
            'helper_text' => 'Dimensione relativa dell\'elemento',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'alignment' => [
            'label' => 'Allineamento',
            'help' => 'Allineamento del testo',
            'options' => [
                'left' => 'Sinistra',
                'center' => 'Centro',
                'right' => 'Destra',
                'justify' => 'Giustificato',
            ],
            'placeholder' => 'Sinistra, Centro, Destra',
            'helper_text' => 'Allineamento del contenuto all\'interno dell\'elemento',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'gap' => [
            'label' => 'Spaziatura',
            'placeholder' => '10px, 1rem, small',
            'helper_text' => 'Spazio tra gli elementi',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'orientation' => [
            'label' => 'Orientamento',
            'placeholder' => 'Orizzontale, Verticale',
            'helper_text' => 'Orientamento del layout o degli elementi',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'background_color' => [
            'label' => 'Colore di sfondo',
            'help' => 'Seleziona un colore di sfondo',
            'placeholder' => '#FFFFFF, bianco, transparent',
            'helper_text' => 'Colore di sfondo dell\'elemento',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'text_color' => [
            'label' => 'Colore Testo',
            'placeholder' => '#000000, nero, inherit',
            'helper_text' => 'Colore del testo dell\'elemento',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'cta_color' => [
            'label' => 'Colore CTA',
            'placeholder' => '#007BFF, blu, primary',
            'helper_text' => 'Colore dei pulsanti call-to-action',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
        ],
=======
        ],
        // Navigation & Links
>>>>>>> 4b6b99016 (first commit)
        'items' => [
            'label' => 'Elementi',
            'help' => 'Elenco di elementi',
            'placeholder' => 'Aggiungi elementi alla lista',
            'helper_text' => 'Lista di elementi che compongono menu o collezioni',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'label' => [
            'label' => 'Etichetta',
            'placeholder' => 'Testo dell\'etichetta',
            'helper_text' => 'Testo visibile per link, pulsanti o elementi interattivi',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'url' => [
            'label' => 'URL',
            'placeholder' => 'https://esempio.com',
<<<<<<< HEAD
            'help' => 'Inserisci un URL valido (inizia con http:// o https://]',
            'helper_text' => 'Indirizzo web completo di destinazione',
            'tooltip' => '',
            'description' => '',
=======
            'help' => 'Inserisci un URL valido (inizia con http:// o https://)',
            'helper_text' => 'Indirizzo web completo di destinazione',
>>>>>>> 4b6b99016 (first commit)
        ],
        'target' => [
            'label' => 'Destinazione',
            'placeholder' => '_blank, _self, _parent, _top',
<<<<<<< HEAD
            'helper_text' => 'Come aprire il collegamento (stessa finestra o nuova]',
            'tooltip' => '',
            'description' => '',
=======
            'helper_text' => 'Come aprire il collegamento (stessa finestra o nuova)',
>>>>>>> 4b6b99016 (first commit)
        ],
        'icon' => [
            'label' => 'Icona',
            'help' => 'Seleziona un\'icona da visualizzare',
            'placeholder' => 'Seleziona icona rappresentativa',
            'helper_text' => 'Icona da mostrare accanto al testo o come elemento standalone',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
        ],
=======
        ],
        // UI Components
>>>>>>> 4b6b99016 (first commit)
        'view' => [
            'label' => 'Template',
            'placeholder' => 'Seleziona template di visualizzazione',
            'helper_text' => 'Template Blade utilizzato per renderizzare questo elemento',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'type' => [
            'label' => 'Tipo',
            'placeholder' => 'Categoria o tipologia',
            'helper_text' => 'Tipo di contenuto o categoria dell\'elemento',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
        ],
        'level' => [
            'label' => 'Livello',
            'placeholder' => 'Livello gerarchico (1-6]',
            'helper_text' => 'Livello di importanza nella gerarchia del contenuto',
            'tooltip' => '',
            'description' => '',
=======
        ],
        'level' => [
            'label' => 'Livello',
            'placeholder' => 'Livello gerarchico (1-6)',
            'helper_text' => 'Livello di importanza nella gerarchia del contenuto',
>>>>>>> 4b6b99016 (first commit)
        ],
        'children' => [
            'label' => 'Elementi Figli',
            'placeholder' => 'Elementi nested o subordinati',
            'helper_text' => 'Elementi contenuti o dipendenti da questo elemento',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
        ],
=======
        ],
        // Company & Contact Information
>>>>>>> 4b6b99016 (first commit)
        'email' => [
            'label' => 'Email',
            'placeholder' => 'esempio@dominio.com',
            'help' => 'Indirizzo email valido',
            'helper_text' => 'Indirizzo email principale per contatti',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'phone' => [
            'label' => 'Telefono',
            'placeholder' => '+39 000 000 0000',
            'helper_text' => 'Numero di telefono principale',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'address' => [
            'label' => 'Indirizzo',
            'placeholder' => 'Via Roma 1, 00100 Roma RM',
            'help' => 'Indirizzo completo',
            'helper_text' => 'Indirizzo fisico completo dell\'azienda',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'map_url' => [
            'label' => 'Link Mappa',
            'placeholder' => 'https://maps.google.com/...',
            'helper_text' => 'Link a Google Maps o altro servizio di mappe',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'logo' => [
            'label' => 'Logo',
            'placeholder' => 'Carica logo aziendale',
            'helper_text' => 'Logo rappresentativo dell\'azienda o brand',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'copyright' => [
            'label' => 'Copyright',
            'placeholder' => '2024 Nome Azienda. Tutti i diritti riservati.',
            'helper_text' => 'Testo di copyright da visualizzare nel footer',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
        ],
=======
        ],
        // Call-to-Action Elements
>>>>>>> 4b6b99016 (first commit)
        'button_text' => [
            'label' => 'Testo del pulsante',
            'placeholder' => 'Scopri di più',
            'help' => 'Testo visualizzato sul pulsante',
            'helper_text' => 'Testo che apparirà sul pulsante',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'button_link' => [
            'label' => 'Collegamento del pulsante',
            'placeholder' => 'https://esempio.com',
            'help' => 'URL di destinazione del pulsante',
            'helper_text' => 'URL di destinazione quando si clicca il pulsante',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'cta_text' => [
            'label' => 'Testo Call-to-Action',
            'placeholder' => 'Inizia ora, Contattaci oggi',
            'helper_text' => 'Testo persuasivo per invitare all\'azione',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'cta_link' => [
            'label' => 'Collegamento CTA',
            'placeholder' => 'https://esempio.com',
            'help' => 'URL di destinazione per la call-to-action',
            'helper_text' => 'URL della pagina di destinazione per la CTA',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
        ],
=======
        ],
        // Social Media
>>>>>>> 4b6b99016 (first commit)
        'social_links' => [
            'label' => 'Link Social',
            'placeholder' => 'Aggiungi profili social media',
            'helper_text' => 'Collegamenti ai profili social dell\'azienda',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'platform' => [
            'label' => 'Piattaforma',
            'placeholder' => 'Facebook, Instagram, LinkedIn, Twitter',
            'helper_text' => 'Nome della piattaforma social media',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'links' => [
            'label' => 'Collegamenti',
            'placeholder' => 'Lista di link di navigazione',
            'helper_text' => 'Collezione di collegamenti per menu o footer',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
        ],
=======
        ],
        // Statistics & Data
>>>>>>> 4b6b99016 (first commit)
        'stats' => [
            'label' => 'Statistiche',
            'placeholder' => 'Dati numerici da evidenziare',
            'helper_text' => 'Statistiche o metriche da mostrare',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'number' => [
            'label' => 'Numero',
            'placeholder' => 'Valore numerico',
            'helper_text' => 'Valore numerico per contatori o statistiche',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
        ],
=======
        ],
        // Page Structure
>>>>>>> 4b6b99016 (first commit)
        'sections' => [
            'label' => 'Sezioni',
            'help' => 'Elenco delle sezioni',
            'placeholder' => 'Sezioni che compongono la pagina',
            'helper_text' => 'Sezioni principali che strutturano il contenuto',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'content_blocks' => [
            'label' => 'Blocchi Contenuto',
            'placeholder' => 'Blocchi di contenuto principale',
            'helper_text' => 'Blocchi che compongono il corpo principale della pagina',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'sidebar_blocks' => [
            'label' => 'Blocchi Sidebar',
            'placeholder' => 'Contenuti della barra laterale',
            'helper_text' => 'Elementi da visualizzare nella barra laterale',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'footer_blocks' => [
            'label' => 'Blocchi Footer',
            'placeholder' => 'Contenuti del piè di pagina',
            'helper_text' => 'Elementi da includere nel footer del sito',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
        ],
=======
        ],
        // Interactive Elements
>>>>>>> 4b6b99016 (first commit)
        'placeholder' => [
            'label' => 'Placeholder',
            'placeholder' => 'Testo segnaposto per campi input',
            'helper_text' => 'Testo mostrato nei campi vuoti come suggerimento',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'success_message' => [
            'label' => 'Messaggio Successo',
            'placeholder' => 'Operazione completata con successo',
            'helper_text' => 'Messaggio mostrato quando un\'operazione ha successo',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'error_message' => [
            'label' => 'Messaggio Errore',
            'placeholder' => 'Si è verificato un errore',
            'helper_text' => 'Messaggio mostrato in caso di errore',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
        ],
        'background' => [
            'label' => 'Sfondo',
            'placeholder' => 'Immagine o colore di sfondo',
            'helper_text' => 'Sfondo della sezione (immagine, colore o gradiente]',
            'tooltip' => '',
            'description' => '',
=======
        ],
        // Advanced Layout
        'background' => [
            'label' => 'Sfondo',
            'placeholder' => 'Immagine o colore di sfondo',
            'helper_text' => 'Sfondo della sezione (immagine, colore o gradiente)',
>>>>>>> 4b6b99016 (first commit)
        ],
        'buttons' => [
            'label' => 'Pulsanti',
            'placeholder' => 'Pulsanti di azione per l\'utente',
            'helper_text' => 'Collezione di pulsanti per interazioni utente',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'class' => [
            'label' => 'Classe CSS',
            'placeholder' => 'custom-class another-class',
            'helper_text' => 'Classi CSS personalizzate per styling avanzato',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'link' => [
            'label' => 'Collegamento',
            'placeholder' => 'https://link-destinazione.it',
            'helper_text' => 'URL generico di collegamento',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'ratio' => [
            'label' => 'Proporzioni',
            'placeholder' => '16:9, 4:3, 1:1, 21:9',
            'helper_text' => 'Rapporto di proporzione per immagini e video',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'caption' => [
            'label' => 'Didascalia',
            'placeholder' => 'Didascalia per immagine o video',
            'helper_text' => 'Testo descrittivo mostrato sotto contenuti multimediali',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'img_uuid' => [
            'label' => 'ID Immagine',
            'placeholder' => 'UUID dell\'immagine',
            'helper_text' => 'Identificatore univoco dell\'immagine nel sistema',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'gallery' => [
            'label' => 'Galleria',
            'placeholder' => 'Collezione di immagini',
            'helper_text' => 'Galleria di immagini correlate',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'version' => [
            'label' => 'Versione',
            'placeholder' => '1.0.0, v2.1, beta',
            'helper_text' => 'Versione del contenuto o componente',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'method' => [
            'label' => 'Metodo',
            'placeholder' => 'GET, POST, PUT, DELETE',
            'helper_text' => 'Metodo HTTP per form o richieste API',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'video' => [
            'label' => 'Video',
            'placeholder' => 'URL video YouTube/Vimeo o carica file',
            'helper_text' => 'Video da incorporare o collegare',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'save' => [
            'label' => 'Salva',
            'success' => 'Contenuto salvato con successo',
            'error' => 'Errore durante il salvataggio del contenuto',
            'confirmation' => 'Vuoi salvare le modifiche apportate?',
        ],
        'cancel' => [
            'label' => 'Annulla',
            'confirmation' => 'Sei sicuro di voler annullare? Tutte le modifiche non salvate andranno perse.',
        ],
        'activeLocale' => [
            'label' => 'Lingua Attiva',
            'description' => 'Seleziona la lingua per la traduzione del contenuto',
            'help' => 'Modifica la lingua di editing per contenuti multilingua',
        ],
    ],
    'sections' => [
        'content' => [
            'label' => 'Contenuto',
            'description' => 'Gestione del contenuto principale',
        ],
        'media' => [
            'label' => 'Media',
            'description' => 'Immagini, video e contenuti multimediali',
        ],
        'design' => [
            'label' => 'Design',
            'description' => 'Aspetto visivo e layout',
        ],
        'navigation' => [
            'label' => 'Navigazione',
            'description' => 'Menu, link e struttura di navigazione',
        ],
        'company' => [
            'label' => 'Azienda',
            'description' => 'Informazioni aziendali e contatti',
        ],
        'social' => [
            'label' => 'Social Media',
            'description' => 'Profili e collegamenti social',
        ],
        'cta' => [
            'label' => 'Call-to-Action',
            'description' => 'Pulsanti e inviti all\'azione',
        ],
        'structure' => [
            'label' => 'Struttura',
            'description' => 'Layout e organizzazione della pagina',
        ],
        'advanced' => [
            'label' => 'Avanzato',
            'description' => 'Impostazioni tecniche e personalizzazioni',
        ],
    ],
    'messages' => [
        'content_saved' => 'Contenuto salvato con successo',
        'save_error' => 'Si è verificato un errore durante il salvataggio',
        'validation_failed' => 'Alcuni campi contengono errori. Controlla e riprova.',
        'unsaved_changes' => 'Hai modifiche non salvate',
        'confirm_navigation' => 'Vuoi davvero lasciare questa pagina? Le modifiche non salvate andranno perse.',
        'loading_content' => 'Caricamento contenuto in corso...',
        'processing_save' => 'Salvataggio in corso...',
        'image_upload_success' => 'Immagine caricata con successo',
        'image_upload_error' => 'Errore durante il caricamento dell\'immagine',
        'video_upload_success' => 'Video caricato con successo',
        'video_upload_error' => 'Errore durante il caricamento del video',
    ],
    'validation' => [
        'title_required' => 'Il titolo è obbligatorio',
        'slug_unique' => 'Questo slug è già in uso',
        'email_format' => 'Inserisci un indirizzo email valido',
        'url_format' => 'Inserisci un URL valido',
        'phone_format' => 'Inserisci un numero di telefono valido',
        'image_size' => 'L\'immagine deve essere inferiore a 5MB',
        'video_format' => 'Formato video non supportato',
        'required_field' => 'Questo campo è obbligatorio',
<<<<<<< HEAD
        'max_length' => 'Il testo è troppo lungo (massimo :max caratteri]',
        'min_length' => 'Il testo è troppo corto (minimo :min caratteri]',
    ],
    'label' => 'Txt',
    'plural_label' => 'Txt (Plurale)',
    'navigation' => [
        'name' => 'Txt',
        'plural' => 'Txt',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Txt',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
=======
        'max_length' => 'Il testo è troppo lungo (massimo :max caratteri)',
        'min_length' => 'Il testo è troppo corto (minimo :min caratteri)',
>>>>>>> 4b6b99016 (first commit)
    ],
];
