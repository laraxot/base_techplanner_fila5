---
title: "Contratto — GetDaysMappingAction"
type: contract
action: "Modules\\UI\\Actions\\Datetime\\GetDaysMappingAction"
module: UI
status: accepted
created: 2026-11-26
updated: 2026-11-26
tags: [contract, action, datetime, opening-hours]
qmd: "GetDaysMappingAction giorni settimana lunedi sabato domenica esclusa orari di apertura OpeningHours locale Carbon"
---

# GetDaysMappingAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Sorgente: `app/Actions/Datetime/GetDaysMappingAction.php`.
Dice **quali giorni esistono** nel campo «orari di apertura»: chi la usa itera su questa mappa invece di nomi cablati. Chiamanti:
`Filament/Forms/Components/OpeningHoursField.php:27` (un blocco di campi per giorno), `Filament/Tables/Columns/OpeningHoursColumn.php:56` (riassunto «Lun 9-13» / «Lun chiuso»)
e `Rules/OpeningHoursRule.php:21` (validazione degli orari per giorno). Non scrive nulla.

## Input

- Nessun parametro.

## Output

- `array<string, string>`: chiave = nome inglese del giorno in minuscolo, valore = etichetta del giorno con l'iniziale maiuscola.
  Esempio con locale `it`: `['monday' => 'Lunedì', 'tuesday' => 'Martedì', ..., 'saturday' => 'Sabato']`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| UI-DAYS-INV-1 | La mappa ha sei voci, dal lunedì al sabato, in quest'ordine: la **domenica non c'è** (`getWeekdays()`, righe 46-53). | — (non dimostrato) |
| UI-DAYS-INV-2 | La chiave è il nome inglese del giorno (`format('l')`, riga 66), uguale in ogni lingua: è la chiave con cui gli orari sono salvati nei dati. | — (non dimostrato) |
| UI-DAYS-INV-3 | L'etichetta è il nome del giorno nella locale corrente di Carbon, con l'iniziale maiuscola (`isoFormat('dddd')`, riga 67). | — (non dimostrato) |
| UI-DAYS-INV-4 | Il risultato non dipende dalla data di oggi: cambia solo con la locale (si parte da `startOfWeek()` e si somma l'indice del giorno, righe 63-64). | — (non dimostrato) |

Test: nessun test dedicato. `tests/Unit/OpeningHoursRuleTest.php:46-49` la chiama per leggere la prima chiave e asserisce solo che la mappa non sia vuota: non prova nessuna delle regole sopra.

## Effetti collaterali

- Nessuno: legge solo l'orologio (`Carbon::now()`) e la locale di Carbon. Nessuna scrittura, nessuna cache, nessun evento.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non include la domenica: un orario di apertura per la domenica non si può inserire né validare con questi componenti (i tre chiamanti iterano solo su questa mappa).
- Non traduce le chiavi: solo le etichette seguono la lingua.
- Non permette di configurare quali giorni mostrare.

## Limiti noti

- Limite noto (dipende dalla locale): `startOfWeek()` senza argomento parte dal primo giorno della settimana della locale (`Carbon/Traits/Boundaries.php:282`, `firstWeekDay` da `first_day_of_week`).
  Per `it`, `en`, `de`, `es` è 1 (lunedì) e la mappa è quella descritta; per una locale con `first_day_of_week = 0` (per esempio `en_US`, `vendor/nesbot/carbon/src/Carbon/Lang/en_US.php`)
  la mappa partirebbe dalla domenica e salterebbe il sabato. Non si verifica con le quattro lingue del progetto; non c'è un test che lo fissi.
- La domenica esclusa non è documentata come scelta: da decidere con un umano se è intenzionale (negozi chiusi di domenica) o una lacuna.
