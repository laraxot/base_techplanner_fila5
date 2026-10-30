---
title: "Two: verifica visiva e funzionale dopo il nuovo <head> SEO"
type: story
theme: Two
status: backlog
priority: high
created: 2026-10-30
updated: 2026-10-30
tags: [seo, head, theme-two, playwright, screenshots, regression, wcag, dark-mode]
qmd: "theme two head seo regression screenshots playwright mobile dark mode console hero header x-cms::head"
related:
  - ../../../../../docs/stories/seo-head-maximum-schema-org-hreflang.story.md
  - ./mobile-hero-header-offset.story.md
  - ./wcag-aaa-site-audit.story.md
---

# Two: verifica visiva e funzionale dopo il nuovo `<head>` SEO

Corsia C della story [SEO al massimo del front office](../../../../../docs/stories/seo-head-maximum-schema-org-hreflang.story.md).
Il cambio del `<head>` tocca ogni pagina: font, CSS, anti-FOUC, Alpine/Livewire, `theme-color`, cookie bar. Qui si dimostra, con misure e
screenshot, che Two continua a funzionare e a sembrare uguale.

## Scopo

Come mantenitore voglio un confronto ripetibile prima/dopo sul tema servito (Two), così che una regressione del `<head>` si veda subito
(layout spostato, stile mancante, errore in console, anteprima rotta) e non dopo la pubblicazione.

## Cosa può rompersi cambiando il `<head>`

- Ordine e presenza di `@livewireStyles`, `@filamentStyles`, `@vite` e dei CSS del modulo Xot (`header-actions-wrap`, `mobile-touch-targets`,
  `record-anchor-highlight`): un CSS fuori ordine cambia la cascata.
- Anti-FOUC del tema scuro (`dark_mode` in `localStorage`) e `[x-cloak]`: se arrivano dopo il primo paint si vede un lampo.
- `theme-color` (`#0f2b46`) e viewport: barra del browser mobile e zoom.
- Offset della hero sotto l'header fisso (`--site-header-h`): la story `mobile-hero-header-offset` ha fissato 112 px di hero coperti, da non riaprire.
- Barra dei cookie e `wire:navigate`: navigando con Livewire il `<head>` non viene ricaricato, quindi titolo e meta devono aggiornarsi.
- Lingue `it`, `en`, `de`, `es`: titolo e descrizione devono essere nella lingua della pagina.

## Acceptance criteria

- [ ] Per `/it`, `/it/faq`, `/it/cookie`, `/it/auth/login`, `/en`, `/de`, `/es`, una pagina CMS interna e un 404: HTTP atteso, un solo `<head>`,
      un solo `<title>`, una sola `description`, nessun errore né avviso in console, nessuna richiesta a risorsa mancante (4xx/5xx).
- [ ] Screenshot a 390×844 e 1280×800, tema chiaro e scuro, prima e dopo il cambio (dove il "prima" esiste), con differenza di pixel
      sotto una soglia stabilita sulla prima misura e commentata caso per caso.
- [ ] Hero non coperta dall'header (offset ≥ altezza dell'header) a 390 e 1280 px; nessun salto di layout (CLS) misurato al caricamento.
- [ ] axe-core 0 violazioni sulle stesse pagine (come nella misura già fatta su 7 pagine).
- [ ] Navigazione `wire:navigate` fra due pagine: titolo, canonical e JSON-LD aggiornati nel DOM.
- [ ] Il `<head>` serve a Lighthouse SEO ≥ 95 e Best Practices senza nuovi avvisi.

## Tasks

- [ ] Eseguire lo strumento `head-audit.mjs` (repo `bashscripts`) con `AUDIT_BASE=http://192.168.1.40:8000` (mai `127.0.0.1:8000`: è FixCity).
- [ ] Salvare screenshot e JSON in `bashscripts/docs/audit/` (privato); qui solo i numeri riassunti, senza `file:riga` né debolezze aperte.
- [ ] Confrontare con la baseline HTML salvata prima della corsia A e dopo.
- [ ] Controllo puntuale con `chrome-devtools` solo se c'è un display; altrimenti Playwright headless (vedi `mobile-audit.mjs`).

## Owned File/Module Scope

Solo documentazione in `laravel/Themes/Two/docs/`. Nessuna modifica a viste o CSS di Two in questa story; le correzioni che emergono
vanno in story proprie con i lock del caso.

## Claim

| Chi | Scope | Stato |
|---|---|---|
| sessione 56da8100 (claude) | piano di verifica e misure | aperto |

## Dev Agent Record

Nessuna misura ancora. Baseline HTML del `<head>` di `/it`, `/it/faq`, `/it/auth/login`, `/en` salvata nello scratchpad della sessione.

## Non verificato

- Differenza visiva prima/dopo: il "prima" non è più ricostruibile con screenshot (la corsia A ha già modificato i layout; git forward-only).
- Comportamento con `wire:navigate` e con la cache delle viste Blade rigenerata.

## Ripartenza

Aspettare che i lock della corsia A cadano, lanciare l'audit, confrontare, riportare i numeri qui.
