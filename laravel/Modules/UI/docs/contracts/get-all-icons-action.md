---
title: "Contratto — GetAllIconsAction"
type: contract
action: "Modules\\UI\\Actions\\Icon\\GetAllIconsAction"
module: UI
status: accepted
created: 2026-11-26
updated: 2026-11-26
tags: [contract, action, icons, blade-icons, filesystem]
qmd: "GetAllIconsAction icone blade-icons set svg reflection sets IconPicker SvgExistsAction"
---

# GetAllIconsAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Sorgente: `app/Actions/Icon/GetAllIconsAction.php`.
Elenca tutte le icone SVG dei set registrati in `blade-ui-kit/blade-icons`, leggendo il filesystem. Chiamanti: `Filament/Forms/Components/IconPicker.php:23` (menu dei set e delle icone)
e `Modules/Media/app/Actions/Image/SvgExistsAction.php:36` (esiste un SVG con questo nome?). Solo lettura.

## Input

- `string $_context = 'form'`: accettato e **ignorato** (riga 27; nome con il trattino basso per il linter).

## Output

- `array<string, array<string, mixed>>`: una voce per ogni set registrato. Chiave = nome del set. Valore = la configurazione del set di blade-icons (`paths`, `prefix`, ...) più
  `name` (il nome del set) e `icons` (`list<string>` dei nomi completi: `<prefisso>-<nome>`, oppure solo `<nome>` se il set non ha prefisso).
  Array vuoto se i set non sono leggibili.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| UI-ICONS-INV-1 | Ogni file SVG sotto i percorsi del set è elencato come `<prefisso>-<nome del file senza .svg>` (righe 80-90). | `UI-ICONS-INV-1` (solo il caso con prefisso; il caso senza prefisso non è provato) |
| UI-ICONS-INV-2 | Sono elencati solo i file con estensione `svg`; `.txt`, `.png` e simili sono ignorati (righe 75-78). | `UI-ICONS-INV-2` |
| UI-ICONS-INV-3 | Le sottocartelle sono appiattite col punto: `gruppo/annidata.svg` diventa `<prefisso>-gruppo.annidata` (righe 81-85). | `UI-ICONS-INV-3` |
| UI-ICONS-INV-4 | C'è una voce per ogni set registrato (anche quelli già presenti nel progetto, non solo quello di prova) e il suo `name` è la chiave del set (righe 48-58, 93-94). | `UI-ICONS-INV-4` |
| UI-ICONS-INV-5 | `$_context` non cambia il risultato: `execute('form')` e `execute('table')` danno lo stesso elenco. | `UI-ICONS-INV-5` |
| UI-ICONS-INV-6 | Se la proprietà `sets` della factory non è leggibile (eccezione della reflection) o non è iterabile, il risultato è `[]` e non viene lanciata nessuna eccezione (righe 32-44). | — (non dimostrato) |

Test: `tests/Unit/GetAllIconsActionTest.php` (set reali su una cartella temporanea, nessun mock della factory); i group sono stati aggiunti il 2026-11-26. Nessun test per INV-6.

## Effetti collaterali

- Legge la proprietà privata `sets` di `BladeUI\Icons\Factory` per reflection (`setAccessible(true)`, righe 33-36) e percorre ricorsivamente ogni cartella del set (`File::allFiles`, riga 74).
- Nessuna scrittura, nessun evento, nessuna cache: a ogni chiamata rilegge tutti i file dei set (costo proporzionale al numero di icone installate).

## Errori

- `Symfony\Component\Finder\Exception\DirectoryNotFoundException` se un percorso del set non esiste (`File::allFiles` → `Finder::in`, `vendor/symfony/finder/Finder.php:667`): non è catturata e risale ai chiamanti.
- Un `\Exception` della reflection è assorbito e diventa `[]` (INV-6). Un `\Error` (per esempio un `TypeError`) non è catturato.

## Non fa

- Non controlla che l'SVG sia valido né che il percorso del set sia leggibile prima di scandirlo.
- Non filtra per modulo, tema o permessi: elenca ogni set registrato.
- Non usa `$_context`: non esistono elenchi diversi per «form» e «table».
- Non mette in cache.
- Non usa l'API pubblica di blade-icons: dipende dal nome di una proprietà privata.

## Limiti noti

- Limite noto: il nome privato `sets` appartiene a una libreria di terze parti. Se un aggiornamento lo rinomina, la reflection fallisce e l'Action risponde `[]` senza errori: `IconPicker` mostrerebbe zero set e `SvgExistsAction` non troverebbe nessun SVG. Nessun test lo segnala (INV-6 non provata).
- `SvgExistsAction.php:41` asserisce che ogni voce abbia la chiave `icons`; l'Action non la scrive quando `paths` non è iterabile (righe 63-65). Con i set registrati da blade-icons `paths` è sempre un array, quindi non si verifica.
