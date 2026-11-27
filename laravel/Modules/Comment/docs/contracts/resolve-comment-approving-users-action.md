---
title: "Contratto — ResolveCommentApprovingUsersAction"
type: contract
action: "Modules\\Comment\\Actions\\Resolve\\ResolveCommentApprovingUsersAction"
module: Comment
status: active
tags: [contract, action, comment, moderazione, permessi]
created: 2026-11-26
updated: 2026-11-26
---

# ResolveCommentApprovingUsersAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Resolve/ResolveCommentApprovingUsersAction.php`. Non scrive nulla, ma decide **chi e' moderatore**: da
questo elenco dipendono tre cose, tutte sui permessi.

- `Comment::getApprovingUsers()` (riga 291 del modello), da cui `SendNotificationsForPendingCommentAction` ricava i destinatari.
- [`ShouldAutomaticallyApproveCommentAction`](should-automatically-approve-comment-action.md): un moderatore pubblica senza attesa.
- `CommentPolicy::isApprovingUser()` (`app/Policies/CommentPolicy.php` riga 96), usata da `approve()`, `reject()`, `update()`, `delete()` e `see()`: chi puo' moderare.

## Input

- Un `Comment`. La lista dei moderatori non sta nel modulo: la fornisce l'applicazione ospite con la closure statica
  `PendingCommentNotification::sendTo(fn (Comment $comment) => ...)` (`app/Notifications/PendingCommentNotification.php` righe 20 e 53).

## Output

- `Collection<int, CanComment>`: i moderatori del commento, possibilmente vuota.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| COMMENT-APPROVERS-INV-1 | Gli utenti `CanComment` che la closure `sendTo` restituisce sono esattamente quelli dell'elenco; chi non vi compare non e' un moderatore (per `getMorphClass()` + `getKey()`). Se cade, un non moderatore pubblica senza attesa o approva da policy. | `COMMENT-APPROVERS-INV-1` |
| COMMENT-APPROVERS-INV-2 | Senza closure configurata l'elenco e' vuoto: nessun moderatore, nessuna notifica, nessuna approvazione automatica da ruolo. | — (non dimostrato) |
| COMMENT-APPROVERS-INV-3 | Un elemento restituito dalla closure che non usa il trait `Notifiable` fa lanciare `CannotSendPendingCommentNotification::doesNotImplementNotifiable()`: non si produce un elenco parziale. | — (non dimostrato) |

## Effetti collaterali

- Esegue la closure `sendTo` una volta per chiamata (che di solito interroga il DB: l'esito dipende dall'applicazione ospite).
- Nessuna scrittura, nessun evento, nessuna notifica.

## Errori

- `CannotSendPendingCommentNotification` (`doesNotImplementNotifiable`): un elemento (o l'oggetto singolo) senza `Notifiable`. Protegge INV-3.

## Non fa

- Non decide i permessi di moderazione per ruolo: li legge dalla closure dell'ospite; nel modulo non c'e' un ruolo «moderatore».
- Non notifica nessuno: la notifica e' di [`SendNotificationsForPendingCommentAction`](send-notifications-for-pending-comment-action.md).
- Non verifica che l'utente possa moderare *quel* commento: la closure riceve il commento ma il modulo non guarda la risposta oltre l'elenco.

## Limiti noti

- **Oggi nessuno configura la closure.** `rg 'PendingCommentNotification::sendTo|\$sendTo'` in `Modules`, `Themes`, `app`, `config` (esclusi `tests` e `docs`)
  trova solo la definizione e questa lettura: in FixCity l'elenco dei moderatori e' sempre vuoto, quindi `getApprovingUsers()` e'
  vuoto e nessuno e' riconosciuto come moderatore da `ShouldAutomaticallyApproveCommentAction` o da `CommentPolicy` (salvo un `Gate::before` dell'applicazione ospite, che qui non e' verificato).
  Non e' un difetto visibile perche' `comments.automatically_approve_all_comments` e' `true` in tutte le config (vedi l'altro contratto).
- **Elementi `Notifiable` ma non `CanComment` sono scartati in silenzio** (`collectionFromIterable()`, righe 57-72): nessuna eccezione, nessun log.
- La closure statica e' stato globale di processo: i test la azzerano a mano (`PendingCommentNotification::$sendTo = null`).
