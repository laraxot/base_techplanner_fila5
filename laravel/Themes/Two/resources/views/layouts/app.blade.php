<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        @filamentStyles
        @vite('resources/css/app.css', 'themes/Two')
    </head>

    <body class="antialiased font-sans bg-base-100 text-base-content selection:bg-primary selection:text-primary-content">
        {{-- Dynamic Header Section --}}
        @php
            $headerSection = \Modules\Cms\Models\Section::getBlocksBySlug('header');
        @endphp
        @include('two::components.sections.header.v1', ['blocks' => $headerSection])

        <main class="relative min-h-screen">
            {{ $slot }}
        </main>

        @livewire('notifications')

        {{-- Dynamic Footer Section --}}
        @php
             $footerSection = \Modules\Cms\Models\Section::getBlocksBySlug('footer');
        @endphp
        @include('two::components.sections.footer.v1', ['blocks' => $footerSection])
        
        @filamentScripts
        @vite('resources/js/app.js', 'themes/Two')
    </body>


</html>

