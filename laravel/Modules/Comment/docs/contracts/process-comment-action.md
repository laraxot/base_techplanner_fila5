---
title: "Contratto — ProcessCommentAction"
type: contract
action: "Modules\\Comment\\Actions\\Comment\\ProcessCommentAction"
module: Comment
status: active
tags: [contract, action, comment, sicurezza, xss]
created: 2026-11-26
updated: 2026-11-26
---

# ProcessCommentAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Comment/ProcessCommentAction.php`. Chiamante unico: `RunCommentSavingPipelineAction` (riga 17), agganciata all'evento
`saving` del modello (`Comment::booted()`, `app/Models/Comment.php` righe 74-78): gira a **ogni** salvataggio di un commento, non solo alla creazione.
Trasforma il testo scritto dal cittadino (`original_text`) in quello mostrato (`text`) ed e' l'ultimo passo prima che l'HTML arrivi alla pagina pubblica.

## Input

- Un `Comment` (anche non ancora salvato) con `original_text` valorizzato.

## Output

- `void`. Modifica in memoria la proprieta' `text` del `Comment`; non lo salva.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| COMMENT-PROCESS-INV-1 | Senza transformer configurati `text` parte da `original_text` (copia). | `COMMENT-PROCESS-INV-1` |
| COMMENT-PROCESS-INV-2 | Con i transformer di default (`MarkdownToHtmlTransformer`, `MentionsTransformer`) `text` e' l'HTML derivato da `original_text` (il Markdown `**x**` diventa `<strong>x</strong>`). | `COMMENT-PROCESS-INV-2` |
| COMMENT-PROCESS-INV-3 | Qualunque cosa producano i transformer, `text` passa sempre dal sanitizer (`CommentConfigData::sanitizeCommentHtml()`) prima di essere salvato: nel testo salvato non restano `<script`, attributi `on*` ne' link `javascript:`. Se cade, XSS persistente sulla pagina pubblica. | `COMMENT-PROCESS-INV-3` |
| COMMENT-PROCESS-INV-4 | `original_text` non viene mai riscritto: la sorgente del cittadino resta com'e'. | — (non dimostrato) |

## Effetti collaterali

- Esegue in ordine ogni transformer di `comments.comment_transformers` (`handle($comment)`), che scrivono su `$comment->text`.
- Se nessun transformer e' configurato, copia `original_text` in `text`.
- Applica `SanitizeCommentHtmlAction` (vedi [contratto](sanitize-comment-html-action.md)) al `text` finale.
- Nessuna scrittura su DB, nessun evento, nessuna notifica: il salvataggio e' del chiamante.

## Errori

- `InvalidArgumentException` (Webmozart `Assert`) se `comments.comment_transformers` contiene una classe che non implementa `CommentTransformer`, o se `comments.comment_sanitizer` non e' una `SanitizeCommentHtmlAction` (`CommentConfigData::commentTransformers()` / `sanitizeCommentHtml()`). Protegge INV-3: una config sbagliata blocca il salvataggio, non lo lascia senza sanitizer.

## Non fa

- Non salva il commento e non decide se e' approvato (quello e' di `ShouldAutomaticallyApproveCommentAction` / `ApproveCommentAction`).
- Non valida lunghezza o vuoto del testo: lo fa il form dei widget (`CommentTextForm`).
- Non rimuove dal testo contenuti offensivi o spam: sanifica l'HTML, non modera.

## Limiti noti

- **Rielaborazione a ogni `saving`.** Anche l'approvazione (`ApproveCommentAction` fa `update(['approved_at' => ...])`) riesegue la pipeline: `text` viene ricalcolato da `original_text`. Una modifica manuale di `text` nel DB si perde al primo salvataggio.
- La pipeline e' in `RunCommentSavingPipelineAction`, che oltre a questa Action imposta `post_id` e `user_id` a `0` se la tabella ha quelle colonne e sono nulle (righe 33-39): residuo di compatibilita', fuori da questo contratto.
- INV-3 e' provato in modo end-to-end dal widget (`CommentsWidgetFrontOfficeTest`), non su questa Action da sola.
