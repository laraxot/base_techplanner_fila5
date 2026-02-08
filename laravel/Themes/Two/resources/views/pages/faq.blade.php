@php
use function Laravel\Folio\{name, middleware};

name('faq');
?>

<?php

use function Laravel\Folio\name;

name('faq');

?>

<x-layouts.app>
    <div>
        <x-page side="content" slug="faq" />
    </div>
</x-layouts.app>

@push('styles')
<style>
.faq-item.open .faq-content {
    display: block;
}

.faq-item.open .faq-toggle svg {
    transform: rotate(180deg);
}

.faq-content {
    animation: slideDown 0.3s ease-out;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endpush