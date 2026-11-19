---
title: "Audit qualita' — tema Two (sottana.com)"
type: story
theme: Two
status: done
created: 2026-11-19
updated: 2026-11-19
issue: https://github.com/laraxot/base_techplanner_fila5/issues/64
tags: [bmad, audit, docs, qualita]
---

# Audit qualita' — tema Two (sottana.com)

**Fase BMAD**: Dev + QA. **Issue**: [#64](https://github.com/laraxot/base_techplanner_fila5/issues/64).
Audit parallelo dei temi (nomi `.md` senza date, indice unico della docs, file morti, PHPStan, test).

## Risultati

- Nomi `.md`: nessun file datato nella docs.
- Indice: tre indici (`README.md`, `00-index.md`, `00-INDEX.md`) e `wiki/index.md` che rimandava a un `../index.md` inesistente.
  `README.md` ora e' l'unico indice (aree: build, componenti, mappe, SEO, accessibilita', validazione, privacy, prodotto, story, wiki);
  `00-index.md` e `00-INDEX.md` rimossi; `wiki/index.md` punta a `../README.md`. Tolti i link a `theme.md` e
  `concepts/xotbase-never-extend-filament.md`, che non esistono nel tema.
- Affermazioni superate (verificate su `package.json` e `vite.config.js`): `npm run copy`, copia manuale delle immagini in
  `public/themes/Two/images/`, `outDir` verso `public/themes/Two`. Corrette in `asset-management.md`,
  `pagespeed-frontoffice-validation.md`, `wcag-mauve-audit-notes.md`, `mcp-integration.md`, `header-navigation-update.md`,
  `target-website-comparison.md`, `implementation-plan.md`. Lasciati i log storici (`walk01.md`, `wiki/log.md`).
- Rimosso il file di lock orfano `stories/container0-routes-and-pub-theme-namespace.story.md.lock` (2026-11-01).

## Codice

- Viste morte rimosse (98 file), dopo grep su tutto `laravel/` (php/json/js, docs escluse) e sui JSON di
  `config/local/techplanner/database/content` (tutte le 39 viste `pub_theme::...` citate nei JSON esistono):
  - `resources/views/views/**` (47 file): copia annidata raggiungibile solo come `pub_theme::views.*`, mai usata;
  - 51 componenti: `components/blogs/**`, `components/blog/search-bar`, `components/sections/{section-border,auth/login,footer/v2}`
    (il footer attivo e' `v1`, default di `<x-section>`), `components/livewire/blog-search-filters` e 39 blocchi
    `components/blocks/**` mai citati da JSON o codice.
- `app/Providers/ThemeServiceProvider.php`: tolto `Volt::mount()` che puntava a `resource_path()` (cartella dell'app, non
  del tema) per un componente inutilizzato. Nota: il provider non e' caricato a runtime (le viste arrivano da `pub_theme`).
  Corretto in `composer.json` il nome classe del provider (`Themes\Two\Providers\ThemeServiceProvider`).
- `lang/de/navigation.php`: chiave `site_title` duplicata (unico errore PHPStan del tema). PHPStan su Two: 0 errori.
- Verifica: pagine `/it`, `/it/services/elettromedicali`, `/it/contacts`, `/it/blog`, `/it/faq`, `/it/about`, `/it/services`,
  `/it/privacy`, `/it/terms`, `/it/cookies`, `/it/auth/login` rispondono 200 con un solo `<h1>`, `lang="it"` e `alt` su tutte
  le immagini; HTML prima/dopo identico a parte token CSRF e id Livewire.

## Aperto

- **Bug** (fuori scope, modulo Gdpr/contenuti): la cookie bar linka `/it/cookie-policy`, che risponde 404; le pagine esistenti
  sono `cookies` / `cookie`.
- `config/local/techplanner/xra.php` ha tre chiavi `pub_theme` (vedi story `mobile-ux-pass`).
- Molti report storici (`*-complete*`, `replication-*`, `footer-*`) andrebbero archiviati in una cartella `archive/`.
