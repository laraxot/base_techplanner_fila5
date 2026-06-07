---
paths:
  - "laravel/Modules/Geo/resources/js/**/*.js"
  - "laravel/Modules/Geo/docs/**/*.md"
  - "laravel/Modules/Fixcity/**/*.php"
  - "laravel/Themes/Sixteen/**/*.blade.php"
---

# Leaflet Map in Filament Wizard — invalidateSize Rule

## REGOLA PERMANENTE: Leaflet in wizard deve chiamare invalidateSize() quando lo step diventa visibile

### Problema tipico

Cliccando "Avanti" nel wizard Filament, la mappa rimane vuota (grigia). Il componente Lit è già nel DOM ma il container era nascosto quando Leaflet si è inizializzato → dimensioni 0×0 → nessun tile caricato.

### Root cause

Filament wizard nasconde gli step con `class="hidden"` (Tailwind). Leaflet vede container 0×0 al mount. `ResizeObserver` e `IntersectionObserver` NON catturano questo tipo di cambiamento.

### False Friend — IntersectionObserver

`IntersectionObserver` suona come la scelta giusta ("rileva quando il componente diventa visibile"), ma **NON funziona** quando la visibilità è gestita da una classe CSS come `hidden` (Tailwind). Rileva solo intersezioni col viewport — non toggle di attributi DOM.

| Observer | Rileva `class="hidden"` toggle | Rileva viewport |
|---|---|---|
| `IntersectionObserver` | ❌ NO | ✅ sì |
| `MutationObserver` (attributeFilter: class) | ✅ SÌ | ❌ no |
| `ResizeObserver` | ❌ NO | ❌ no |

**Bad practice rimossa**: `IntersectionObserver(threshold: 0.1)` in `connectedCallback()` — era in `map-picker-lit.js` e causava la mappa vuota dopo "Avanti".

### Fix obbligatorio (tutti i componenti Leaflet in wizard)

```javascript
// In firstUpdated() — dopo _initMap():
this._mutationObserver = new MutationObserver(() => {
    if (this.offsetParent !== null && this._map) {
        setTimeout(() => this._map.invalidateSize(), 150);
    }
});
let parent = this.parentElement;
// CRITICO: usare 12, NON 6 — il wrapper x-show del wizard step Filament 5
// è a ~7-8 livelli di profondità rispetto al componente Lit
for (let i = 0; i < 12 && parent; i++) {
    this._mutationObserver.observe(parent, {
        attributes: true,
        attributeFilter: ['class', 'style', 'hidden']
    });
    parent = parent.parentElement;
}

// In disconnectedCallback():
this._mutationObserver?.disconnect();
```

Per `coordinate-picker-lit.js` il metodo si chiama `this._refreshMapSize()` invece di `this._map.invalidateSize()`.

### FALSE FRIEND critico — depth=6 insufficiente in Filament 5

Struttura DOM Filament 5 (depth dal componente Lit):
```
coordinate-picker-lit       ← depth 0
  fi-fo-field-wrp           ← depth 1
  fi-sc-grid-col            ← depth 2
  fi-sc-grid                ← depth 3
  fi-sc-section-content     ← depth 4
  fi-sc-section             ← depth 5
  fi-sc-wizard-step-content ← depth 6
  fi-sc-wizard-step         ← depth 7  ← QUI c'è x-show!
  fi-sc-wizard              ← depth 8
```

Con `depth = 6` il MutationObserver non raggiunge mai il nodo `x-show` → mappa sempre vuota. **Usare sempre `depth >= 12`**.

### _refreshMapSize — delay array obbligatorio

```javascript
[0, 80, 180, 350, 700, 1200].forEach((delay) => { ... })
```

- 700ms: Alpine tick standard
- 1200ms: fallback per ambienti lenti o transizioni custom Alpine

**BAD PRACTICE**: `[0, 100, 300]` — Alpine può impiegare >500ms su macchine lente.

### Regola CDN collegata

- **VIETATO**: `<link href="https://unpkg.com/leaflet@.../leaflet.css">` nel template render()
- **OBBLIGATORIO**: `import 'leaflet/dist/leaflet.css';` in cima al file JS (bundled via Vite)

### Build workflow

Dopo modifiche ai file JS Geo:
```bash
cd laravel/Themes/Sixteen
npm run build
npm run copy
```

### File coinvolti

- `laravel/Modules/Geo/resources/js/components/coordinate-picker-lit.js`
- `laravel/Modules/Geo/resources/js/components/map-picker-lit.js`

### Wiki

- `laravel/Modules/Geo/docs/wiki/concepts/leaflet-wizard-step-invalidate-size.md`

---

## Risoluzione conflitto di merge (2026-04-28)

**Conflitto**: tra commit `2d3b96ab` (depth=6) e commit `62e1a3ad` (depth=12).

**Errore**: depth=6 non raggiunge il nodo `x-show` del wizard step Filament 5 (è al depth 7-8).

**Fix applicato**: mantenuto depth=12 (versione `62e1a3ad`) che è semanticamente corretta e documentata con la struttura DOM reale del wizard. Rimossi tutti i marker di conflitto.
