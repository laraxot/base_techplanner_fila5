---
title: "Vietato fork di map-lit nel tema Sixteen"
type: rule
confidence: high
created: 2026-05-28
updated: 2026-05-28
tags: [geo, sixteen, map-lit, vite, dry, anti-pattern]
related:
  - web-component-canonical-name.md
  - ../memories/feedback_map_lit_canonical_name.md
  - ../memories/incident-geo-map-lit-local-fork.md
  - ../../laravel/Modules/Geo/docs/wiki/concepts/map-lit-canonical-name.md
  - ../../laravel/Themes/Sixteen/docs/wiki/concepts/theme-geo-js-boundary.md
---

# Vietato fork di `map-lit` nel tema Sixteen

## Regola

**MAI** creare o modificare file nel tema del tipo:

- `laravel/Themes/Sixteen/resources/js/components/geo-map-lit-local.js`
- `geo-map-lit-*.js` copie nel tema
- Qualsiasi secondo `customElements.define` per la mappa elenco

**Unica implementazione:** `laravel/Modules/Geo/resources/js/components/map-lit.js` → tag `<map-lit>`.

**Unico import tema:** in `laravel/Themes/Sixteen/resources/js/app.js`:

```js
import '@modules/Geo/resources/js/components/map-lit.js';
```

## Perché

| Motivo | Spiegazione |
|--------|-------------|
| **Owner modulo** | Geo è owner di Leaflet, cluster, marker, `feature-type.js`, controlli mappa |
| **DRY** | Due file ≈ due bugfix, due build, due regressioni Playwright |
| **Nome canonico** | Decisione progetto: `<map-lit>`, non `<geo-map-lit>` ([map-lit-canonical-name](../../laravel/Modules/Geo/docs/wiki/concepts/map-lit-canonical-name.md)) |
| **Confusione agenti** | Un fork nel tema sembra “fix locale” ma bypassa il modulo e reintroduce tag/nomi deprecati |
| **Bundle** | `app.js` già registra `map-lit`; un fork non importato è codice morto; se importato, doppia registrazione o drift |

## Cosa fare invece

1. **Feature mappa** (marker, `tickets.json`, filtri client) → patch in `Modules/Geo/.../map-lit.js` e moduli `map/*`.
2. **Blade** → solo `<map-lit data-url="...">` in `segnalazioni/layout.blade.php` o partial `sections/map-lit.blade.php`.
3. **Build** → `cd laravel/Themes/Sixteen && npm run build` (+ `npm run copy` se serve `public_html`).
4. **Plugin Leaflet** → import npm in `map-lit.js` (`leaflet.markercluster`), **non** copie `*.local.js` nel tema.

## Anti-pattern da non ripetere

```text
❌ Copiare 400 righe da map-lit.js nel tema “per aggiungere type_icon”
❌ Registrare geo-map-lit o GeoMapLit nel tema
❌ Importare ./leaflet.markercluster.local.js solo nel tema
❌ Documentare geo-map-lit-local.js come path valido
```

```text
✅ Una PR sul modulo Geo
✅ app.js importa solo map-lit.js
✅ Wiki aggiornata sul modulo Geo, non fork tema
```

## Incidente 2026-05-28

Durante STORY-051 un agente ha creato/aggiornato `geo-map-lit-local.js` nel tema invece di estendere `map-lit.js` nel modulo Geo.

- **Errore:** scorciatoia per “sbloccare” marker/type senza leggere `app.js` e la memory `feedback_map_lit_canonical_name`.
- **Correzione:** file rimosso dal tema; logica `resolveFeatureTicketType` solo in Geo; regola e memory incident.

Vedi: [incident-geo-map-lit-local-fork.md](../memories/incident-geo-map-lit-local-fork.md).

## Checklist agente (prima di toccare la mappa elenco)

- [ ] Ho letto `feedback_map_lit_canonical_name.md` e `map-lit-canonical-name.md`?
- [ ] Il Blade usa `<map-lit>` e `app.js` importa `map-lit.js`?
- [ ] Le mie modifiche sono **solo** sotto `laravel/Modules/Geo/resources/js/`?
- [ ] Non ho creato file `*-local.js` / `*-final.js` nel tema?
