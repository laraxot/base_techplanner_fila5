---
title: "BMAD v6 Project On-Demand Rule"
type: rule
status: active
created: 2026-05-27
updated: 2026-05-27
tags: [bmad, on-demand, skills, commands]
related:
  - ../skills/bmad-on-demand-routing.md
  - ../concepts/bmad-v6-project-installation.md
  - github-discussions-module-theme-collaboration.md
---

# BMAD v6 Project On-Demand Rule

BMAD Method v6 in questo repo e' project-local e on-demand.

## Sorgenti

- Install canonico: `bashscripts/tools/install-bmad-v6-project.sh`
- Payload completo: `bmad/v6/`
- Skill router: `.claude/skills/bmad/SKILL.md`
- Slash wrappers: `.claude/commands/bmad/*.md`
- Router wiki: `docs/wiki/skills/bmad-on-demand-routing.md`

## Regola

Non embeddare BMAD in bootstrap, prompt di avvio, AGENTS/CLAUDE/QWEN/GEMINI o regole always-on.

Quando BMAD serve:
1. leggi `docs/wiki/skills/bmad-on-demand-routing.md`;
2. leggi solo il comando richiesto in `.claude/commands/bmad/`;
3. leggi il comando completo corrispondente in `bmad/v6/commands/`;
4. leggi una sola skill ruolo da `bmad/v6/skills/` quando il comando la richiede.

## Legacy

`_bmad/`, `.bmad/` e `_bmad-output/` non sono la sorgente per nuovi workflow BMAD v6. Restano consultabili solo come storico quando una issue, una story o una wiki page li cita esplicitamente.

## Qualita'

Ogni workflow BMAD che produce codice deve rispettare le regole Laraxot gia' attive: XotBase, traduzioni espanse, niente Bootstrap runtime nel tema Sixteen, PHPStan con configurazione di progetto senza passare `--level`, e quality gate pertinente.
