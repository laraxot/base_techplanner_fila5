---
title: "Contratto — ApproveCommentAction"
type: contract
action: "Modules\\Comment\\Actions\\Comment\\ApproveCommentAction"
tags: [contract, action, comment, moderazione]
module: Comment
status: active
created: 2026-11-24
updated: 2026-11-26
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
| COMMENT-APPROVE-INV-2 | Un commento gia' approvato non viene toccato: niente update, niente evento, niente notifiche. Se cade, ogni nuova approvazione rimanda le mail agli iscritti. | — (non dimostrato) |
| COMMENT-APPROVE-INV-3 | Le notifiche agli iscritti partono solo se `comments.notifications.enabled` non e' falso. Se cade, un tenant che le ha spente manda comunque le mail. | — (non dimostrato) |

## Effetti collaterali

- `UPDATE comments SET approved_at = now()` (l'update fa scattare l'evento `saving` del modello: `RunCommentSavingPipelineAction` ricalcola `text` da `original_text`, vedi [ProcessCommentAction](process-comment-action.md)).
- Evento `CommentApprovedEvent`.
- `NotifyApprovedCommentAction` messa in coda (`onQueue()`): notifica iscritti del commentable, del commento padre e menzionati.

## Errori

- Nessuna eccezione propria; errori del DB o della coda risalgono al chiamante.

## Non fa

- Non controlla i permessi: l'autorizzazione e' della policy e della tabella Filament che la chiama.
- Non notifica i moderatori: quel compito e' di [SendNotificationsForPendingCommentAction](send-notifications-for-pending-comment-action.md), che oggi nessun codice chiama (vedi i suoi limiti noti).
- Esiste un doppione non usato in `app/Actions/ApproveCommentAction.php` (namespace `Modules\Comment\Actions`): non imitarlo,
  i chiamanti usano `Actions\Comment\ApproveCommentAction`.

## Limiti noti

- **Percorso poco usato oggi.** Con `comments.automatically_approve_all_comments = true` in tutte le config del progetto, `HasComments::comment()` imposta `approved_at`
  da solo (`forceFill()->save()`, `app/Models/Concerns/HasComments.php` riga 95) senza passare da questa Action: niente `CommentApprovedEvent` e niente notifiche agli iscritti
  ([NotifyApprovedCommentAction](notify-approved-comment-action.md)). L'approvazione manuale e' l'unico ingresso rimasto.
- **Nessun test delle invarianti 2 e 3.** `CommentEngineParityTest` copre solo l'esito base (INV-1); imposta `comments.notifications.enabled = false` ma non verifica l'assenza di notifiche.
- Il doppione `app/Actions/ApproveCommentAction.php` e' marcato `@deprecated` nel docblock; resta da cancellare (decisione di chi possiede il modulo).
