@props([
    'title' => '',
    'subtitle' => '',
    'primary_cta_label' => '',
    'primary_cta_url' => '#',
    'secondary_cta_label' => '',
    'secondary_cta_url' => '#',
    'image' => '',
    'stats' => [],
])

{{-- Header fixed compensato una volta sola da <main> (pt-[var(--site-header-h)]): qui solo l'altezza sotto l'header. --}}
<section class="relative min-h-[calc(100dvh-var(--site-header-h))] flex items-center justify-center overflow-hidden py-8 sm:py-12 bg-gradient-to-br from-gray-900 via-brand-blue/95 to-black">
    <div class="absolute inset-0 bg-[radial-gradient(rgba(255,255,255,0.05)_1px,transparent_1px)] [background-size:24px_24px] opacity-40"></div>
    @if($image)
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-30"
             style="background-image: url('{{ $image }}');"></div>
    @endif

    <div class="container mx-auto px-4 relative z-10 text-center">
        <div class="max-w-4xl mx-auto">
            @if($title)
                <h1 class="text-3xl min-[480px]:text-4xl sm:text-5xl md:text-7xl lg:text-8xl font-bold text-white mb-6 leading-tight break-words">{{ $title }}</h1>
            @endif

            @if($subtitle)
                <p class="text-lg sm:text-xl md:text-2xl text-gray-200 mb-8 sm:mb-10 leading-relaxed max-w-3xl mx-auto">{{ $subtitle }}</p>
            @endif

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @if($primary_cta_label)
                    <a href="{{ $primary_cta_url }}"
                       class="inline-flex items-center justify-center font-semibold rounded-lg bg-brand-green hover:bg-brand-green-dark text-white text-lg px-8 py-4 group shadow-xl transition-all hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                        {{ $primary_cta_label }}
                    </a>
                @endif

                @if($secondary_cta_label)
                    <a href="{{ $secondary_cta_url }}"
                       class="inline-flex items-center justify-center font-semibold rounded-lg bg-white/10 text-white hover:bg-white hover:text-brand-blue border border-white/30 text-lg px-8 py-4 backdrop-blur-sm transition-all shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        {{ $secondary_cta_label }}
                    </a>
                @endif
            </div>

            @if(!empty($stats))
                <div class="mt-16 grid grid-cols-1 sm:grid-cols-3 gap-8 text-white max-w-3xl mx-auto">
                    @foreach($stats as $stat)
                        <div class="border-t-4 border-brand-orange pt-4">
                            <div class="text-3xl font-bold">{{ $stat['value'] ?? '' }}</div>
                            <div class="text-sm text-white mt-1">{{ $stat['label'] ?? '' }}</div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="pointer-events-none absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-gray-50 to-transparent" aria-hidden="true"></div>
</section>
