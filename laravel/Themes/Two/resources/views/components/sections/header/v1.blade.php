@php
    use Illuminate\Support\Str;
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

    $blocks = $blocks ?? [];

    // Initialize defaults
    $brandName = 'Marco Sottana';
    $brandSubtitle = 'Consulenza Sicurezza';
    $items = [];
    $ctaLabel = 'Richiedi Consulenza';
    $ctaUrl = '/it/contatti';
@endphp

{{-- Extract nav1 block data, render other blocks (alerts/banners) --}}
@foreach($blocks as $block)
    @php
        $blockSlug = is_object($block) ? ($block->slug ?? null) : ($block['slug'] ?? null);
        $blockData = is_object($block) ? ($block->data ?? []) : ($block['data'] ?? []);
    @endphp

    @if($blockSlug === 'nav1')
        @php
            $brandName = $blockData['brand'] ?? $brandName;
            $brandSubtitle = $blockData['brand_subtitle'] ?? $brandSubtitle;
            $items = $blockData['items'] ?? $items;
            $ctaLabel = $blockData['cta_label'] ?? $ctaLabel;
            $ctaUrl = $blockData['cta_url'] ?? $ctaUrl;
        @endphp
    @else
        @php
            $blockView = is_object($block) ? ($block->view ?? null) : ($block['view'] ?? null);
        @endphp
        @if(isset($blockView) && view()->exists($blockView))
            @include($blockView, $blockData)
        @endif
    @endif
@endforeach

@php
    $currentLocale = LaravelLocalization::getCurrentLocale();
    $supportedLocales = LaravelLocalization::getSupportedLocales();
    $currentPath = request()->path();
@endphp

{{-- Main Header --}}
<header
    x-data="{
        scrolled: false,
        mobileOpen: false,
        init() {
            this.scrolled = window.scrollY > 50;
        }
    }"
    @scroll.window="scrolled = (window.scrollY > 50)"
    :class="scrolled
        ? 'bg-[#0f2b46]/95 backdrop-blur-lg shadow-lg border-b border-white/10'
        : 'bg-gradient-to-b from-black/40 to-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
