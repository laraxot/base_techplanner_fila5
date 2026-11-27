---
title: "ADR — Comment"
type: index
tags: [adr, decisioni, comment]
created: 2026-11-18
updated: 2026-11-26
---

# ADR del modulo Comment

Il **perche'** delle forme non ovvie del motore di commenti: da dove viene (fork Spatie internalizzato), dove stanno i
contratti del commentatore, cosa si spegne per la privacy e come si frena lo spam.

Leggili prima di: reintrodurre codice o namespace `Spatie\Comments`, spostare `CanComment`, aggiungere un avatar o un nuovo
punto di invio di commenti dal front office.

Formato (frontmatter `type: decision`; sezioni `Contesto`, `Driver della decisione`, `Alternative scartate`, `Decisione`, `Conseguenze`, `Conferma`):
ADR [0012 di Xot](../../../Xot/docs/adr/0012-behavioral-contract-governance.md) e [regola canonica](../../../Xot/docs/rules/action-behavioral-contract.md).
Le promesse delle Action stanno nei [contratti](../contracts/README.md), non qui.

## Decisioni

- [Internalizzare Spatie comments nel modulo Comment](0003-internalize-spatie-comments.md) — motore nativo in `Modules\Comment`, fork `packages/spatie/` eliminato; il debito nel `composer.lock` e' chiuso (sezione «Stato attuale»).
- [Models/Contracts vs app/Contracts](0004-models-contracts-vs-app-contracts.md) — `CanComment` e le capacita' solo-Model stanno in `app/Models/Contracts/`.
- [Gravatar si accende e si spegne da configurazione](0002-gravatar-switch.md) — `comments.gravatar.enabled`: spento, avatar del profilo o iniziali, nessun dato a terzi.
- [Il freno ai commenti conta ogni invio](0001-comment-rate-limit-counts-every-attempt.md) — 5 invii al minuto per utente o IP, prima della validazione, in un'unica Action; la sezione «Stato attuale» segnala che la mail ai moderatori citata nel contesto oggi non parte.

## Stato di copertura

Aggiornato il 2026-11-26: 4 ADR, tutti con le sei sezioni e la «Conferma».

| ADR | Conferma automatica oggi |
|---|---|
| internalize-spatie-comments | `CommentEngineParityTest` (motore nativo); comando `test ! -d Modules/Comment/packages`; comando `rg` sul namespace `Spatie\Comments` |
| models-contracts-vs-app-contracts | `Modules/Comment/tests/Unit/CanCommentContractTest.php` e comando `test ! -e Modules/Comment/app/Contracts/CanComment.php` |
| gravatar-switch | `FrontOfficeCommentThreadTest` (Gravatar solo con l'interruttore acceso) e `Themes/Sixteen/tests/Feature/NoThirdPartyBeforeConsentTest.php` |
| comment-rate-limit-counts-every-attempt | Parziale: group `COMMENT-THROTTLE-INV-1` (limite di 5); la regola «conta ogni invio» e la chiave condivisa sono solo revisione (`INV-2`/`INV-3` non dimostrate) |

## Decisioni precedenti (formato libero, non ancora ADR)

- [commentable-widget-naming](../decisions/commentable-widget-naming.md) — perche' `Commentable/CommentsWidget` e non `Comment/CommentableWidget`. Sta in `docs/decisions/` e ha la frontmatter di un ADR ma non il formato a sei sezioni; proposta: portarlo in `docs/adr/` con `git mv` e le sezioni complete in una passata dedicata.
