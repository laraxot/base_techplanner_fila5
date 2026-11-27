---
title: "Contratto — SendNotificationsForPendingCommentAction"
type: contract
action: "Modules\\Comment\\Actions\\Notification\\SendNotificationsForPendingCommentAction"
tags: [contract, action, comment, notifiche, moderazione]
module: Comment
status: active
created: 2026-11-24
updated: 2026-11-26
---

# SendNotificationsForPendingCommentAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Notification/SendNotificationsForPendingCommentAction.php`. Registrata in `config/comments.php`
(`actions.send_notifications_for_pending_comment`), ma **nessun codice in produzione la chiama** (vedi «Limiti noti»).

## Input

- Un `Comment` appena salvato.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| COMMENT-PENDING-NOTIFY-INV-1 | Ogni utente restituito da `Comment::getApprovingUsers()` riceve la notifica configurata (`PendingCommentNotification` di default). | `COMMENT-PENDING-NOTIFY-INV-1` |
| COMMENT-PENDING-NOTIFY-INV-2 | Un commento gia' approvato non genera notifiche ai moderatori (`isPending()` falso: l'Action esce subito). Se cade, i moderatori ricevono la mail per commenti gia' pubblicati. | — (non dimostrato) |

## Effetti collaterali

- `notify()` su ogni moderatore (mail/database secondo i canali della notifica).

## Errori

- Nessuna eccezione propria; errori dei canali di notifica risalgono al chiamante.

## Non fa

- Non decide chi modera: lo fa `ResolveCommentApprovingUsersAction` (e `PendingCommentNotification::$sendTo` nei test).
- Non approva ne' rifiuta: i link della mail portano a `ApproveCommentAction` / `RejectCommentAction`.
- Non controlla `comments.notifications.enabled`.

## Limiti noti

- **Nessun chiamante in produzione.** `rg 'SendNotificationsForPendingComment|send_notifications_for_pending'` in `Modules`, `Themes`, `app`, `config` (esclusi `tests` e `docs`) trova solo la classe, un wrapper
  mai chiamato (`app/Actions/SendNotificationsForPendingCommentAction.php`, che mette in coda questa) e le registrazioni di config, che nessun codice legge: l'unica chiave `comments.actions.*` letta e'
  `resolve_mentions_autocomplete` (`GetMentionsAutocompleteConfigAction.php` riga 22). `HasComments::comment()` (`app/Models/Concerns/HasComments.php` righe 73-101) crea il commento senza avvisare i moderatori.
  Con l'internalizzazione del motore (ADR [internalize-spatie-comments](../adr/0003-internalize-spatie-comments.md)) questo passo non risulta ricollegato al flusso di creazione.
- Effetto oggi nascosto da due fatti: `comments.automatically_approve_all_comments = true` (nessun commento resta in attesa) e nessuna closure `PendingCommentNotification::sendTo` (nessun moderatore,
  vedi [ResolveCommentApprovingUsersAction](resolve-comment-approving-users-action.md)). Se il tenant spegne l'approvazione automatica, i commenti restano in attesa **senza che nessun moderatore sia avvisato**.
- La promessa di INV-1 e' dimostrata chiamando l'Action direttamente (`CommentEngineParityTest`), non il flusso di creazione.
