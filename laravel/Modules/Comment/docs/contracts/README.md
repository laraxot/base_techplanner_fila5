---
title: "Contratti — Comment"
type: index
tags: [contracts, actions, comment]
created: 2026-11-18
updated: 2026-11-26
---

# Contratti del modulo Comment

Cosa promettono le Action del modulo che scrivono o cancellano commenti e reazioni, decidono chi modera, mandano notifiche,
sanificano l'HTML o frenano gli invii. Le altre Action del modulo (`Check*`, `Resolve*Class*`, `Build*Url*`) leggono configurazione
o calcolano valori e non hanno contratto.

Leggili prima di chiamare, modificare o imitare la moderazione (approva/rifiuta/approvazione automatica), le notifiche, le reazioni,
la sanificazione o il rate limit. La sezione «Non fa» dice dove sta il comportamento che non trovi qui; «Limiti noti» dice dove il codice di oggi
non fa quello che ci si aspetta (un comportamento legacy documentato non diventa modello per codice nuovo, ADR [0012](../../../Xot/docs/adr/0012-behavioral-contract-governance.md)).

Formato (6 sezioni, invarianti con ID e group Pest): [regola canonica](../../../Xot/docs/rules/action-behavioral-contract.md).
Provare una promessa: `cd laravel && vendor/bin/pest Modules/Comment/tests --group=<ID>` (l'elenco dei file della cartella e' anche in [index.md](index.md)).

## Contratti

Moderazione e permessi:

