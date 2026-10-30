---
title: "Seo: defaults di sito, hreflang, politica robots e schema.org per laravel/head"
type: story
module: Seo
status: backlog
priority: high
created: 2026-10-30
updated: 2026-10-30
tags: [seo, laravel-head, hreflang, robots, schema-org, defaults, queueable-actions]
qmd: "Seo Head::defaults hreflang alternates robots noindex schema Organization WebSite BreadcrumbList FAQPage laravel/head actions"
related:
  - ../../../../docs/stories/seo-head-maximum-schema-org-hreflang.story.md
  - ../../../Cms/docs/stories/seo-head-component.story.md
  - ./inbound-article-event-schema.story.md
  - ../wiki/concepts/metatag-data-contract.md
---

# Seo: defaults di sito, hreflang, politica robots e schema.org

Corsia B della story [SEO al massimo del front office](../../../../docs/stories/seo-head-maximum-schema-org-hreflang.story.md).
Il componente `<x-cms::head>` è della corsia A (Cms); qui stanno **politica e dati**: cosa dire nel `<head>`, non come comporlo.

## Scopo

Come visitatore o crawler voglio che ogni pagina dichiari titolo, descrizione, lingua, alternative linguistiche, indicizzabilità e
dati strutturati corretti, così che i risultati di ricerca e le anteprime siano esatti e le pagine riservate non vengano indicizzate.

## Perché in Seo e non nel componente

Seo possiede già `MetatagData`/`MetatagDataContract`, la sitemap e `RedirectToCanonicalPath`. Un componente di layout che calcola
hreflang o decide cosa è indicizzabile mescola composizione e politica, e lo rende non riusabile da un altro tema.

## Acceptance criteria

- [ ] `ApplySiteHeadDefaultsAction` registra in `Head::defaults()` (strato più basso di `laravel/head`) brand, suffisso del titolo,
      descrizione del sito, `og:site_name`, `og:locale` nel formato `ll_RR`, card Twitter, `robots` di default e `preconnect` dei domini usati.
      Nessun segnaposto, nessuna chiave grezza (`metatag.*`): in assenza di dato si omette il tag.
- [ ] `ResolveHreflangAlternatesAction` produce `['it' => url, 'en' => url, 'de' => url, 'es' => url, 'x-default' => url]` dalla rotta corrente
      sostituendo il segmento lingua; URL assolute; self-reference inclusa; vuoto per le pagine non indicizzabili o senza traduzione.
- [ ] `ResolveRobotsPolicyAction` decide `index, follow` oppure `noindex, follow` per gruppo di rotte (auth, profilo, area personale, errori) in
      un solo punto; la sitemap esclude le stesse pagine.
- [ ] `BuildHeadSchemaAction` usa `Laravel\Head\Facades\Schema` (`organization`, `webSite`, `breadcrumbs`, `faq`, `webPage`, `article`) e
      sostituisce per gradi `Cms\BuildPageSchemaAction` (array) senza rompere i temi che montano ancora `metatags`.
- [ ] Una chiamata di pagina `Head::title(...)` non cancella le altre voci (precedenza dei livelli rispettata, nessun `flush()`).
- [ ] Test Pest **senza database** per ogni Action (rotta finta, config in memoria); PHPStan `Modules/Seo` a 0 errori, niente `@phpstan-ignore`.

## Tasks

- [ ] Fissare la fonte unica delle lingue: `Lang` `available_locales` elenca `it`, `en`, `de`, ma `/es` risponde 200 (verificare dove si legge `es`).
- [ ] Mappare ogni tag di `x-cms::metatags` e di `x-cms::head` (corsia A) sui quattro strati di `laravel/head`.
- [ ] Scrivere i test (rosso), poi le quattro Action (verde), poi collegarle al provider Seo (solo `Head::defaults()` e il gruppo di rotte).
- [ ] Decidere con i dati del tenant il tipo dell'organizzazione e quali proprietà (indirizzo, telefono, P.IVA, `sameAs`) pubblicare davvero.
- [ ] Coordinare con la corsia A il passaggio del componente da "scrive a runtime" a "legge i defaults" (difetto 9 dell'hub).

## Owned File/Module Scope

File **nuovi** in `laravel/Modules/Seo/app/Actions/Head/`, `laravel/Modules/Seo/tests/Unit/Actions/Head/`, `laravel/Modules/Seo/docs/`.
Non si modifica nulla in `Cms` né nei layout di Two finché i lock della corsia A sono attivi; l'unico file Seo esistente da toccare è
`SeoServiceProvider` (a lock libero).

## Claim

| Chi | Scope | Stato |
|---|---|---|
| sessione 56da8100 (claude) | documenti, poi le quattro Action e i test in file nuovi di Seo | aperto |

## Dev Agent Record

Nessun codice scritto. Baseline e difetti misurati nell'hub. Questa story è `backlog` finché non ci sono test.

## Non verificato

- Provenienza dei dati del tenant per `Organization`; esistenza di un asset social 1200×630; comportamento di `meta('og:locale:alternate')` ripetuto.

## Ripartenza

Aprire l'hub, rileggere i difetti 1–10, controllare i lock della corsia A con `claims-open.py`, poi partire dai test.
