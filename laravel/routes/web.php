<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    return redirect()->to('/'.app()->getLocale());
})->name('home');

// Frontend e pagine auth: gestiti da Volt + Folio + Laraxot. Non aggiungere rotte né controller in web.php.
<<<<<<< HEAD
=======
    return redirect()->to('/' . app()->getLocale());
})->name('home');
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
