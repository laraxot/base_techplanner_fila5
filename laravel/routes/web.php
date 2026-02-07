<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/'.app()->getLocale());
})->name('home');

// Frontend pages are handled by Laravel Folio + Volt in resources/views/pages

// Frontend pages are handled by Laravel Folio + Volt
// See resources/views/pages/
