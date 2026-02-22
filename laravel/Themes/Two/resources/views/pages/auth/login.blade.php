<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Accedi - Sottana Service</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'], 'themes/Two')
    @filamentStyles
    @livewireStyles
</head>
<body class="font-sans text-gray-900 antialiased">
    @if (auth()->check())
        <?php return redirect()->intended('/dashboard'); ?>
    @endif

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Accedi al tuo account</h2>
                <p class="mt-2 text-sm text-gray-600">Inserisci le tue credenziali per continuare</p>
            </div>

            @livewire(\Modules\User\Filament\Widgets\Auth\LoginWidget::class)
        </div>
    </div>

    @livewireScripts
    @filamentScripts
</body>
</html>
