---
title: "LLM Wiki + QMD project system"
type: concept
confidence: high
updated: 2026-04-27
tags: [llm-wiki, qmd, docs, memory, mcp]
sources:
  - ../../_bmad-output/implementation-artifacts/8-38-llm-wiki-qmd-project-wide-knowledge-system.md
  - ../.schema/WIKI_SCHEMA.md
  - https://gist.github.com/karpathy/442a6bf555914893e9891c11519de94f
  - https://raw.githubusercontent.com/tobi/qmd/main/README.md
  - https://aimaker.substack.com/p/llm-wiki-obsidian-knowledge-base-andrej-karphaty
  - https://raw.githubusercontent.com/kepano/obsidian-skills/main/README.md
---

# LLM Wiki + QMD project system

## Pattern

LLM Wiki (pattern Karpathy) e' una knowledge base Markdown mantenuta dall'agente:

- `raw/`: fonti grezze e verificabili (immutabili);
- `wiki/`: sintesi, concetti, entita e indici mantenuti dall'LLM;
- schema/log/index: regole, navigazione e cronologia.

Differenza fondamentale da RAG classico: la conoscenza viene compilata in modo incrementale e persistente, non ricostruita da zero ad ogni domanda.

## Regola locale

Ogni owner documentale deve tenere tutto sotto `docs/`:

- root progetto: `docs/`
- moduli: `laravel/Modules/<Name>/docs/`
- temi: `laravel/Themes/<Name>/docs/`
- bashscripts: `bashscripts/docs/`

Minimo richiesto:

- `raw/`
- `wiki/`
- `wiki/index.md`
- `wiki/log.md`

## QMD

QMD e' il motore locale per cercare Markdown e puo esporre un MCP server.

Comandi utili:

```bash
qmd collection list
qmd update
qmd search "query" -c theme-sixteen
qmd query "query"
qmd mcp
```

Nel progetto QMD e' gia configurato in `laravel/.mcp.json` come server `qmd` con index `fixcity`.

Installazione globale consigliata:

```bash
npm install -g @tobilu/qmd
qmd --version
```

## Best practices

- Tenere tutte le cartelle operative sotto `docs/` dell'owner (root/modulo/tema/bashscripts).
- Aggiornare sempre `wiki/index.md` e `wiki/log.md` quando cambia conoscenza persistente.
- Salvare in wiki anche output ad alto valore di query/lint (non solo ingest).
- Usare link relativi e pagine concise, orientate a decisioni e ragionamento riusabile.

## Bad practices

- Usare `docs/archive/` come destinazione nuova documentazione.
- Duplicare la stessa regola in piu pagine senza pagina canonica.
- Trattare QMD come sostituto della lettura owner file (va usato come acceleratore).
- Salvare note operative importanti solo in chat senza aggiornarle nel wiki.

## False friends

- "RAG = LLM Wiki": falso, il wiki e' memoria compilata e curata.
- "Basta `index.md` sempre": falso, a scala maggiore serve anche query tool locale (QMD).
- "raw = solo `docs/raw/`": nel nostro modello il raw di owner e' tutto `docs/` escluso `docs/wiki/`, mentre `docs/raw/` contiene dump/fonti esplicite.

## Regola operativa permanente

Prima di modificare codice o rispondere su architettura/regole:

1. consultare `docs/wiki/index.md`;
2. consultare il wiki locale del modulo/tema/bashscripts;
3. usare QMD o `rg` per trovare fonti e raw sources;
4. aggiornare wiki/log/index quando emerge conoscenza persistente.
