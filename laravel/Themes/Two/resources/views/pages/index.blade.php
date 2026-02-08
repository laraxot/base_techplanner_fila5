<?php

use function Laravel\Folio\name;

name('home');

?>

<x-layouts.app>
    <div>
        <x-page side="content" slug="home" />
    </div>
</x-layouts.app>

<x-layouts.app>
    @volt('home')
    <div>
        <x-page side="content" slug="home" />
    </div>
    @endvolt
</x-layouts.app>
