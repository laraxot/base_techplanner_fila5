---
title: "farmshops.eu Analysis"
type: concept
status: draft
created: 2026-05-29
updated: 2026-05-29
tags: [map, geojson, leaflet, alpinejs]
related:
  - concepts/segnalazioni-elenco-blocks.md
  - ../rules/filament-first-rule.md
---

# farmshops.eu Analysis

## Overview
[GitHub: CodeforKarlsruhe/farmshops.eu](https://github.com/CodeforKarlsruhe/farmshops.eu)
- **Purpose**: Mappa di aziende agricole dirette (Hofläden, Milchautomaten, Direktvermarkter)
- **Live**: https://farmshops.eu
- **Data**: GeoJSON statico con punti su mappa

## Architecture Relevant Concepts

### 1. GeoJSON-based Map
```json
{
  "features": [
    {
      "type": "Feature",
      "geometry": { "type": "Point", "coordinates": [lon, lat] },
      "properties": { "p": "farm|beekeeper|marketplace|vending_machine" }
    }
  ]
}
```

**Lesson**: Usa `type.properties.p` per categorizzare i marker. Nel nostro caso usiamo `type.value` per la stessa logica.

### 2. Categorization Pattern
- `p: "farm"` → farm icon (agriculture)
- `p: "beekeeper"` → honey icon
- `p: "marketplace"` → market icon  
- `p: "vending_machine"` → vending icon

**Lesson**: Mantieni tipi semplici, mappa a icone. Il nostro `SegnalazioniFilterViewModel` usa `value` + `color` + `icon` + `label`.

### 3. Map Implementation
- Usa Leaflet (vedi `js/leaflet.js`)
- Dati caricati via XMLHttpRequest da `data/farmshopGeoJson.js`
- No backend dinamico (sito statico)

**Lesson**: Per FixCity, usiamo `map-lit` (Leaflet Lit component) invece di JS grezzo.

### 4. Alpine.js Integration NOT Present
farmshops.eu è un sito statico Vanilla JS. Non usa Alpine per interattività.

**Lesson**: Il nostro approach con Alpine (`x-data`, `x-show`) è più sofisticato.

## Applicazione a FixCity Segnalazioni

| farmshops.eu | FixCity |
|--------------|---------|
| GeoJSON FeatureCollection | `tickets.json` FeatureCollection |
| `properties.p` category | `properties.type.value` |
| Leaflet markers statici | `map-lit` component dinamico |
| No tab view | Tab "Mappa" + "Elenco" con Alpine |
| No filtri | `map-filter-lit` con facet |

## Differenze Chiave

1. **Interattività**: farmshops usa solo mappa, no lista/tab
2. **Aggiornamento**: Manuale via `update.sh`, no endpoint API
3. **Filtro**: Per tipo solo, no ricerca testuale

## Non Applicabile

- Nessun Livewire/Filament — non rilevante per progetto
- No auth/user context
- No wizard/creazione segnalazioni
- No rating/contatti come componenti