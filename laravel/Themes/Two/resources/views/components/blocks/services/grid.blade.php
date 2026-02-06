@props([
    'title' => '',
    'subtitle' => '',
    'services' => [],
    'id' => 'servizi',
])

@php
    $iconColors = ['text-brand-blue', 'text-brand-green', 'text-brand-orange'];
    $borderColors = ['border-t-brand-blue', 'border-t-brand-green', 'border-t-brand-orange'];
    $bgColors = ['bg-brand-blue/10', 'bg-brand-green/10', 'bg-brand-orange/10'];
    $textColors = ['text-brand-blue', 'text-brand-green', 'text-brand-orange'];
@endphp

<section id="{{ $id }}" class="py-20 bg-white scroll-mt-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $title }}</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ $subtitle }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($services as $i => $service)
            @php $ci = $i % 3; @endphp
            <div class="group bg-white border border-gray-100 {{ $borderColors[$ci] }} border-t-4 rounded-xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                {{-- Icon --}}
                <div class="w-14 h-14 {{ $bgColors[$ci] }} rounded-xl flex items-center justify-center mb-6">
                    @if (str_contains($service['icon'] ?? '', 'shield'))
                        <svg class="w-7 h-7 {{ $textColors[$ci] }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    @elseif (str_contains($service['icon'] ?? '', 'wrench'))
                        <svg class="w-7 h-7 {{ $textColors[$ci] }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17l-5.66 5.66a2 2 0 01-2.83-2.83l5.66-5.66m0 0L3.34 7.09a2 2 0 010-2.83l2.83-2.83a2 2 0 012.83 0l5.25 5.25m-2.83 2.83l2.83-2.83m4.24 4.24l2.83-2.83a2 2 0 000-2.83l-2.83-2.83a2 2 0 00-2.83 0l-2.83 2.83"/></svg>
                    @elseif (str_contains($service['icon'] ?? '', 'document'))
                        <svg class="w-7 h-7 {{ $textColors[$ci] }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/></svg>
                    @else
                        <svg class="w-7 h-7 {{ $textColors[$ci] }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    @endif
                </div>

                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $service['title'] ?? '' }}</h3>
                <p class="text-gray-600 mb-6 leading-relaxed text-sm">{{ $service['description'] ?? '' }}</p>

                <a href="{{ $service['url'] ?? '#' }}"
                   class="inline-flex items-center {{ $textColors[$ci] }} font-semibold text-sm hover:underline group-hover:translate-x-1 transform transition-all duration-300">
                    {{ $service['cta'] ?? 'Scopri di più' }}
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>