- [ApproveCommentAction](approve-comment-action.md) — approva un commento in attesa, evento e notifiche in coda agli iscritti.
- [RejectCommentAction](reject-comment-action.md) — rifiutare significa cancellare la riga, poi evento.
- [ShouldAutomaticallyApproveCommentAction](should-automatically-approve-comment-action.md) — chi pubblica senza attesa: flag globale o moderatore.
- [ResolveCommentApprovingUsersAction](resolve-comment-approving-users-action.md) — chi sono i moderatori (closure dell'ospite); base di policy e auto-approvazione.

Notifiche:

- [SendNotificationsForPendingCommentAction](send-notifications-for-pending-comment-action.md) — notifica i moderatori di un commento in attesa (oggi nessuno la chiama).
- [NotifyApprovedCommentAction](notify-approved-comment-action.md) — notifica iscritti, padre e menzionati di un commento approvato.

Rate limit e contenuto:

- [EnsureCommentRateLimitAction](ensure-comment-rate-limit-action.md) — 5 invii al minuto per utente o IP, errore di campo oltre il limite.
- [ProcessCommentAction](process-comment-action.md) — da `original_text` a `text`: transformer, poi sanitizer, a ogni salvataggio.
- [SanitizeCommentHtmlAction](sanitize-comment-html-action.md) — difesa XSS: elementi e attributi ammessi da config.

Reazioni:

- [ReactToCommentAction](react-to-comment-action.md) — registra una reazione (`firstOrCreate`), anche anonima.
- [DeleteCommentReactionAction](delete-comment-reaction-action.md) — cancella la reazione dello stesso commentatore.
- [GetCommentReactionCountsAction](get-comment-reaction-counts-action.md) — conteggio per reazione, ordinato come `allowed_reactions`.

## Stato di copertura

Aggiornato il 2026-11-26. 12 contratti, 35 invarianti, **15 dimostrate** da un test Pest con `->group('<ID>')`, 20 promesse dal codice ma non dimostrate.

| Contratto | Invarianti | Dimostrate |
|---|---|---|
| ApproveCommentAction | 3 | 1 |
| RejectCommentAction | 2 | 0 |
| ShouldAutomaticallyApproveCommentAction | 4 | 3 |
| ResolveCommentApprovingUsersAction | 3 | 1 |
| SendNotificationsForPendingCommentAction | 2 | 1 |
| NotifyApprovedCommentAction | 4 | 0 |
| EnsureCommentRateLimitAction | 3 | 1 |
| ProcessCommentAction | 4 | 3 |
| SanitizeCommentHtmlAction | 3 | 2 |
| ReactToCommentAction | 2 | 1 |
| DeleteCommentReactionAction | 2 | 1 |
| GetCommentReactionCountsAction | 3 | 1 |

Ogni «dimostrata» e' un test letto riga per riga: dove la prova passa da un percorso piu' largo (INV-3 di `ProcessCommentAction` e' provata dal widget, non dall'Action da sola) il contratto lo dice nei «Limiti noti».

## Limiti noti trasversali (scoperti scrivendo i contratti)

- **La moderazione e' dormiente.** `comments.automatically_approve_all_comments` e' `true` in `Modules/Comment/config/comments.php` (riga 91), `Modules/Fixcity/config/comments.php` (60),
  `config/comments.php` (61) e `config/local/fixcity/comments.php` (61), e nessun codice di produzione definisce i moderatori (`PendingCommentNotification::sendTo`).
- **La mail ai moderatori non parte mai** e **l'auto-approvazione non notifica gli iscritti**: nessun chiamante di `SendNotificationsForPendingCommentAction`; `HasComments::comment()` approva con `forceFill()->save()` senza evento.
- **Le chiavi `comments.actions.*` sono decorative**, tranne `resolve_mentions_autocomplete` (`GetMentionsAutocompleteConfigAction.php` riga 22): `ApproveCommentAction` chiama `NotifyApprovedCommentAction` a mano, quindi la scelta di `SendNotificationsForApprovedCommentAction` nella config del tenant non ha effetto.
- **Reazioni anonime**: `ReactToCommentAction` senza utente scrive una riga con `commentator_id` `NULL`.

## Backlog contract

Action del modulo che scrivono o chiamano servizi esterni (o decidono permessi) e non hanno ancora un contratto, per rischio:

| Action | Perche' |
|---|---|
| `Actions/Notification/SendNotificationsForApprovedCommentAction.php` | Notifiche email agli iscritti; variante non usata di `NotifyApprovedCommentAction`, registrata solo nella config del tenant: prima decidere se tenerla. |
| `Actions/Comment/RunCommentSavingPipelineAction.php` | Gira a ogni `saving` e imposta `post_id`/`user_id` a 0 se le colonne esistono (residuo di compatibilita'). |
| `Actions/Gravatar/BuildGravatarUrlAction.php` | Dati personali: hash md5 dell'email verso `gravatar.com`; la decisione e' nell'ADR [gravatar-switch](../adr/0002-gravatar-switch.md), il contratto manca. |
| Wrapper `Actions/SendNotificationsForPendingCommentAction.php` e `Actions/QueueNotifyApprovedCommentAction.php` | Mettono in coda le Action di notifica; nessun chiamante in produzione. |
| `Actions/ApproveCommentAction.php`, `Actions/RejectCommentAction.php`, `Actions/ProcessCommentAction.php` | Doppioni non usati delle Action in `Actions/Comment/`; i primi due hanno il docblock `@deprecated`. Candidati alla cancellazione, non a un contratto. |
| `Actions/ResolveApprovedCommentNotificationAction.php`, `Actions/ResolvePendingCommentNotificationAction.php` | Falsi positivi dell'audit (risolvono una classe da config, nessuna scrittura) e senza chiamanti: `CommentConfigData::approvedCommentNotification()` fa lo stesso. Candidati alla cancellazione. |
| `Actions/SanitizeCommentTextAction.php` | Variante piu' vecchia della sanificazione, senza chiamanti in produzione. |

## Backlog test

Invarianti promesse e non dimostrate (da scrivere con `->group('<ID>')`, in una passata dedicata ai test):

| ID | Cosa servirebbe |
|---|---|
| COMMENT-APPROVE-INV-2, COMMENT-APPROVE-INV-3 | Approvare un commento gia' approvato (nessun evento con `Event::fake()`, nessuna `Notification::fake()`); approvare con `comments.notifications.enabled = false`. |
| COMMENT-REJECT-INV-1, COMMENT-REJECT-INV-2 | `reject()` cancella la riga (`assertDatabaseMissing`) e `CommentRejectedEvent` parte dopo. |
| COMMENT-THROTTLE-INV-2, COMMENT-THROTTLE-INV-3 | Sei invii di cui alcuni non validi; un commento, una risposta e una modifica che consumano lo stesso contatore. |
| COMMENT-PENDING-NOTIFY-INV-2 | `SendNotificationsForPendingCommentAction` su un commento approvato: `Notification::assertNothingSent()`. |
| COMMENT-NOTIFY-APPROVED-INV-1..4 | `NotifyApprovedCommentAction` non ha alcun test: autore escluso, tipo `None`, menzionati, commentable non-Model. |
| COMMENT-APPROVERS-INV-2, COMMENT-APPROVERS-INV-3 | Senza closure l'elenco e' vuoto; elemento senza `Notifiable` lancia. |
| COMMENT-AUTOAPPROVE-INV-4 | Commento anonimo con flag spento. |
| COMMENT-REACT-INV-2, COMMENT-REACT-COUNTS-INV-2, COMMENT-REACT-COUNTS-INV-3, COMMENT-REACT-DELETE-INV-2 | Doppia reazione identica; ordine e conteggio; ospite che cancella. |
| COMMENT-PROCESS-INV-4, COMMENT-SANITIZE-INV-3 | `original_text` intatto dopo il salvataggio; `span` con menzioni accese e spente. |
