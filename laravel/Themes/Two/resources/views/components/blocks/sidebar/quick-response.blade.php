@props([
    'title' => '',
    'features' => [],
])

@php
    $icons = [
        'check' => '<path d="M20 6 9 17l-5-5"/>',
        'bolt' => '<path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/>',
    ];
@endphp

{{-- Risposta rapida - sidebar Theme Two --}}
<div class="bg-white rounded shadow p-4 mb-4 min-w-0">
    @if(!empty($title))
        <h2 class="font-semibold text-gray-900 mb-3 pb-2 border-b break-words">{{ $title }}</h2>
    @endif

    @if(!empty($features))
        <ul class="space-y-4">
            @foreach($features as $feature)
                <li class="flex items-start gap-3">
                    <span class="flex-shrink-0 w-12 h-12 rounded-lg bg-green-100 text-green-800 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $icons[$feature['icon'] ?? ''] ?? $icons['check'] !!}</svg>
                    </span>
                    <div class="min-w-0">
                        <h3 class="font-semibold text-gray-900 break-words">{{ $feature['title'] ?? '' }}</h3>
                        @if(!empty($feature['description']))
                            <p class="text-sm text-gray-700 break-words">{{ $feature['description'] }}</p>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
