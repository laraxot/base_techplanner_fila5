---
title: "Contratto — SanitizeCommentHtmlAction"
type: contract
action: "Modules\\Comment\\Actions\\Content\\SanitizeCommentHtmlAction"
module: Comment
status: active
tags: [contract, action, comment, sicurezza, xss]
created: 2026-11-26
updated: 2026-11-26
---

# SanitizeCommentHtmlAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Content/SanitizeCommentHtmlAction.php`. Chiamante: `CommentConfigData::sanitizeCommentHtml()` (riga 140), a sua volta
chiamato da [`ProcessCommentAction`](process-comment-action.md). E' la difesa XSS dei commenti: l'HTML e' scritto da utenti e finisce nella pagina pubblica.
Action pura (nessuna scrittura), con contratto per il suo ruolo di sicurezza.

## Input

- `$text`: stringa HTML (il risultato dei transformer Markdown e menzioni).

## Output

- Stringa HTML sanificata (`Symfony\Component\HtmlSanitizer\HtmlSanitizer`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| COMMENT-SANITIZE-INV-1 | Gli elementi non sicuri (`<script>`) sono rimossi e gli elementi sicuri (`<p>`, `<strong>`) restano. Se cade, o si perde la formattazione o passa codice. | `COMMENT-SANITIZE-INV-1` |
| COMMENT-SANITIZE-INV-2 | Gli attributi ammessi sono solo quelli di `comments.allowed_attributes` per elemento (di default `a`: `href`, `target`, `rel`); un link `https://` con questi attributi sopravvive. | `COMMENT-SANITIZE-INV-2` |
| COMMENT-SANITIZE-INV-3 | Con `comments.mentions.enabled` vero, `span` ammette solo `data-mention` e `class`; con le menzioni spente `span` non e' esteso oltre `allowSafeElements()`. | — (non dimostrato) |

## Effetti collaterali

- Costruisce un `HtmlSanitizerConfig` a ogni chiamata (`allowRelativeLinks`, `allowRelativeMedias`, `allowSafeElements` e gli elementi di config). Nessuna scrittura, nessun I/O.

## Errori

- Nessuna eccezione propria; il sanitizer Symfony ripulisce l'input malformato invece di lanciare.

## Non fa

- Non converte Markdown ne' menzioni: sono i transformer, prima di questa Action.
- Non valida lunghezza ne' contenuto semantico del testo.
- Non sostituisce `SanitizeCommentTextAction` (`app/Actions/SanitizeCommentTextAction.php`), variante piu' vecchia che risolve `HtmlSanitizer` dal container: nessun chiamante in produzione, solo il suo test.

## Limiti noti

- Gli schemi ammessi per i link e il trattamento di `javascript:` sono quelli di default di Symfony `HtmlSanitizerConfig`: il contratto non li ridefinisce e nessun test li pinna sul sanitizer da solo; l'unica prova e' end-to-end (`COMMENT-PROCESS-INV-3`).
