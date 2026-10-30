---
title: "Theme Two: integrazione del document head SEO"
type: story
theme: Two
status: done
created: 2026-10-30
updated: 2026-10-30
tags: [bmad, seo, head, blade, accessibility, mobile]
related:
  - "../../../Modules/Cms/docs/stories/seo-head-component.story.md"
  - "../seo-multilingual-guide.md"
---

# Theme Two: integrazione del document head SEO

> Theme Two usa un solo componente Head condiviso: il layout conserva la parità
> visuale e il modulo CMS conserva un contratto SEO unico.

## Decisione

I layout pubblici attivi e le copie legacy che risultavano ancora risolte dal
runtime delegano a `<x-cms::head>`. Il tema fornisce soltanto il bundle Vite
`themes/Two`, il colore istituzionale blu e gli stack del layout; non duplica
Open Graph, canonical o Schema.org.

## Verifica

- PHPStan `Modules`: 0 errori.
- `php artisan view:cache`: superato.
- Playwright 390×844: hero non coperta dall'header, head unico nel DOM e zero
  errori console.
- Screenshot: `build/two-home-mobile-head-final.png`.

## Confini

Nessun asset o selettore `Sixteen` è stato introdotto. La pagina usa la locale
attiva e le traduzioni `pub_theme::`; i testi SEO provengono da `MetatagData`.
