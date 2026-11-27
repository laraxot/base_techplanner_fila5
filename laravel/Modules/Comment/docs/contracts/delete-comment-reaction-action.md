---
title: "Contratto — DeleteCommentReactionAction"
type: contract
action: "Modules\\Comment\\Actions\\Reaction\\DeleteCommentReactionAction"
module: Comment
status: active
tags: [contract, action, comment, reazioni]
created: 2026-11-26
updated: 2026-11-26
---

# DeleteCommentReactionAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Reaction/DeleteCommentReactionAction.php`. Chiamante: `Comment::deleteReaction()` (`app/Models/Comment.php` riga 192).

## Input

- `$comment`: un `Comment` salvato; `$reaction`: la stringa della reazione; `$commentator`: opzionale (di norma `auth()->user()`).

## Output

- Lo stesso `Comment`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| COMMENT-REACT-DELETE-INV-1 | Cancella solo la riga dello stesso commentatore (`commentator_id` + `commentator_type`) e della stessa reazione su quel commento: le altre reazioni, anche dello stesso utente, restano. | `COMMENT-REACT-DELETE-INV-1` |
| COMMENT-REACT-DELETE-INV-2 | Senza un commentatore `CanComment` (nessun utente e nessun parametro) non cancella nulla e restituisce il commento. Se cade, un ospite cancellerebbe reazioni altrui. | — (non dimostrato) |

## Effetti collaterali

- `DELETE FROM reactions WHERE comment_id = ? AND commentator_id = ? AND commentator_type = ? AND reaction = ?` (cancellazione fisica; `Reaction` non usa `SoftDeletes`).
- Nessun evento, nessuna notifica.

## Errori

- Nessuna eccezione propria; errori del DB risalgono al chiamante.

## Non fa

- Non autorizza: `ReactionPolicy::delete()` esiste (`app/Policies/ReactionPolicy.php`) ma non e' chiamata qui; la sicurezza e' la query limitata al commentatore.
- Non segnala se non c'era nulla da cancellare.
- Non cancella le reazioni anonime (`commentator_id` `NULL`): il ramo ospite esce prima della query (vedi [`ReactToCommentAction`](react-to-comment-action.md), Limiti noti).
