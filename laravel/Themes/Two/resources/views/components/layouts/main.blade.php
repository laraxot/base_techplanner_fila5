@props([
    'title' => '',
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-cms::head :title="$title !== '' ? $title : null" theme-color="#0f2b46" />
    <body class="antialiased font-sans bg-white text-gray-900">
        <a href="#main-content" class="skip-link sr-only">{{ __('pub_theme::navigation.actions.skip_to_main.label') }}</a>

        @if(isset($beforeMain))
            {!! $beforeMain !!}
        @endif

        <main id="main-content" role="main" tabindex="-1" @class(['pt-[var(--site-header-h)]' => isset($beforeMain)])>
            {!! $slot ?? '' !!}
        </main>

        @if(isset($afterMain))
            {!! $afterMain !!}
        @endif

        @livewireScripts
        @filamentScripts
        @vite(['resources/js/app.js'], 'themes/Two')
    </body>
</html>
