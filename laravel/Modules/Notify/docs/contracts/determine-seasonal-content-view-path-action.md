---
title: "Contratto — DetermineSeasonalContentViewPathAction"
type: contract
action: "Modules\\Notify\\Actions\\DetermineSeasonalContentViewPathAction"
module: Notify
status: accepted
tags: [contract, action, notify, mail, stagionale, view]
created: 2026-11-26
updated: 2026-11-26
---

# DetermineSeasonalContentViewPathAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/DetermineSeasonalContentViewPathAction.php`. Sceglie il nome del
contenuto stagionale e lo converte in path di vista Blade (`sixteen::emails.*`).

## Input

- `string $defaultViewName = 'base-content'`: file name di fallback (senza estensione).

## Output

- `string`: path vista `sixteen::emails.{name}` dove `{name}` e' il file stagionale
  senza `.blade.php` (es. `christmas-content`, `easter-content`, `summer-content`,
  `halloween-content`) o `$defaultViewName`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-SEASON-INV-1 | Christmas: 1 dicembre → 10 gennaio → `christmas-content`. | — (non dimostrato) |
| NOTIFY-SEASON-INV-2 | Pasqua: da Venerdi' Santo a Pasquetta (computus) → `easter-content`. | — (non dimostrato) |
| NOTIFY-SEASON-INV-3 | Estate: 15 luglio → 31 agosto → `summer-content`. | — (non dimostrato) |
| NOTIFY-SEASON-INV-4 | Halloween: 25 ottobre → 1 novembre → `halloween-content`. Fuori da tutti i periodi → `$defaultViewName`. | — (non dimostrato) |
| NOTIFY-SEASON-INV-5 | L'output e' sempre `sixteen::emails.` + filename senza estensione: il namespace `sixteen` e' hardcoded. | — (non dimostrato) |

## Effetti collaterali

- Nessuno: calcolo puro su `Carbon::now()`.

## Errori

- Nessuna eccezione: `getEasterDate` e' un computus deterministico.

## Non fa

- Non verifica che la vista esista: il path e' restituito anche se il file manca.
- Non e' testabile a orologio fisso senza mockare `Carbon::now()` (nessun parametro data).
- Non copre tutte le festivita': solo i 4 periodi hardcoded.
