---
title: "Contratto — NormalizePhoneNumberAction"
type: contract
action: "Modules\\Notify\\Actions\\NormalizePhoneNumberAction"
module: Notify
status: accepted
tags: [contract, action, notify, telefono, normalizzazione]
created: 2026-11-26
updated: 2026-11-26
---

# NormalizePhoneNumberAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/NormalizePhoneNumberAction.php`. Normalizza un numero di telefono
in formato E.164 grezzo, con prefisso `+39` di default per i numeri locali.

## Input

- `?string $phoneNumber`: numero grezzo.

## Output

- `string`: numero normalizzato, o `''` se input `null`/vuoto o `preg_replace` fallisce.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-NORMPHONE-INV-1 | `null` o `''` → sempre `''`, mai eccezione. | — (non dimostrato) |
| NOTIFY-NORMPHONE-INV-2 | Solo cifre e `+` sopravvivono: tutti gli altri caratteri sono rimossi. | — (non dimostrato) |
| NOTIFY-NORMPHONE-INV-3 | `00...` → `+...` (senza prefisso 39); `0...` → `+39...` (prefisso italiano hardcoded); qualunque altro senza `+` → anteposto `+`. | — (non dimostrato) |
| NOTIFY-NORMPHONE-INV-4 | Funzione pura: nessun effetto collaterale. | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- Nessuna eccezione: input non valido → `''`.

## Non fa

- Non valida che il numero esista o sia raggiungibile: solo formato.
- Non usa `libphonenumber`: il prefisso `+39` e' hardcoded (progetto Italia).
- Non e' la variante SMS: `Actions\SMS\NormalizePhoneNumberAction` ha regole diverse
  (rimuove zeri iniziali, prefisso 39 se non internazionale).
