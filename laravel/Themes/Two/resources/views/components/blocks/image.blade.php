@props([
    'image' => false,
    'url' => false,
    'alt' => false,
    'caption' => false,
    'ratio' => false,
])

@php
    $src = $image ? Storage::url($image) : $url;

    $ratioClass = \App\Filament\Blocks\Image::getRatioClass($ratio ?: '4-3');
@endphp

@if ($src && $caption)
    <figure>
        <img
            class="w-full {{ $ratioClass }} object-cover object-center"
            src="{{ $src }}"
<<<<<<< HEAD
            alt="{{ $alt ?: '' }}"
=======
            @if ($alt) alt="{{ $alt }}" @endif
>>>>>>> 4b6b99016 (first commit)
        >
        <figcaption>{{ $caption }}</figcaption>
    </figure>
@elseif ($src)
    <img
        class="w-full {{ $ratioClass }}"
        src="{{ $src }}"
<<<<<<< HEAD
        alt="{{ $alt ?: '' }}"
=======
        @if ($alt) alt="{{ $alt }}" @endif
>>>>>>> 4b6b99016 (first commit)
    >
@endif
