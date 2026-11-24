---
title: "Contratto — AutoLabelAction"
type: contract
owner: Lang
status: accepted
updated: 2026-11-24
action: "Modules\\Lang\\Actions\\Filament\\AutoLabelAction"
qmd: "AutoLabelAction etichetta automatica Filament componente chiave traduzione chiamante stack debug_backtrace label helperText icon LANG-AUTOLABEL"
---

# AutoLabelAction

Applica al componente Filament l'etichetta (o helper text, placeholder, icona) presa dal file di lingua, con chiave derivata dalla classe chiamante. Codice: `app/Actions/Filament/AutoLabelAction.php:24-267`.

## Input

- `Field|Entry|BaseFilter|Column|Step|Action|Section $component`.
- `string $type = 'label'`: nome del metodo Filament da chiamare (`label`, `helperText`, `icon`, ...).

## Output

- Lo stesso `$component`, modificato o no.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-AUTOLABEL-INV-1` | La chiave base viene dalla prima classe `Modules\*` non astratta dello stack (`findCallerFrame`, righe 61-90) tramite `GetTransKeyAction`. Senza chiamante: `lang::txt`. Cambiare lo stack cambia i nomi dei file di lingua. | Fixture `tests/Fixtures/AutoLabelNullCallerStub.php`, `AutoLabelForcedKeyStub.php`, `AutoLabelStaticCaller.php`, `AutoLabelExecuteNestedCaller.php`; riferimenti in `LangCoverageGapsTest.php`, `LangFinalGapsTest.php`. |
| `LANG-AUTOLABEL-INV-2` | Componente senza padrone identificabile: restituito senza alcuna scrittura (righe 116-141). | Stessa fixture `AutoLabelNullCallerStub`. |
| `LANG-AUTOLABEL-INV-3` | Per `type` diverso da `label` e `icon` (testo d'aiuto, placeholder, descrizione) il valore di default e' vuoto e non viene persistito (righe 191-193, 200). | Test: nessuno dedicato. |
| `LANG-AUTOLABEL-INV-4` | Sezione senza titolo: segmento `sections.empty.label`, valore salvato vuoto (righe 160-167). | Test: nessuno dedicato. |

## Effetti collaterali

- Persiste la chiave mancante solo per `type = label`, tramite `SaveTransAction` (che scrive solo se il gate e' attivo).
- `SvgExistsAction` per le icone: lettura filesystem.
- `debug_backtrace()` ad ogni chiamata: costo runtime.

## Errori

- Nessun `try`. `new \ReflectionClass($class)` lancia se la classe non esiste (riga 80). `Assert::string` lancia su label di Step o nome non stringa.
- Un'etichetta non stringa diventa `label('FIX:<chiave>')` (riga 212).

## Non fa

- Non valida `$type`: il nome del metodo viene usato dinamicamente.
- Il numero `2` in `array_slice` (riga 64) e' magico: sostituirlo con un criterio cambia le chiavi, quindi i file su disco. Il docblock lo dice esplicitamente.
- Non traduce il valore di default: lo salva com'e'.
- Registrazione: `Providers/LangServiceProvider.php`.
