---
title: "BMAD Method v6 — Index"
type: index
tags: [bmad, methodology, agile, agents, commands, workflow]
created: 2026-05-27
updated: 2026-06-06
related:
  - ../rules/00-TRIGGER_MAP.md
  - ../skills/bmad-on-demand-routing.md
  - ../../bashscripts/ai/rules/bmad.md
  - ../../bashscripts/tools/install-bmad-v6-project.sh
---

# BMAD Method v6

> **BMAD** = Breakthrough Method for Agile AI-Driven Development.
> Metodologia agile nativa per AI, ottimizzata per token, on-demand via wiki.

## Carica on-demand

```bash
qmd search "bmad <topic>" --limit 5
# oppure
mcp__plugin_qmd_qmd__search("bmad <topic>", "fixcity-docs")
```

## Pagine

| Pagina | Cosa contiene |
|--------|---------------|
| [story-github-links-mandatory.md](./story-github-links-mandatory.md) | **Obbligo** issue + discussion in ogni `STORY-*.md` |
| [method-v6-overview](method-v6-overview.md) | 4 fasi, filosofia, token optimization |
| [agents-nine](agents-nine.md) | 9 agenti specializzati (Master, Analyst, PM, Architect, SM, Developer, UX, Builder, CI) |
| [commands-fifteen](commands-fifteen.md) | 15 comandi slash (/workflow-init, /prd, /dev-story, ...) |
| [project-levels](project-levels.md) | Livelli 0-4, right-sizing del workflow |
| [integration-on-demand](integration-on-demand.md) | Installazione progettuale e attivazione on-demand |
| [filament-widget-validation-zen](filament-widget-validation-zen.md) | Validazione solo in *Form; widget = orchestrazione |
| [architecture](architecture.md) | **Indice `/bmad/architecture`**: dati sacri + migrazioni + parità modulo + frontmatter + **module providers manifest** + **R12 view path** |
| [architecture-module-providers-manifest](architecture-module-providers-manifest.md) | Pilastro 6: provider in `module.json` + `composer.json`, no `register()` manuale |
| [architecture-folio-page-shell](architecture-folio-page-shell.md) | Pilastro 7: pagine Folio — `mount()` + `<x-layouts.app>`, no `@props`/`@extends` |
| [architecture-r12-english-only-view-paths](architecture-r12-english-only-view-paths.md) | Pilastro 5: Blade `@include` solo inglese (`cta/ticket`, non `cta/segnalazione`) |
| [architecture-wiki-frontmatter-github](architecture-wiki-frontmatter-github.md) | **Frontmatter YAML** + issue/discussion su ogni `.md` wiki |
| [STORY-140](../stories/STORY-140-model-data-quartet-parity.md) | Story: parità N=N + frontmatter traceability (#248 / D#249) |
| [architecture-data-sacred-no-destructive-db](architecture-data-sacred-no-destructive-db.md) | **Dati sacri**: mai `--force`, mai `--path`, mai `RefreshDatabase` |
| [architecture-one-migration-per-model](architecture-one-migration-per-model.md) | **Schema DB**: 1 modello = 1 `create_*`; bump timestamp; owner modulo |
| [architecture-migration-update-timestamps-only](architecture-migration-update-timestamps-only.md) | **Audit colonne**: solo `updateTimestamps` in `tableUpdate`; no duplicati in `tableCreate` |
| [architecture-migration-update-timestamps-only](architecture-migration-update-timestamps-only.md) | **Audit columns**: solo `updateTimestamps()` — no `timestamps()` duplicati |
| [architecture-module-model-artifact-parity](architecture-module-model-artifact-parity.md) | **Per modulo**: N modelli = N migrazioni + N factory + N seeder; script audit |
| [architecture-migration-update-timestamps-only](architecture-migration-update-timestamps-only.md) | **Migrazioni**: solo `updateTimestamps()` — no `timestamps()`/`softDeletes()` duplicati |

## Trigger map

Vedi `../rules/00-TRIGGER_MAP.md` sezione BMAD per trigger → file da caricare.

## Installazione progetto

```bash
bashscripts/tools/install-bmad-v6-project.sh
```

Copia skills in `.opencode/skills/bmad/`, comandi in `.opencode/commands/bmad/`, reference in `bmad-v6/`.
