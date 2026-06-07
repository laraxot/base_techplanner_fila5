# Stack Tecnico Frontoffice

> **Data**: 2026-05-31  
> **Status**: ACTIVE  
> **Story**: STORY-102

## Stack Ufficiale

| Layer | Tecnologia | Versione | Documentazione |
|-------|------------|----------|----------------|
| CSS Framework | **Tailwind CSS** | 3.x | https://tailwindcss.com |
| UI Components | **DaisyUI** | 4.x | https://daisyui.com |
| JS Reactivity | **Alpine.js** | 3.x | https://alpinejs.dev |
| Web Components | **Lit** | 3.x | https://lit.dev |
| Blade Components | **Filament** | 3.x | https://filamentphp.com |

## ❌ VIETATO

| Tecnologia | Motivo | Sostituto |
|------------|--------|-----------|
| Bootstrap CSS | Classi semantiche, utility limitate | Tailwind CSS |
| Bootstrap JS | jQuery-based, bundle pesante | Alpine.js |
| jQuery | Legacy, non necessario | Alpine.js / Vanilla JS |
| Classi dominio in tema | Viola separation of concerns | Classi generiche `ui-*`, `cmp-*` |

## Filosofia Design Comuni

**Reference**: https://italia.github.io/design-comuni-pagine-statiche

> Mantenere **nomi classi semantici** del Design Comuni ma implementati con **Tailwind + DaisyUI**.

### Pattern Design Comuni → Tailwind/DaisyUI

| Design Comuni | Tailwind + DaisyUI |
|---------------|-------------------|
| `cmp-input-checkbox` | `form-control` + `checkbox` |
| `cmp-input-checkbox__label` | `label-text` |
| `it-btn` | `btn btn-primary` (DaisyUI) |
| `it-card` | `card bg-base-100` (DaisyUI) |
| `it-modal` | `modal` (DaisyUI) |

## Regole CSS

### ✅ OK
```html
<!-- Classi generiche UI -->
<div class="ui-filter-container">
<input class="ui-filter-checkbox">
<button class="ui-btn ui-btn-primary">

<!-- Design Comuni pattern -->
<div class="cmp-input-checkbox">
<span class="cmp-input-checkbox__label">

<!-- Tailwind utilities -->
<div class="flex flex-col gap-2 p-4 bg-base-100 rounded-lg shadow">

<!-- DaisyUI components -->
<input type="checkbox" class="checkbox checkbox-sm checkbox-primary">
<button class="btn btn-primary btn-sm">Click</button>
```

### ❌ NO
```html
<!-- Classi dominio-specifiche nel tema -->
<div class="ticket-card">          <!-- ❌ -->
<input class="segnalazioni-filter"> <!-- ❌ -->
<div class="pratica-detail">       <!-- ❌ -->

<!-- Bootstrap classi -->
<div class="form-check">           <!-- ❌ -->
<input class="form-control">       <!-- ❌ -->
<button class="btn btn-primary">    <!-- ❌ Bootstrap, OK DaisyUI -->
<div class="modal fade">           <!-- ❌ -->
```

## Esempi Corretti

### Checkbox Filtri (DA → A)

```blade
{{-- ❌ SBAGLIATO: Bootstrap + classe dominio --}}
<div class="form-check">
    <div class="border-light checkbox-body py-1">
        <input type="checkbox" class="" id="filter-1">
        <label class="category-list__list" for="filter-1">Label</label>
    </div>
</div>

{{-- ✅ CORRETTO: DaisyUI + generico --}}
<div class="form-control">
    <label class="label cursor-pointer justify-start gap-3">
        <input 
            type="checkbox" 
            class="checkbox checkbox-sm checkbox-primary"
            data-filter-type="category"
            x-model="selectedTypes"
        >
        <span class="label-text">Label</span>
        <span class="badge badge-sm">12</span>
    </label>
</div>
```

### Web Component Map (Lit)

```javascript
// ❌ SBAGLIATO: Stili legati a dominio
static styles = css`
  .segnalazione-marker { ... }
  .ticket-popup { ... }
`;

// ✅ CORRETTO: Stili generici
static styles = css`
  .map-marker { ... }
  .map-popup { ... }
  .map-cluster { ... }
`;
```

## Verifica

Script di verifica disponibile:
```bash
bashscripts/ai/check-domain-classes-in-theme.sh
```

## Collegamenti

- [Design Comuni Pag Statiche](https://italia.github.io/design-comuni-pagine-statiche)
- [DaisyUI Components](https://daisyui.com/components/)
- [Tailwind CSS Docs](https://tailwindcss.com/docs)
- [Alpine.js Docs](https://alpinejs.dev/start-here)
- [Lit Docs](https://lit.dev/docs/)

## Issue Correlata

- STORY-102: Correggi Classi CSS Filtri
- base_fixcity_fila5#176
- theme_sixteen_fila5#21
- module_geo_fila5#17
