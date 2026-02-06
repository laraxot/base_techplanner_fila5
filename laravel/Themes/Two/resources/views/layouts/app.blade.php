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
        @vite('resources/css/app.css', 'themes/Two/build')
    </head>

    <body class="antialiased font-sans bg-base-100 text-base-content selection:bg-primary selection:text-primary-content">
        {{-- Navigation --}}
        <x-blocks.navigation.simple 
            :brand="config('app.name')" 
            :menu_items="[
                ['label' => 'Homepage', 'url' => '/it'],
                ['label' => 'Features', 'url' => '#features'],
                ['label' => 'Prezzi', 'url' => '#pricing'],
                ['label' => 'Contatti', 'url' => '/it/contact'],
            ]" 
        />

        <main class="relative min-h-screen">
            {{-- Background decorative blobs --}}
            <div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
                <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-[120px]"></div>
                <div class="absolute bottom-[-10%] right-[-10%] w-[30%] h-[30%] bg-secondary/5 rounded-full blur-[100px]"></div>
            </div>

            <div class="relative z-10">
                {{ $slot }}
            </div>
        </main>

        @livewire('notifications')

        @footer
        
        @filamentScripts
        @vite('resources/js/app.js', 'themes/Two/build')
    </body>

</html>

