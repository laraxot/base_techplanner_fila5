---
title: "ADR — Comment"
type: index
tags: [adr, decisioni, comment]
created: 2026-11-18
updated: 2026-11-24
---

# ADR del modulo Comment

Il **perche'** delle forme non ovvie del motore di commenti: da dove viene (fork Spatie internalizzato), dove stanno i
contratti del commentatore, cosa si spegne per la privacy e come si frena lo spam.

Leggili prima di: reintrodurre codice o namespace `Spatie\Comments`, spostare `CanComment`, aggiungere un avatar o un nuovo
punto di invio di commenti dal front office.

Formato (5 sezioni, frontmatter `type: decision`): [regola canonica](../../../Xot/docs/rules/action-behavioral-contract.md).

## Decisioni

- [Internalizzare Spatie comments nel modulo Comment](internalize-spatie-comments.md) — motore nativo in `Modules\Comment`, fork `packages/spatie/` eliminato (resta debito nel `composer.lock`).
- [Models/Contracts vs app/Contracts](models-contracts-vs-app-contracts.md) — `CanComment` e le capacita' solo-Model stanno in `app/Models/Contracts/`.
- [Gravatar si accende e si spegne da configurazione](gravatar-switch.md) — `comments.gravatar.enabled`: spento, avatar del profilo o iniziali, nessun dato a terzi.
- [Il freno ai commenti conta ogni invio](comment-rate-limit-counts-every-attempt.md) — 5 invii al minuto per utente o IP, prima della validazione, in un'unica Action.

## Decisioni precedenti (formato libero, non ancora ADR)

- [commentable-widget-naming](../decisions/commentable-widget-naming.md) — perche' `Commentable/CommentsWidget` e non `Comment/CommentableWidget`.
