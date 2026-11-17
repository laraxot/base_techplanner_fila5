---
title: context-mode MCP Server
description: MCP server per ottimizzazione context window via sandboxing SQLite — riduzione token fino al 98%
type: concept
---

# context-mode MCP Server

**Repository:** https://github.com/mksglu/context-mode  
**Installazione:** `npm install -g context-mode` (o `npx -y context-mode`)  
**Stato progetto:** installato e configurato (verificato runtime 2026-04-22)

## Cos'è

`context-mode` è un MCP (Model Context Protocol) server che ottimizza la finestra di contesto via **sandboxing SQLite**. Riduce il consumo di token fino al 98% isolando il codice e l'output in sandbox indicizzate invece di includerli direttamente nel contesto.

## Configurazione nel progetto

Configurato in Claude Code sia come plugin project sia come MCP server diretto. Per il repo e' presente anche in `laravel/.mcp.json`:

```json
"context-mode": {
    "command": "npx",
    "args": ["-y", "context-mode"]
}
```

Verifica Claude Code del 2026-04-22:

- `plugin:context-mode:context-mode` -> connected
- `context-mode: npx -y context-mode` -> connected
- plugin `context-mode@context-mode` versione `1.0.89`, scope project, enabled

## Tools disponibili

### Sandbox tools (risparmio token principale)

| Tool | Funzione |
|------|---------|
| `ctx_execute` | Esegue codice in sandbox isolata |
| `ctx_batch_execute` | Esecuzioni batch in parallelo |
| `ctx_execute_file` | Esegue file dal filesystem in sandbox |
| `ctx_index` | Indicizza contenuto in SQLite per ricerca rapida |
| `ctx_search` | Ricerca full-text nell'indice SQLite |
| `ctx_fetch_and_index` | Fetch URL + indicizzazione immediata |

### Meta-tools (gestione)

| Tool | Funzione |
|------|---------|
| `ctx_stats` | Statistiche uso sandbox e token saved |
| `ctx_doctor` | Diagnostica configurazione |
| `ctx_upgrade` | Aggiornamento context-mode |
| `ctx_purge` | Pulizia sandbox e indice |
| `ctx_insight` | Analisi pattern di utilizzo |

## Quando usarlo

- Task che leggono molti file → usa `ctx_index` + `ctx_search` invece di Read massiccio
- Esecuzione comandi con output verboso → usa `ctx_execute` per sandboxing
- Fetch documentazione esterna → usa `ctx_fetch_and_index` per non gonfiare il contesto

## Verifica operativa

Controlli eseguiti in repository:

- `command -v context-mode` -> binary presente
- avvio server (`context-mode --help`) -> avvio stdio confermato, runtime rilevati: JavaScript/TypeScript via Bun, Python, Shell, PHP, Perl

Nota: `context-mode` e' un server MCP; il comando senza flag tende ad avviare il server direttamente.

## Prevenzione errore context length

Errore tipico:

```text
maximum context length is 131072 tokens ... Please reduce the length ... or use the context-compression plugin
```

Regola pratica per BMAD e story generation: non caricare massivamente docs o output lunghi nel prompt. Usare `context-mode` per indicizzare/cercare e QMD per retrieval locale dei markdown. Il prompt finale deve contenere solo gli estratti necessari, non l'intero corpus.

## Differenza da context-compression Cursor

Questo è distinto dalla "context-compression" di Cursor IDE. Cursor comprime il contesto lato client prima di inviarlo al modello — `context-mode` invece è un MCP server che Claude Code usa attivamente per esternalizzare output in SQLite.

## Collegamento

- [docs/context-compression-plugin.md](../../context-compression-plugin.md) — errori context-length in Cursor
- [bashscripts runbook](../../../bashscripts/docs/wiki/concepts/bmad-context-compression-operations.md) — checklist operativa BMAD + context compression + QMD
- Mert Koseoglu, "Stop Burning Your Context Window — We Built Context Mode": https://mksg.lu/blog/context-mode
- Claude Code MCP docs: https://code.claude.com/docs/en/mcp
