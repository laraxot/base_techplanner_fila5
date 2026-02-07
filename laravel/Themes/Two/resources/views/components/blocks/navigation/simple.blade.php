@props([
    'brand' => 'Marco Sottana',
    'brand_subtitle' => 'Consulenza Sicurezza',
    'items' => [],
    'cta_label' => 'Richiedi Consulenza',
    'cta_url' => '/contatti',
    'cta_icon' => 'phone',
])

<header x-data="{ mobileMenuOpen: false, scrolled: false }" 
        x-init="window.addEventListener('scroll', () => { scrolled = window.pageYOffset > 50 })"
        :class="scrolled ? 'bg-white shadow-md py-3' : 'bg-transparent py-4'"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
            {{-- Logo --}}
            <a href="/{{ app()->getLocale() }}" class="flex items-center space-x-2 group">
                <div class="font-bold text-xl transition-colors duration-300"
                     :class="scrolled ? 'text-[#1E5A96]' : 'text-white'">
                    <span class="block">{{ $brand }}</span>
                    @if($brand_subtitle)
                    <span class="text-xs font-normal transition-colors duration-300"
                          :class="scrolled ? 'text-gray-600' : 'text-gray-200'">{{ $brand_subtitle }}</span>
                    @endif
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden lg:flex items-center space-x-8" role="navigation" aria-label="Menu principale">
                @foreach($items as $item)
                    <a href="{{ $item['url'] ?? '#' }}" 
                       class="font-medium transition-colors relative group py-2"
                       :class="scrolled ? 'text-gray-700 hover:text-[#1E5A96]' : 'text-white hover:text-gray-200'">
                        {{ $item['label'] ?? '' }}
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 transition-all duration-300 group-hover:w-full"
                              :class="scrolled ? 'bg-[#1E5A96]' : 'bg-white'"></span>
                    </a>
                @endforeach
            </nav>

            {{-- CTA Button --}}
            <div class="hidden lg:flex items-center space-x-4">
                @if($cta_label)
                <a href="{{ $cta_url }}" 
                   class="inline-flex items-center justify-center rounded-lg text-sm font-semibold h-11 px-6 transition-all duration-300 transform hover:scale-105 shadow-lg"
                   :class="scrolled ? 'bg-[#1E5A96] text-white hover:bg-[#164575]' : 'bg-white text-[#1E5A96] hover:bg-gray-100'">
                    @if($cta_icon === 'phone')
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    @endif
                    {{ $cta_label }}
                </a>
                @endif
            </div>

            {{-- Mobile Menu Trigger --}}
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="lg:hidden p-2 rounded-lg transition-colors"
                    :class="scrolled ? 'text-gray-700 hover:bg-gray-100' : 'text-white hover:bg-white/10'"
                    aria-label="Toggle menu">
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu Overlay --}}
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         @click.away="mobileMenuOpen = false"
         x-cloak
         class="lg:hidden bg-white border-t border-gray-100 shadow-xl">
        <div class="px-4 py-6 space-y-4">
            @foreach($items as $item)
                <a href="{{ $item['url'] ?? '#' }}" 
                   @click="mobileMenuOpen = false"
                   class="block py-2 text-gray-700 hover:text-[#1E5A96] transition-colors font-medium text-lg">
                    {{ $item['label'] ?? '' }}
                </a>
            @endforeach
            <hr class="border-gray-100">
            <a href="{{ $cta_url }}" 
               @click="mobileMenuOpen = false"
               class="block w-full text-center bg-[#1E5A96] hover:bg-[#164575] text-white px-6 py-4 rounded-xl transition-all font-bold text-lg shadow-lg">
                {{ $cta_label }}
            </a>
        </div>
    </div>
</header>