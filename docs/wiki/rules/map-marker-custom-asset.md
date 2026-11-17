---
paths:
  - "laravel/Modules/Geo/resources/js/**/*.js"
  - "laravel/Modules/Geo/resources/svg/**/*.svg"
  - "laravel/Modules/Geo/docs/**/*.md"
---

# MapMarker Custom Asset Rule

## REGOLA PERMANENTE: Nessun marker Leaflet da CDN o unpkg

### Vincoli assoluti

- **VIETATO** `https://unpkg.com/leaflet@1.9.4/dist/marker-icon.png` — path errato E dipendenza CDN esterna
- **VIETATO** qualsiasi URL `unpkg.com`, `cdn.`, `githubusercontent.com` per icone marker
- **VIETATO** il default icon di Leaflet (`L.Icon.Default`) perché cerca asset da CDN
- **OBBLIGATORIO** usare marker custom locale owner-side, versionato nel repository

### Pattern di riferimento

Pattern studiato e adattato da `farmshops.eu` / `direktvermarkter.js`:
```javascript
// farmshops.eu usa L.ExtraMarkers.icon(...)
// Fixcity usa L.divIcon con SVG inline — approccio equivalente ma più leggero
```

Vedi: `laravel/Modules/Geo/resources/js/direktvermarkter.js`

### Implementazione corretta (SVG inline via divIcon)

```javascript
// In map-picker-marker-config.js — UNICA fonte di verità per il marker
export function createMapPickerLeafletIcon(L) {
    return L.divIcon({
        html: `<svg class="map-picker-marker" viewBox="0 0 32 45" width="32" height="45" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 0C7.163 0 0 7.163 0 16c0 10 16 29 16 29S32 26 32 16C32 7.163 24.837 0 16 0z"
                  fill="#e63946" stroke="#fff" stroke-width="1.5"/>
            <circle cx="16" cy="16" r="6" fill="#fff"/>
        </svg>`,
        className: 'map-picker-marker-wrapper',
        iconSize: [32, 45],
        iconAnchor: [16, 45],
        popupAnchor: [0, -45],
    });
}
```

### Asset SVG/PNG separati

Se si usano file SVG o PNG separati (invece di SVG inline):

- **Percorso obbligatorio**: `laravel/Modules/Geo/resources/svg/` (regola universale moduli)
  - Esempi: `map-marker.svg`, `map-marker-active.svg`
- **NON usare**: ~~`resources/img/markers/`~~, ~~`public/images/markers/`~~, ~~`public/vendor/geo/img/`~~
- Vedi regola: `bashscripts/ai/.claude/rules/svg-asset-location.md`

### Geometria corretta

| Proprietà | Valore | Motivo |
|-----------|--------|--------|
| `iconSize` | `[32, 45]` | larghezza x altezza SVG |
| `iconAnchor` | `[16, 45]` | punto base (metà larghezza, altezza piena) |
| `popupAnchor` | `[0, -45]` | popup sopra il marker |

### File coinvolti

- `laravel/Modules/Geo/resources/js/components/map-picker-marker-config.js` — config centralizzata marker
- `laravel/Modules/Geo/resources/js/components/map-picker-lit.js` — usa `createMapPickerLeafletIcon`
- `laravel/Modules/Geo/resources/js/components/coordinate-picker-field.js` — idem
- `laravel/Modules/Geo/resources/img/markers/` — asset SVG/PNG se serviti come file
- `laravel/Modules/Geo/docs/wiki/concepts/map-picker-runtime-asset-governance.md` — wiki regola

### Validazione

```bash
# Nessun riferimento a unpkg nei JS
grep -r "unpkg" laravel/Modules/Geo/resources/js/
# Deve ritornare 0 risultati

# Nessun L.Icon.Default
grep -r "Icon.Default" laravel/Modules/Geo/resources/js/
# Deve ritornare 0 risultati
```

### Story di riferimento

- Story 8-26: marker runtime allineato ad asset locali
- Story 8-27: fix visibilità marker su URL runtime reale `segnalazione-crea`
