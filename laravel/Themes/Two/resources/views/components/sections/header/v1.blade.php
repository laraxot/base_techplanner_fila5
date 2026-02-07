@php
    use Illuminate\Support\Arr;
    use Illuminate\Support\Str;
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

    $blocks = $blocks ?? [];
    
    // Initialize default data with fallbacks
    $navData = [];
    $brandName = 'Marco Sottana';
    $brandSubtitle = 'Consulenza Sicurezza';
    $items = [];
    $ctaLabel = 'Richiedi Consulenza';
    $ctaUrl = '/it/contatti';

    // Iterate blocks as requested to extract data or render misc blocks
    // This allows for future blocks (e.g. top bar alerts) to be rendered just by adding them to JSON
@endphp

{{-- Render any non-nav blocks first (e.g. Alerts/Banners) --}}
@foreach($blocks as $block)
    @php
        // Handle both object and array syntax
        $blockSlug = is_object($block) ? ($block->slug ?? null) : ($block['slug'] ?? null);
        $blockData = is_object($block) ? ($block->data ?? []) : ($block['data'] ?? []);
    @endphp
    
    @if($blockSlug !== 'nav1')
        @php
            $blockView = is_object($block) ? ($block->view ?? null) : ($block['view'] ?? null);
        @endphp
        @if(isset($blockView))
            @include($blockView, $blockData)
        @endif
    @else
        @php
            // Capture nav1 data for the main header layout
            $navData = $blockData;
            $brandName = $navData['brand'] ?? $brandName;
            $brandSubtitle = $navData['brand_subtitle'] ?? $brandSubtitle;
            $items = $navData['items'] ?? $items;
            $ctaLabel = $navData['cta_label'] ?? $ctaLabel;
            $ctaUrl = $navData['cta_url'] ?? $ctaUrl;
        @endphp
    @endif
@endforeach

@php
    $currentLocale = \LaravelLocalization::getCurrentLocale();
    $supportedLocales = \LaravelLocalization::getSupportedLocales();
    $currentPath = request()->path();
@endphp

