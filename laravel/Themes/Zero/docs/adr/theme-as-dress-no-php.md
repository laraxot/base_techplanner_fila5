---
title: "ADR — Zero non contiene classi PHP: modelli, widget e logica stanno nei moduli"
type: decision
status: accepted
theme: Zero
created: 2026-11-24
updated: 2026-11-24
related:
  - ../bmad/scopo.md
  - ../model-usage-in-themes.md
---

# ADR: il tema e' il "vestito", non decide cosa mostrare

## Contesto

- Zero e' un tema pubblico (`theme.json`: `type: pub`) scelto per tenant con `pub_theme` (`XotData::make()->pub_theme`);
  lo stesso tema serve installazioni diverse, e un altro tema (One) ne riusa la build con `@vite([...], 'themes/Zero')`.
- `Themes/Zero/app/` contiene solo `.gitkeep`: nessun provider, Action, modello o componente PHP. Le viste si registrano
  sotto `pub_theme` da Xot/Cms.
- [model-usage-in-themes](../model-usage-in-themes.md) e [bmad/scopo](../bmad/scopo.md): «Themes Don't Own Models»; il tema
  «non decide cosa e' una pagina ne' quale dato mostrare».
- Domanda: dove va la logica che una vista del tema sembra richiedere (una query, un form, un calcolo)?

## Decisione

- Il tema contiene solo Blade (`resources/views/`), token di stile e asset (`resources/css`, `resources/js`, build in
  `public/`), traduzioni (`lang/`).
- Dati e interazioni arrivano dai moduli: widget Filament (es. `Modules\User\Filament\Widgets\Auth\LoginWidget` in
  `pages/auth/login.blade.php`), Action e pagine risolte da `Modules/Cms` per le pagine `[container0]`.
- Una classe PHP che "servirebbe" al tema si crea nel modulo che possiede il dato.

## Alternative scartate

- **Componenti/Action nel tema** (come Sixteen o TwentyOne): comodi, ma legano il tema a un dominio e si duplicano quando
  un altro tema serve la stessa cosa.
- **Modelli o query nelle Blade**: logica non testabile, invisibile a PHPStan, copiata da ogni tema.

## Conseguenze

- Pro: il tema si sostituisce senza perdere comportamento; niente PHPStan/test PHP da mantenere nel tema.
- Contro: anche un piccolo helper di presentazione richiede un modulo (tipicamente `UI` o `Cms`).
- Debito: `docs/` contiene ancora guide su JpGraph, Chart.js e Filament che descrivono codice dei moduli, non del tema.

## Verifica

`Themes/Zero/tests/Unit/ThemeBoundariesTest.php` (sorgente, senza app: `vendor/bin/pest Themes/Zero/tests`) fallisce se
compare un file `.php` in `app/` o `src/` del tema.
