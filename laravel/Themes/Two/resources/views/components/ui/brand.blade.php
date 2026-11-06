@props([
    'tone' => 'light',
    'class' => 'h-12 w-12',
])

{{--
    Marchio del sito come nell'header (sections/header/v1): elefante stilizzato + nome del brand.
    tone=light: su fondo scuro (bianco); tone=dark: su fondo chiaro (grigio scuro).
    Il testo e' reale (non un'immagine): niente filtri CSS sul logo e niente SVG segnaposto con altro nome.
--}}
<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-3 font-bold '.($tone === 'light' ? 'text-white' : 'text-gray-900')]) }}>
    <svg class="shrink-0 {{ $class }}" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
        <ellipse cx="50" cy="60" rx="25" ry="20" fill="currentColor" opacity="0.9"/>
        <ellipse cx="65" cy="50" rx="18" ry="22" fill="currentColor"/>
        <path d="M 83 50 Q 95 45 97 40 Q 98 35 96 30 Q 94 25 90 28 Q 88 30 88 35 Q 88 40 86 45 Q 85 48 83 50 Z" fill="currentColor"/>
        <ellipse cx="75" cy="40" rx="12" ry="15" fill="currentColor" opacity="0.7"/>
        <circle cx="70" cy="48" r="3" fill="white"/>
        <circle cx="70" cy="48" r="1.5" fill="currentColor"/>
        <path d="M 87 45 L 90 35 L 87 40 Z" fill="currentColor" opacity="0.8"/>
        <ellipse cx="60" cy="75" rx="6" ry="8" fill="currentColor"/>
        <ellipse cx="40" cy="75" rx="6" ry="8" fill="currentColor"/>
        <path d="M 27 60 Q 20 55 17 50" stroke="currentColor" stroke-width="3" stroke-linecap="round" fill="none"/>
        <circle cx="17" cy="50" r="2" fill="currentColor"/>
    </svg>
    <span class="text-xl md:text-2xl">{{ __('pub_theme::header.brand.name') }}</span>
</span>
