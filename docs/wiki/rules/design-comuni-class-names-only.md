---
title: "Design Comuni Class Names Only — CSS semantic structure rule"
type: concept
confidence: high
created: 2026-05-31
updated: 2026-05-31
tags: [design-comuni, css, naming, frontend, architecture, cross-repo]
related:
  - concepts/tabs-class-naming-rule.md
  - memories/no-domain-css-classes-in-theme.md
  - concepts/leveraging-design-comuni-assets.md
  - concepts/bmad-laraxot-implementation-guardrails.md
  - ../../laravel/Themes/Sixteen/docs/design-comuni/pages/segnalazioni-elenco.md
  - ../../laravel/Modules/Geo/docs/wiki/concepts/map-lit-component.md
---

# Design Comuni Class Names Only — CSS Semantic Structure Rule

## Principio Fondamentale

Le classi CSS in TUTTI i Blade, JS template literal, e viste del frontoffice devono usare **esclusivamente i nomi standard di [Design Comuni](https://github.com/italia/design-comuni-pagine-statiche)** (Bootstrap Italia semantic names).

Non si usano classi feature-prefixed, nemmeno se tradotte in inglese.

## Stack di Implementazione

| Cosa | Come |
|------|------|
| **Nomi classe** | Design Comuni / Bootstrap Italia (es. `nav-tabs`, `form-check`, `card`) |
| **Implementazione CSS** | TailwindCSS `@apply` + DaisyUI utility nel tema Sixteen |
| **Framework runtime** | NO Bootstrap libreria JS/CSS |
| **Componenti interattivi** | Alpine.js + Lit + Filament |
| **Tema** = unico proprietario CSS | Il tema Sixteen è il "dress" — nessun `<style>` nei moduli |

## Vietato Assolutamente

### Pattern vietati
- `segnalazioni-*` — prefisso italiano dominio
- `ticket-*` — prefisso inglese dominio (ugualmente vietato)
- `geo-*` — prefisso modulo Geo
- `user-*`, `cms-*`, `blog-*`, `rating-*` — qualsiasi prefisso feature/modulo
- Qualsiasi classe custom che non esista nella reference Design Comuni

### Esempi concreti di violazioni
```html
<!-- VIETATO -->
<div class="segnalazioni-filter-checkbox">...</div>
<div class="ticket-card">...</div>
<div class="geo-map-marker">...</div>
<div class="ticket-tabs-bar">...</div>
<div class="segnalazioni-layout">...</div>
<div class="geo-legend">...</div>
```

## Permesso

### Classi Design Comuni
```html
<!-- ✅ CORRETTO: classi standard Design Comuni -->
<ul class="nav nav-tabs w-100 flex-nowrap border-bottom border-light" role="tablist">
<div class="form-check">
<input class="form-check-input" type="checkbox">
<div class="card">
<div class="card-body">
<div class="tab-content">
<div class="tab-pane fade show active">
```

### Attributi `data-*` per JS hooks
```html
<!-- ✅ CORRETTO: attributi data generici -->
<button data-filter-type="tipologia">...</button>
<div data-ticket-id="{{ $ticket->id }}">...</div>
```

### Utility generiche (Tailwind/DaisyUI)
```html
<!-- ✅ CORRETTO: utility generiche -->
<div class="d-flex gap-2 mb-4">
<button class="btn btn-outline-primary py-3 mt-10">
```

## Perché Questa Regola

1. **Interoperabilità**: chiunque conosca Design Comuni riconosce le classi
2. **Manutenibilità**: zero classi custom da documentare
3. **Coerenza**: stesso pattern in moduli, temi, JS
4. **Upstream compatibile**: future versioni di Design Comuni hanno stesse classi
5. **Architettura pulita**: il tema è un vestito generico, non sa di feature/moduli

## Casi Particolari

### Modulo Geo (mappa Leaflet)
- Usare classi standard Leaflet (`leaflet-control-zoom`, `leaflet-popup`) + Design Comuni (`map-box`, `cmp-map`)
- **NON** creare classi custom `geo-*`
- CSS inline nei template literal JS del componente `map-lit.js` è anti-pattern: preferire classi definite nel tema

### Modulo Fixcity (ticket)
- I form usano classi Filament (`fi-input`, `fi-fo-field`) + Design Comuni (`form-check`)
- Filtri checkbox: usare `form-check` + `form-check-input`, non `ticket-filter-checkbox`

### Tema Sixteen
- È il "dress" generico — non deve contenere riferimenti a feature/moduli nei nomi classe
- Scope CSS via wrapper generici: `#main-container`, `data-page="page-shell"`
- `@apply` in `style-apply.css` per mappare classi Design Comuni → implementazione Tailwind

## Verifica

```bash
# Cerca violazioni nel tema
grep -rn 'class="[^"]*segnalazioni-\|class="[^"]*ticket-\|class="[^"]*geo-' laravel/Themes/Sixteen/resources/

# Cerca violazioni nei moduli
grep -rn 'class="[^"]*segnalazioni-\|class="[^"]*ticket-\|class="[^"]*geo-' laravel/Modules/*/resources/

# Nei JS
grep -rn "className.*segnalazioni-\|className.*ticket-\|className.*geo-" laravel/Modules/*/resources/js/
```

## GitHub Cross-Repo References

| Repo | Issue | Discussion |
|------|-------|------------|
| base_fixcity_fila5 | [#174](https://github.com/laraxot/base_fixcity_fila5/issues/174) | [#175](https://github.com/laraxot/base_fixcity_fila5/discussions/175) |
| theme_sixteen_fila5 | [#19](https://github.com/laraxot/theme_sixteen_fila5/issues/19) | [#20](https://github.com/laraxot/theme_sixteen_fila5/discussions/20) |
| module_fixcity_fila5 | [#5](https://github.com/laraxot/module_fixcity_fila5/issues/5) | *(discussions non abilitate)* |
| module_geo_fila5 | [#16](https://github.com/laraxot/module_geo_fila5/issues/16) | [#18](https://github.com/laraxot/module_geo_fila5/discussions/18) |

## Vedi Anche

- [Tabs Class Naming Rule](concepts/tabs-class-naming-rule.md) — regola specifica per tabs
- [No Domain CSS Classes in Theme](memories/no-domain-css-classes-in-theme.md) — memoria agente
- [Leveraging Design Comuni Assets](concepts/leveraging-design-comuni-assets.md) — come usare asset DC
- [BMAD Laraxot Implementation Guardrails](concepts/bmad-laraxot-implementation-guardrails.md) — guardrail architetturale
- [Segnalazioni Elenco Reference](../../laravel/Themes/Sixteen/docs/design-comuni/pages/segnalazioni-elenco.md) — reference locale
