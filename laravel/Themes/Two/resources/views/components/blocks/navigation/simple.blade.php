@props([
    'brand' => config('app.name'),
    'brandSubtitle' => '',
    'menu_items' => [],
    'ctaLabel' => '',
    'ctaUrl' => '#',
    'ctaIcon' => 'phone',
])

<nav class="sticky top-0 z-50 bg-[#1e3a5f] shadow-lg" x-data="{ mobileOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">
            {{-- Brand --}}
            <div class="flex-shrink-0">
                <a href="/{{ app()->getLocale() }}" class="flex flex-col">
                    <span class="text-white font-bold text-lg lg:text-xl leading-tight">{{ $brand }}</span>
                    @if($brandSubtitle)
                        <span class="text-emerald-400 text-xs lg:text-sm font-medium">{{ $brandSubtitle }}</span>
                    @endif
                </a>
            </div>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center space-x-1">
                @foreach($menu_items as $item)
                    <a href="{{ $item['url'] ?? '#' }}"
                       class="px-4 py-2 text-sm font-medium text-white/80 hover:text-white rounded-lg transition-colors duration-200 {{ ($item['active'] ?? false) ? 'text-white underline underline-offset-4 decoration-2 decoration-emerald-400' : '' }}">
                        {{ $item['label'] ?? 'Item' }}
                    </a>
                @endforeach
            </div>

            {{-- CTA Button --}}
            <div class="hidden lg:flex items-center">
                @if($ctaLabel)
                    <a href="{{ $ctaUrl }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white text-sm font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                        @if($ctaIcon === 'phone')
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                        @endif
                        {{ $ctaLabel }}
                    </a>
                @endif
            </div>

            {{-- Mobile Menu Button --}}
            <div class="lg:hidden">
                <button @click="mobileOpen = !mobileOpen" class="text-white p-2 rounded-lg hover:bg-white/10 transition-colors">
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="lg:hidden bg-[#1a3352] border-t border-white/10">
        <div class="px-4 py-3 space-y-1">
            @foreach($menu_items as $item)
                <a href="{{ $item['url'] ?? '#' }}" class="block px-3 py-2.5 text-white/80 hover:text-white hover:bg-white/5 rounded-lg text-sm font-medium transition-colors">
                    {{ $item['label'] ?? 'Item' }}
                </a>
            @endforeach
            @if($ctaLabel)
                <a href="{{ $ctaUrl }}" class="block mt-3 px-4 py-3 bg-emerald-500 text-white text-center text-sm font-semibold rounded-lg">
                    {{ $ctaLabel }}
                </a>
            @endif
        </div>
    </div>
</nav>