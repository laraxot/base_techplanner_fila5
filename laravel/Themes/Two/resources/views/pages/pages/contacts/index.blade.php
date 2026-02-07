<?php

use function Laravel\Folio\name;
use Livewire\Volt\Component;

name('contacts.index');

new class extends Component {};
?>

<x-layouts.app>
    @volt('contacts.index')
    <div>
        <x-page side="content" slug="contatti" />
    </div>
    @endvolt
</x-layouts.app>
