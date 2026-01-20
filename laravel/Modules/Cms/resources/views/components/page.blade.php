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
@endif
