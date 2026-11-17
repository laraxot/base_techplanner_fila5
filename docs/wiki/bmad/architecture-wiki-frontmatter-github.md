---
title: "BMAD Architecture — frontmatter YAML + GitHub"
type: architecture
tags: [bmad, architecture, wiki, frontmatter, github, qmd]
created: 2026-06-05
updated: 2026-06-05
qmd: "bmad architecture markdown frontmatter yaml github issue discussion qmd mandatory"
story: STORY-140
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/261"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/262"
related:
  - ../rules/wiki-markdown-frontmatter-mandatory.md
  - ./story-github-links-mandatory.md
  - ./architecture.md
---

# Architecture: frontmatter su ogni pagina wiki

> `/bmad/architecture` — ogni `.md` che l’agente crea o aggiorna porta **identità** (QMD) e **tracciamento** (GitHub).

## Regola

Prima riga del file = frontmatter YAML completo. Template: [wiki-markdown-frontmatter-mandatory.md](../rules/wiki-markdown-frontmatter-mandatory.md).

## Template migliorato (copia in testa a ogni `.md`)

Vedi blocco completo in [wiki-markdown-frontmatter-mandatory.md](../rules/wiki-markdown-frontmatter-mandatory.md).

Minimo non negoziabile: `title`, `type`, `tags`, `created`, `updated`, `qmd`, `issues[]`, `discussions[]` (URL completi, non solo `#N` nel body).

## Filosofia

| Principio | Significato |
|-----------|-------------|
| **LLM wiki = memoria** | `qmd` allena FTS; senza frontmatter la pagina non si ritrova |
| **GitHub inside the doc** | Come nelle story: URL in YAML, non solo nel testo |
| **DRY** | `related:` evita secondi file sullo stesso tema |
| **KISS** | Un blocco YAML, poi markdown |

## Workflow agente

1. Cerca issue/discussion esistenti (`gh issue list`, story correlata).
2. Se mancano → crea issue (+ discussion se abilitata).
3. Scrivi frontmatter con URL completi.
4. `bashscripts/tools/validate-wiki-frontmatter.sh <file.md>`
5. `bashscripts/docs/llm-wiki-qmd.sh update` dopo save.

Tracciamento story: [STORY-140](../../stories/STORY-140-model-data-quartet-parity.md).

## Collegamenti

- [architecture.md](./architecture.md) — indice pilastri DB + frontmatter
