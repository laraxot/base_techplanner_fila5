@props(['title' => ''])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-cms::head :title="$title" />
    <body>
        @isset($slot){{ $slot }}@else @yield('body') @endisset
        @livewire('notifications')
        @livewireScripts
        @filamentScripts
        @vite(['resources/js/app.js'], 'themes/Two')
    </body>
</html>
