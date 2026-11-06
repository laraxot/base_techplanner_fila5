---
title: "Pagine CMS in sottocartella e pagine inesistenti: contenuto, 404, link"
type: story
theme: Two
status: implemented
updated: 2026-10-30
tags: [cms, folio, volt, slug, 404, routing, wcag]
---

# Pagine CMS in sottocartella e pagine inesistenti

## Scopo

`/it/services/<x>` rispondeva 200 ma senza `h1` né contenuto, e un URL che non esiste (`/it/nonesiste`) rispondeva
200 con un `<main>` vuoto invece di 404. Una pagina vuota con 200 è un errore per chi usa lo screen reader (nessuna
intestazione, nessun punto di riferimento) e per i motori di ricerca (soft-404).

## Cause radice

1. `SushiToJsons` antepone al `slug` il nome della cartella (`pages/services/x.json` con `"slug": "x"` diventa
   `services.x`). I tre JSON dei servizi avevano `"slug": "services/x"` e diventavano `services.services/x`: nessuna
   rotta li trovava. Regola: nel file lo slug è solo l'ultimo pezzo
   (`Modules/Cms/docs/json-content-slug-uniqueness.md`).
2. `pages/[container0]/[slug0]/index.blade.php` dichiarava `mount()` senza parametri: Volt non assegnava più
   `container0`/`slug0` e la pagina cercava sempre lo slug `.view`. Ora usa `ResolvePageAction` (modello, poi pagina
   `container.slug`, poi modello `container.view`), come il tema Sixteen.
3. Il contenitore Volt di quella pagina restituiva più elementi radice (Livewire ne vuole uno): ora c'è un `<div>`.
4. Nessuna delle due pagine generiche verificava che la pagina CMS esistesse: `blocks = []` produceva un 200 vuoto.
   Ora `abort_if(... === null, 404)`, e anche il modello `container.view` senza record è un 404.
5. Link nel contenuto verso pagine che non esistono: `/it/servizi` (la pagina è `/it/services`) e `/it/contact`
   (la pagina italiana è `/it/contatti`).

## Correzione

- Tema Two: `pages/[container0]/index.blade.php` e `pages/[container0]/[slug0]/index.blade.php` (404 + `ResolvePageAction`
  + radice unica); `pages/blog/[slug].blade.php` passa il titolo della pagina CMS al layout (WCAG 2.4.2).
- JSON del tenant: `slug` dei servizi ridotto all'ultimo pezzo; link `/it/servizi` → `/it/services` in home e chi-siamo;
  `/it/contact` → `/it/contatti` in servizi e articolo del blog.

## Verifica

GET: `/it/services/<x>` 200 con `h1` della hero e `<title>` della pagina; `/it/nonesiste`, `/it/servizi`,
`/it/cookie-policy` 404; pagine esistenti (home, chi-siamo, privacy, terms, cookies, contatti, faqs, blog) invariate.
