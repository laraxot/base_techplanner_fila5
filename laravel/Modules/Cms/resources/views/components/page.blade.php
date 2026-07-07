<?php

declare(strict_types=1);

?>
{{-- Page Component --}}
@props([
    'blocks' => [],
    'side' => 'content',
    'slug' => '',
<<<<<<< HEAD
    'page' => null,
    'data' => [],
])

@if (!empty($blocks))
    @foreach ($blocks as $block)
        {{-- BlockData ha già gestito tutto: vista, dati, fallback --}}
        {{-- Salta i blocchi non attivi --}}
        @if (property_exists($block, 'active') && !$block->active)
            @continue
        @endif
        @include($block->view, array_merge($data, $block->data, ['data' => $block->data]))
    @endforeach
=======
    'page' => null
])

@if(!empty($blocks))
    <div class="page-{{ $side }}-content" data-slug="{{ $slug }}" data-side="{{ $side }}">
        @foreach($blocks as $block)
            {{-- BlockData ha già gestito tutto: vista, dati, fallback --}}
            @include($block->view, $block->data)
        @endforeach
    </div>
>>>>>>> 6ed19256f (.)
@endif
