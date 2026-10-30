@php
    use Illuminate\Support\Str;

    $blocks = $blocks ?? [];

    // Initialize defaults
    $brandName = __('pub_theme::header.brand.name');
    $brandSubtitle = null;
    $items = [];
    $ctaLabel = __('pub_theme::header.cta.label');
    $ctaUrl = LaravelLocalization::getLocalizedURL(app()->getLocale(), '/contatti');
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
    role="banner"
    data-mobile-nav
    x-data="{
        scrolled: false,
        mobileOpen: false,
        init() {
            this.scrolled = window.scrollY > 50;
        }
    }"
    @scroll.window="scrolled = (window.scrollY > 50)"
    :class="scrolled
        ? 'bg-white shadow-xl border-b border-gray-200 text-gray-900 py-2'
        : 'bg-[#0f2b46]/95 backdrop-blur-md text-white py-2 lg:py-4'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
>
    <div class="container mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-16" :class="scrolled ? '' : 'lg:h-20'">

            {{-- Brand --}}
            <a href="{{ LaravelLocalization::getLocalizedURL($currentLocale, '/') }}" 
               aria-label="{{ __('pub_theme::header.brand.home.aria_label', ['brand' => __('pub_theme::header.brand.name')]) }}"
               class="flex min-h-11 min-w-0 items-center space-x-3 group rounded-md transition-all">
                {{-- Logo Elefante --}}
                <svg class="w-10 h-10 md:w-12 md:h-12 transition-colors shrink-0" 
                     :class="scrolled ? 'text-gray-900' : 'text-white'" 
                     viewBox="0 0 100 100" 
                     fill="none" 
                     xmlns="http://www.w3.org/2000/svg"
                     aria-hidden="true"
                     role="img">
                    <title>{{ __('pub_theme::header.brand.logo.title', ['brand' => __('pub_theme::header.brand.name')]) }}</title>
                    <!-- Elefante stilizzato di profilo con proboscide a destra -->
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
                
                {{-- Nome Brand --}}
                <span class="min-w-0 max-w-[40vw] truncate font-bold text-lg md:text-xl transition-colors" :class="scrolled ? 'text-gray-900' : 'text-white'">{{ $brandName }}</span>
            </a>

            {{-- Desktop Nav --}}
            <nav class="hidden lg:flex items-center space-x-1 xl:space-x-2" aria-label="{{ __('pub_theme::header.menu.main.aria_label') }}">
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
                        class="relative inline-flex min-h-11 items-center px-3 py-2 text-sm font-medium transition-colors hover:opacity-80 rounded-md"
                        :class="scrolled ? 'text-gray-700 hover:text-gray-900' : 'text-white/90 hover:text-white'"
                        @if($isActive) aria-current="page" @endif
                    >
                        {{ $item['label'] }}
                        <span class="absolute bottom-0 left-3 right-3 h-0.5 rounded-full transition-all duration-200 {{ $isActive ? 'opacity-100' : 'opacity-0' }}"
                              :class="scrolled ? 'bg-[#1E5A96]' : 'bg-white'"
                        ></span>
                    </a>
                @endforeach
            </nav>

            {{-- Right Actions --}}
            <div class="hidden lg:flex items-center space-x-4">

                {{-- Language Switcher --}}
                <div class="relative" x-data="{ langOpen: false }" @keydown.escape="if (langOpen) { langOpen = false; $refs.langBtn.focus(); }">
                    <button
                        x-ref="langBtn"
                        @click="langOpen = !langOpen"
                        @click.away="langOpen = false"
                        class="flex min-h-11 min-w-11 items-center justify-center space-x-1.5 transition-colors rounded-md px-2 py-1"
                        :class="scrolled ? 'text-gray-600 hover:text-gray-900' : 'text-white/80 hover:text-white'"
                        aria-label="{{ __('pub_theme::header.language.switch.aria_label', ['locale' => $currentLocale]) }}"
                        aria-expanded="false"
                        :aria-expanded="langOpen.toString()"
                    >
                        <span class="text-sm font-medium uppercase">{{ $currentLocale }}</span>
                        <svg class="w-3.5 h-3.5 transition-transform" 
                             :class="langOpen ? 'rotate-180' : ''" 
                             fill="none" 
                             viewBox="0 0 24 24" 
                             stroke="currentColor" 
                             stroke-width="2"
                             aria-hidden="true">
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
                        role="group"
                        aria-label="{{ __('pub_theme::header.language.select.aria_label') }}"
                        class="absolute right-0 mt-2 w-36 bg-white rounded-lg shadow-xl py-1 border border-gray-100"
                        style="display: none;"
                    >
                        @foreach($supportedLocales as $localeCode => $properties)
                            <a
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                class="flex min-h-11 items-center px-4 py-2 text-sm transition-colors {{ $localeCode === $currentLocale ? 'bg-blue-50 text-brand-blue font-semibold' : 'text-gray-700 hover:bg-gray-50' }}"
                                hreflang="{{ $localeCode }}"
                                @if($localeCode === $currentLocale) aria-current="true" @endif
                            >
                                <span class="uppercase text-xs font-bold mr-3 w-5 text-center">{{ $localeCode }}</span>
                                {{ $properties['native'] }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Auth: guest = Login, auth = user dropdown --}}
                @guest
                    <a href="{{ route('login') }}"
                       class="inline-flex min-h-11 items-center text-sm font-medium transition-colors rounded-md px-3 py-2"
                       :class="scrolled ? 'text-gray-700 hover:text-gray-900' : 'text-white/90 hover:text-white'">
                        {{ __('pub_theme::header.auth.login') }}
                    </a>
                    @if(Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="inline-flex min-h-11 items-center text-sm font-semibold px-4 py-2 rounded-lg transition-colors"
                           :class="scrolled ? 'bg-brand-blue text-white hover:bg-[#174a7a]' : 'bg-white/20 text-white hover:bg-white/10 border border-white/50'">
                            {{ __('pub_theme::header.auth.register') }}
                        </a>
                    @endif
                @endguest
                @auth
                    <div class="relative" x-data="{ userOpen: false }" @keydown.escape="if (userOpen) { userOpen = false; $refs.userBtn.focus(); }">
                        <button
                            x-ref="userBtn"
                            @click="userOpen = !userOpen"
                            @click.away="userOpen = false"
                            class="flex min-h-11 min-w-11 items-center justify-center space-x-2 rounded-md group"
                            aria-label="{{ __('pub_theme::header.user.menu.aria_label') }}"
                            aria-expanded="false"
                            :aria-expanded="userOpen.toString()"
                        >
                            <div class="relative">
                                <img
                                    src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name ?? 'U').'&color=7F9CF5&background=EBF4FF&size=32' }}"
                                    alt="{{ __('pub_theme::header.user.avatar.alt', ['name' => auth()->user()->name ?? __('pub_theme::header.user.default_name.label')]) }}"
                                    class="w-8 h-8 rounded-full border-2 transition-colors object-cover"
                                    :class="scrolled ? 'border-gray-300 group-hover:border-[#1E5A96]' : 'border-white/30 group-hover:border-white/60'"
                                >
                                <span class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 bg-green-400 border-2 rounded-full" :class="scrolled ? 'border-white' : 'border-[#0f2b46]'"></span>
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
                        role="group"
                        aria-label="{{ __('pub_theme::header.user.menu.aria_label') }}"
                        class="absolute right-0 mt-2 w-52 bg-white rounded-lg shadow-xl border border-gray-100"
                        style="display: none;"
                    >
                            <div class="px-4 py-3 border-b border-gray-100 bg-gray-50/50 rounded-t-lg">
                                <p class="text-sm font-semibold text-gray-900 truncate">{{ auth()->user()->name ?? '' }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email ?? '' }}</p>
                            </div>
                            <a href="/admin" 
                               class="flex min-h-11 items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-blue transition-colors">
                                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                                {{ __('pub_theme::header.user.dashboard.label') }}
                            </a>
                            <a href="{{ LaravelLocalization::getLocalizedURL($currentLocale, '/profile') }}" 
                               class="flex min-h-11 items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-blue transition-colors">
                                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                {{ __('pub_theme::header.auth.profile') }}
                            </a>
                            <div class="border-t border-gray-100"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                        class="flex min-h-11 w-full items-center px-4 py-2.5 text-sm text-red-700 hover:bg-red-50 transition-colors rounded-b-lg">
                                    <svg class="w-4 h-4 mr-3 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                                    {{ __('pub_theme::header.auth.logout') }}
                                </button>
                            </form>
                    </div>
                    </div>
                @endauth

                {{-- CTA Button - white border style matching reference --}}
                <a
                    href="{{ $ctaUrl }}"
                    aria-label="{{ $ctaLabel }} - {{ __('pub_theme::header.cta.go_to_contacts.label') }}"
                    class="inline-flex min-h-11 items-center px-5 py-2.5 text-sm font-semibold border rounded-lg transition-all duration-200"
                    :class="scrolled 
                        ? 'text-gray-900 bg-white border-gray-500 hover:bg-gray-50 hover:border-gray-700' 
                        : 'text-white border-white/70 hover:bg-white hover:text-brand-blue'"
                >
                    {{-- Phone icon --}}
                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    {{ $ctaLabel }}
                </a>
            </div>

            {{-- Mobile: Lang + Hamburger --}}
            <div class="flex items-center lg:hidden space-x-3">
                {{-- Mobile Lang --}}
                <div class="relative" x-data="{ mLang: false }" @keydown.escape="if (mLang) { mLang = false; $refs.mLangBtn.focus(); }">
                    {{-- Mobile: colore legato a `scrolled` (a header bianco il vecchio text-white era invisibile) e bersaglio >= 44x44. --}}
                    <button x-ref="mLangBtn"
                            @click="mLang = !mLang"
                            @click.away="mLang = false"
                            :class="scrolled ? 'text-gray-700 hover:text-gray-900' : 'text-white/90 hover:text-white'"
                            class="inline-flex min-h-11 min-w-11 items-center justify-center text-sm font-bold uppercase rounded-md px-2"
                            aria-label="{{ __('pub_theme::header.language.switch.aria_label', ['locale' => $currentLocale]) }}"
                            aria-expanded="false"
                            :aria-expanded="mLang.toString()">
                        {{ $currentLocale }}
                    </button>
                    <div x-show="mLang" 
                         x-transition 
                         role="group"
                         aria-label="{{ __('pub_theme::header.language.select.aria_label') }}"
                         class="absolute right-0 mt-2 w-28 bg-white rounded-lg shadow-xl py-1 border border-gray-100 z-50" 
                         style="display: none;">
                        @foreach($supportedLocales as $localeCode => $properties)
                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" 
                               class="block px-3 py-3 text-sm {{ $localeCode === $currentLocale ? 'bg-blue-50 text-brand-blue font-bold' : 'text-gray-700 hover:bg-gray-50' }}"
                               hreflang="{{ $localeCode }}"
                               @if($localeCode === $currentLocale) aria-current="true" @endif>
                                {{ strtoupper($localeCode) }} - {{ $properties['native'] }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Hamburger --}}
                <button
                    @click="mobileOpen = !mobileOpen"
                    data-mobile-nav-toggle
                    data-mobile-nav-target="#mobile-menu"
                    class="p-2.5 rounded-md transition-colors"
                    :class="scrolled ? 'text-gray-700 hover:bg-gray-100' : 'text-white hover:bg-white/10'"
                    aria-label="{{ __('pub_theme::header.menu.toggle.aria_label') }}"
                    :aria-expanded="mobileOpen.toString()"
                    aria-controls="mobile-menu"
                >
                    <svg x-show="!mobileOpen" 
                         class="w-6 h-6" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke="currentColor" 
                         stroke-width="2"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileOpen" 
                         class="w-6 h-6" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke="currentColor" 
                         stroke-width="2" 
                         style="display: none;"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <nav
        id="mobile-menu"
        data-mobile-nav-panel
        @keydown.escape.window="mobileOpen = false"
        x-show="mobileOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        role="navigation"
        aria-label="{{ __('pub_theme::header.menu.mobile.aria_label') }}"
        {{-- Mobile: pannello SEMPRE scuro con testo chiaro (prima bg bianco da scrolled + link bianchi = illeggibile; a inizio pagina link gray-700 su navy = 1,4:1).
             max-h in dvh + overflow-y-auto: su telefoni bassi/landscape CTA e Accedi restano raggiungibili (header fixed 80-112px). --}}
        class="lg:hidden max-h-[calc(100dvh-var(--site-header-h))] overflow-y-auto overscroll-contain bg-[#0f2b46] border-t border-white/10"
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
                    class="block px-4 py-3 rounded-lg text-base font-medium transition-colors {{ $isActive ? 'text-white bg-white/15' : 'text-white/90 hover:text-white hover:bg-white/10' }}"
                    @if($isActive) aria-current="page" @endif
                >
                    {{ $item['label'] }}
                </a>
            @endforeach

            @auth
                <div class="border-t border-white/10 pt-4 mt-3">
                    <div class="flex items-center px-4 mb-3">
                        <img class="w-10 h-10 rounded-full border-2 border-white/20" src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name ?? 'U').'&color=7F9CF5&background=EBF4FF' }}" alt="{{ __('pub_theme::header.user.avatar.alt', ['name' => auth()->user()->name ?? __('pub_theme::header.user.default_name.label')]) }}">
                        <div class="ml-3">
                            <p class="text-sm font-semibold text-white">{{ auth()->user()->name ?? '' }}</p>
                            <p class="text-xs text-white/80">{{ auth()->user()->email ?? '' }}</p>
                        </div>
                    </div>
                    <a href="/admin" 
                       class="block px-4 py-3 text-sm text-white/80 hover:text-white hover:bg-white/5 rounded-lg">{{ __('pub_theme::header.user.dashboard.label') }}</a>
                    <a href="{{ LaravelLocalization::getLocalizedURL($currentLocale, '/profile') }}" 
                       class="block px-4 py-3 text-sm text-white/80 hover:text-white hover:bg-white/5 rounded-lg">{{ __('pub_theme::header.auth.profile') }}</a>
                    <form method="POST" action="{{ route('logout') }}" class="mt-1">
                        @csrf
                        <button type="submit" 
                                class="block w-full text-left px-4 py-3 text-sm text-red-300 hover:text-red-200 hover:bg-white/5 rounded-lg">{{ __('pub_theme::header.auth.logout') }}</button>
                    </form>
                </div>
            @else
                <div class="border-t border-white/10 pt-4 mt-3 space-y-2">
                    <a href="{{ route('login') }}"
                       class="block px-4 py-3 text-sm font-medium text-white/90 hover:text-white hover:bg-white/5 rounded-lg transition-colors">
                        {{ __('pub_theme::header.auth.login') }}
                    </a>
                    @if(Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="block px-4 py-3 text-sm font-semibold text-center text-[#0f2b46] bg-white/90 hover:bg-white rounded-lg transition-colors">
                            {{ __('pub_theme::header.auth.register') }}
                        </a>
                    @endif
                </div>
            @endauth

            <div class="pt-3 mt-2">
                <a
                    href="{{ $ctaUrl }}"
                    aria-label="{{ $ctaLabel }} - {{ __('pub_theme::header.cta.go_to_contacts.label') }}"
                    class="flex items-center justify-center w-full px-5 py-3 text-base font-semibold text-white border border-white/70 rounded-lg hover:bg-white hover:text-[#1E5A96] transition-all"
                >
                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    {{ $ctaLabel }}
                </a>
            </div>
        </div>
    </nav>
</header>
