---
title: "TechPlanner Root Wiki Index"
type: index
tags: [wiki, index, techplanner, second-brain]
created: 2026-06-06
updated: 2026-06-06
qmd: "techplanner root wiki index llm second brain qmd tp-wiki"
related:
  - rules/00-TRIGGER_MAP.md
  - concepts/agent-bootstrap-compact.md
  - concepts/second-brain-techplanner-efficiency.md
  - how-to/qmd-search-guide.md
---

# Wiki Index — TechPlanner Root

SSoT operativo agenti. Bootstrap: [agent-bootstrap-compact](./concepts/agent-bootstrap-compact.md).

## Second brain (start here)

- [second-brain-techplanner-efficiency](./concepts/second-brain-techplanner-efficiency.md) — modello a 3 livelli, setup QMD
- [qmd-search-guide](./how-to/qmd-search-guide.md) — collezioni `tp-wiki-*`, comandi
- [techplanner-second-brain-bootstrap-2026-06-06](./memories/techplanner-second-brain-bootstrap-2026-06-06.md) — memoria sessione bootstrap

## Rules

- [00-TRIGGER_MAP](./rules/00-TRIGGER_MAP.md) — routing canonico
- [composer-module-dependency-go](./rules/composer-module-dependency-go.md) — pacchetti in `Modules/*/composer.json`, rm vendor, `update -W`
- [on-demand-pattern](./rules/on-demand-pattern.md) — pattern Karpathy

## Concepts

- [agent-bootstrap-compact](./concepts/agent-bootstrap-compact.md)
- [llm-wiki-operational-discipline](./concepts/llm-wiki-operational-discipline.md)

## BMAD Method v6

- [method-v6-overview](./bmad/method-v6-overview.md) — install [aj-geddes/claude-code-bmad-skills](https://github.com/aj-geddes/claude-code-bmad-skills)
- [architecture](./bmad/architecture.md) — 5 pilastri DB/docs (`/bmad:architecture`)
- [bmad-on-demand-routing](./skills/bmad-on-demand-routing.md) — slash on-demand
- [bmad-v6 commands](./commands/bmad-v6.md) — mappa comandi

Global: `~/.claude/skills/bmad/` · `~/.claude/commands/bmad/` · Progetto: `bmad/config.yaml`

## Scripts

- `bashscripts/docs/init-techplanner-qmd-collections.sh` — collezioni tier
- `bashscripts/docs/llm-wiki-qmd.sh` — search/update wrapper

## Modulo dominio

- [TechPlanner wiki](../../laravel/Modules/TechPlanner/docs/wiki/index.md) — clienti, dispositivi, appuntamenti

Prompt harness: `bashscripts/tools/prompts/llm-wiki.txt`

## Moduli (wiki locali)

| Modulo | Path QMD |
|--------|----------|
| Xot | `-c tp-mod-xot-wiki` |
| Cms | `-c tp-mod-cms-wiki` |
| User | `-c tp-mod-user-wiki` |
| Sixteen | `-c tp-theme-sixteen-wiki` |

Canon moduli: [second-brain-local-discipline](../../laravel/Modules/Xot/docs/wiki/concepts/second-brain-local-discipline.md)
