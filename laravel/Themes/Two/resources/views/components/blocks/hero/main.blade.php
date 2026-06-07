@props([
    'title' => '',
    'subtitle' => '',
    'description' => '',
    'backgroundImage' => '',
    'ctaPrimary' => ['label' => '', 'url' => '', 'style' => 'primary'],
    'ctaSecondary' => ['label' => '', 'url' => '', 'style' => 'secondary'],
    'stats' => [],
])

<section class="relative min-h-[90vh] flex flex-col justify-center overflow-hidden">
    
    {{-- Background Image Overlay --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ $backgroundImage ?: 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=1920&q=80' }}" 
             alt="{{ $title }}"
             fetchpriority="high"
             loading="eager"
             class="w-full h-full object-cover"
             width="1920"
             height="1080">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0f2744]/90 via-[#1a3a5c]/80 to-[#0f2744]/70"></div>
    </div>

    {{-- Content --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="max-w-3xl">
            @if($title)
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-[1.1] mb-6 tracking-tight">
{{--
/**
 * Hero Section Block - Theme Two
 * Versione minimalista e pulita per il tema Two
 */
--}}

<section class="relative bg-gradient-to-br from-slate-900 to-slate-700 text-white py-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            @if(isset($title))
                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                    {{ $title }}
                </h1>
            @endif

            @if($description)
                <p class="text-lg lg:text-xl text-white/80 leading-relaxed mb-10 max-w-2xl">
                    {{ $description }}
                </p>
            @endif

            <div class="flex flex-col sm:flex-row gap-4 mb-16">
                @if($ctaPrimary['label'] ?? null)
                    <a href="{{ $ctaPrimary['url'] }}"
                       class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-emerald-500 hover:bg-emerald-600 text-white font-semibold rounded-lg transition-all duration-300 shadow-lg hover:shadow-emerald-500/30 text-base">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ $ctaPrimary['label'] }}
                    </a>
                @endif

                @if($ctaSecondary['label'] ?? null)
                    <a href="{{ $ctaSecondary['url'] }}"
                       class="inline-flex items-center justify-center gap-2 px-8 py-4 border-2 border-white/30 text-white font-semibold rounded-lg hover:bg-white/10 transition-all duration-300 text-base">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        {{ $ctaSecondary['label'] }}
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @if(isset($cta_primary))
                    <a href="{{ $cta_primary['url'] ?? '#' }}" 
                       class="bg-white text-slate-900 px-6 py-3 rounded-md font-semibold hover:bg-slate-100 transition">
                        {{ $cta_primary['label'] ?? 'Inizia' }}
                    </a>
                @endif

                @if(isset($cta_secondary))
                    <a href="{{ $cta_secondary['url'] ?? '#' }}" 
                       class="border border-white text-white px-6 py-3 rounded-md font-semibold hover:bg-white hover:text-slate-900 transition">
                        {{ $cta_secondary['label'] ?? 'Scopri' }}
                    </a>
                @endif
            </div>
        </div>
</section>



