---
title: "Contratto — ShouldAutomaticallyApproveCommentAction"
type: contract
action: "Modules\\Comment\\Actions\\Comment\\ShouldAutomaticallyApproveCommentAction"
module: Comment
status: active
tags: [contract, action, comment, moderazione, permessi]
created: 2026-11-26
updated: 2026-11-26
---

# ShouldAutomaticallyApproveCommentAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Comment/ShouldAutomaticallyApproveCommentAction.php`. Chiamante: `Comment::shouldBeAutomaticallyApproved()`
(`app/Models/Comment.php` riga 285), a sua volta usato da `HasComments::comment()` (`app/Models/Concerns/HasComments.php` righe 94 e 98).
E' il cancello che decide se un commento nuovo compare subito sulla pagina pubblica o resta in attesa di un moderatore.

## Input

- Un `Comment` (anche non salvato) con la relazione `commentator` risolvibile.

## Output

- `bool`: `true` se il commento va pubblicato senza attesa.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| COMMENT-AUTOAPPROVE-INV-1 | Con `comments.automatically_approve_all_comments` vero la risposta e' `true` per qualunque commento, anche senza commentatore. Se cade, un commento resta in attesa pur con l'approvazione globale. | `COMMENT-AUTOAPPROVE-INV-1` |
| COMMENT-AUTOAPPROVE-INV-2 | Con il flag spento, un commentatore che compare nell'elenco dei moderatori (`ResolveCommentApprovingUsersAction`, stesso `getMorphClass()` e stessa `getKey()`) e' approvato in automatico. | `COMMENT-AUTOAPPROVE-INV-2` |
| COMMENT-AUTOAPPROVE-INV-3 | Con il flag spento, un commentatore che non e' un moderatore non e' mai approvato in automatico: la risposta e' `false`. Se cade, chiunque pubblica senza moderazione. | `COMMENT-AUTOAPPROVE-INV-3` |
| COMMENT-AUTOAPPROVE-INV-4 | Con il flag spento, un commento senza commentatore `CanComment` (anonimo o commentatore cancellato) e' `false`. | — (non dimostrato) |

## Effetti collaterali

- Legge `config('comments.automatically_approve_all_comments', false)` direttamente (non da `CommentConfigData`).
- Se serve, risolve il commentatore (`$comment->commentator`, query morph) e chiama `ResolveCommentApprovingUsersAction` (che esegue la closure `PendingCommentNotification::$sendTo`).
- Nessuna scrittura, nessun evento, nessuna notifica: chi riceve `true` scrive `approved_at` per conto suo.

## Errori

- Nessuna eccezione propria. Quelle di `ResolveCommentApprovingUsersAction` (`CannotSendPendingCommentNotification`) risalgono al chiamante.

## Non fa

- Non approva: restituisce una decisione. L'update di `approved_at` e' di `HasComments::comment()` (`forceFill(['approved_at' => now()])->save()`) o di [`ApproveCommentAction`](approve-comment-action.md).
- Non guarda il testo del commento (nessun filtro spam, nessuna lista di parole): la decisione dipende solo da chi scrive e dal flag.
- Non controlla `create` della policy: chi puo' scrivere e' deciso prima (`CommentPolicy::create`, `Gate::authorize` nei widget).

## Limiti noti

- **Con la config di oggi risponde sempre `true`.** `comments.automatically_approve_all_comments` e' `true` in `Modules/Comment/config/comments.php` (riga 91),
  `Modules/Fixcity/config/comments.php` (riga 60), `config/comments.php` (riga 61) e `config/local/fixcity/comments.php` (riga 61): la moderazione
  e' di fatto spenta, le righe INV-2..4 descrivono un percorso che il tenant non usa.
- **`HasComments::comment()` chiama questa Action due volte** (righe 94 e 98): la seconda e' ridondante e, con un commentatore moderatore, esegue due volte la closure `sendTo`.
- **L'auto-approvazione non genera evento ne' notifiche** (non passa da `ApproveCommentAction`), vedi [`NotifyApprovedCommentAction`](notify-approved-comment-action.md).
