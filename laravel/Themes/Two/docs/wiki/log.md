---
title: "Wiki Log — Two"
type: log
theme: Two
tags: [two, wiki, log]
created: 2026-07-06
updated: 2026-11-06
---

# Wiki Log — Two

## [2026-11-06] lint index

- Corretta tabella concepts in index.md: rimossi riferimenti a
  `filament-xotbase-boundary` e `json-content-religion` (file inesistenti),
  aggiunti `mobile-navigation-contract` e `public-asset-deployment`

## [2026-07-06] bootstrap wiki

- Creati index.md e log.md con frontmatter YAML standard
- Aggiunte cartelle mancanti: commands/, entities/, memories/, queries/, rules/, skills/, summaries/, troubleshooting/

## 2026-11-08 — Allineamento doc deployment asset + PageSpeed

- `public_html/themes/Two` è symlink a `laravel/Themes/Two/public`: documentato come contratto ufficiale (deploy git-pull-only) in `concepts/public-asset-deployment.md` — la versione precedente lo vietava (era pre-symlink)
- Corretta la causa reale dei 404 immagini: nesting `public/themes/Two/images` invece di `public/images`; `sync-public` ora copia anche in `public_html/themes/Two/images`
- Rimossi gli 8 `@import` CSS Filament da `resources/css/app.css` (non servono al pubblico): rebuild 994KB→395KB
- Rimossi `@filamentScripts`/`@livewire('notifications')` da tutti i layout (main/base/app/404)
- Ricompresse 36 immagini `resources/images` 62MB→13MB
- `vite.config.ts` eliminato (emptyOutDir:true su config morta)
- `docs/asset-management.md`: corretto outDir e sezione Filament CSS

## 2026-11-09 — Comandi symlink temi/moduli (xot:theme-link, xot:module-link)

- Nuovi comandi Xot: `xot:theme-link` (public_html/themes/{T} → Themes/{T}/public) e `xot:module-link` (public_html/assets/{m} → Modules/{M}/public), con `--{theme,module}=`, `--dry-run`, `--force` (sposta le dir reali in `.bak`)
- Applicati: 4 nuovi link tema (Meetup/Sixteen/TwentyOne/Zero); `assets/geo` ora symlink (era copia identica)
- `assets/xot` NON linkato: contiene `css/`+`img/` extra non presenti in `Modules/Xot/public` — serve merge prima del --force
- Proposta: aggiungere entrambi i comandi al flusso deploy / `vendor:publish` per allineare i docroot senza copia manuale

## 2026-11-09 (correzione) — Contratto asset moduli

- `xot:module-link` implementa `Modules/{M}/public` → `public_html/assets/{m}`. L'idea di mappare `resources/images` → `public_html/modules/{m}` era errata: quel path è legacy e non referenziato dal codice.

## 2026-11-09 — Fix UI login: CSS Filament on-demand

- Root cause: la rimozione degli 8 `@import` Filament da `app.css` (per alleggerire il bundle pubblico) ha lasciato senza stili `fi-*` le 4 pagine auth che montano widget Filament (login, register, forgot/reset password)
- Fix: nuovo entry Vite `resources/css/filament.css` (stessi 8 import vendor, `@reference 'tailwindcss'` per il contesto theme) → `assets/filament-*.css` (646KB) caricato SOLO dalle pagine auth
- Riutilizzabile: componente `<x-pub_theme::filament-assets />` (push verso `@stack('styles')` in `x-cms::head`) — da montare in qualunque pagina con widget Filament
- Pagina pubblica resta a 395KB CSS; le pagine auth caricano il CSS Filament aggiuntivo
- Da fare: stesso trattamento nei temi Meetup/Sixteen/TwentyOne se anche loro hanno widget Filament in FO

## 2026-11-09 — Fix JS Filament auth: @filamentScripts(withCore: true)

- Root cause "password in chiaro / icona assente / errori JS": `components/layouts/base.blade.php` (layout attivo delle pagine auth) non renderizzava `@filamentScripts` → Alpine `filamentSchema`, `filamentSchemaComponent`, `passwordRevealFormComponent` non registrati
- Fix: `@filamentScripts(withCore: true)` (stesso parametro del panel: serve core app.js/echo.js + scripts packages). Verificato: nessun errore console in headless Chrome, type=password + toggle nel DOM
- Stesso fix applicato ai temi con widget Filament in FO: Sixteen e TwentyOne avevano `@filamentScripts` senza `withCore` (core escluso → stesso bug); Meetup non lo aveva affatto → aggiunto in `components/layouts/main.blade.php`. Zero era gia' corretto
- Pattern raccomandato per pagine con widget Filament: `@filamentScripts(withCore: true)` nel layout + `<x-pub_theme::filament-assets />` per il CSS
