---
title: "Contratto — NotifyApprovedCommentAction"
type: contract
action: "Modules\\Comment\\Actions\\Notification\\NotifyApprovedCommentAction"
module: Comment
status: active
tags: [contract, action, comment, notifiche, moderazione]
created: 2026-11-26
updated: 2026-11-26
---

# NotifyApprovedCommentAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Notification/NotifyApprovedCommentAction.php`. Unico chiamante in produzione:
[`ApproveCommentAction`](approve-comment-action.md) (`app(NotifyApprovedCommentAction::class)->onQueue()->execute($comment)`, riga 40).
Chiave di config `comments.actions.send_notifications_for_approved_comment` (`Modules/Comment/config/comments.php`): nessun codice la legge.

## Input

- Un `Comment` gia' approvato. Il commentable e' quello del commento di primo livello (`$comment->topLevel()->commentable`).

## Output

- Lo stesso `Comment`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| COMMENT-NOTIFY-APPROVED-INV-1 | Chi ha scritto il commento non riceve la notifica degli iscritti al commentable o al commento padre: viene scartato per `getMorphClass()` + `getKey()`. Se la regola cade, l'autore riceve la mail del proprio commento. | — (non dimostrato) |
| COMMENT-NOTIFY-APPROVED-INV-2 | Gli iscritti sono quelli con tipo `All` piu' i partecipanti con tipo `Participating`, deduplicati per `CommentatorUniqueKeyAction` dentro lo stesso gruppo; chi ha tipo `None` non e' mai tra gli iscritti. Se cade, un utente che ha scelto di non essere avvisato riceve la mail. | — (non dimostrato) |
| COMMENT-NOTIFY-APPROVED-INV-3 | Se `comments.mentions.enabled` e' falso nessun menzionato e' notificato in quanto tale; se e' vero, il menzionato con tipo `None` sul commentable e' scartato. | — (non dimostrato) |
| COMMENT-NOTIFY-APPROVED-INV-4 | Se il commentable di primo livello non e' un `Model` l'Action lancia `RuntimeException('Commentable model not found.')` e non notifica nessuno. | — (non dimostrato) |

## Effetti collaterali

In quest'ordine, tutto dentro `handle()`:

1. Letture: commentable di primo livello, commento padre (solo se il commento non e' di primo livello), iscrizioni
   (`CommentNotificationSubscription`) e partecipanti del commentable e del padre, menzionati del commento.
2. Per ogni destinatario, `$subscriber->notify(CommentConfigData::make()->approvedCommentNotification($comment, $subscriber))`.
   `ApprovedCommentNotification` e' `ShouldQueue` e usa solo il canale `mail` (`via()` restituisce sempre `['mail']`): l'invio
   vero avviene nella coda delle notifiche, non in questa chiamata.
3. Nessuna scrittura su DB, nessun evento.

## Errori

- `RuntimeException('Commentable model not found.')`: commentable non risolvibile (commento orfano). Protegge INV-4.
- Errori di classe di notifica non configurata (`Assert::isInstanceOf` in `CommentConfigData::approvedCommentNotification`) o di
  coda risalgono al chiamante.

## Non fa

- Non controlla `comments.notifications.enabled`: lo fa il chiamante (`ApproveCommentAction`). Chi la chiama da altrove deve fare lo stesso.
- Non controlla permessi ne' lo stato del commento: notifica anche un commento in attesa se glielo passano.
- Non notifica i moderatori (quello e' [`SendNotificationsForPendingCommentAction`](send-notifications-for-pending-comment-action.md)).

## Limiti noti

- **Nessuna deduplica tra gruppi.** La chiave unica vale dentro `getSubscribers()`; poi `merge()` di collezioni base unisce iscritti
  del commentable, iscritti del padre e menzionati senza un `unique()` finale: chi e' in due gruppi puo' ricevere due mail.
  Letto dal codice (righe 34-36), non provato da un test.
- **Il filtro «non l'autore» vale per gli iscritti, non per i menzionati**: chi si cita da solo (`mentions.enabled`) ricevera' la notifica.
- **Variante non usata.** `Actions/Notification/SendNotificationsForApprovedCommentAction.php` fa lo stesso lavoro con regole leggermente diverse
  (richiede `SupportsCommentNotifications` sul commentable, non lancia con un commentable generico) ed e' registrata solo in
  `Modules/Fixcity/config/comments.php` riga 148 e `config/local/fixcity/comments.php` riga 149; `ApproveCommentAction` chiama sempre
  `NotifyApprovedCommentAction`, quindi la scelta di config del tenant non ha effetto.
- **Auto-approvazione senza notifica.** `HasComments::comment()` (riga 94) imposta `approved_at` con `forceFill()->save()` quando
  `shouldBeAutomaticallyApproved()` e' vero e non passa da `ApproveCommentAction`: nessun evento, nessuna notifica agli iscritti.
  Con `comments.automatically_approve_all_comments = true` in tutte le config del progetto (`config/local/fixcity/comments.php` riga 61, `Modules/Fixcity/config/comments.php` riga 60)
  questa Action oggi parte solo da un'approvazione manuale.
