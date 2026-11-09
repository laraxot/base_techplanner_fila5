{{--
    Asset Filament (CSS) per le pagine che montano widget Filament
    (login, register, forgot/reset password).

    Il bundle pubblico `app.css` NON include gli stili Filament:
    questo componente li carica on-demand via `@push('styles')`
    verso `@stack('styles')` in `x-cms::head`.
--}}
@push('styles')
    @vite(['resources/css/filament.css'], 'themes/Two')
@endpush
