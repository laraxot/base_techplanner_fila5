---
title: "ADR del modulo Seo"
type: index
tags: [adr, decisioni, seo]
created: 2026-11-18
updated: 2026-11-26
---

# ADR del modulo Seo

Il **perché** di come Seo rende il sito trovabile: sitemap e `robots.txt` dinamici, IndexNow, nessun file "per l'AI",
una sitemap che Seo costruisce senza conoscere i moduli che la alimentano, e due elenchi (`Disallow` e `noindex`) che
sembrano duplicati ma non vanno fusi.

Leggili prima di: aggiungere pagine di un modulo alla sitemap, toccare `robots.txt` o le regole `noindex`, aggiungere un
servizio verso i motori di ricerca, o importare un altro modulo da `Modules/Seo/app`.

Formato (frontmatter `type: decision`, nome file `NNNN-argomento.md` senza date; sezioni `Contesto`, `Driver della decisione`, `Decisione`, `Alternative scartate`, `Conseguenze`, `Conferma`) e regole:
[0012-behavioral-contract-governance](../../../Xot/docs/adr/0012-behavioral-contract-governance.md).
Le promesse delle Action stanno nei [contratti](../contracts/README.md), non qui.

## Indice

- [Presenza nei motori di ricerca](0002-search-engine-presence.md) — sitemap dichiarata, IndexNow per le URL nuove, identità dell'entità, niente `llms.txt`.
- [La sitemap la costruisce solo Seo, alimentata da sorgenti taggate](0003-sitemap-built-in-seo-fed-by-tagged-sources.md) — `SitemapPathsContract` + tag; stessa fonte per IndexNow (**substantive**).
- [robots.txt chiude solo aree già noindex nel head](0001-robots-disallow-subset-of-head-noindex.md) — `PRIVATE_SEGMENTS` ⊆ `HIDDEN_SEGMENTS`, perché un `Disallow` nasconde il `noindex`.

## Stato di copertura

Aggiornato il 2026-11-26: 3 ADR, tutti con le sei sezioni e la «Conferma». Due hanno una sezione «Stato attuale» perche' il codice o il repository contraddicono la Decisione.

| ADR | Conferma automatica oggi | Stato attuale |
|---|---|---|
| 0001 robots-disallow-subset-of-head-noindex | Group `SEO-ROBOTS-INV-1..5`; `RobotsSegmentsMatchHeadPolicyTest` | Il deploy non lancia `seo:robots` e il file in `public_html/robots.txt` e' scritto a mano: decisione umana aperta |
| 0002 search-engine-presence | Group `SEO-INDEXNOW-*`; `BuildRobotsTxtActionTest` (sitemap dichiarata). Nessuna conferma automatica per «niente `llms.txt`», `sameAs` e meta di verifica (solo revisione; codice in Xot e Cms) | `<lastmod>` delle pagine CMS: l'ADR dice assente, il codice lo scrive per le pagine con `updated_at` (oggi la home) |
| 0003 sitemap-built-in-seo-fed-by-tagged-sources | `SitemapOwnershipTest` (arch); group `SEO-SITEMAP-INV-1..4` | — |
