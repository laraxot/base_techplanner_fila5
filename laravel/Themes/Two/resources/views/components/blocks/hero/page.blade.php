@props([
    'title' => '',
    'subtitle' => '',
    'bg_color' => 'brand-blue',
])

@php
    // Whitelist: le classi Tailwind devono comparire per intero nel sorgente per essere compilate.
    $background = match ($bg_color) {
        'brand-green' => 'bg-brand-green',
        default => 'bg-brand-blue',
    };
@endphp

<section class="{{ $background }} py-12 sm:py-20 lg:py-28">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-4xl mx-auto min-w-0">
            @if(!empty($title))
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 leading-tight break-words">{{ $title }}</h1>
            @endif

            @if(!empty($subtitle))
                <p class="text-lg md:text-xl text-white leading-relaxed break-words">{{ $subtitle }}</p>
            @endif
        </div>
    </div>
</section>
