---
title: "Contratto — GetCommentReactionCountsAction"
type: contract
action: "Modules\\Comment\\Actions\\Reaction\\GetCommentReactionCountsAction"
module: Comment
status: active
tags: [contract, action, comment, reazioni]
created: 2026-11-26
updated: 2026-11-26
---

# GetCommentReactionCountsAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Reaction/GetCommentReactionCountsAction.php`. Chiamante: `Comment::reactionCounts()` (`app/Models/Comment.php` riga 180).
Sola lettura (una `GROUP BY` con `DB::raw`): ha un contratto perche' il suo risultato e' cio' che il front office mostra come conteggio pubblico.

## Input

- Un `Comment` salvato.

## Output

- `list<array{reaction: string, count: int}>`: una voce per reazione distinta.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| COMMENT-REACT-COUNTS-INV-1 | Una voce per reazione distinta presente sul commento; una reazione cancellata sparisce dall'elenco. | `COMMENT-REACT-COUNTS-INV-1` |
| COMMENT-REACT-COUNTS-INV-2 | L'ordine segue `comments.allowed_reactions`; le reazioni fuori elenco vanno in coda (indice `PHP_INT_MAX`). | — (non dimostrato) |
| COMMENT-REACT-COUNTS-INV-3 | `count` e' il numero di righe `reactions` con quella reazione, come intero (`SafeIntCastAction`). | — (non dimostrato) |

## Effetti collaterali

- `SELECT reaction, count(*) AS count FROM reactions WHERE comment_id = ? GROUP BY reaction`. Nessuna scrittura, nessuna cache.

## Errori

- Nessuna eccezione propria; errori del DB risalgono al chiamante.

## Non fa

- Non dice se l'utente corrente ha reagito: lo fa `ReactionCollection::summary()` (`commentator_reacted`).
- Non filtra le reazioni fuori da `allowed_reactions`: le ordina in fondo ma le restituisce.
- Non mette in cache il risultato.
