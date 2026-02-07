@props([
    'title' => '',
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ? "$title — " : '' }}{{ config('app.name') }}</title>

        <style>[x-cloak] { display: none !important; }</style>

        @filamentStyles
        @vite(['resources/css/app.css'], 'themes/Two')
    </head>
    <body class="antialiased font-sans bg-white text-gray-900">
        {!! $slot ?? '' !!}

        @livewireScripts
        @filamentScripts
        @vite(['resources/js/app.js'], 'themes/Two')
    </body>
</html>
