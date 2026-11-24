---
title: "Contratto — CleanPlaceholderTranslationsAction"
type: contract
owner: Lang
status: accepted
updated: 2026-11-24
action: "Modules\\Lang\\Actions\\CleanPlaceholderTranslationsAction"
qmd: "CleanPlaceholderTranslationsAction segnaposto helper_text placeholder label uguale al nome campo file lingua pulizia LANG-CLEAN"
---

# CleanPlaceholderTranslationsAction

Toglie dai file di lingua le traduzioni segnaposto (uguali al nome del campo che le contiene). Codice: `app/Actions/CleanPlaceholderTranslationsAction.php:24-147`.

## Input

- `string $directory`: radice da scandire ricorsivamente. Se non e' una directory, nessun effetto.
- `bool $dryRun = false`: se vero, calcola senza scrivere ne' cancellare.

## Output

- `array{files: list<string>, removed: int}`: percorsi dei file toccati (o da toccare) e numero di voci rimosse. Le voci svuotate dalla pulizia contano anche loro.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-CLEAN-INV-1` | Un file che non e' solo dati (`isPureData()` falso: variabili, funzioni, `new`, `use`, operatori, stringhe interpolate) non viene mai riscritto (righe 57-59). | `tests/Feature/CleanPlaceholderTranslationsActionTest.php:15` (titolo: «toglie i segnaposto uguali al nome del campo e lascia le traduzioni vere»). |
| `LANG-CLEAN-INV-2` | Rimuove solo chiavi in `PLACEHOLDER_TYPES` (`helper_text`, `placeholder`, `description`, `tooltip`, `label`, `heading`, `hint`) il cui valore stringa e' uguale alla chiave padre stringa. Le chiavi della radice del file non vengono mai ripulite (`parent` nullo). | Stesso test, :15. |
| `LANG-CLEAN-INV-3` | Con `dryRun` non scrive ne' cancella; i conteggi restituiti sono quelli che la run reale produrrebbe. | Test: nessuno. |
| `LANG-CLEAN-INV-4` | Directory inesistente: `['files' => [], 'removed' => 0]`. | Test: nessuno. |

## Effetti collaterali

- Per ogni `.php` valido: riscrittura del file con `file_put_contents` in forma `<?php\n\ndeclare(strict_types=1);\n\nreturn [...];\n` (riga 72). Commenti e formattazione originali si perdono.
- File chiamato esattamente `.php` (senza nome): cancellato con `unlink` (riga 51), senza dryRun.
- Nessun backup, nessuna transazione, nessuna cache toccata.

## Errori

- Le funzioni `Safe\file_get_contents`, `Safe\file_put_contents`, `Safe\unlink` lanciano `Safe\Exception` su errore I/O: nessuna gestione locale.
- `include` di un file di soli dati non e' protetto da `try`.

## Non fa

- Non crea backup prima di riscrivere.
- Non tocca file che contengono codice, anche se contengono traduzioni.
- Chiamante verificato: `Console/Commands/CleanPlaceholderTranslationsCommand.php`.
