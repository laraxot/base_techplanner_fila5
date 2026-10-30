---
title: "TechPlanner LLM Wiki Index"
type: "index"
tags:
  - second-brain
  - qmd
  - techplanner
created: "2026-06-06"
updated: "2026-10-29"
qmd: "tp-wiki-root"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/11"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/12"
---

# TechPlanner LLM Wiki Index

Root wiki per regole e concetti riusabili dagli agenti AI su TechPlanner.

## Concepts

- [Contratto persistente degli agenti](./concepts/agent-persistence-contract.md)
- [Git collision prevention and repair](./how-to/git-merge-marker-sweep.md) (how-to + recovery)
- Public theme resolution: `laravel/docs/wiki/concepts/public-theme-resolution-and-vite-assets.md` (se presente) oppure `docs/pub_theme_namespace_rule.md`

## Rules

- [Trigger map](./rules/00-TRIGGER_MAP.md): quale regola caricare per quale task (UI/UX, header/menu, markup e `data-*` di un tema)
- [013 · HTML uguale a Design Comuni](./rules/013-design-comuni-html-match.md): Sixteen replica il riferimento, anche negli attributi `data-*`
- [Parity dell'header Design Comuni](./rules/design-comuni-header-parity.md)
- Regola degli attributi di Sixteen: `laravel/Themes/Sixteen/docs/data-attribute-rule.md` (mai `data-sixteen-*`; il tema da modificare per il tenant è Two)

## Audit

- [Audit completo del progetto (sintesi pubblica)](../stories/project-audit.story.md): 500 finding grezzi, 10 cause radice; evidenze e azioni solo nel report riservato `bashscripts/docs/audit/`

## Logs

- [Log](log.md)
