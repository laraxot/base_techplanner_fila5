---
title: "Contratto — RejectCommentAction"
type: contract
action: "Modules\Comment\Actions\Comment\RejectCommentAction"
tags: [contract, action, comment, moderazione]
created: 2026-11-24
updated: 2026-11-24
---

# RejectCommentAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Comment/RejectCommentAction.php`. Chiamanti: `Comment::reject()`, `CommentsTable` (Filament), pagina
Folio `resources/views/folio-moderation/comment-approval/reject/[Comment].blade.php` (link firmato nella mail al moderatore).

## Input

- Un `Comment` gia' salvato.

## Output

- Lo stesso `Comment` (ormai cancellato dal DB).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| COMMENT-REJECT-INV-1 | Rifiutare = cancellare la riga: il modello `Comment` non usa `SoftDeletes`, il commento non resta in archivio. | — |
| COMMENT-REJECT-INV-2 | `CommentRejectedEvent` parte dopo la cancellazione, con il commento in memoria. | — |

## Effetti collaterali

- `DELETE` della riga `comments`.
- Evento `CommentRejectedEvent`.

## Errori

- Nessuna eccezione propria; errori del DB risalgono al chiamante.

## Non fa

- Non notifica l'autore del commento.
- Non controlla i permessi (policy e firma del link sono dei chiamanti).
- Non distingue commenti in attesa da commenti gia' approvati: rifiuta (cancella) qualunque commento riceva.