>
    <div class="container mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-16 md:h-20">

            {{-- Brand --}}
            <a href="{{ LaravelLocalization::getLocalizedURL($currentLocale, '/') }}" class="flex flex-col leading-tight shrink-0 group">
                <span class="font-bold text-lg md:text-xl text-white group-hover:text-white/90 transition-colors">{{ $brandName }}</span>
                @if($brandSubtitle)
                    <span class="text-xs md:text-sm text-white/70 font-normal">{{ $brandSubtitle }}</span>
                @endif
            </a>

            {{-- Desktop Nav --}}
            <nav class="hidden lg:flex items-center space-x-1 xl:space-x-2" aria-label="Main navigation">
                @foreach($items as $item)
                    @php
                        $itemPath = ltrim($item['url'] ?? '', '/');
                        $isActive = false;
                        // Exact match for home
                        if ($itemPath === $currentLocale && ($currentPath === $currentLocale || $currentPath === $currentLocale.'/')) {
                            $isActive = true;
                        } elseif ($itemPath !== $currentLocale && $itemPath && Str::startsWith($currentPath, $itemPath)) {
                            $isActive = true;
                        }
                    @endphp
                    <a
                        href="{{ $item['url'] }}"
                        class="relative px-3 py-2 text-sm font-medium transition-colors text-white/90 hover:text-white"
                        @if($isActive) aria-current="page" @endif
                    >
                        {{ $item['label'] }}
                        <span class="absolute bottom-0 left-3 right-3 h-0.5 bg-white rounded-full transition-all duration-200 {{ $isActive ? 'opacity-100' : 'opacity-0' }}"></span>
                    </a>
                @endforeach
            </nav>

            {{-- Right Actions --}}
            <div class="hidden lg:flex items-center space-x-4">

                {{-- Language Switcher --}}
                <div class="relative" x-data="{ langOpen: false }">
                    <button
                        @click="langOpen = !langOpen"
                        @click.away="langOpen = false"
                        class="flex items-center space-x-1.5 text-white/80 hover:text-white transition-colors focus:outline-none"
                        aria-label="Change language"
                    >
                        <span class="text-sm font-medium uppercase">{{ $currentLocale }}</span>
                        <svg class="w-3.5 h-3.5 transition-transform" :class="langOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        x-show="langOpen"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-36 bg-white rounded-lg shadow-xl py-1 border border-gray-100 overflow-hidden"
                        style="display: none;"
                    >
                        @foreach($supportedLocales as $localeCode => $properties)
                            <a
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                class="flex items-center px-4 py-2 text-sm transition-colors {{ $localeCode === $currentLocale ? 'bg-blue-50 text-[#1E5A96] font-semibold' : 'text-gray-700 hover:bg-gray-50' }}"
                                hreflang="{{ $localeCode }}"
                            >
                                <span class="uppercase text-xs font-bold mr-3 w-5 text-center">{{ $localeCode }}</span>
                                {{ $properties['native'] }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Auth --}}
                @auth
                    <div class="relative" x-data="{ userOpen: false }">
                        <button
                            @click="userOpen = !userOpen"
                            @click.away="userOpen = false"
                            class="flex items-center space-x-2 focus:outline-none group"
                            aria-label="User menu"
                        >
                            <div class="relative">
                                <img
                                    src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name ?? 'U').'&color=7F9CF5&background=EBF4FF&size=32' }}"
                                    alt=""
                                    class="w-8 h-8 rounded-full border-2 border-white/30 group-hover:border-white/60 transition-colors object-cover"
                                >
                                <span class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 bg-green-400 border-2 border-[#0f2b46] rounded-full"></span>
                            </div>
                        </button>
                        <div
                            x-show="userOpen"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-52 bg-white rounded-lg shadow-xl border border-gray-100 overflow-hidden"
                            style="display: none;"
                        >
                            <div class="px-4 py-3 border-b border-gray-100 bg-gray-50/50">
                                <p class="text-sm font-semibold text-gray-900 truncate">{{ auth()->user()->name ?? '' }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email ?? '' }}</p>
                            </div>
                            <a href="/admin" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#1E5A96] transition-colors">
                                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                                Dashboard
                            </a>
                            <a href="/profile" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#1E5A96] transition-colors">
                                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                {{ __('Profilo') }}
                            </a>
                            <div class="border-t border-gray-100"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex w-full items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                    <svg class="w-4 h-4 mr-3 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                                    {{ __('Esci') }}
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth

                {{-- CTA Button - white border style matching reference --}}
                <a
                    href="{{ $ctaUrl }}"
                    class="inline-flex items-center px-5 py-2.5 text-sm font-semibold text-white border border-white/70 rounded-lg hover:bg-white hover:text-[#1E5A96] transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-white/40"
                >
                    {{-- Phone icon --}}
                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    {{ $ctaLabel }}
                </a>
            </div>

            {{-- Mobile: Lang + Hamburger --}}
            <div class="flex items-center lg:hidden space-x-3">
                {{-- Mobile Lang --}}
                <div class="relative" x-data="{ mLang: false }">
                    <button @click="mLang = !mLang" @click.away="mLang = false" class="text-white/80 hover:text-white text-sm font-bold uppercase focus:outline-none">
                        {{ $currentLocale }}
                    </button>
                    <div x-show="mLang" x-transition class="absolute right-0 mt-2 w-28 bg-white rounded-lg shadow-xl py-1 border border-gray-100 overflow-hidden z-50" style="display: none;">
                        @foreach($supportedLocales as $localeCode => $properties)
                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="block px-3 py-2 text-sm {{ $localeCode === $currentLocale ? 'bg-blue-50 text-[#1E5A96] font-bold' : 'text-gray-700 hover:bg-gray-50' }}" hreflang="{{ $localeCode }}">
                                {{ strtoupper($localeCode) }} - {{ $properties['native'] }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Hamburger --}}
                <button
                    @click="mobileOpen = !mobileOpen"
                    class="p-2 rounded-md text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white/30"
                    aria-label="Toggle menu"
                    :aria-expanded="mobileOpen.toString()"
                >
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div
        x-show="mobileOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="lg:hidden bg-[#0f2b46]/98 backdrop-blur-xl border-t border-white/10"
        style="display: none;"
    >
        <div class="container mx-auto px-4 py-4 space-y-1">
            @foreach($items as $item)
                @php
                    $itemPath = ltrim($item['url'] ?? '', '/');
                    $isActive = ($currentPath === $itemPath) || ($itemPath !== $currentLocale && $itemPath && Str::startsWith($currentPath, $itemPath));
                @endphp
                <a
                    href="{{ $item['url'] }}"
                    class="block px-4 py-3 rounded-lg text-base font-medium transition-colors {{ $isActive ? 'text-white bg-white/10' : 'text-white/80 hover:text-white hover:bg-white/5' }}"
                >
                    {{ $item['label'] }}
                </a>
            @endforeach

            @auth
                <div class="border-t border-white/10 pt-4 mt-3">
                    <div class="flex items-center px-4 mb-3">
                        <img class="w-10 h-10 rounded-full border-2 border-white/20" src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name ?? 'U').'&color=7F9CF5&background=EBF4FF' }}" alt="">
                        <div class="ml-3">
                            <p class="text-sm font-semibold text-white">{{ auth()->user()->name ?? '' }}</p>
                            <p class="text-xs text-white/60">{{ auth()->user()->email ?? '' }}</p>
                        </div>
                    </div>
                    <a href="/admin" class="block px-4 py-2 text-sm text-white/80 hover:text-white hover:bg-white/5 rounded-lg">Dashboard</a>
                    <a href="/profile" class="block px-4 py-2 text-sm text-white/80 hover:text-white hover:bg-white/5 rounded-lg">{{ __('Profilo') }}</a>
                    <form method="POST" action="{{ route('logout') }}" class="mt-1">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-400 hover:text-red-300 hover:bg-white/5 rounded-lg">{{ __('Esci') }}</button>
                    </form>
                </div>
            @endauth

            <div class="pt-3 mt-2">
                <a
                    href="{{ $ctaUrl }}"
                    class="flex items-center justify-center w-full px-5 py-3 text-base font-semibold text-white border border-white/70 rounded-lg hover:bg-white hover:text-[#1E5A96] transition-all"
                >
                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    {{ $ctaLabel }}
                </a>
            </div>
        </div>
    </div>
</header>
