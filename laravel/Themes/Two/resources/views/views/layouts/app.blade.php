@props([
    'title' => '',
    'siteName' => config('app.name'),
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-cms::head :title="$title !== '' ? $title : null" />
    <body class="bg-white">
        <div class="flex flex-col min-h-screen">
            <header class="bg-black text-white">
                <x-std tpl="container">
                    <nav class="main-nav flex items-center">
                        @if ($siteName)
                            <div class="text-2xl"><a href="/">{{ $siteName }}</a></div>
                        @endif
                        <x-menu name="main" />
                    </nav>
                </x-std>
            </header>
            <main>{!! $slot ?? '' !!}</main>
            <footer class="mt-auto text-center">
                <x-std tpl="container" class="text-gray-700">
                    <div class="flex flex-col lg:flex-row items-center justify-center space-x-4">
                        <span>{{ __('pub_theme::footer.legal.notice.label', ['year' => date('Y'), 'name' => 'ACME inc.']) }}</span>
                        <x-menu name="footer" />
                    </div>
                </x-std>
            </footer>
        </div>
        @livewire('notifications')
        @livewireScripts
        @filamentScripts
        @vite(['resources/js/app.js'], 'themes/Two')
    </body>
</html>
