---
title: "map-lit /it — troubleshooting e risoluzioni incidenti"
type: concept
confidence: high
created: 2026-06-03
tags: [map-lit, leaflet, markercluster, vite, gps, sixteenth]
related:
  - ../memories/map-lit-marker-cluster-farmshops-pattern.md
  - ../memories/map-lit-lat-lng-gps-default-pattern.md
  - ../../../laravel/Modules/Geo/docs/wiki/troubleshooting/map-lit-it-incidents-2026-06.md
  - ../../../laravel/Themes/Sixteen/docs/wiki/concepts/marker-cluster-hover-stability.md
  - ../../../laravel/Themes/docs/shared-components/map-lit-tickets-json-ssot.md
---

# map-lit su `/it` — troubleshooting

Hub wiki root. Dettaglio operativo nei moduli/tema (link sotto).

## Contratto

- `<map-lit id="block-map" data-url="/data/tickets.json">` senza `lat`/`lng` → GPS al load
- SSoT: `public_html/data/tickets.json`
- Build: `laravel/Themes/Sixteen` → `public_html/themes/Sixteen/assets/map-lit-*.js`

## Incidenti risolti (2026-06)

| # | Sintomo | Causa | Fix |
|---|---------|-------|-----|
| 1 | Mappa vuota, JS 404 | Manifest Vite obsoleto, alias mancanti | `npm run build` + alias lit/leaflet/markercluster |
| 2 | Marker spariscono dopo GPS | `removeOutsideVisibleBounds: true` + GPS lontano | `false`; no `refreshClusters()` manuale |
| 3 | Cluster "scappano" al hover | `transform: scale` su `.geo-cluster-wrapper` in **tema** `07-map-clusters-and-leaflet.css` | Hover solo `box-shadow`; mai `transform` su `.leaflet-marker-icon` |

## Regole permanenti

- **MAI** flag `center-on-gps` — pattern implicito lat/lng ([memoria](../memories/map-lit-lat-lng-gps-default-pattern.md))
- **MAI** `refreshClusters()` manuale — farmshops non lo fa
- **MAI** `transform` su marker-icon cluster — Leaflet usa `translate3d` per posizionare

## Documentazione estesa

| Repo path | Contenuto |
|-----------|-----------|
| [Geo incidents](../../../laravel/Modules/Geo/docs/wiki/troubleshooting/map-lit-it-incidents-2026-06.md) | STORY-121/122/123 checklist |
| [Sixteen hover stability](../../../laravel/Themes/Sixteen/docs/wiki/concepts/marker-cluster-hover-stability.md) | CSS tema vs light-DOM Lit |
| [Sixteen vite build](../../../laravel/Themes/Sixteen/docs/wiki/concepts/map-lit-vite-build-troubleshooting.md) | Bundle 404 |
| [SSoT tickets.json](../../../laravel/Themes/docs/shared-components/map-lit-tickets-json-ssot.md) | Mappa + filtri |

## Test

```bash
cd laravel/Themes/Sixteen && npm run build
npx playwright test --config=laravel/Modules/Geo/playwright.config.js \
  laravel/Modules/Geo/tests/Playwright/map-lit-cluster-hover-stability.spec.js \
  laravel/Modules/Geo/tests/Playwright/map-lit-gps-cluster-stability.spec.js
```

## GitHub

- [module_geo_fila5 discussion #5](https://github.com/laraxot/module_geo_fila5/discussions/5)
- Stories: STORY-121, STORY-122, STORY-123, STORY-124
