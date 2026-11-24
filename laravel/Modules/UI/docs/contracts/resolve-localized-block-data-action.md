---
title: "ResolveLocalizedBlockDataAction — contratto"
type: contract
owner: UI
status: accepted
updated: 2026-11-24
action: "Modules\\UI\\Actions\\Block\\ResolveLocalizedBlockDataAction"
qmd: "ResolveLocalizedBlockDataAction dati block localizzati delega Cms view params"
---

# ResolveLocalizedBlockDataAction

Risolve i parametri di vista di un blocco delegando a `Modules\Cms` se presente. Codice: `app/Actions/Block/ResolveLocalizedBlockDataAction.php:24-59`.

## Input

- `array<string, mixed> $viewParams`: parametri della vista del blocco.

## Output

- `array<string, mixed>`: i parametri risolti dal Cms, oppure gli stessi `$viewParams` in ingresso.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `UI-RESBLOCK-INV-1` | Se la classe Cms non esiste o non ha `execute`, restituisce `$viewParams` invariati. | righe 28-34 | Test: nessuno diretto |
| `UI-RESBLOCK-INV-2` | Se il Cms restituisce un non-array, restituisce `$viewParams` invariati. | riga 39 | Test: nessuno diretto |
| `UI-RESBLOCK-INV-3` | Se il risultato è un array con una chiave non stringa, lancia `UnexpectedValueException`. | righe 51-53 | Test: nessuno diretto |

## Effetti collaterali

Dipendono dal Cms: l'Action stessa non scrive nulla. Eventuali effetti dell'`execute` del Cms non sono descritti qui.

## Errori

- `UnexpectedValueException` se il Cms restituisce chiavi non stringa.

## Non fa

- Non dichiara la dipendenza da `Modules\Cms`: il nome è una stringa, il legame è a runtime.
- I test del modulo usano uno stub della classe Cms (`tests/Unit/Helpers/UiCoverageMissHelpers.php`), non il Cms reale.
