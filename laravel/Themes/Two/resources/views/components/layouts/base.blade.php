@props([
    'title' => '',
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-cms::head :title="$title !== '' ? $title : null" theme-color="#0f2b46" />
    <body>
        @isset($slot)
            {{ $slot }}
        @else
            @yield('body')
        @endisset

        @livewire('notifications')
        @livewireScripts
        @filamentScripts
        @vite(['resources/js/app.js'], 'themes/Two')
    </body>
</html>
