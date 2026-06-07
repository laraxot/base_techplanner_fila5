---
title: "Agent bootstrap compatto — SSoT sessione"
type: concept
tags: [bootstrap, tokens, on-demand, agent, second-brain, trigger-map]
created: 2026-06-05
updated: 2026-06-06
qmd: "agent bootstrap compact preload token second brain trigger map qmd on-demand techplanner"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/11"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/12"
related:
  - ../memories/frontmatter-github-links-mandatory-standing.md
  - ../memories/multi-agent-coordination-standing.md
  - ../how-to/multi-agent-coordination-discipline.md
  - ../rules/00-TRIGGER_MAP.md
  - ../memories/agent-token-bootstrap-slim.md
  - ../../bashscripts/tools/prompts/llm-wiki.txt
---

# Agent bootstrap compatto

> **Unico preload.** Resto: `00-TRIGGER_MAP` riga task → `qmd search` → `Read` owner. Stub IDE ≤50 righe.

## Workflow (5 passi)

0. **Multi-agente** — stesso task su più agenti: leggi `docs/chat/INDEX.md` + handoff topic → `git remote -v` → `gh issue list --search "<topic>"` → commenta issue. Canon: [multi-agent-coordination-discipline.md](../how-to/multi-agent-coordination-discipline.md) · `.cursor/rules/multi-agent-coordination.mdc`
1. **Ogni `.md` wiki** — `git remote -v` → `gh issue list --search "<topic>"` → se manca `gh issue create` + discussion → frontmatter **`issues:` + `discussions:`** URL numerati **prima di salvare**. Canon: [wiki-markdown-frontmatter-mandatory.md](../rules/wiki-markdown-frontmatter-mandatory.md) · `.cursor/rules/wiki-markdown-frontmatter-mandatory.mdc`
2. Questo file
3. `docs/chat/INDEX.md` se handoff / task condiviso
4. `00-TRIGGER_MAP.md` → **1 riga** dominio
5. `bashscripts/docs/llm-wiki-qmd.sh search "<topic>" -c tp-wiki-<scope> -n 5 --files` (vedi [qmd-search-guide](../how-to/qmd-search-guide.md))
6. Grep owner → Read max 5 file — **mai** `@codebase`, cartelle `docs/` intere

## Token

| Vietato | OK |
|---------|-----|
| Preload bmad/v6, skills tree, memories INDEX | 1 skill da `skills/INDEX.md` |
| Bash/git output >20 righe | `ctx_execute` / `ctx_batch_execute` |
| Ripetere policy già in `.cursor/rules` | URL `.../issues/N` specifici in frontmatter |
| «Dovrebbe funzionare» | Comando + HTTP/browser evidence |

Overflow: `context-overflow-prevention.md` · Router: `llm-wiki.txt`

## Religion (carica canon solo se tocchi l'area)

| Area | Regola | Canon |
|------|--------|-------|
| Logic | Actions + QueueableAction | `no-services-rule.md` |
| HTTP | No Controllers | `no-controllers-rule.md` |
| Filament | XotBase*, no `->label()` | `filament-rules-summary.md` |
| DB | Dati sacri; 1 model = 1 migrate | `bmad/architecture.md` |
| Git | Forward-only; **no** branch/checkout | `git-forward-only.md` |
| BMAD | Issue+Discussion→STORY→`.dev.md`→code | `bmad-story-github-links-mandatory.md` |
| Multi-agente | Stesso task → `docs/chat/` + issue owner | `multi-agent-coordination-discipline.md` |
| Wiki | Frontmatter YAML + **issues + discussions GitHub** | `wiki-markdown-frontmatter-mandatory.md` |
| Composer | `folio`→Cms, `activitylog`→Activity, `pdf`→Xot — **mai** root | `composer-module-dependency-go.md` · `bmad/architecture-composer-module-dependency.md` |
| User | **Mai** dipendere da Comment (`InteractsWithComments`, `CanComment`) | `laravel/Modules/User/docs/wiki/concepts/no-comment-module-dependency.md` |
| CMS FO | `<x-page>` `side`/`slug`/`data` | `cms-x-page-data-bag-only.md` |
| Folio pages tema | **No** `pages/tickets` ecc. | `no-semantic-folio-page-directories.md` |
| Folio lista `[container0]/index` | `container0.index` + mount lineare `{container}.index` | `folio-container0-index-filament-way.md` |
| Header slim | HTML+visual parity DC; `btn-icon btn-full` | `design-comuni-header-parity.md` |
| Widget | `Widgets\{Domain}\{Role}Widget` | `filament-widget-domain-folder-naming.md` |

TechPlanner (dominio): `tp-mod-techplanner-wiki` — Client, Device, Appointment. Canon: `laravel/Modules/TechPlanner/docs/wiki/concepts/techplanner-business-domain.md`

## On-demand (non preloadare)

| Bisogno | 1 file |
|---------|--------|
| Trigger | `00-TRIGGER_MAP.md` riga |
| Memoria | `qmd search` → `memories/*` |
| Skill | `skills/INDEX.md` → 1 voce |
| BMAD slash | `commands/bmad-slash-commands.md` |
| PHP edit | `validation-post-edit-rule.md` |

User Rules Cursor (≤12 righe): `agent-token-bootstrap-slim.md`

## Second brain

| Scope | Path |
|-------|------|
| Root | `docs/wiki/` |
| Modulo | `Modules/<M>/docs/wiki/` |
| Tema | `Themes/<T>/docs/wiki/` |

Lock: `touch file.lock` → edit → `rm -f file.lock`. PHP: PHPStan L10 + phpmd + phpinsights.

## Chiusura

`verify-llm-wiki.sh` · `llm-wiki-qmd.sh update` · `docs/wiki/log.md` se policy cambia · firma issue `— Agente (modello)`.
