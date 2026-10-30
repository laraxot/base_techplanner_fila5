@props([
    'title' => '',
])
{{-- `title` opzionale: se la pagina non lo passa, layouts/main ricava il titolo dalla pagina CMS della rotta (WCAG 2.4.2). --}}
<x-layouts.main :title="$title">
    <x-slot name="beforeMain">
        <x-section slug="header"/>
    </x-slot>

    {{ $slot }}

    <x-slot name="afterMain">
        <x-section slug="footer"/>
    </x-slot>
</x-layouts.main>
