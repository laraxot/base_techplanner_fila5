---
title: "Contratto — SaveTransAction"
type: contract
owner: Lang
status: accepted
updated: 2026-11-24
action: "Modules\\Lang\\Actions\\SaveTransAction"
qmd: "SaveTransAction salva chiave traduzione file lingua save_missing_translations isLocal persist pannello Lang LANG-SAVE"
---

# SaveTransAction

Scrive una chiave di traduzione nel file di lingua del modulo. Codice: `app/Actions/SaveTransAction.php:14-93`. Due ingressi: `execute` (filtrato) e `persist` (pubblico, non filtrato).

## Input

- `string $key`: `<modulo>::<gruppo>.<voce>...`.
- `int|string|array|Htmlable|null $data`: valore da scrivere.

## Output

- `void`.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-SAVE-INV-1` | `execute` non scrive se `Config::get('lang.save_missing_translations', app()->isLocal())` non e' `true`. Default: solo ambiente `local`. | `tests/Feature/SaveTransActionDefaultTest.php:57-99`; `tests/Feature/SaveTransActionRespectsSwitchTest.php:20,33`. |
| `LANG-SAVE-INV-2` | `persist` scrive sempre, senza il filtro: e' il percorso del pannello «Salva». | Test: nessuno dedicato. |
| `LANG-SAVE-INV-3` | Se il file esistente non si carica (`\Exception`), `persist` segnala con `report()` e non scrive, per non sostituire il file con la sola chiave nuova. | Test: nessuno dedicato. |
| `LANG-SAVE-INV-4` | Il percorso di scrittura e' il primo segmento del gruppo; la chiave scritta e' tutto cio' che segue il primo segmento della chiave. Una chiave senza `.` sostituisce l'intero file con `$data`, e se `$data` non e' array lancia `Exception('Error in SaveTransAction')`. | Test: nessuno. |

Nota su INV-1: `Modules/Lang/config/lang.php:211` contiene `save_missing_translations => true`, ma `XotBaseServiceProvider::registerConfig()` (righe 181-195) registra i file di config come `lang.<nome file>`, cioe' `lang.lang`, non `lang.save_missing_translations`. Quindi il default letto e' `isLocal()`. Da verificare con `config('lang.save_missing_translations')` a runtime.

## Effetti collaterali

- Se il file non esiste: scrittura di un array vuoto via `SaveArrayAction`, poi lettura, poi scrittura del contenuto aggiornato (due scritture).
- Nessun backup, nessuna pulizia cache.

## Errori

- `\Exception('Error in SaveTransAction')` se il contenuto finale non e' array.
- `report()` su file illeggibile (silenzioso per il chiamante).
- Eccezioni di `SaveArrayAction` si propagano.

## Non fa

- Non valida la chiave.
- Chiamanti verificati: `Filament/Resources/TranslationFileResource/Pages/EditTranslationFile.php`, `Xot/app/Filament/Traits/TransFuncTrait.php`, `Xot/app/Filament/Traits/NavigationLabelTrait.php`, `Ptv/app/Filament/Resources/BaseSchedaResource.php`, `Performance/app/Filament/Resources/IndividualeResource.php`, e `Actions/Filament/AutoLabelAction.php`.
