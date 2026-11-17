---
title: No Absolute Paths in Git-Tracked Config Files
type: concept
tags: [config, portability, mcp, git]
---

# No Absolute Paths in Git-Tracked Config Files

## Regola

Mai usare percorsi assoluti in file di configurazione tracciati da git.

## Problema

```json
// .mcp.json con percorso assoluto — ROTTO su qualsiasi altro clone
"XDG_CONFIG_HOME": "/var/www/html/_bases/base_fixcity_fila5/.cache/qmd-config"
```

Chiunque cloni il progetto in `/home/user/fixcity/` o `/opt/projects/fixcity/` riceve una configurazione che punta a un percorso inesistente, spesso senza errore chiaro.

## Soluzione

Usare percorsi relativi rispetto alla posizione del file di configurazione:

```json
// .mcp.json è in laravel/ — .. risale alla root del progetto
"XDG_CONFIG_HOME": "../.cache/qmd-config",
"XDG_CACHE_HOME": "../.cache/qmd-cache",
"HOME": "../.cache/qmd-home"

// memory-bank path
"args": ["../.memory-bank"]
```

## Pattern consentiti

| Pattern | Esempio | Quando usarlo |
|---------|---------|---------------|
| Percorso relativo | `../` `./` | Sempre, per file locali al progetto |
| Variabile env | `${GITHUB_TOKEN}` | Per segreti iniettati a runtime |
| Path di sistema standard | `/tmp/` | Solo se documentato e cross-platform |

## Verifica

```bash
grep -r '/var/www\|/home/\|/Users/' laravel/.mcp.json 2>/dev/null
# Deve tornare 0 righe
```

## File corretti nel progetto

- `laravel/.mcp.json` — qmd env vars e memory-bank path ora relativi

## Enforcement operativo

- Se trovi path assoluti in config git-tracked, correggi immediatamente con path relativi.
- Per config in `laravel/`, usare `../` verso la root progetto.
- Mantenere la regola allineata in wiki root, wiki tema/modulo toccato e memoria operativa.
