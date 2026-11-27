---
title: "Contratto — LogSimulatedPushDeliveryAction"
type: contract
action: "Modules\\Notify\\Actions\\Push\\LogSimulatedPushDeliveryAction"
module: Notify
status: accepted
tags: [contract, action, notify, push, simulazione, log]
created: 2026-11-26
updated: 2026-11-26
---

# LogSimulatedPushDeliveryAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Push/LogSimulatedPushDeliveryAction.php`. Traccia nel log l'invio
push simulato per `apns`/`webpush`, che non hanno transport reale.

## Input

- `string $platform`: `apns` o `webpush`.
- `string $target`: device token o nome topic (viene troncato a 12 caratteri: dato sensibile).
- `array<string, mixed> $payload`: payload che sarebbe stato consegnato.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-SIMPUSH-INV-1 | Scrive sempre `Log::notice("Push {platform} simulato: transport non implementato, nessun invio reale.")` — mai un invio HTTP. Limite noto: il test prova `Log::notice` con `platform` nel contesto, non il testo del messaggio né l'assenza di richieste HTTP. | NOTIFY-SIMPUSH-INV-1 |
| NOTIFY-SIMPUSH-INV-2 | Il `target` nel log e' troncato a 12 caratteri (`Str::limit`): il token completo non finisce nei log. | — (non dimostrato) |
| NOTIFY-SIMPUSH-INV-3 | `payload` e' registrato per intero nel contesto del log. | — (non dimostrato) |

## Effetti collaterali

- Una riga `Log::notice` sul canale di default.

## Errori

- Nessuna eccezione prevista.

## Non fa

- Non consegna nulla: e' una simulazione dichiarata.
- Non valida platform/payload: accetta stringhe e array qualunque.
- Non e' il punto di ingresso per `fcm` (quello ha transport reale).
