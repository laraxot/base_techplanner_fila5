---
title: "Contratto — EnsureCommentRateLimitAction"
type: contract
action: "Modules\Comment\Actions\Comment\EnsureCommentRateLimitAction"
tags: [contract, action, comment, rate-limit, sicurezza]
created: 2026-11-24
updated: 2026-11-24
---

# EnsureCommentRateLimitAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Comment/EnsureCommentRateLimitAction.php`. Perche': [ADR](../adr/comment-rate-limit-counts-every-attempt.md).
Chiamanti: `Filament/Widgets/Commentable/CommentsWidget::comment()`, `Filament/Widgets/Comment/CommentWidget::reply()` ed `edit()`.

## Input

- `$statePath`: campo del form a cui agganciare l'errore (default `data.text`).
- Implicito: utente autenticato (`auth()->id()`) o, in sua assenza, IP della richiesta.

## Output

- `void` se l'invio e' consentito.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| COMMENT-THROTTLE-INV-1 | Al massimo `MAX_ATTEMPTS` (5) invii per chiave in `DECAY_SECONDS` (60 s); il sesto e' un errore di campo e non salva nulla. | `COMMENT-THROTTLE-INV-1` |
| COMMENT-THROTTLE-INV-2 | Ogni chiamata conta, anche se il testo poi non supera la validazione. | — |
| COMMENT-THROTTLE-INV-3 | La chiave e' `comment-submit:<id utente>` o `comment-submit:<ip>`: nuovo commento, risposta e modifica condividono lo stesso contatore. | — |

## Effetti collaterali

- `RateLimiter::hit()` sulla cache dell'applicazione.

## Errori

- `ValidationException` su `$statePath` con `comment::txt.throttle` (secondi di attesa) quando il limite e' superato.

## Non fa

- Non autorizza: il `Gate::authorize('create', ...)` resta nel widget, prima di questa chiamata.
- Non valida il testo.
- Non vale per commenti creati da codice (`HasComments::comment()`, seeder, import): solo i widget Filament la chiamano.
