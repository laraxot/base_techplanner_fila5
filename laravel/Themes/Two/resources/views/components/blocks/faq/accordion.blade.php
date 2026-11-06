@props([
    'title' => '',
    'subtitle' => '',
    'categories' => [],
])

@php
    // Livelli di intestazione: titolo h2, categoria h3, domanda h4 (si scalano di uno se manca il titolo).
    $categoryTag = !empty($title) ? 'h3' : 'h2';
    $questionTag = !empty($title) ? 'h4' : 'h3';
@endphp

<section class="py-16 bg-gray-50">
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

        <div class="max-w-4xl mx-auto">
            @foreach($categories as $categoryIndex => $category)
                @continue(empty($category['questions']))
                <div class="mb-10 min-w-0">
                    @if(!empty($category['name']))
                        <{{ $categoryTag }} class="text-2xl font-bold text-gray-900 mb-4 break-words">{{ $category['name'] }}</{{ $categoryTag }}>
                    @endif

                    <div class="space-y-4">
                        @foreach($category['questions'] as $questionIndex => $faq)
                            @php $panelId = 'faq-acc-' . $categoryIndex . '-' . $questionIndex; @endphp
                            <div class="bg-white rounded-lg shadow-md overflow-hidden" x-data="{ open: {{ $categoryIndex === 0 && $questionIndex === 0 ? 'true' : 'false' }} }">
                                {{-- Pattern accordion APG: pulsante dentro un'intestazione, stato esposto con aria-expanded/aria-controls. --}}
                                <{{ $questionTag }} class="m-0">
                                <button type="button" @click="open = !open" :aria-expanded="open.toString()" aria-controls="{{ $panelId }}" class="w-full min-h-11 px-6 py-4 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                                    <span class="min-w-0 break-words font-semibold text-gray-900 pr-4">{{ $faq['question'] ?? '' }}</span>
                                    <svg x-show="!open" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <svg x-show="open" x-cloak aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                    </svg>
                                </button>
                                </{{ $questionTag }}>
                                <div id="{{ $panelId }}" x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak class="px-6 pb-4">
                                    <div class="text-gray-700 leading-relaxed break-words">{!! $faq['answer'] ?? '' !!}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
