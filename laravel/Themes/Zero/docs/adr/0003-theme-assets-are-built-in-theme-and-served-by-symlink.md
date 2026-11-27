---
title: "ADR — Gli asset del tema si compilano nel tema e si servono per symlink"
type: decision
status: accepted
created: 2026-11-24
updated: 2026-11-24
decision-makers: [Theme Zero owner, Xot module owner]
module: Zero
qmd: "ADR Zero Vite outDir public symlink public_html themes xot:theme-link manifest asset tema build"
---

# Gli asset del tema si compilano nel tema e si servono per symlink

## Contesto

Il front office usa CSS e JS del tema (Tailwind, Alpine, Flowbite). Il document root è `public_html/`, fratello di `laravel/`. Dove deve finire il risultato di `vite build` e come arriva al browser senza duplicarlo?

## Driver della decisione

- Una sola copia degli asset compilati: nessun file da tenere allineato tra tema e document root.
- Il tema resta autonomo: sorgenti e build nella stessa cartella `laravel/Themes/<Tema>/`.
- Il document root non deve contenere artefatti committati per tema.

## Alternative scartate

- **Copiare i file compilati in `public_html/`** (script `npm run copy`): rompe il symlink e lascia asset vecchi; lo script è stato rimosso (`laravel/Modules/Xot/docs/theme-assets-workflow.md`, regola in apertura).
- **Compilare direttamente in `public_html/`**: i sorgenti del tema scriverebbero fuori dalla propria cartella e `public_html/` conterrebbe build non versionate per tema.

## Decisione

Scelta: **Vite compila in `Themes/Zero/public` e `public_html/themes/Zero` è un symlink creato da `php artisan xot:theme-link`**. In `vite.config.js` `build.outDir` è `./public`, `emptyOutDir` è `false` e il manifest si chiama `manifest.json` (`laravel/Themes/Zero/vite.config.js:18-22`). I layout caricano gli asset con `@vite([...], 'themes/Zero')` (`resources/views/components/layouts/main.blade.php:46`, `guest.blade.php:46`, `auth.blade.php:31`, `resources/views/layouts/app.blade.php:12`). Il comando crea `public_html/themes/<Tema>` verso `Themes/<Tema>/public` e ne registra il nome nel `.gitignore` della cartella (`laravel/Modules/Xot/app/Console/Commands/ThemeLinkCommand.php:24-29`, `public_html/themes/.gitignore`).

## Conseguenze

- Buono, perché esiste una sola copia degli asset e il deploy non copia file.
- Buono, perché i link non entrano in git (ogni installazione li crea).
- Cattivo, perché il link va creato in ogni installazione: in questo checkout `public_html/themes/` contiene solo `.gitignore` (osservato il 2026-11-24), quindi `@vite(..., 'themes/Zero')` non si risolve finché non si esegue il comando (non verificato a runtime).
- Cattivo, perché `emptyOutDir: false` lascia in `public/` asset di build precedenti: la pulizia è manuale.

## Conferma

Verifica ripetibile, non eseguita in questa passata: `npm run build` in `laravel/Themes/Zero`, poi `php artisan xot:theme-link --theme=Zero --dry-run` da `laravel/` e controllo che `manifest.json` esista in `laravel/Themes/Zero/public/`. Nessun test Pest automatico copre questa catena (il tema non ha cartella `tests/`).
