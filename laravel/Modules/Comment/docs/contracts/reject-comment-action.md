---
title: "Contratto — RejectCommentAction"
type: contract
action: "Modules\\Comment\\Actions\\Comment\\RejectCommentAction"
tags: [contract, action, comment, moderazione]
module: Comment
status: active
created: 2026-11-24
updated: 2026-11-26
---

# RejectCommentAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Comment/RejectCommentAction.php`. Chiamanti: `Comment::reject()`, `CommentsTable` (Filament), pagina
Folio `resources/views/folio-moderation/comment-approval/reject/[Comment].blade.php` (link firmato nella mail al moderatore).

## Input

- Un `Comment` gia' salvato.

## Output

- Lo stesso `Comment` (ormai cancellato dal DB).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| COMMENT-REJECT-INV-1 | Rifiutare = cancellare la riga: il modello `Comment` non usa `SoftDeletes`, il commento non resta in archivio. Se cade (si introduce un soft delete), un commento rifiutato resterebbe nel DB e tra i partecipanti. | — (non dimostrato) |
| COMMENT-REJECT-INV-2 | `CommentRejectedEvent` parte dopo la cancellazione, con il commento in memoria. | — (non dimostrato) |

## Effetti collaterali

- `DELETE` della riga `comments` (cancellazione fisica; le `reactions` collegate vanno via con `cascadeOnDelete()` della chiave esterna `comment_id`, non per codice).
- Evento `CommentRejectedEvent`.

## Errori

- Nessuna eccezione propria; errori del DB risalgono al chiamante.

## Non fa

- Non notifica l'autore del commento.
- Non controlla i permessi (policy e firma del link sono dei chiamanti).
- Non distingue commenti in attesa da commenti gia' approvati: rifiuta (cancella) qualunque commento riceva.

## Limiti noti

- **Nessun test.** Nessun test del modulo (ne' di altri moduli) esegue `RejectCommentAction`: `ListCommentsTest` verifica solo che l'azione `reject` esista nella tabella Filament. Entrambe le invarianti sono promesse dal codice, non provate.
- **La tabella ha `deleted_at`** (`create_comments_table`, `hasSoftDeletes: true`) e il docblock del modello dichiara `$deleted_at`, ma `Comment` non usa il trait `SoftDeletes`: oggi `delete()` e' fisico. Chi aggiungesse il trait cambierebbe la promessa INV-1.
- Il link di rifiuto nella mail ai moderatori e' firmato e dura una settimana (`BuildCommentRejectUrlAction`: `URL::signedRoute(..., now()->addWeek())`); la pagina Folio esegue la Action su POST
  senza altro controllo oltre `middleware(['signed'])`: chi ha la mail puo' rifiutare senza login.
- Il doppione `app/Actions/RejectCommentAction.php` e' marcato `@deprecated` nel docblock; resta da cancellare.