<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent py-4" style="transform: none;">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
            {{-- Logo & Brand --}}
            <a href="{{ LaravelLocalization::getLocalizedURL($currentLocale, '/') }}" class="flex items-center space-x-2" data-discover="true">
                <div class="font-bold text-xl transition-colors text-white">
                    <span class="block">{{ $brandName }}</span>
                    @if($brandSubtitle)
                        <span class="text-sm font-normal text-gray-200">{{ $brandSubtitle }}</span>
                    @endif
                </div>
            </a>
            
            {{-- Desktop Navigation --}}
            <nav class="hidden md:flex items-center space-x-8">
                @foreach($items as $item)
                    @php
                        $isActive = false;
                        if (isset($item['active']) && $item['active']) {
                            $isActive = true;
                        } elseif (str_contains($currentPath, ltrim($item['url'], '/'))) {
                            $isActive = true;
                        }
                    @endphp
                    <a 
                        href="{{ $item['url'] }}" 
                        class="font-medium transition-colors relative group text-white hover:text-gray-200 {{ $isActive ? 'text-white' : '' }}"
                        data-discover="true"
                    >
                        {{ $item['label'] }}
                        <span class="absolute bottom-0 left-0 h-0.5 transition-all group-hover:w-full bg-white {{ $isActive ? 'w-full' : 'w-0' }}"></span>
                    </a>
                @endforeach
            </nav>
            
            {{-- Right Actions: Lang, Auth, CTA --}}
            <div class="hidden md:flex items-center space-x-6">
                {{-- Language Switcher --}}
                <div class="relative" x-data="{ open: false }">
                    <button 
                        @click="open = !open" 
                        @click.away="open = false"
                        class="flex items-center space-x-1 text-white/90 hover:text-white transition-colors focus:outline-none"
                    >
                        @php
                            $flagCode = $currentLocale === 'en' ? 'gb' : $currentLocale;
                            $flagUrl = asset("modules/ui/svg/flags/{$flagCode}.svg");
                        @endphp
                        <img src="{{ $flagUrl }}" alt="{{ $currentLocale }}" class="w-5 h-5 rounded-full shadow-sm object-cover" />
                        <x-heroicon-o-chevron-down class="w-3 h-3 text-white/70" />
                    </button>

                    <div 
                        x-show="open" 
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-32 bg-white rounded-lg shadow-xl py-1 border border-gray-100 overflow-hidden"
                        style="display: none;"
                    >
                        @foreach($supportedLocales as $localeCode => $properties)
                            @if($localeCode !== $currentLocale)
                                <a 
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" 
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors"
                                >
                                    @php
                                        $flagCode = $localeCode === 'en' ? 'gb' : $localeCode;
                                        $flagUrl = asset("modules/ui/svg/flags/{$flagCode}.svg");
                                    @endphp
                                    <img src="{{ $flagUrl }}" alt="{{ $localeCode }}" class="w-4 h-4 mr-3 rounded-full object-cover" />
                                    {{ $properties['native'] }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

                {{-- Auth Dropdown --}}
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button 
                            @click="open = !open" 
                            @click.away="open = false"
                            class="flex items-center space-x-2 focus:outline-none group"
                        >
                            <div class="relative">
                                <img 
                                    src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&color=7F9CF5&background=EBF4FF' }}" 
                                    alt="{{ auth()->user()->name }}" 
                                    class="w-8 h-8 rounded-full border-2 border-white/20 group-hover:border-brand-orange transition-colors object-cover"
                                >
                                <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 border-2 border-white rounded-full"></span>
                            </div>
                        </button>

                        <div 
                            x-show="open" 
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-1 border border-gray-100"
                            style="display: none;"
                        >
                            <div class="px-4 py-3 border-b border-gray-100">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                            </div>
                            
                            {{-- Dashboard Link --}}
                            <a href="/admin" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-blue">
                                <x-heroicon-o-squares-2x2 class="w-4 h-4 mr-3 text-gray-400" />
                                Dashboard
                            </a>

                            {{-- Profile Link --}}
                            <a href="/profile" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-blue">
                                <x-heroicon-o-user class="w-4 h-4 mr-3 text-gray-400" />
                                {{ __('Profilo') }}
                            </a>

                            <div class="border-t border-gray-100 my-1"></div>

                            {{-- Logout --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex w-full items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    <x-heroicon-o-arrow-right-start-on-rectangle class="w-4 h-4 mr-3 text-red-400" />
                                    {{ __('Esci') }}
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a 
                        href="{{ route('login') }}" 
                        class="text-sm font-medium text-white hover:text-brand-orange transition-colors"
                    >
                        Accedi
                    </a>
                @endauth

                {{-- CTA Button --}}
                <a 
                    href="{{ $ctaUrl }}" 
                    class="hidden lg:inline-flex items-center justify-center px-5 py-2 text-sm font-bold text-white transition-all duration-200 bg-[#E67E22] rounded-lg hover:bg-[#d35400] hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#E67E22] focus:ring-offset-transparent"
                >
                    {{ $ctaLabel }}
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <div class="flex items-center md:hidden space-x-4">
                 {{-- Mobile Lang Switcher --}}
                <div class="relative" x-data="{ open: false }">
                     <button @click="open = !open" class="flex items-center text-white focus:outline-none">
                         @php 
                            $flagCode = $currentLocale === 'en' ? 'gb' : $currentLocale; 
                            $flagUrl = asset("modules/ui/svg/flags/{$flagCode}.svg");
                         @endphp
                         <img src="{{ $flagUrl }}" alt="{{ $currentLocale }}" class="w-6 h-6 rounded-full object-cover" />
                     </button>
                      <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-12 bg-white rounded shadow-lg overflow-hidden z-50">
                        @foreach($supportedLocales as $localeCode => $properties)
                             @if($localeCode !== $currentLocale)
                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}" class="block p-2 hover:bg-gray-100 flex justify-center">
                                     @php 
                                        $flagCode = $localeCode === 'en' ? 'gb' : $localeCode; 
                                        $flagUrl = asset("modules/ui/svg/flags/{$flagCode}.svg");
                                     @endphp
                                     <img src="{{ $flagUrl }}" alt="{{ $localeCode }}" class="w-5 h-5 rounded-full object-cover" />
                                </a>
                             @endif
                        @endforeach
                      </div>
                </div>

                <button 
                    @click="mobileMenuOpen = !mobileMenuOpen" 
                    type="button" 
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" 
                    aria-controls="mobile-menu" 
                    :aria-expanded="mobileMenuOpen"
                    x-data="{ mobileMenuOpen: false }"
                >
                    <span class="sr-only">Open main menu</span>
                    <svg x-show="!mobileMenuOpen" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileMenuOpen" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div 
        class="md:hidden bg-gray-900/95 backdrop-blur-xl border-t border-white/10" 
        id="mobile-menu" 
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        style="display: none;"
        x-data="{ mobileMenuOpen: false }"
    >
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            @foreach($items as $item)
                @php
                    $isActive = false;
                    if (isset($item['active']) && $item['active']) {
                        $isActive = true;
                    } elseif (str_contains($currentPath, ltrim($item['url'], '/'))) {
                        $isActive = true;
                    }
                @endphp
                <a 
                    href="{{ $item['url'] }}" 
                    class="block px-3 py-2 rounded-md text-base font-medium text-white {{ $isActive ? 'text-brand-orange' : 'hover:text-brand-orange' }} hover:bg-white/5 transition-colors"
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
            
             @auth
                <div class="border-t border-white/10 pt-4 mt-4 pb-2">
                    <div class="flex items-center px-3 mb-3">
                         {{-- Mobile User Info --}}
                         <div class="flex-shrink-0">
                             <img class="h-10 w-10 rounded-full border-2 border-brand-orange" src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&color=7F9CF5&background=EBF4FF' }}" alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">{{ auth()->user()->name }}</div>
                            <div class="text-sm font-medium leading-none text-gray-400 mt-1">{{ auth()->user()->email }}</div>
                        </div>
                    </div>
                    <a href="/admin" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-white/5">Dashboard</a>
                    <a href="/profile" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-white/5">Profilo</a>
                    <form method="POST" action="{{ route('logout') }}" class="mt-1">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-red-400 hover:text-red-300 hover:bg-white/5">Esci</button>
                    </form>
                </div>
            @else
                 <div class="border-t border-white/10 pt-4 mt-4">
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-brand-orange hover:bg-white/5 text-center">Accedi</a>
                </div>
            @endauth

            <div class="mt-4 px-3 pb-4">
                <a 
                    href="{{ $ctaUrl }}" 
                    class="flex items-center justify-center w-full px-5 py-3 text-base font-bold text-white bg-[#E67E22] rounded-lg hover:bg-[#d35400] transition-colors shadow-lg"
                >
                    {{ $ctaLabel }}
                </a>
            </div>
        </div>
    </div>
</header>