---
title: "ADR — Le pagine auth di Zero rendono i widget Filament del modulo User e caricano il CSS del pannello"
type: decision
status: accepted
theme: Zero
created: 2026-11-24
updated: 2026-11-24
related:
  - 0002-theme-as-dress-no-php.md
  - ../concepts/xotbase-never-extend-filament.md
qmd: "auth pages render widgets with panel"
---

# ADR: login nel front office = widget del modulo User + CSS compilato del pannello

## Contesto

- Login e registrazione del front office devono avere la grafica del tema ma la logica (validazione, rate limit,
  autenticazione) del modulo User, che la espone come widget Filament (`Modules\User\Filament\Widgets\Auth\LoginWidget`).
- Fuori da un pannello, `@filamentStyles` emette solo variabili colore e stili di `wire:loading`: le regole dei componenti
  (`.fi-input`, `.fi-btn`, `.fi-icon`) esistono solo nel bundle compilato del pannello (commento in
  `resources/views/components/layouts/auth.blade.php`). Senza, il form appare senza stile.
- Domanda: come si rende un form Filament dentro una pagina pubblica del tema?

## Driver della decisione

- Una sola implementazione del login (validazione, rate limit, autenticazione) nel modulo User: il tema non
  duplica la logica.
- Il form deve avere la grafica del tema ma le regole dei componenti Filament (`.fi-*`).
- Fuori da un pannello, `@filamentStyles` non basta: servono le classi del bundle compilato del pannello.
- Aggiornamenti di Filament devono essere ereditati senza ricopiare a mano le classi in Tailwind.

## Decisione

- `resources/views/pages/auth/login.blade.php` usa `@livewire(\Modules\User\Filament\Widgets\Auth\LoginWidget::class)`;
  il tema non ha un form di login proprio.
- `components/layouts/auth.blade.php` carica `@livewireStyles`, `@filamentStyles` e il CSS compilato del pannello
  `asset('css/filament/filament/app.css')`, poi il CSS del tema via `@vite([...], 'themes/Zero')`.

## Alternative scartate

- **Form di login in Blade/Volt nel tema**: duplica validazione e sicurezza del modulo User in ogni tema.
- **Ricreare a mano in Tailwind le classi `.fi-*`**: copia che diverge a ogni aggiornamento di Filament.
- **Login solo nel pannello admin**: l'utente del front office finirebbe nella grafica del back office.

## Conseguenze

- Pro: una sola implementazione del login; aggiornamenti di Filament ereditati.
- Contro: una richiesta CSS in piu' (circa 90 KB gzip, in cache) e dipendenza dal percorso del pannello `filament`
  (`public_html/css/filament/filament/app.css`, generato da `php artisan filament:assets`).
- Debito: lo stesso layout carica Google Fonts da `fonts.googleapis.com`, richiesta a terzi prima del consenso.

## Verifica

`Themes/Zero/tests/Unit/ThemeBoundariesTest.php` (senza app) fallisce se il layout auth perde `@filamentStyles` o il CSS del
pannello, o se la pagina di login smette di usare il `LoginWidget` del modulo User.
