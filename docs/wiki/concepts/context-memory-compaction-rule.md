---
title: "Context Memory Compaction Rule"
type: concept
sources:
  - "https://docs.bmad-method.org/"
  - "https://docs.bmad-method.org/llms-full.txt"
  - "https://github.com/bmad-code-org/BMAD-METHOD"
  - "https://platform.claude.com/cookbook/tool-use-automatic-context-compaction"
  - "https://www.anthropic.com/engineering/effective-context-engineering-for-ai-agents"
  - "https://mksg.lu/blog/context-mode"
  - "https://github.com/mksglu/context-mode"
  - "https://mcpmarket.com/tools/skills/context-compression"
  - "https://mcpmarket.com/tools/skills/context-compression-1"
  - "https://mcpmarket.com/tools/skills/context-compression-2"
confidence: high
created: 2026-04-21
updated: 2026-04-21
tags: [bmad, context-engineering, llm-wiki, memory, compaction]
related:
  - concepts/llm-wiki-governance.md
  - concepts/bmad-method.md
  - ../README.md
---

# Context Memory Compaction Rule

## Regola

La conversazione non e la memoria primaria. Ogni agente deve trasformare il contesto utile in artefatti persistenti, indicizzati e ripristinabili prima che la finestra di contesto diventi un collo di bottiglia.

In pratica:

1. `raw/` conserva fonti e materiale non riscritto.
2. `wiki/` conserva sintesi stabili, linkate, deduplicate e citabili.
3. Gli indici (`README.md`, `index.md`, `AGENTS.md`, log) rendono la sintesi recuperabile.
4. La compattazione deve preservare intento, decisioni, file toccati, vincoli, rischi, stato corrente e prossime azioni.
5. I tool output grandi vanno ridotti a evidenze operative, non riversati integralmente in chat.

## Razionale

BMad v6 spinge a usare workflow e skill in chat fresche, con artefatti in `_bmad/` e `_bmad-output/` come supporto alla continuita. Le fonti Anthropic sulla context engineering convergono sulla stessa disciplina: l'agente deve curare cosa entra nel contesto, registrare decisioni e mantenere continuita tramite strumenti esterni alla cronologia della chat.

Il pattern LLM Wiki applicato a FixCity rende questa regola concreta: la conoscenza riusabile deve finire nel wiki compilato, mentre le fonti restano separate. QMD, grep, Supermemory, OpenViking o altri strumenti di retrieval accelerano la ricerca, ma non sostituiscono il wiki versionato nel repository.

## Checklist Operativa

Prima di lavorare su una richiesta lunga:

- Aprire `docs/wiki/index.md` e gli indici del modulo o tema coinvolto.
- Cercare sintesi esistenti prima di leggere molte fonti raw.
- Identificare quali informazioni devono sopravvivere a un reset di contesto.

Durante il lavoro:

- Tenere traccia di decisioni, file modificati, vincoli e blocchi.
- Riassumere output lunghi dei tool in punti verificabili.
- Aggiornare docs locali quando emerge una regola riusabile.

Alla fine:

- Aggiornare l'indice pertinente.
- Appendere un evento al log wiki se la conoscenza cambia.
- Salvare una memoria operativa quando la regola deve essere ricordata in sessioni future.

## Scope FixCity

Questa regola vale per:

- repository root: `docs/wiki/`
- moduli: `laravel/Modules/<Name>/docs/`
- temi: `laravel/Themes/<Name>/docs/`
- BMad: `_bmad/`, `_bmad-output/`, `.opencode/skills/`
- memorie agentiche locali: `/home/zorin/.codex/memories/`

## Collegamenti

- [[llm-wiki-governance]]
- [[bmad-method]]
- [BMad setup](../../bmad/setup-guide.md)
- [LLM Wiki README](../README.md)
