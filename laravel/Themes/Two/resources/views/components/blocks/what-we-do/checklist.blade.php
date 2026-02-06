@props([
    'title' => '',
    'subtitle' => '',
    'checklist' => [],
    'id' => 'controlli',
    'callout_title' => 'Perché è fondamentale?',
    'callout_text' => 'Un controllo accurato previene guasti, sovraesposizioni e sanzioni, proteggendo il tuo investimento e la tua reputazione professionale.',
])

@php
    $iconBgs = ['bg-brand-blue', 'bg-brand-green', 'bg-brand-orange', 'bg-brand-blue', 'bg-brand-green'];
@endphp

<section id="{{ $id }}" class="py-20 bg-white scroll-mt-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            {{-- Left: Title + Description + Callout --}}
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">{{ $title }}</h2>
                <p class="text-lg text-gray-600 leading-relaxed mb-8">{{ $subtitle }}</p>

                <div class="bg-brand-blue/5 border-l-4 border-brand-blue rounded-r-xl p-6">
                    <h4 class="font-bold text-brand-blue mb-2">{{ $callout_title }}</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $callout_text }}</p>
                </div>
            </div>

            {{-- Right: Stacked dark cards --}}
            <div class="space-y-3">
                @foreach ($checklist as $i => $item)
                @php $ci = $i % 5; @endphp
                <div class="flex items-center gap-4 bg-[#1a2e44] rounded-xl p-5 hover:bg-[#243a52] transition-colors duration-300">
                    <div class="w-10 h-10 {{ $iconBgs[$ci] }} rounded-lg flex items-center justify-center flex-shrink-0">
                        @if (str_contains($item['icon'] ?? '', 'chart'))
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
                        @elseif (str_contains($item['icon'] ?? '', 'shield'))
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        @elseif (str_contains($item['icon'] ?? '', 'cpu') || str_contains($item['icon'] ?? '', 'chip'))
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 002.25-2.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 6.75v10.5a2.25 2.25 0 002.25 2.25zm.75-12h9v9h-9v-9z"/></svg>
                        @elseif (str_contains($item['icon'] ?? '', 'light') || str_contains($item['icon'] ?? '', 'bulb'))
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18"/></svg>
                        @elseif (str_contains($item['icon'] ?? '', 'document'))
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm0 0A9 9 0 0119.125 11.25M10.125 2.25H10.5"/></svg>
                        @else
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                        @endif
                    </div>
                    <div>
                        <div class="font-bold text-white">{{ $item['title'] ?? '' }}</div>
                        <div class="text-sm text-gray-300">{{ $item['description'] ?? '' }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>