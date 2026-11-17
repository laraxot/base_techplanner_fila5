---
title: API HTTP senza Controller — Folio + Actions
type: concept
confidence: high
created: 2026-05-29
updated: 2026-05-31
tags: [folio, routing, laraxot, fixcity, controllers]
related:
  - ../rules/no-controllers-rule.md
  - ../guidelines/routing-architecture.md
  - bmad-laraxot-implementation-guardrails.md
  - ../../stories/STORY-107-no-http-controllers-religion-standing-rule.md
---

# API HTTP senza Controller — Folio + Actions

> **Religione / perché:** [no-controllers-rule.md](../rules/no-controllers-rule.md) — **MAI** `laravel/app/Http/Controllers/*.php` né `Modules/*/app/Http/Controllers/*.php`.

## Principio

Laraxot/Fixcity **non usa** `Http\Controllers` per routing applicativo.

| Superficie | Meccanismo |
|------------|------------|
| Frontoffice HTML | Folio + blocchi CMS + Filament widget |
| Backoffice | Filament Resources / Pages |
| **API JSON leggere** (mappa, popup) | **Folio** in `Modules/*/resources/views/pages/api/` + **Actions** |

Un Controller monolitico duplica il pattern Folio già previsto da `FolioVoltServiceProvider` e viola NFR-007 / routing-architecture.

## Fixcity — esempio canonico

- `GET /api/tickets/geojson` → `pages/api/tickets/geojson.blade.php` + `BuildTicketsGeoJsonAction`
- `GET /api/ticket-details/{ticket}` → `pages/api/ticket-details/[Ticket].blade.php` + `BuildTicketPublicDetailsPayloadAction`
- Mount: `FixcityServiceProvider::registerFolioApiRoutes()` con `Folio::path(.../pages/api)->uri('/api')`

**Mai** `TicketsGeoJsonController.php`.

## Checklist agente

- [ ] Nuovo endpoint JSON → file Folio sotto `resources/views/pages/api/`
- [ ] Logica in `app/Actions/`, risposta `render(fn () => response()->json(...))`
- [ ] `RouteServiceProvider::mapApiRoutes()` vuoto / commentato
- [ ] Nessun file in `app/Http/Controllers/` (solo `.old` archivio)
- [ ] **Mai** `laravel/app/Http/Controllers/RatingController.php` né `Modules/Rating/.../RatingController.php` — vedi [no-http-controllers-folio-actions.md](../memories/no-http-controllers-folio-actions.md)

## Anti-pattern Rating (feedback 2026-05-31)

Proporre `RatingController` in `laravel/app/Http/` o nel modulo Rating è **sempre sbagliato**. Rating HTTP → Folio + Action; ticket cittadino → `SubmitCitizenTicketRatingAction` (Fixcity); admin → Filament.


## Riferimenti

- **[no-controllers-rule.md](../rules/no-controllers-rule.md)** — regola standing (filosofia)
- [routing-architecture.md](../guidelines/routing-architecture.md)
- [STORY-107](../../stories/STORY-107-no-http-controllers-religion-standing-rule.md)
- [no-http-controllers-folio-actions.md](../memories/no-http-controllers-folio-actions.md)
