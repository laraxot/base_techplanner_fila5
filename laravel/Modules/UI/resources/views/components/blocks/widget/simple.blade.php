<?php

declare(strict_types=1);

?>
@props(['widget'])
<div>
<<<<<<< HEAD
    {{--  
    <x-dynamic-component :component="$widget" />
    --}}
    
    @livewire($widget, $block->data)
=======
    @php
        $canRenderWidget = is_string($widget)
            && $widget !== ''
            && class_exists($widget)
            && (! method_exists($widget, 'canView') || $widget::canView());

        $routeContext = array_filter([
            'slug0' => $slug0 ?? null,
            'container0' => $container0 ?? null,
        ], static fn (mixed $value): bool => $value !== null && $value !== '');

        $livewireParams = array_merge(
            $routeContext,
            ['blockData' => is_array($data ?? null) ? $data : []],
        );
    @endphp

    @if ($canRenderWidget)
        @livewire($widget, $livewireParams)
    @endif
>>>>>>> dev
</div>
