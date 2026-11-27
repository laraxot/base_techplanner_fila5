---
title: "Contratto — ReactToCommentAction"
type: contract
action: "Modules\\Comment\\Actions\\Reaction\\ReactToCommentAction"
module: Comment
status: active
tags: [contract, action, comment, reazioni]
created: 2026-11-26
updated: 2026-11-26
---

# ReactToCommentAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Reaction/ReactToCommentAction.php`. Chiamanti: `Comment::react()` (`app/Models/Comment.php` riga 185), a sua volta usato
da `CommentWidget::toggleReaction()` (`app/Filament/Widgets/Comment/CommentWidget.php` riga 171).

## Input

- `$comment`: un `Comment` salvato.
- `$reaction`: stringa libera (di norma una emoji tra `comments.allowed_reactions`).
- `$commentator`: opzionale; se assente si usa `auth()->user()`.

## Output

- Lo stesso `Comment`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| COMMENT-REACT-INV-1 | Dopo la chiamata esiste una riga `reactions` per (commento, commentatore, reazione): `reactionCounts()` la conta e `findReaction()` la ritrova. | `COMMENT-REACT-INV-1` |
| COMMENT-REACT-INV-2 | Reagire due volte con la stessa reazione dello stesso commentatore non crea una seconda riga (`firstOrCreate`). Se cade, il conteggio si gonfia a ogni click. | — (non dimostrato) |

## Effetti collaterali

- `SELECT` poi, se manca, `INSERT` in `reactions` (`commentator_id`, `commentator_type`, `reaction`, `comment_id`) tramite `$comment->reactions()->firstOrCreate()`.
- Nessun evento, nessuna notifica, nessuna cache.

## Errori

- Nessuna eccezione propria; errori del DB risalgono al chiamante.

## Non fa

- Non autorizza: `CommentPolicy::react()` (`app/Policies/CommentPolicy.php` riga 44) esiste ma questa Action non la chiama.
- Non valida `$reaction` contro `comments.allowed_reactions`: lo fa solo `CommentWidget::toggleReaction()` (righe 158-161). Chi chiama `Comment::react()` da altrove puo' salvare qualunque stringa (colonna `string`, 255).
- Non rimuove una reazione esistente: il toggle e' del widget (`findReaction()` + `delete()`); per rimuovere c'e' [`DeleteCommentReactionAction`](delete-comment-reaction-action.md).

## Limiti noti

- **Senza utente salva una riga anonima.** Se `$commentator` e `auth()->user()` sono assenti, `commentator_id` e `commentator_type` sono `NULL` e `firstOrCreate()` cerca/crea
  quella riga con `IS NULL`: tutti gli ospiti condividono una sola riga per reazione e commento. `toggleReaction()` non controlla l'autenticazione
  (verificato nel sorgente, nessun test). L'invariante «un commentatore, una reazione» vale solo per gli utenti autenticati.
- Lo schema ha `deleted_at` (`create_reactions_table`, `hasSoftDeletes: true`) ma `Reaction` non usa `SoftDeletes`: la cancellazione e' fisica.
