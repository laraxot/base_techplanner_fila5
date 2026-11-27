---
title: "Contratto — SendNotificationsForPendingCommentAction"
type: contract
action: "Modules\Comment\Actions\Notification\SendNotificationsForPendingCommentAction"
tags: [contract, action, comment, notifiche, moderazione]
created: 2026-11-24
updated: 2026-11-24
---

# SendNotificationsForPendingCommentAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Notification/SendNotificationsForPendingCommentAction.php`. Registrata in `config/comments.php`
(`actions.send_notifications_for_pending_comment`).

## Input

- Un `Comment` appena salvato.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| COMMENT-PENDING-NOTIFY-INV-1 | Ogni utente restituito da `Comment::getApprovingUsers()` riceve la notifica configurata (`PendingCommentNotification` di default). | `COMMENT-PENDING-NOTIFY-INV-1` |
| COMMENT-PENDING-NOTIFY-INV-2 | Un commento gia' approvato non genera notifiche ai moderatori. | — |

## Effetti collaterali

- `notify()` su ogni moderatore (mail/database secondo i canali della notifica).

## Errori

- Nessuna eccezione propria; errori dei canali di notifica risalgono al chiamante.

## Non fa

- Non decide chi modera: lo fa `ResolveCommentApprovingUsersAction` (e `PendingCommentNotification::$sendTo` nei test).
- Non approva ne' rifiuta: i link della mail portano a `ApproveCommentAction` / `RejectCommentAction`.
- Non controlla `comments.notifications.enabled`.
