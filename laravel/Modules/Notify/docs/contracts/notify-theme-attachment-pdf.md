---
title: "Contratto — NotifyTheme\\Attachment\\Pdf"
type: contract
action: "Modules\\Notify\\Actions\\NotifyTheme\\Attachment\\Pdf"
module: Notify
status: accepted
tags: [contract, action, notify, theme, pdf, allegato]
created: 2026-11-26
updated: 2026-11-26
---

# NotifyTheme\Attachment\Pdf

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/NotifyTheme/Attachment/Pdf.php`. Genera un PDF da un `NotifyTheme`
(tipo `pdf`) e lo restituisce come `AttachmentData` pronto per `MailMessage::attach`.

## Input

- `string $post_type`: `post_type` del tema da renderizzare.
- `array<string, mixed> $view_params`: parametri del tema (e possibile override del filename:
  se esiste `$view_params[$file_name]` viene usato come nome file).

## Output

- `AttachmentData` con `path` (file su `Storage::disk('cache')`), `as` (nome file),
  `mime = 'application/pdf'`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-THEME-PDF-INV-1 | Il filename e' `Str::slug(subject).'.pdf'`, con override da `$view_params[$file_name]` se presente. | — (non dimostrato) |
| NOTIFY-THEME-PDF-INV-2 | Il tema si risolve via `NotifyTheme\Get` con `type='pdf'`: subject/body escono interpolati. | — (non dimostrato) |
| NOTIFY-THEME-PDF-INV-3 | Il PDF e' scritto su disco `cache` (`Storage::disk('cache')->path($file_name)`), portrait (`pdforientation='P'`), formato file (`out='file'`). | — (non dimostrato) |
| NOTIFY-THEME-PDF-INV-4 | Il `mime` restituito e' sempre `application/pdf`. | — (non dimostrato) |

## Effetti collaterali

- `Get` puo' creare/aggiornare la riga `notify_themes`.
- `HtmlToPdfAction` scrive il file PDF su disco (`cache`).

## Errori

- `AssertionFailedException` se il filename risolto non e' stringa.
- Errori del renderer PDF propagano da `HtmlToPdfAction`.

## Non fa

- Non allega da solo: restituisce `AttachmentData`, l'attach e' di `BuildMailMessageAction`.
- Non cancella il file generato: la cleanup del disco `cache` e' esterna.
