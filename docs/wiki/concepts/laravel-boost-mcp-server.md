---
title: "Laravel Boost MCP Server"
type: concept
sources: 
  - "https://laravel.com/docs/13.x/boost"
  - "https://boost.laravel.com/installed"
  - "https://laravel.com/docs/12.x/boost"
created: 2026-04-28
updated: 2026-04-28
tags: [laravel-boost, mcp, ai-assisted, filament, livewire, pest]
related:
  - ../../docs/wiki/concepts/context-mode-mcp.md
  - ../../laravel/Modules/Geo/docs/wiki/concepts/coordinate-picker-state-binding-rule.md
---

# Laravel Boost MCP Server

## Overview

**Laravel Boost** è un MCP server (Model Context Protocol) sviluppato dal team Laravel che fornisce strumenti AI specializzati per lo sviluppo Laravel.

Instalato come package Composer: `laravel/boost` (v2)

## Installazione

### Passo 1: Installa package
```bash
composer require laravel/boost --dev
```

### Passo 2: Installazione guideline e MCP
```bash
php artisan boost:install
```

Questo comando:
- Genera file di configurazione MCP (`.mcp.json`)
- Crea guideline per coding agents (`CLAUDE.md`, `AGENTS.md`, `junie/`)
- Installa MCP server per editor supportati

## Strumenti Disponibili

### Core Application Tools

| Tool | Descrizione |
|------|-------------|
| `application-info` | PHP/Laravel versions, database, pacchetti, modelli Eloquent |
| `get-config` | Leggi configurazioni con dot notation |
| `list-available-config-keys` | Lista chiavi configurazione |
| `get-absolute-url` | Converti URL relative in assolute |

### Database Tools

| Tool | Descrizione |
|------|-------------|
| `database-query` | Query SQL in sola lettura (SELECT, SHOW, EXPLAIN, DESCRIBE) |
| `database-schema` | Schema completo DB con tabelle, colonne, indici, chiavi esterne |
| `database-connections` | Lista connessioni DB configurate |

### Development & Debugging Tools

| Tool | Descrizione |
|------|-------------|
| `tinker` | Esegui codice PHP nel contesto Laravel (come artisan tinker) |
| `last-error` | Dettagli ultimo errore/eccezione backend |
| `read-log-entries` | Leggi ultime N voci dal log applicazione |
| `browser-logs` | Leggi ultime N voci log console browser |

### Laravel Ecosystem Tools

| Tool | Descrizione |
|------|-------------|
| `list-artisan-commands` | Lista comandi Artisan con parametri |
| `list-routes` | Lista routes (incluso Folio) con filtri |
| `search-docs` | Ricerca semantica su 17.000+ punti documentazione Laravel |

### Feedback & Reporting

| Tool | Descrizione |
|------|-------------|
| `report-feedback` | Invia feedback su Boost o esperienza Laravel |

## Documentazione Search Best Practices

**`search-docs`** è lo strumento più potente di Laravel Boost:

1. **Usa search-docs PRIMA** di altri approcci per domande ecosistema Laravel
2. **Passa query multiple ampie** per risultati completi: `['authentication', 'middleware', 'routing']`
3. **Non includere nomi pacchetti** nelle query — info pacchetti rilevate automaticamente
4. **Usa ricerche basate su argomenti**: `'rate limiting'` non `'laravel 11 rate limiting'`
5. **Filtra per pacchetti** quando conosci specifici: `packages: ['laravel/framework', 'livewire/livewire']`

## Configurazione MCP

### File `.mcp.json` (auto-generato da `boost:install`)

```json
{
    "mcpServers": {
        "laravel-boost": {
            "command": "php",
            "args": ["artisan", "boost:mcp"]
        }
    }
}
```

### Registrazione manuale (se necessaria)

**Claude Code:**
```bash
claude mcp add -s local -t stdio laravel-boost php artisan boost:mcp
```

**Cursor:**
1. Apri command palette (`Cmd+Shift+P` o `Ctrl+Shift+P`)
2. Seleziona "/open MCP Settings"
3. Attiva toggle per `laravel-boost`

**VS Code / Codex:**
```bash
codex mcp add laravel-boost -- php "artisan" "boost:mcp"
```

## Versioni Supportate

Laravel Boost fornisce guide specifiche per versione:

- **Laravel Framework** (10.x, 11.x, 12.x)
- **Livewire** (2.x, 3.x)
- **Filament** (3.x, 4.x)
- **Inertia** (Laravel, React, Vue)
- **Pest** testing framework
- **Tailwind CSS** (3.x, 4.x)

## Best Practices

1. **Usa application-info PRIMA** per capire contesto progetto
2. **Sfrutta search-docs estensivamente** per informazioni accurate e specifiche per versione
3. **Usa tinker per test rapidi** invece di creare file temporanei
4. **Controlla log con read-log-entries e browser-logs** quando fai debugging
5. **Valida query database** con database-query prima di implementare
6. **Segnala problemi** via report-feedback per migliorare lo strumento

## Esempi di Utilizzo

### Scoprire il progetto
```bash
# Prima di tutto:
mcp__laravel-boost__application-info
# Restituisce: PHP version, Laravel version, pacchetti installati, tutti i modelli
```

### Lavorare con database
```bash
# Controlla schema prima di fare modifiche:
mcp__laravel-boost__database-schema

# Testa query in sicurezza:
mcp__laravel-boost__database-query query:"SELECT * FROM users LIMIT 5"
```

### Debugging
```bash
# Controlla errori:
mcp__laravel-boost__last-error

# Leggi log applicazione:
mcp__laravel-boost__read-log-entries entries:10

# Controlla console browser:
mcp__laravel-boost__browser-logs entries:5
```

### Sviluppo Laravel
```bash
# Lista comandi disponibili:
mcp__laravel-boost__list-artisan-commands

# Visualizza routes:
mcp__laravel-boost__list-routes

# Testa snippet codice:
mcp__laravel-boost__tinker code:"User::count()"
```

## Note Importanti

- **Pacchetto in beta**: Laravel Boost è attualmente in beta e riceve aggiornamenti frequenti
- **File auto-generati**: `.mcp.json`, `CLAUDE.md`, `AGENTS.md` sono rigenerati da `boost:install` — aggiungi al `.gitignore`
- **Version-aware**: `search-docs` rileva automaticamente i pacchetti installati e restituisce documentazione specifica per versione

## Cross-References

- **Installazione**: https://laravel.com/docs/13.x/boost
- **Strumenti disponibili**: https://boost.laravel.com/installed
- **GitHub**: https://github.com/laravel/boost
- **Context Mode MCP**: vedi `docs/wiki/concepts/context-mode-mcp.md`
- **Filament Custom Fields**: https://filamentphp.com/docs/5.x/forms/custom-fields

---
*Last updated: 2026-04-28*
