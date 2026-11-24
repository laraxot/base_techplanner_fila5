{{--
    404: se il tema attivo ha `errors/404.blade.php` (namespace `pub_theme`) si rende quella, con il layout e le sezioni del sito.
    Se il tema non la offre, o se la sua resa solleva un'eccezione (una pagina di errore non deve mai produrre un 500), resta la pagina di serie.
--}}
@php
    $themed = null;
    if (view()->exists('pub_theme::errors.404')) {
        try {
            $themed = view('pub_theme::errors.404')->render();
        } catch (\Throwable $renderError) {
            report($renderError);
        }
    }
@endphp
@if ($themed !== null){!! $themed !!}@else
    @section('title', __('errors.http.404.title'))
    @section('code', '404')
    @section('message', __('errors.http.404.message'))
    @include('errors::minimal')
@endif
