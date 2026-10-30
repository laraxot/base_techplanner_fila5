<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- Mobile: barra del browser in tinta con il brand. --}}
        <meta name="theme-color" content="#0f2b46">
        {{-- Titolo (WCAG 2.4.2): sezione `title` o prop `title` (layouts/guest), poi il marchio del tema (non app.name = "Laravel"). --}}
        @php
            $baseTitle = trim((string) ($__env->yieldContent('title') ?: ($title ?? '')));
            $baseBrand = (string) __('pub_theme::header.brand.name');
        @endphp
        <title>{{ $baseTitle !== '' ? $baseTitle.' — '.$baseBrand : $baseBrand }}</title>

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        @filamentStyles
        @vite(['resources/css/app.css'], 'themes/Two')

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Alpine.js: fornito da Livewire/Filament nel bundle, NON da CDN. Vedi docs/fix/layout.txt --}}
    </head>

    <body>
        @isset($slot)
            {{ $slot }}
        @else
            @yield('body')
        @endisset

        @livewire('notifications')

        {{-- Livewire prima di Filament: necessario per $wire nei form (LoginWidget, ecc.) --}}
        @livewireScripts
        @filamentScripts
        @vite(['resources/js/app.js'], 'themes/Two')
    </body>
</html>
