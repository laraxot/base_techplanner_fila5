---
title: "Contratto — ApproveCommentAction"
type: contract
action: "Modules\Comment\Actions\Comment\ApproveCommentAction"
tags: [contract, action, comment, moderazione]
created: 2026-11-24
updated: 2026-11-24
---

# ApproveCommentAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Comment/ApproveCommentAction.php`. Chiamanti: `Comment::approve()`, tabella Filament
`CommentResource/Tables/CommentsTable.php` (azione singola e bulk).

## Input

- Un `Comment` gia' salvato.

## Output

- Lo stesso `Comment`, con `approved_at` valorizzato.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| COMMENT-APPROVE-INV-1 | Un commento in attesa (`approved_at` null) esce approvato (`isApproved()` vero). | `COMMENT-APPROVE-INV-1` |
| COMMENT-APPROVE-INV-2 | Un commento gia' approvato non viene toccato: niente update, niente evento, niente notifiche. | — |
| COMMENT-APPROVE-INV-3 | Le notifiche agli iscritti partono solo se `comments.notifications.enabled` non e' falso. | — |

## Effetti collaterali

- `UPDATE comments SET approved_at = now()`.
- Evento `CommentApprovedEvent`.
- `NotifyApprovedCommentAction` messa in coda (`onQueue()`): notifica iscritti del commentable, del commento padre e menzionati.

## Errori

- Nessuna eccezione propria; errori del DB o della coda risalgono al chiamante.

## Non fa

- Non controlla i permessi: l'autorizzazione e' della policy e della tabella Filament che la chiama.
- Non notifica i moderatori (quello e' `SendNotificationsForPendingCommentAction`, alla creazione).
- Esiste un doppione non usato in `app/Actions/ApproveCommentAction.php` (namespace `Modules\Comment\Actions`): non imitarlo,
  i chiamanti usano `Actions\Comment\ApproveCommentAction`.
