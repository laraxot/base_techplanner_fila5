@props([
    'title' => '',
    'subtitle' => '',
    'breadcrumb_label' => '',
    'image' => null,
])

{{-- Header fixed compensato una volta sola da <main> (pt-[var(--site-header-h)]): niente pt-24 qui. --}}
<section class="pt-4 pb-12 bg-gradient-to-r from-brand-blue to-[#164575] text-white">
    <div class="container mx-auto px-4">
        {{-- Breadcrumb --}}
        <nav class="flex items-center space-x-2 text-sm py-1" aria-label="{{ __('pub_theme::header.navigation.breadcrumb.label') }}">
            <a class="inline-flex min-h-11 min-w-11 items-center justify-center rounded-md text-white hover:underline transition-colors" href="/{{ app()->getLocale() }}" aria-label="{{ __('pub_theme::navigation.home') }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" /><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                </svg>
            </a>
            <svg class="w-4 h-4 text-white/90" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m9 18 6-6-6-6" /></svg>
            <span class="text-white font-medium" aria-current="page">{{ $breadcrumb_label ?: $title }}</span>
        </nav>

        <div class="mt-8">
            @if($title)
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-6 break-words">{{ $title }}</h1>
            @endif
            @if($subtitle)
                <p class="text-xl text-white max-w-3xl">{{ $subtitle }}</p>
            @endif
        </div>
    </div>
</section>
