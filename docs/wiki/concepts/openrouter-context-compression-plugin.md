---
title: OpenRouter context-compression plugin
type: concept
updated: 2026-04-22
tags: [context-compression, openrouter, llm-wiki, qmd, agents]
sources:
  - https://openrouter.ai/docs/guides/features/message-transforms
  - ../../context-compression-plugin.md
---

# OpenRouter context-compression plugin

## Regola

Quando un errore API dice:

`Please reduce the length of either one, or use the context-compression plugin to compress your prompt automatically`

non cercare un pacchetto Laravel/npm da installare nel repository. Nel caso OpenRouter, `context-compression` e' un plugin lato richiesta API:

```json
{
  "plugins": [{ "id": "context-compression" }]
}
```

## Distinzione DRY/KISS

- `context-compression` OpenRouter: comprime il prompt lato provider/router quando il client lo abilita.
- `context-mode` MCP: tool locale gia' installato, utile per non riversare output grandi nel contesto agente.
- LLM Wiki + QMD: memoria persistente primaria del progetto; scrivere sintesi riusabili in `docs/wiki/` e wiki locali di moduli/temi.

## Procedura operativa

1. Prima di leggere molto output, consulta LLM Wiki e usa `rg`/QMD mirati.
2. Se l'errore arriva da OpenRouter e il client supporta plugin provider-specific, abilita `plugins: [{ "id": "context-compression" }]`.
3. Se il client non espone questa opzione, riduci tool output, apri nuova sessione e aggiorna LLM Wiki invece di incollare log.
4. Dopo nuove sintesi, esegui `qmd update` per reindicizzare il corpus.

## Verifica locale

`context-mode --help` avvia il server MCP e conferma i runtime disponibili. Non sostituisce il plugin OpenRouter, ma riduce il rischio di superare il contesto durante lavoro agentico locale.
