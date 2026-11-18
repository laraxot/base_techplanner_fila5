<?php

use function Laravel\Folio\name;

name('blog.show');

?>

@php
    $cmsPage = \Modules\Cms\Models\Page::findUniqueBySlug('blog.'.$slug);
    abort_if($cmsPage === null, 404);
@endphp

<x-layouts.app :title="(string) $cmsPage->title">
    <x-page side="content" :slug="'blog.'.$slug" />
</x-layouts.app>
