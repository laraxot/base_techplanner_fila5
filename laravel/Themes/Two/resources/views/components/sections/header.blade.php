@php
    $navBlock = Arr::first($blocks, fn($item) => $item->slug == 'nav-main');
    $brand = $navBlock->data['brand'] ?? 'Radioprotezione';
    $menuItems = $navBlock->data['items'] ?? [];
    $cta = $navBlock->data['cta'] ?? null;
@endphp

<header x-data="{ mobileMenuOpen: false }" 
        class="fixed top-0 left-0 right-0 z-50 bg-white/10 backdrop-blur-md border-b border-white/20 transition-all duration-300">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            {{-- Branding - RP Logo Circle --}}
            <a href="/{{ app()->getLocale() }}" class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-[#1E5A96] rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-xl">RP</span>
                </div>
                <span class="text-white font-semibold text-lg">{{ $brand }}</span>
            </a>

            {{-- Desktop Navigation - Anchor Links --}}
            <nav class="hidden md:flex items-center space-x-8">
                @foreach($menuItems as $item)
                    <a href="{{ $item['url'] ?? '#' }}" 
                       class="text-white hover:text-[#E67E22] transition-colors font-medium text-sm lg:text-base">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            {{-- CTA Button & Mobile Trigger --}}
            <div class="flex items-center space-x-4">
                @if($cta)
                    <a href="{{ $cta['url'] }}" 
                       class="hidden md:inline-flex items-center justify-center bg-[#E67E22] hover:bg-[#d35400] text-white px-6 py-2 rounded-lg transition-colors font-medium">
                        {{ $cta['label'] }}
                    </a>
                @endif

                {{-- Mobile Menu Trigger --}}
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="md:hidden p-2 rounded-lg text-white hover:bg-white/10 transition-colors"
                        aria-label="Toggle menu">
                    <x-heroicon-o-bars-3 x-show="!mobileMenuOpen" class="w-6 h-6" />
                    <x-heroicon-o-x-mark x-show="mobileMenuOpen" x-cloak class="w-6 h-6" />
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             @click.away="mobileMenuOpen = false"
             x-cloak
             class="md:hidden mt-4 space-y-2 pb-4">
            @foreach($menuItems as $item)
                <a href="{{ $item['url'] ?? '#' }}" 
                   @click="mobileMenuOpen = false"
                   class="block py-2 text-white hover:text-[#E67E22] transition-colors">
                    {{ $item['label'] }}
                </a>
            @endforeach
            @if($cta)
                <a href="{{ $cta['url'] }}" 
                   @click="mobileMenuOpen = false"
                   class="block w-full text-center bg-[#E67E22] hover:bg-[#d35400] text-white px-6 py-2 rounded-lg transition-colors font-medium">
                    {{ $cta['label'] }}
                </a>
            @endif
        </div>
    </div>
</header>

