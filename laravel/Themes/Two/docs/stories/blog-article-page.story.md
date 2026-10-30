---
title: "Pagina articolo del blog servita dal CMS"
type: story
theme: Two
status: implemented
updated: 2026-10-30
tags: [blog, folio, volt, cms, routing, 500]
---

# Pagina articolo del blog servita dal CMS

## Scopo

`/{lingua}/blog/{slug}` rispondeva 500. L'errore mostrato (`Class "Carbon\Unit" not found`) era un effetto secondario
nel gestore degli errori: `vendor/` e Carbon erano a posto. Il guasto vero era nel file Folio dell'articolo.

## Cause radice

1. La vista dichiarava `$mount = function ($slug) {...}` in Volt: Volt genera già un `mount()` e la compilazione
   falliva con `Cannot redeclare ...::mount()`. In Volt il gancio si scrive `mount(function ($slug) {...})`.
2. Sotto c'era una lettura da `Modules\Cms\Models\Post`, che non esiste: gli articoli sono pagine CMS in JSON
   (`database/content/pages/blog/*.json`), come tutto il resto del sito.
3. L'intestazione `@php ... ?>` non è letta da Folio (che include il file e vede solo `<?php ... ?>`): il nome
   di rotta `blog.show` non veniva registrato.
4. I due JSON degli articoli avevano `slug` col percorso (`blog/<slug>`): `SushiToJsons` antepone la cartella e lo
   slug letto diventava `blog.blog/<slug>`. Il campo `slug` nel file è solo l'ultimo pezzo (vedi
   `Modules/Cms/docs/json-content-slug-uniqueness.md`). Inoltre il blocco di testo puntava a una vista inesistente
   (`blocks.content.text`) invece di `blocks.content.simple`.

## Correzione

- `pages/blog/[slug].blade.php` ora è come `pages/blog/index.blade.php`: intestazione `<?php name('blog.show'); ?>`,
  404 se la pagina CMS `blog.<slug>` non esiste, poi `<x-page side="content" :slug="'blog.'.$slug" />`.
- JSON degli articoli: `slug` ridotto all'ultimo pezzo e vista del testo `blocks.content.simple`.

## Verifica

GET su `/it/blog/<slug>` degli articoli presenti: 200 con `h1` della hero. Su uno slug senza pagina CMS: 404 (prima 500).
