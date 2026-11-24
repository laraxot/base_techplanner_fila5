---
title: "GetAllBlocksAction — contratto"
type: contract
owner: UI
status: accepted
updated: 2026-11-24
action: "Modules\\UI\\Actions\\Block\\GetAllBlocksAction"
qmd: "GetAllBlocksAction elenco blocchi Filament Blocks moduli ComponentFileData glob"
---

# GetAllBlocksAction

Elenca i file dei blocchi Filament di tutti i moduli. Codice: `app/Actions/Block/GetAllBlocksAction.php:29-58`.

## Input

- Nessun parametro. Legge `config('modules.paths.generator.model.path')` e la cartella `Modules/*/<path>/../Filament/Blocks/*.php`.

## Output

- `DataCollection<int, ComponentFileData>`: uno per file, con `name`, `class`, `module`, `path`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `UI-BLOCKS-INV-1` | Sono considerati solo i file `*.php` in `Filament/Blocks` di ciascun modulo. | righe 31-33 | Test: nessuno |
| `UI-BLOCKS-INV-2` | Il `name` è lo snake case del basename della classe, senza il suffisso `_block`. | righe 39-46 | Test: nessuno |
| `UI-BLOCKS-INV-3` | Il `module` è il segmento tra `Modules\` e `\Filament\` del FQCN. | riga 48 | Test: nessuno |

## Effetti collaterali

Nessuno: sola lettura del filesystem (glob e risoluzione del nome classe). Nessuna scrittura o servizio esterno.

## Errori

- `Assert::string` fallisce se il config del path non è una stringa.
- `Safe\realpath` lancia se il percorso non è risolvibile: l'eccezione non è gestita.

## Non fa

- Non verifica che la classe trovata sia un blocco valido o istanziabile.
- Non usa cache: il glob è ripetuto a ogni chiamata.
