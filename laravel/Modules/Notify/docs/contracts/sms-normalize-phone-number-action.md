---
title: "Contratto — SMS\\NormalizePhoneNumberAction"
type: contract
action: "Modules\\Notify\\Actions\\SMS\\NormalizePhoneNumberAction"
module: Notify
status: accepted
tags: [contract, action, notify, sms, telefono, normalizzazione]
created: 2026-11-26
updated: 2026-11-26
---

# SMS\NormalizePhoneNumberAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SMS/NormalizePhoneNumberAction.php`. Normalizza un numero per gli
SMS provider: riconosce il formato internazionale e applica il prefisso `39` altrimenti.

## Input

- `string $phoneNumber`: numero grezzo (string, non nullable).

## Output

- `string`: `+<cifre>` internazionale.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-SMSNORM-INV-1 | Inizio con `+` o `00` → internazionale: le parentesre e i non-digits sono rimossi, i `+`/`00` iniziali non contano come zeri. Limite noto: coperti `+39…` e `+1…`; parentesi e prefisso `00` non sono asserite. | NOTIFY-SMSNORM-INV-1 |
| NOTIFY-SMSNORM-INV-2 | Numero senza prefisso internazionale → `39` anteposto se non c'e' gia', poi `+`. | NOTIFY-SMSNORM-INV-2 |
| NOTIFY-SMSNORM-INV-3 | `ltrim(..., '0')` dopo la pulizia: gli zeri iniziali sono sempre tolti. | — (non dimostrato) |
| NOTIFY-SMSNORM-INV-4 | Numero senza cifre dopo la pulizia → `Assert::notEmpty` fallisce (eccezione). | NOTIFY-SMSNORM-INV-4 |
| NOTIFY-SMSNORM-INV-5 | Funzione pura: nessun effetto collaterale. | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- `AssertionFailedException`: numero senza cifre residue.
- `preg_replace`/`preg_match` falliti → `Assert::string`.

## Non fa

- Non valida il numero: solo format.
- Non e' la variante generica: `Actions\NormalizePhoneNumberAction` (prefix `+39` su `0...`)
  ha regole diverse — usare quella per contesti non-SMS.
