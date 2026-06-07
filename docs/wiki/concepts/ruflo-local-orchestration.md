---
title: "Ruflo Local Orchestration"
type: concept
confidence: high
updated: 2026-05-08
tags: [ruflo, mcp, claude-code, codex, second-brain, orchestration]
sources:
  - ../../raw/articles/ruflo-official-research.md
  - https://github.com/ruvnet/ruflo
  - https://github.com/ruvnet/ruflo/wiki/Integration-Tutorial
---

# Ruflo Local Orchestration

## Stato Verificato

Ruflo e' installato e utilizzabile in questo workspace.

- CLI: `ruflo v3.7.0-alpha.11`
- Node/npm: `v25.9.0` / `11.12.1`
- runtime: `.claude-flow/config.yaml` presente
- daemon: attivo
- MCP Claude Code: `ruflo: npx ruflo@latest mcp start` connesso
- MCP tools: 246 tool abilitati
- memoria: `sql.js + HNSW`, store/retrieve verificato

## Comandi Operativi

```bash
ruflo doctor
ruflo init check
ruflo mcp tools
ruflo mcp exec --tool mcp_status
ruflo memory stats
ruflo memory store -k key -v value
ruflo memory retrieve -k key
```

## Regole Locali

- Usare il pacchetto `ruflo`; `ruvflo` e' un false friend.
- Non eseguire `ruflo init --codex --force` in questo repository senza decisione esplicita: puo' toccare `AGENTS.md` e `.agents`.
- `.agents` e `.claude` sono gia' parte dell'infrastruttura locale; Ruflo va integrato senza sovrascrivere.
- `ruflo doctor --fix` mostra comandi suggeriti, non applica fix automaticamente.
- `ruflo status` puo' indicare swarm stopped anche quando MCP stdio e daemon sono utilizzabili: lo swarm si avvia on-demand per task agentici.
- Non avviare swarm autonomi senza obiettivo chiaro, API key disponibili e budget di processo.

## Warning Attesi

- API key assenti: tool locali/MCP/memoria funzionano; agenti LLM remoti richiedono provider key.
- `agentic-flow` assente: opzionale, Ruflo usa fallback.
- encryption at rest off: la memoria locale e' plaintext con permessi file; abilitare solo con chiave gestita.

## Verifica Eseguita

Memoria Ruflo verificata con chiave `codex.ruflo.setup.verified`.

```text
CLI installed, daemon running, Claude MCP connected, 246 MCP tools available,
memory backend sql.js+HNSW operational.
```
