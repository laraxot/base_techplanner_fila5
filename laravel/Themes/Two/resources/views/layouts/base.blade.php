<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-cms::head />
    <body>
        @yield('body')
        @livewireScripts
        @vite(['resources/js/app.js'], 'themes/Two')
    </body>
</html>
