<?php

declare(strict_types=1);

?>
{{-- Page Component --}}
@props([
    'blocks' => [],
    'side' => 'content',
    'slug' => '',
<<<<<<< HEAD
<<<<<<< HEAD
    'page' => null,
    'container0' => '',
    'slug0' => '',
    'data' => []
=======
    'page' => null
>>>>>>> 4b6b99016 (first commit)
])

@if(!empty($blocks))
    <div class="page-{{ $side }}-content" data-slug="{{ $slug }}" data-side="{{ $side }}">
<<<<<<< HEAD
        @include('cms::components.page-content', [
            'blocks' => $blocks,
            'data' => array_merge(['container0' => $container0, 'slug0' => $slug0], $data)
        ])
=======
        @foreach($blocks as $block)
            {{-- BlockData ha già gestito tutto: vista, dati, fallback --}}
            @include($block->view, $block->data)
        @endforeach
>>>>>>> 4b6b99016 (first commit)
    </div>
=======
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
>>>>>>> dev
@endif
