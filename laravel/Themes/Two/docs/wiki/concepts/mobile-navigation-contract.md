---
title: "Two: contratto navigazione mobile"
type: concept
tags: [mobile, navigation, accessibility, responsive, data-attributes]
created: 2026-10-29
updated: 2026-10-29
qmd: "Two mobile navigation data-mobile-nav generic data attributes accessibility responsive"
issues:
  - https://github.com/laraxot/base_fixcity_fila5/issues/383
discussions:
  - https://github.com/laraxot/base_fixcity_fila5/discussions/392
---

# Two: contratto navigazione mobile

Il tema Two possiede una navigazione mobile propria, gestita da Alpine e dal
componente header del tema. Per permettere test e integrazioni senza legare il
contratto al nome del tema, gli hook sono generici:

Per il tenant `local/techplanner` l'header servito è `components/sections/header/v1.blade.php`:
`config/local/techplanner/database/content/sections/header.json` indica
`pub_theme::components.sections.header.v1` e nessun contenuto del tenant referenzia
`sections.header` né `header_bi5` (verificato il 2026-10-29). `header_bi5.blade.php` è
raggiungibile solo tramite `components/sections/header.blade.php`, che lo include: un
clone Bootstrap Italia senza chiamanti per questo tenant. Una modifica mobile all'header
va fatta in `header/v1`; se si tocca anche `header_bi5` le due viste non devono
introdurre un terzo namespace o un terzo comportamento.

- `data-mobile-nav` sul contenitore;
- `data-mobile-nav-toggle` e `data-mobile-nav-target` sul toggler;
- `data-mobile-nav-panel` sul pannello;
- `data-mobile-nav-overlay` e `data-mobile-nav-close` sul backdrop e sul pulsante di
  chiusura (emessi solo da `header_bi5`, quindi non dal percorso servito).

Stato verificato dall'audit del 2026-10-29: il CSS legge solo `data-mobile-nav` e
`data-mobile-nav-panel`; `-toggle`, `-target`, `-overlay` e `-close` non hanno nessun
selettore in JS o CSS né test che li usi (sono attributi inerti, utili solo come
aggancio per test futuri). Il CSS compilato servito (`public/assets/app-*.css`) non
contiene ancora le classi della passata mobile (`min-h-dvh`, `max-h-[calc(100dvh-7rem)]`,
`min-h-11`): servono `npm run build` e un nuovo commit degli asset.

Li legge `resources/css/app.css` (`.fixed[data-mobile-nav]` e `[data-mobile-nav-panel]`:
altezza dinamica e scorrimento) e i test di integrazione; le regole nuove arrivano in
produzione solo dopo `npm run build` del tema.

Non usare nomi proprietari legati a un tema: gli attributi descrivono il
comportamento del componente, non la sua implementazione o il tema che lo ospita.
Il nome del tema o del modulo nel markup non aggiunge informazione e, nei temi che
replicano un riferimento, è drift. Sixteen segue invece il markup canonico Design
Comuni e conserva i suoi attributi `data-bs-*` originali per mantenere la parità HTML:
regola completa in [013-design-comuni-html-match](../../../../../../docs/wiki/rules/013-design-comuni-html-match.md)
e [data-attribute-rule](../../../../Sixteen/docs/data-attribute-rule.md). Il tema da
modificare per la UX mobile del tenant `local/techplanner` è Two (`XotData::make()->pub_theme`,
vedi [public-theme-resolution-and-vite-assets](../../../../../docs/wiki/concepts/public-theme-resolution-and-vite-assets.md)).

Il pannello deve restare raggiungibile da tastiera, avere un target di almeno 44px
e poter scorrere verticalmente entro l'altezza dinamica del viewport mobile.
Il CSS applica inoltre gli inset della safe area; i pannelli custom usano
`x-cloak` e chiusura con Escape per non lasciare contenuto mobile visibile prima
del bootstrap di Alpine.

Questo contratto appartiene al tema Two, che è il tema mobile del tenant
TechPlanner. Non va copiato nel tema Sixteen: Sixteen mantiene il markup canonico
Design Comuni e i relativi `data-bs-*` per preservare la parità HTML.
