---
title: "Contratto — SendSmsAction"
type: contract
action: "Modules\\Notify\\Actions\\SMS\\SendSmsAction"
module: Notify
status: accepted
tags: [contract, action, notify, sms, dispatcher, engine]
created: 2026-11-26
updated: 2026-11-26
---

# SendSmsAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SMS/SendSmsAction.php`. Dispatcher legacy (ex `SmsService`) verso
`Actions\SMS\SmsEngines\{Driver}Engine` via reflection: `make()` → `setLocalVars()` →
`send()` → `getVars()`.

## Input

- `array<string, mixed> $vars`: variabili; `to`, `from`, `body` (stringhe) diventano le
  proprieta' pubbliche omonime e sono mergeate in `$this->vars`.
- `string $driver = 'netfun'`: nome del motore.

## Output

- `array<string, mixed>`: `$this->vars` dopo l'invio (incluse le chiavi stringa del
  `getVars()` dell'engine).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-SMSDISP-INV-1 | Il nome engine e' `\\Modules\\Notify\\Actions\\SMS\\SmsEngines\\{Studly}Engine`: namespace senza engine popolati → `RuntimeException` su `class_exists`. Limite noto: il test prova la `RuntimeException` senza engine, non il nome dell'engine costruito. | NOTIFY-SMSDISP-INV-1 |
| NOTIFY-SMSDISP-INV-2 | L'engine deve avere `make()` statico e i metodi `setLocalVars`, `send`, `getVars`: altrimenti `RuntimeException`. | — (non dimostrato) |
| NOTIFY-SMSDISP-INV-3 | La chiamata e' per reflection (`ReflectionClass::getMethod()->invoke`), non per interfaccia: il docblock dichiara che il comportamento e' preservato as-is dal Service. | — (non dimostrato) |
| NOTIFY-SMSDISP-INV-4 | Solo chiavi stringa del risultato `getVars()` entrano in `$this->vars`. | — (non dimostrato) |

## Effetti collaterali

- Quelli dell'engine risolto (oggi nessuno: il namespace `SmsEngines` e' vuoto e l'azione
  lancia sempre `RuntimeException`).

## Errori

- `RuntimeException`: engine mancante, `make()` assente, metodi mancanti, `ReflectionException`.

## Non fa

- Non implementa motori: e' solo il dispatcher.
- Non usa `SmsActionContract`: i provider concreti (`Send*SMSAction`) implementano
  `SmsData`-based contract, non questo flusso a variabili.
