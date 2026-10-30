@props([
    'title' => '',
])
@php
    $metatag = \Modules\Xot\Datas\MetatagData::make();

    /*
     * Titolo del documento (WCAG 2.4.2). Prima: `$metatag->getTitle() ?? ...` — ma getTitle() restituisce SEMPRE una stringa
     * (il `title` di config/metatag, "Sottana"), quindi il `??` non scattava mai e ogni pagina si chiamava "Sottana" + app.name ("Laravel").
     * Ordine: prop `title` della pagina; altrimenti titolo della pagina CMS della rotta Folio (slug `container0[.slug0]` o nome rotta);
     * il marchio si accoda solo se il titolo CMS non lo contiene gia' (es. "Blog e Risorse - Sottana Service").
     */
    $brand = (string) __('pub_theme::header.brand.name');
    $pageTitle = trim((string) $title);
    if ($pageTitle === '' && ($folioRoute = request()->route()) !== null) {
        $container0 = $folioRoute->parameter('container0');
        $slug0 = $folioRoute->parameter('slug0');
        $routeName = (string) $folioRoute->getName();
        $cmsSlugs = array_values(array_filter([
            is_string($container0) && is_string($slug0) && $slug0 !== '' ? $container0.'.'.$slug0 : null,
            is_string($container0) ? $container0 : null,
            ! in_array($routeName, ['', 'container0', 'container0.view'], true) ? $routeName : null,
        ]));
        foreach ($cmsSlugs as $cmsSlug) {
            $cmsPage = \Modules\Cms\Models\Page::findUniqueBySlug($cmsSlug);
            if ($cmsPage !== null) {
                $pageTitle = trim((string) $cmsPage->title);

                break;
            }
        }
    }
    $documentTitle = $pageTitle === '' ? $brand : (str_contains($pageTitle, $brand) ? $pageTitle : $pageTitle.' — '.$brand);
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="application-name" content="{{ $brand }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- Mobile: barra del browser in tinta con l'header (#0f2b46). Mai maximum-scale/user-scalable: blocca lo zoom (WCAG 1.4.4). --}}
        <meta name="theme-color" content="#0f2b46">

        <title>{{ $documentTitle }}</title>
        @if($metatag->getDescription())
        <meta name="description" content="{{ $metatag->getDescription() }}">
        @endif

        {{-- Critical CSS inline --}}
        <style>[x-cloak] { display: none !important; }</style>

        {{-- Non-blocking CSS loading --}}
        @filamentStyles
        @vite(['resources/css/app.css'], 'themes/Two')
    </head>
    <body class="antialiased font-sans bg-white text-gray-900">
        {{-- Skip link: PRIMO elemento del body e primo stop di Tab (WCAG 2.4.1). Lo stile al focus (fisso, sopra l'header) e' in
             resources/css/app.css (.skip-link). La barra cookie del modulo Gdpr si inserisce DOPO questo link, mai prima. --}}
        <a href="#main-content" class="skip-link sr-only">{{ __('pub_theme::navigation.actions.skip_to_main.label') }}</a>

        @if(isset($beforeMain))
            {!! $beforeMain !!}
        @endif

        {{-- Header fixed (beforeMain) fuori dal flusso: l'offset si riserva QUI, una volta, per ogni hero e pagina.
             --site-header-h e' definita in resources/css/app.css. Senza header (nessun beforeMain) niente offset. --}}
        <main id="main-content" role="main" tabindex="-1" @class(['pt-[var(--site-header-h)]' => isset($beforeMain)])>
            {!! $slot ?? '' !!}
        </main>

        @if(isset($afterMain))
            {!! $afterMain !!}
        @endif

        {{-- Livewire and Filament Scripts --}}
        @livewireScripts
        @filamentScripts
        
        {{-- Application JS --}}
        @vite(['resources/js/app.js'], 'themes/Two')
    </body>
</html>
