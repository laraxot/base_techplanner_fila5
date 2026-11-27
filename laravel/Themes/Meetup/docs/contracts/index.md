---
title: "Indice dei contratti — Meetup"
type: index
theme: Meetup
status: active
created: 2026-11-27
updated: 2026-11-27
qmd: "meetup contracts index"
---

# Indice dei contratti — Meetup

Meetup non ha Action: `app/` contiene solo `Providers/ThemeServiceProvider.php`. Non ci
sono file `type: contract` e nessun invariante `<SCOPE>-INV-<N>` da coprire.

## Eccezione nota (debito, non un contratto)

`ThemeServiceProvider` registra `POST /events/{slug}/book` →
`Http/Controllers/EventBookingController::book()`, che incrementa `attendees_count`
dell'evento con `save()`: non e' un'Action, non ha contratto, la rotta e' senza
middleware `web` (vedi [README](README.md) per i dettagli). Non imitarlo.

## Contratti

| Contratto | Action | File | Invarianti (group Pest) |
|---|---|---|---|
| — | — | Nessuno | — |

## Note

- I contratti applicativi stanno nei moduli: `Modules/User` (login), `Modules/Gdpr` (consensi), `Modules/Cms` (pagine).
- Formato per un futuro contratto: [README.md](README.md) e [_template.md](_template.md).
