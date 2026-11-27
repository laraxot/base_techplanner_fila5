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

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

Questo indice appartiene a **module_seo_fila5**: ogni decisione su codice, dominio o tema va nell'ADR del package owner; il root registra soltanto i vincoli di composizione. Un ADR richiede una scelta reale con alternative e conseguenze, più una **Conferma** ripetibile (oppure la dichiarazione esplicita che manca). Non creare ADR fittizi per riempire un indice.

- [Confine LaravelDay/harness Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/adr/0042-laravel-day-harness-adoption-boundary.md); [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md).
- **BMAD**: la story owner-local conserva `scope`, `must_not_change`, `evidence`, `approval_required` nei cambi rischiosi.
- **ECC**: nessun marker di merge; distinguere la prova eseguita dal semplice riferimento a un test; se la conferma non è disponibile segnare `non eseguita`.
- **Second Brain**: QMD/Graphify e `.harness/memory/{facts,lessons}.md` sono puntatori a evidenza datata, non copie degli ADR. [Runbook](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md) · [Rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
