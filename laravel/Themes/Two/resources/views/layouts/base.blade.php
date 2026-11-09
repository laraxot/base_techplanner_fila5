<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-cms::head />
    <body>
        @yield('body')
        @livewireScripts
        {{-- Widget Filament (auth): servono gli Alpine data provider Filament
            (filamentSchema, passwordRevealFormComponent) — @filamentScripts(withCore: true)
            è la via documentata, come nel layout del panel. --}}
        @filamentScripts(withCore: true)
        @vite(['resources/js/app.js'], 'themes/Two')
    </body>
</html>
