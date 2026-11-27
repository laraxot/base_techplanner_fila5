---
title: "INDEX contratti — Meetup"
type: index
theme: Meetup
status: active
created: 2026-11-27
updated: 2026-11-27
qmd: "meetup contracts index machine readable"
---

# Meetup behavioral contract index

Inventario machine-readable dei contratti di comportamento del tema **Meetup**.
Il tema non ha Action (`app/` contiene solo `Providers/ThemeServiceProvider.php`):
non ci sono file `type: contract`. La tabella di lavoro e' in [index.md](index.md).

## Contratti

Nessuno (il tema non ha Action).

## Autore

Usa il template [_template.md](_template.md) e il formato descritto in [README.md](README.md).
Unico effetto collaterale noto (debito dichiarato in README): `POST /events/{slug}/book`
→ `EventBookingController::book()` scrive `attendees_count` fuori da un'Action: il suo
posto e' un'Action del modulo eventi con contratto.
