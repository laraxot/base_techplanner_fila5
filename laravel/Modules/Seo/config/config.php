<?php

declare(strict_types=1);

return [
    'name' => 'Seo',
    // 'icon' => 'heroicon-o-x-mark',
    'icon' => 'fas-superscript',
    'navigation_sort' => 1,

    /*
     * Pagine doppie del sito: percorso senza lingua dell'alias => percorso senza lingua della pagina canonica ('' = home).
     * `RedirectToCanonicalPath` risponde 301 nella stessa lingua e `BuildSitemapAction` non elenca l'alias.
     * La destinazione deve essere la pagina finale (mai un altro alias). I JSON degli alias restano dove sono.
     * Per ritirare un alias basta togliere la riga: la pagina torna a rispondere 200.
     * Scelta: la pagina con il contenuto completo in tutte le lingue attive (it, en) e con i link in ingresso (misure nella story privacy-gdpr-remediation di TechPlanner).
     *
     * @var array<string, string>
     */
    'path_aliases' => [
        'about' => 'chi-siamo',
        'contatti' => 'contacts',
        'cookie' => 'cookies',
        'faqs' => 'faq',
        'home' => '',
    ],
];
