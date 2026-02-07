<?php

use function Laravel\Folio\{name};

name('pages.about');

?>
<x-layouts.app>
    @if(isset($content['content_blocks']['it']))
        @foreach($content['content_blocks']['it'] as $block)
            @switch($block['type'])
                @case('hero')
                    @include($block['data']['view'], ['data' => $block['data']])
                    @break
                @case('content-split')
                    @include($block['data']['view'], ['data' => $block['data']])
                    @break
                @case('values')
                    @include($block['data']['view'], ['data' => $block['data']])
                    @break
                @case('team')
                    @include($block['data']['view'], ['data' => $block['data']])
                    @break
                @case('company-data')
                    @include($block['data']['view'], ['data' => $block['data']])
                    @break
                @case('benefits')
                    @include($block['data']['view'], ['data' => $block['data']])
                    @break
                @default
                    <div class="py-20">
                        <div class="container mx-auto px-4">
                            <div class="text-center">
                                <h2 class="text-2xl font-bold text-gray-900">Blocco non trovato: {{ $block['type'] }}</h2>
                                <p class="text-gray-600 mt-2">View: {{ $block['data']['view'] ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
            @endswitch
        @endforeach
    @else
        <div class="min-h-screen bg-gray-50 flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Pagina in costruzione</h1>
                <p class="text-gray-600">I contenuti per questa pagina sono in fase di preparazione.</p>
            </div>
        </div>
    @endif
</x-layouts.app>