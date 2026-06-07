# No-RM Rename-to-Old Rule

REGOLA: mai `rm` su file con valore storico. Rinominare in `.old`.

## Vincoli

- VIETATO: `rm <file>`, `git rm <file>`, `unlink($path)` per file con valore storico
- OBBLIGATORIO: `mv <file> <file>.old` (o `git mv` per preservare history)

## Eccezioni (`rm` ammesso)

- File auto-generati: `bootstrap/cache/*.php`, `storage/framework/cache/**`, `node_modules/`, `vendor/`, build artifacts
- Temporanei: `.DS_Store`, `*.tmp`, `*.swp`
- Solo se l'utente dice esplicitamente "usa rm" o "elimina definitivamente"

## Interpretazione comandi utente

| Utente dice | Agente fa |
|---|---|
| cancella / rimuovi / elimina | rinomina in `.old` |
| usa rm / elimina definitivamente | usa `rm` |

In PHP: `rename($path, $path.'.old')` invece di `unlink($path)`.

Story 8-45
