{{--
  Contratto Filament 5.x — Configuring your layout:
  https://filamentphp.com/docs/5.x/introduction/installation#configuring-your-layout

  Ordine obbligatorio a fine <body>:
  1. @livewire('notifications') — flash Filament (sempre, non solo per utenti autenticati)
  2. @filamentScripts — OBBLIGATORIO (JS Filament/Livewire per componenti FO)
  3. @vite JS del tema

  @livewireScripts non serve: config('livewire.inject_assets') = true.
<<<<<<< .merge_file_rmZnN0
<<<<<<< .merge_file_re51FA
  @see Modules/Cms/docs/bmad/filament-layout-styles-scripts.md
=======
>>>>>>> .merge_file_oVEMUL
=======
>>>>>>> .merge_file_A6M4VV
--}}
@livewire('notifications')

@filamentScripts
@vite(['resources/js/app.js'], 'themes/'.$pubTheme)

@stack('scripts')
@yield('scripts')
