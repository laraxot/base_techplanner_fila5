# Context Mode Integration per FixCity

## Panoramica

**Context Mode** è un MCP server che riduce il contesto del 94-98% interceptando tool calls (Bash, Read, WebFetch, etc.), eseguendoli in subprocess isolati e restituendo solo summari compatti invece di output grezzi.

**Installato:** `context-mode v1.0.111`

## Problema Risolto

Prima:
- Playwright snapshot: 56KB → context
- GitHub Issues (20): 59KB → context  
- Access logs: 45KB → context
- Totale: ~412K tokens richiesti vs 131K limit

Dopo:
- Playwright: 56KB → 299B (99% risparmiato)
- GitHub Issues: 59KB → 1.1KB (98%)
- Access logs: 45KB → 155B (100%)
- **315KB diventano 5.4KB** (98% risparmiato)

## Installazione

```bash
# Global install
npm install -g context-mode

# Verify
context-mode --version
```

Output conferma:
```
Context Mode MCP server v1.0.111 running on stdio
Detected runtimes:
  JavaScript: bun (1.3.11) ⚡
  PHP:        php (PHP 8.4.20)
  Python:    python3 (3.12.3)
```

## Configurazione operativa corrente

```jsonc
{
  "mcp": {
    "context-mode": {
      "type": "local",
      "command": ["context-mode"]
    },
    "qmd": {
      "type": "local",
      "command": ["qmd", "--index", "fixcity", "mcp"],
      "environment": {
        "XDG_CONFIG_HOME": "{env:HOME}/.cache/fixcity/qmd-config",
        "XDG_CACHE_HOME": "{env:HOME}/.cache/fixcity/qmd-cache",
        "HOME": "{env:HOME}/.cache/fixcity/qmd-home"
      }
    }
  },
  "provider": {
    "openrouter": {
      "options": {
        "plugins": [{ "id": "context-compression" }]
      }
    }
  },
  "compaction": {
    "auto": true,
    "prune": true
  }
}
```

Percorsi attuali nel repo:

- `laravel/opencode.json` per OpenCode
- `laravel/.mcp.json` per MCP lato Laravel
- `.mcp.json` root per configurazioni MCP condivise

## Compatibilità Platform

| Platform | Hooks | Risparmio |
|----------|------|----------|
| Claude Code | ✅ auto | ~98% |
| Gemini CLI | ✅ | ~98% |
| VS Code Copilot | ✅ | ~98% |
| **OpenCode** | Plugin | ~98% |
| Codex CLI | ❌ | ~60% |

## Tool Disponibili

Una volta attivo, questi tool sono automaticamente usati al posto di Bash/Read/WebFetch grezzi:

- `ctx_batch_execute` — esegue comando in sandbox, ritorna summary
- `ctx_execute` — esecuzione singola
- `ctx_execute_file` — esegue file script
- `ctx_index` — indicizza contenuto nella Knowledge Base
- `ctx_search` — cerca nella Knowledge Base
- `ctx_fetch_and_index` — recupera e indicizza

Utility commands:
- `ctx_stats` — mostra risparmio contesto
- `ctx_doctor` — diagnosi sistema
- `ctx_upgrade` — upgrade versione

## Per OpenCode

OpenCode legge `laravel/opencode.json`. La configurazione utile al problema di overflow e':

- `provider.openrouter.options.plugins = [{ "id": "context-compression" }]`
- `compaction.auto = true`
- `compaction.prune = true`
- MCP locali `context-mode` e `qmd`

Inoltre i prompt agent BMAD devono puntare a `../_bmad/agents/*.md` quando il file `opencode.json` vive in `laravel/`.

## Link Utili

- [Repo GitHub](https://github.com/mksglu/context-mode)
- [Documentazione](https://context-mode.com)
- [Blog post](https://mksg.lu/blog/context-mode)

---

*Ultimo aggiornamento: 2026-05-08*