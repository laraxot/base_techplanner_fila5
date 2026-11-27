---
title: "Contratto — BuildMailMessageAction"
type: contract
action: "Modules\\Notify\\Actions\\BuildMailMessageAction"
module: Notify
status: accepted
tags: [contract, action, notify, mail, message, theme]
created: 2026-11-26
updated: 2026-11-26
---

# BuildMailMessageAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/BuildMailMessageAction.php`. Costruisce il `MailMessage` Laravel
da un `NotifyTheme` (via `NotifyTheme\Get`) con from/subject/view e allegati opzionali.

## Input

- `string $name`: `post_type` del tema (`email`).
- `Model $model`: model i cui attributi sono mergiati in `view_params` (prima fonte).
- `array<string, mixed> $view_params`: parametri extra (sovrascrivono quelli del model).
- `?array<int, AttachmentData> $attachments`: allegati (`path`, `as`, `mime`).

## Output

- `Illuminate\Notifications\Messages\MailMessage` con `from`, `subject`, `view('notify::email', $viewParams)` e `attach` per ogni allegato.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-MAILMSG-INV-1 | `view_params` = `array_merge($model->toArray(), $view_params)`: i parametri espliciti vincono sugli attributi del model. | — (non dimostrato) |
| NOTIFY-MAILMSG-INV-2 | Il tema si risolve con `type='email'` via `NotifyTheme\Get`: subject/body escono con i segnaposto `##chiave##` gia' interpolati. | — (non dimostrato) |
| NOTIFY-MAILMSG-INV-3 | `subject` esplicito in `view_params` vince su `$theme->subject`. | — (non dimostrato) |
| NOTIFY-MAILMSG-INV-4 | `body_html` e `subject` passano da `decodeRichText`: entita' HTML decodificate e fix ISO-8859-1 → UTF-8 (rilevato da `Ã`/`Â` o `mb_check_encoding`). | — (non dimostrato) |
| NOTIFY-MAILMSG-INV-5 | La view e' sempre `notify::email`; gli allegati sono attaccati in ordine con `as`/`mime` da `AttachmentData`. | — (non dimostrato) |

## Effetti collaterali

- `NotifyTheme\Get` puo' scrivere `notify_themes` (creazione lazy).
- Nessun invio: l'`MailMessage` e' solo il payload per la Notification.

## Errori

- Errori di `Get` (DB) propagano; `html_entity_decode`/`mb_convert_encoding` non lanciano.

## Non fa

- Non invia la mail: produce il messaggio per `GenericNotification`/`MailMessage`.
- Non valida gli allegati: `AttachmentData` e' assunta integra.
