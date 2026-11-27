---
title: "Contratto — GetTaskFrequenciesAction"
type: contract
action: "Modules\\Job\\Actions\\GetTaskFrequenciesAction"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
---

# GetTaskFrequenciesAction

Sorgente: `app/Actions/GetTaskFrequenciesAction.php`. Limite noto: nessun chiamante in `Modules` o `Themes` (`rg` del 2026-11-26).

## Input

- Nessun parametro. Legge `config('totem.frequencies')`.

## Output

- `array<int|string, mixed>`: l'array di frequenze come configurato.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-FREQ-INV-1 | Se `totem.frequencies` è un array lo restituisce senza modifiche. | `JOB-FREQ-INV-1` |
| JOB-FREQ-INV-2 | Se non è un array lancia `Exception` (messaggio `[riga][classe]`), mai un array vuoto di ripiego. | `JOB-FREQ-INV-2` |
## Effetti collaterali

- Nessuno: legge solo la config.

## Errori

- `Exception` generica con `[riga][classe]` quando la config non è un array (INV-2).

## Non fa

- Non valida le espressioni di frequenza e non dipende dal pacchetto Totem se la chiave è definita altrove.
