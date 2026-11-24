<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;

// Senza questa intestazione la pagina del tema **sostituisce** quella del
// modulo e ne perde le dichiarazioni: niente `guest`, quindi un utente gia'
// autenticato arrivava fino al widget e riceveva un 403 invece del
// reindirizzamento; e niente `name('register')`, quindi `route('register')`
// altrove non avrebbe piu' avuto un indirizzo. Folio preferisce il tema, e con
// la precedenza si prendono anche gli obblighi.
middleware(['guest']);
name('register');

?>

{{--
  Pagina di registrazione del progetto.

  ## Perche' sta qui e non nel modulo

  `Modules/Gdpr/docs/register-widget-copy-ownership.md` divide le due
  responsabilita': il **form** e' del modulo Gdpr (`RegisterWidget`, con i
  consensi), la **pagina** che lo ospita e' del progetto. Questo file e' la
  pagina; Folio preferisce le viste del tema a quelle dei moduli, quindi
  sostituisce `Modules/User/resources/views/pages/auth/register.blade.php`.

  ## Il difetto che risolve

  Prima questa pagina non esisteva, e Folio arrivava a quella del modulo User,
  che fa un `@include('pub_theme::components.pages.auth-register')` **senza
  ripiego**. Con `register_pub_theme => false` — il valore del tenant
  `localhost`, cioe' quello con cui girano i test — il namespace `pub_theme`
  non e' registrato, quindi:

      InvalidArgumentException: No hint path defined for [pub_theme]

  e `GET /{lingua}/auth/register` rispondeva **500**: 963 KB di pagina d'errore
  dove doveva esserci un modulo di iscrizione. **Non si poteva registrare
  nessuno.** La pagina gemella del login funzionava, perche' nel modulo ha il
  ripiego; questa no, e nessuno se n'era accorto perche' i test che la provano
  cercavano del testo **dentro la pagina d'errore** — che stampa il sorgente
  del test, quindi lo trovavano (base_quaeris_fila5#237).

  ## Le scelte

  - `<x-layouts.main>` e la struttura ricalcano `pages/auth/login.blade.php`
    accanto a questo file: due pagine sorelle si somigliano.
  - Le chiavi sono `gdpr::register.*` e non `pub_theme::auth.*` come nel login,
    perche' `Themes/Zero/lang/*/auth.php` ha solo `actions`, `login`, `consent`
    e `social`: per la registrazione non c'e' niente, e usarle mostrerebbe le
    chiavi grezze. La copia della registrazione e' del modulo, come dice il
    documento citato sopra.
  - Si monta il widget di **Gdpr**, non quello di User: quest'ultimo e'
    dichiarato dal suo stesso file «il ripiego senza consensi», e un modulo di
    iscrizione che raccoglie dati senza chiedere privacy e condizioni, in questo
    progetto, non va messo in produzione.
--}}
<x-layouts.main>
    <x-slot name="title">
        {{ __('gdpr::register.title') }} - {{ config('app.name', 'Laravel') }}
    </x-slot>

    <x-slot name="description">
        {{ __('gdpr::register.subtitle') }}
    </x-slot>

    <a href="#register-widget" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-indigo-600 text-white px-4 py-2 rounded-md z-50">
        {{ __('gdpr::register.title') }}
    </a>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="mx-auto h-12 w-12 bg-indigo-600 rounded-lg flex items-center justify-center mb-4">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>

                <h1 class="text-3xl font-extrabold text-gray-900 mb-2">
                    {{ __('gdpr::register.title') }}
                </h1>

                <p class="text-sm text-gray-600">
                    {{ __('gdpr::register.subtitle') }}
                </p>
            </div>

            <div id="register-widget" class="bg-white rounded-lg shadow-lg border border-gray-200 p-8">
                @livewire(\Modules\Gdpr\Filament\Widgets\Auth\RegisterWidget::class)
            </div>

            <div class="text-center">
                <p class="text-sm text-gray-600">
                    {{ __('gdpr::register.already_have_account') }}
                    <a
                        href="{{ route('login') }}"
                        class="font-medium text-blue-600 hover:text-blue-500 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded"
                    >
                        {{ __('pub_theme::auth.actions.login.label') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.main>
