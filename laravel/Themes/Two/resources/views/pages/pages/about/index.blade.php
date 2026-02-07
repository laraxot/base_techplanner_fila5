<?php

use function Laravel\Folio\name;
use Livewire\Volt\Component;

name('about.index');

new class extends Component {};
?>

<x-layouts.app>
    @volt('about.index')
    <div>
        <x-page side="content" slug="chi-siamo" />
    </div>
    @endvolt
</x-layouts.app>
