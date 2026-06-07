---
title: Tabs — classi HTML Design Comuni (parity AgID)
type: concept
confidence: high
created: 2026-05-29
updated: 2026-05-29
tags: [tabs, design-comuni, html-parity, sixteenth, bmad]
related:
  - ../../laravel/Themes/Sixteen/docs/design-comuni/pages/segnalazioni-elenco.md
  - bmad-laraxot-implementation-guardrails.md
  - ../rules/header-auth-state.md
  - ../rules/design-comuni-class-names-only.md
---

# Tabs — classi HTML Design Comuni

## Decisione architetturale (BMAD)

Le tab frontoffice **replicano il markup AgID** della reference statica. Stack runtime: **Tailwind 4 + Alpine + Lit + DaisyUI**; **Filament** solo dove serve (es. varianti admin). **Niente Bootstrap JS/CSS in runtime**, ma **sì** le stesse **classi CSS semantiche** del kit (`.nav-tabs`, `.nav-link`, `.tab-pane`, …).

Reference: [segnalazioni-elenco.html](https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html)

## Vietato (classi inventate)

| Classe / pattern | Perché |
|------------------|--------|
| `segnalazioni-tabs-bar` | Prefisso dominio; non AgID; rompe uniformità |
| `ticket-tabs-bar` | Idem + dominio inglese nel CSS |
| `tabs-bar` | Non esiste nella reference |
| `segnalazioni-fi-tabs` | Wrapper custom; usare `.segnalazioni-elenco .fi-tabs` se serve skin Filament |

## Corretto (HTML parity)

```html
<ul class="nav nav-tabs w-100 flex-nowrap border-bottom border-light mb-40 mt-3 shadow-none"
    id="tabDisservizio" role="tablist">
  <li class="nav-item w-100" role="tab">
    <a class="nav-link active title-medium-semi-bold pt-0" href="#data-ex-disservizio1" role="tab" …>Mappa</a>
  </li>
  …
</ul>
<div class="tab-content">
  <div class="tab-pane fade show active" id="data-ex-disservizio1" role="tabpanel">…</div>
</div>
```

Implementazione canonica tema: `laravel/Themes/Sixteen/resources/views/components/blocks/segnalazioni/tabs.blade.php` + `layout.blade.php` (Alpine `activePanel` sul wrapper `.tab-section`, **senza** store `segnalazioniTabs`).

## Uniformità tra pagine

- **Stesso schema classi** per ogni blocco tab (area personale, elenco, CMS): `nav` / `nav-tabs` / `nav-item` / `nav-link` / `tab-content` / `tab-pane`.
- **Id landmark** dalla reference quando definiti (`tabDisservizio`, `data-ex-disservizio1`, …).
- **Dominio nel codice PHP/JSON**: `ticket`, `map`, `list` — **non** nei nomi classe CSS.
- **Label UI**: i18n (`fixcity::…`), non hardcoded nel markup salvo test.

## Styling

- Regole visive: `style-apply.css` / `segnalazione-parity.css` — selettori tipo `.segnalazioni-elenco .nav-tabs .nav-link.active`.
- Filament: `.segnalazioni-elenco .fi-tabs` (senza classe extra sul componente).

## Verifica

- Diff struttura: `bashscripts/body/html-structure-compare.sh` vs reference locale in `laravel/Themes/docs/shared-components/segnalazioni-elenco-reference-body.html`
- Nessuna occorrenza `segnalazioni-tabs-bar`, `ticket-tabs-bar`, `segnalazioni-fi-tabs` nel tema (grep).
