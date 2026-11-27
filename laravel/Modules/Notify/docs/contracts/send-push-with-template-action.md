---
title: "Contratto — SendPushWithTemplateAction"
type: contract
action: "Modules\\Notify\\Actions\\Push\\SendPushWithTemplateAction"
module: Notify
status: accepted
tags: [contract, action, notify, push, template]
created: 2026-11-26
updated: 2026-11-26
---

# SendPushWithTemplateAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Push/SendPushWithTemplateAction.php`. Invia push da template
predefiniti (`ticket_created`, `ticket_updated`, `ticket_resolved`) con sostituzione
`{{variabile}}` in title/body.

## Input

- `string $templateId`: id del template (tre hardcoded).
- `array $tokens`: lista device token.
- `array<string, mixed> $variables`: valori per `{{key}}` in title/body.

## Output

- Mappa per piattaforma di `SendPushToDevicesAction`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-PUSHTPL-INV-1 | Template sconosciuto → `Exception("Template {id} not found")`, nessun invio. Limite noto: il test controlla `Exception`, non il messaggio. | NOTIFY-PUSHTPL-INV-1 |
| NOTIFY-PUSHTPL-INV-2 | Solo 3 template esistono (`ticket_created`, `ticket_updated`, `ticket_resolved`): sono hardcoded nel metodo, non in DB. | — (non dimostrato) |
| NOTIFY-PUSHTPL-INV-3 | Le variabili sostituiscono `{{key}}` (con doppie graffe) solo in `title` e `body`, non in `data`/`icon`. | — (non dimostrato) |
| NOTIFY-PUSHTPL-INV-4 | `data.type` del payload e' il nome del template (`ticket_created` ecc.). | — (non dimostrato) |

## Effetti collaterali

- Quelli di `SendPushToDevicesAction` (HTTP FCM, log simulato APNs/WebPush).

## Errori

- `Exception`: template sconosciuto.

## Non fa

- Non legge template dal DB: e' una tabella interna fissa.
- Non valida `$variables`: un placeholder non sostituito resta `{{key}}` nel testo.
