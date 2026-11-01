@props([
    'title' => '',
    'titleKey' => null,
])
@php
    // La chiave di traduzione si usa solo se esiste nella lingua corrente (senza ripiego): mai una chiave grezza né un titolo in un'altra lingua.
    $documentTitle = $title !== '' ? $title : (is_string($titleKey) && trans()->has($titleKey, null, false) ? __($titleKey) : null);
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <x-pub_theme::ui.cookie-bar-space />
    <x-cms::head :title="$documentTitle" theme-color="#0f2b46" />
    <body>
        <a href="#main-content" class="skip-link sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:rounded focus:bg-white focus:px-4 focus:py-2 focus:text-gray-900">
            {{ __('pub_theme::navigation.actions.skip_to_main.label') }}
        </a>

        <main id="main-content" role="main" tabindex="-1">
            @isset($slot)
                {{ $slot }}
            @else
                @yield('body')
            @endisset
        </main>

        @livewire('notifications')
        @livewireScripts
        @filamentScripts
        @vite(['resources/js/app.js'], 'themes/Two')
    </body>
</html>
