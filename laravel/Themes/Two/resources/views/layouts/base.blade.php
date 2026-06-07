<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

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
<<<<<<< HEAD
        @vite(['Resources/css/app.css'],'themes/Two/dist')
=======
        @vite(['resources/css/app.css'], 'themes/Two')
>>>>>>> dev

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        @yield('body')

        @livewire('notifications')

        @filamentScripts
<<<<<<< HEAD
        @vite(['Resources/js/app.js'],'themes/Two/dist')
=======
        @vite(['resources/js/app.js'], 'themes/Two')
>>>>>>> dev
    </body>
</html>
