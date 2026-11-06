---
title: "Two: riallineamento dei componenti della pagina articolo"
type: story
theme: Two
status: done
updated: 2026-10-30
created: 2026-10-30
tags: [two, blade, blog, view-cache, component-contract]
qmd: "two article meta post meta post footer blade view cache component contract"
issues:
  - https://github.com/laraxot/base_techplanner_fila5/issues/18
discussions:
  - https://github.com/laraxot/base_techplanner_fila5/discussions/54
---

# Two: riallineamento dei componenti della pagina articolo

## Scopo

`php artisan view:cache` falliva perché `views/articles/show.blade.php` usava il tag
`x-article.meta`, ma il tema Two espone il contratto condiviso `x-post-meta`.
La pagina articolo è una variante della pagina post e deve riusare gli stessi componenti,
così il metadata e il footer mantengono un solo comportamento.

## Analisi della sorgente

- `resources/views/articles/show.blade.php` è il riferimento funzionante del tema: usa
  `x-post-meta` con la prop `post` e `x-post-footer`.
- `resources/views/components/post-meta.blade.php` dichiara `@props(['post'])` e non esiste
  alcun contratto `article.meta` nel tema o nei moduli.
- `x-article.footer` era anch'esso inesistente; correggere solo `article.meta` avrebbe
  lasciato il successivo errore di compilazione.

## Correzione

In `resources/views/views/articles/show.blade.php` sono stati sostituiti entrambi i tag
non registrati con i componenti già previsti:

```blade
<x-post-meta :post="$article" />
<x-post-footer :blocks="$article->footer_blocks" />
```

Non sono stati modificati i nuovi componenti/block né i flussi auth/profile.

## Verifica

- `php artisan view:cache` deve terminare con exit code 0.
- La scansione dei riferimenti `x-article.*` non deve trovare contratti runtime attivi;
  l'unico riferimento residuo eventuale è dentro un commento Blade legacy della home.
