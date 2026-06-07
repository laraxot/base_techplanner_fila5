---
paths:
  - "laravel/Modules/Geo/resources/js/**/*.js"
  - "laravel/Modules/Geo/resources/svg/**/*.svg"
  - "laravel/Modules/Geo/docs/**/*.md"
---

# Lit Icons — Filament Way Rule

## REGOLA PERMANENTE: Icone in Lit JS si referenziano per nome, mai SVG inline hardcoded

### Vincolo assoluto

```
VIETATO: SVG inline hardcoded nei template Lit (html`<svg ...>...</svg>` direttamente)
OBBLIGATORIO: usare geoIcon('heroicons-name') da geo-heroicons.js
PRINCIPIO: stesso zen di <x-heroicon-o-NAME> in Blade — nome, non markup
```

### Perché

In Blade PHP usiamo `<x-heroicon-o-magnifying-glass class="h-4 w-4" />` — il componente
è referenziato per **nome**, non per il suo SVG completo. Lo stesso principio deve
applicarsi ai componenti Lit JS: l'icona è un'astrazione con un nome, non un blob SVG.

SVG hardcoded nei template:
- Rendono i template illeggibili
- Impediscono aggiornamenti centralizzati
- Violano DRY (ogni SVG duplicato = più posti da aggiornare)
- Nascondono l'intenzione semantica (che icona è? non si capisce senza leggere il path)

### Pattern corretto

```js
// geo-heroicons.js — unica fonte di verità per le icone Lit
import { html } from 'lit';

export function geoIcon(name) {
    return icons[name] ?? html``;
}

const icons = {
    'magnifying-glass': html`<svg ...>...</svg>`,
    'arrows-pointing-out': html`<svg ...>...</svg>`,
    // ...
};
```

```js
// Uso nel template Lit
import { geoIcon } from './geo-heroicons.js';

// ✅ CORRETTO — nome semantico
html`<button>${geoIcon('arrows-pointing-out')}</button>`

// ❌ SBAGLIATO — SVG inline hardcoded
html`<button><svg xmlns="..." viewBox="0 0 24 24">...</svg></button>`
```

### Nomi icone disponibili (geo-heroicons.js)

| Nome | Uso |
|------|-----|
| `magnifying-glass` | Ricerca / search |
| `arrows-pointing-out` | Fullscreen apri |
| `arrows-pointing-in` | Fullscreen chiudi |
| `map-pin` | Posizione corrente / geolocation |
| `squares-2x2` | Cambia layer mappa |
| `plus` | Zoom in |
| `minus` | Zoom out |

Per aggiungere nuove icone: aggiungere in `geo-heroicons.js`, NON inline nel template.

### File

- `laravel/Modules/Geo/resources/js/components/geo-heroicons.js` — registry icone
- `laravel/Modules/Geo/resources/js/components/geopoint-picker-lit.js` — usa geoIcon()
- `laravel/Modules/Geo/resources/js/components/map-picker-lit.js` — da migrare a geoIcon()

### Documentazione

- Wiki: `laravel/Modules/Geo/docs/wiki/concepts/lit-icons-filament-way.md`
