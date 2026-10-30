@props([
    'title' => '',
    'subtitle' => '',
    'categories' => [],
])

@php
    // Classi Tailwind intere per colore (compilate dal sorgente); colore sconosciuto -> blue.
    $palette = [
        'blue' => 'bg-blue-100 text-blue-800',
        'green' => 'bg-green-100 text-green-800',
        'orange' => 'bg-orange-100 text-orange-700',
        'purple' => 'bg-purple-100 text-purple-800',
    ];
    $icons = [
        'shield' => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>',
        'zap' => '<path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/>',
        'file-text' => '<path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/>',
        'graduation-cap' => '<path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/>',
    ];
    // Icona sconosciuta -> "info" generica.
    $fallbackIcon = '<circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/>';
    $itemTag = !empty($title) ? 'h3' : 'h2';
@endphp

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        @if(!empty($title) || !empty($subtitle))
            <div class="text-center max-w-3xl mx-auto mb-12">
                @if(!empty($title))
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 break-words">{{ $title }}</h2>
                @endif
                @if(!empty($subtitle))
                    <p class="text-lg text-gray-700 break-words">{{ $subtitle }}</p>
                @endif
            </div>
        @endif

        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
                @php
                    $count = $category['count'] ?? null;
                    $iconPaths = $icons[$category['icon'] ?? ''] ?? $fallbackIcon;
                    $colors = $palette[$category['color'] ?? ''] ?? $palette['blue'];
                @endphp
                <li class="min-w-0 bg-white rounded-xl shadow-md border border-gray-200 p-6">
                    <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-4 {{ $colors }}">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $iconPaths !!}</svg>
                    </div>
                    <{{ $itemTag }} class="text-lg font-semibold text-gray-900 mb-2 break-words">{{ $category['name'] ?? '' }}</{{ $itemTag }}>
                    @if(!empty($category['description']))
                        <p class="text-gray-700 mb-4 break-words">{{ $category['description'] }}</p>
                    @endif
                    @if(is_numeric($count))
                        <p class="text-sm font-medium text-gray-800">{{ trans_choice('pub_theme::block_pages.faq_categories.count.label', (int) $count, ['count' => (int) $count]) }}</p>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</section>
