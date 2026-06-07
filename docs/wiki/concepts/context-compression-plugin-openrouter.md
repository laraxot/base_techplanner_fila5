---
title: Context Compression Plugin
type: concept
tags: [context-compression, openrouter, codex, qmd, llm-wiki]
sources:
  - https://openrouter.ai/docs/guides/features/message-transforms
  - https://compresr.ai/docs/gateway
  - ./context-mode-mcp.md
created: 2026-04-22
updated: 2026-04-28
---

# Context Compression Plugin

## Cosa Significa Nell'Errore API

L'errore `Please reduce the length ... or use the context-compression plugin` e il testo documentato da OpenRouter per richieste che superano la context window.

In OpenRouter il plugin non si installa nel repository: si abilita nella richiesta API:

```json
{
  "plugins": [{ "id": "context-compression" }],
  "messages": [],
  "model": "..."
}
```

Il comportamento documentato e una compressione/troncamento della parte centrale del prompt per farlo rientrare nel limite. Non e perfetta memoria: va usata quando il recall esatto del centro della conversazione non e indispensabile.

## Alternativa Locale / Proxy

Un gateway proxy come Compresr Context Gateway si installa localmente e si mette tra agent e provider LLM. Richiede API key (`COMPRESR_API_KEY`, `LLM_API_KEY`) e configurazione dell'agent verso `http://localhost:8080`.

Questa opzione non sostituisce LLM Wiki: riduce il rischio di crash per context overflow, ma la memoria persistente del progetto resta `docs/wiki/` + `docs/memory/` + QMD.

## Regola Operativa Fixcity

1. Prima ridurre input/output: usare `rg`, letture mirate, `max_output_tokens`, documenti wiki sintetici.
2. Per conoscenza persistente: salvare in `docs/wiki/` e aggiornare `docs/wiki/index.md` / `docs/wiki/log.md`.
3. Dopo modifiche docs sostanziali: eseguire QMD update se disponibile.
4. Se l'endpoint e OpenRouter e si controlla il client API, abilitare `plugins: [{ "id": "context-compression" }]`.
5. Se si vuole un proxy locale, configurare Context Gateway solo con esplicita disponibilita delle API key.

## Stato Locale Verificato

Verificato runtime:

- installazione aggiornata: `context-mode@1.0.103` globale (`npm list -g context-mode --depth=0`)
- binario presente: `command -v context-mode`
- configurazione provider OpenRouter attiva in `.agents/config.json`:
  - `provider.openrouter.options.plugins = [{ "id": "context-compression" }]`
- configurazione MCP context-mode attiva in `.agents/config.json`:
  - `mcpServers.context-mode = npx -y context-mode`
- `.agents/config.json` validato come JSON (`python3 -m json.tool`)

Nota: `context-mode --help` avvia il server MCP su stdio; e' comportamento normale del tool.

