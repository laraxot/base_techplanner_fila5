<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @if(isset($title))
        <title>{{ $title }} - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    
    @vite(['resources/css/app.css', 'resources/js/app.js'], 'themes/Two')
    
    {{ $head ?? '' }}
</head>
<body class="antialiased">
    <div class="min-h-screen flex flex-col">
        {{ $slot }}
    </div>
    
    @livewireScripts
</body>
</html>