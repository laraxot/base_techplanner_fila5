{{-- Header Navigation - Matches target site exactly --}}
@php
    $navBlock = collect($blocks)->first(fn($item) => $item->slug == 'nav1');
    $navData = $navBlock->data ?? [];
    $menuItems = $navData['items'] ?? [];
    $brand = $navData['brand'] ?? $_theme->metatag('title');
    $subtitle = $navData['brand_subtitle'] ?? '';
    $ctaLabel = $navData['cta_label'] ?? 'Contattaci';
    $ctaUrl = $navData['cta_url'] ?? '#contact';
@endphp

{{-- Header Navigation - Dynamic Target Site Parity --}}
<header x-data="{ mobileMenuOpen: false, scrolled: false }" 
        x-init="window.addEventListener('scroll', () => { scrolled = window.pageYOffset > 50 })"
        :class="scrolled ? 'bg-[#1E5A96] shadow-lg py-2' : 'bg-white/10 backdrop-blur-md border-b border-white/20 py-4'"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="container mx-auto px-4 flex justify-between items-center">
        {{-- Logo --}}
        <a href="/{{ app()->getLocale() }}" class="flex items-center space-x-2 group">
            <div class="w-10 h-10 bg-[#E67E22] rounded-full flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                <span class="text-white font-bold text-xl">TP</span>
            </div>
            <div class="flex flex-col">
                <span class="text-white font-semibold text-lg leading-tight">{{ $brand }}</span>
                @if($subtitle)
                    <span class="text-[10px] uppercase tracking-widest text-gray-300 font-medium">{{ $subtitle }}</span>
                @endif
            </div>
        </a>

        {{-- Desktop Navigation --}}
        <nav class="hidden md:flex space-x-8" role="navigation" aria-label="Menu principale">
            @forelse($menuItems as $item)
                <a href="{{ $item['url'] ?? '#' }}" 
                   class="text-white hover:text-[#E67E22] transition-colors font-medium text-sm lg:text-base relative group">
                    {{ $item['label'] ?? '' }}
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#E67E22] transition-all duration-300 group-hover:w-full"></span>
                </a>
            @empty
                <a href="#services" class="text-white hover:text-[#E67E22] transition-colors font-medium relative group">
                    Servizi
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#E67E22] transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#testimonials" class="text-white hover:text-[#E67E22] transition-colors font-medium relative group">
                    Testimonianze
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#E67E22] transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#contact" class="text-white hover:text-[#E67E22] transition-colors font-medium relative group">
                    Contatti
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#E67E22] transition-all duration-300 group-hover:w-full"></span>
                </a>
            @endforelse
        </nav>

        {{-- CTA Button --}}
        <div class="flex items-center space-x-4">
            <a href="{{ $ctaUrl }}" class="bg-[#E67E22] hover:bg-[#d35400] text-white px-6 py-2 rounded-lg transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                {{ $ctaLabel }}
            </a>

            {{-- Mobile Menu Trigger --}}
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="md:hidden p-2 rounded-lg text-white hover:bg-white/10 transition-colors"
                    aria-label="Toggle menu">
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu Overlay --}}
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @click.away="mobileMenuOpen = false"
         x-cloak
         class="md:hidden bg-[#1E5A96]/95 backdrop-blur-lg border-t border-white/10 shadow-2xl overflow-hidden mt-2">
        <div class="px-4 py-6 space-y-4">
            @foreach($menuItems as $item)
                <a href="{{ $item['url'] ?? '#' }}" 
                   @click="mobileMenuOpen = false"
                   class="block py-2 text-white border-b border-white/5 hover:text-[#E67E22] transition-colors font-medium">
                    {{ $item['label'] ?? '' }}
                </a>
            @endforeach
            <a href="{{ $ctaUrl }}" 
               @click="mobileMenuOpen = false"
               class="block w-full text-center bg-[#E67E22] hover:bg-[#d35400] text-white px-6 py-3 rounded-lg transition-colors font-bold tracking-wide">
                {{ $ctaLabel }}
            </a>
        </div>
    </div>
</header>

{{-- Header Spacer --}}
<div class="h-20"></div>