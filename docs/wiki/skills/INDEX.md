---
title: "Skills Index"
type: "index"
tags: [skills, on-demand]
module: "root"
updated: 2026-05-19
---

# Skills — Root Wiki

> Route to one skill; metadata = when / not-when / verify. No full procedures here.

## BMAD (on-demand)

| Skill | When | Not when | Verify |
|-------|------|----------|--------|
| [bmad-on-demand-routing](./bmad-on-demand-routing.md) | Slash BMAD, fasi 1–4, `/dev-story` | Bugfix isolato (GSD/quick) | Solo file router + comando slash letti |

Slash index: [bmad-slash-commands](../commands/bmad-slash-commands.md)

## Agent efficiency

| Skill | When | Not when | Verify |
|-------|------|----------|--------|
| [cursor-second-brain-max-workflow](./cursor-second-brain-max-workflow.md) | **Ogni sessione TechPlanner** — bootstrap, QMD, FLVP, chiusura | Risposta one-liner senza edit repo | `second-brain-healthcheck.sh` exit 0 |
| [agent-bootstrap-on-demand](./agent-bootstrap-on-demand.md) | Nuova sessione, compaction, setup Cursor User Rules | Task con policy già caricata | `wc -l concepts/agent-bootstrap-compact.md` < 120 |

## Process

| Skill | When | Not when | Verify |
|-------|------|----------|--------|
| [data-sacred-migrations](./data-sacred-migrations.md) | `migrate`, test DB, doc comandi schema | npm/git `--force` | `qmd search "dati sacri migrate"` |
| [module-artifact-parity-audit](./module-artifact-parity-audit.md) | Nuovo modello / PR database modulo | Refactor globale User | `audit-module-artifact-parity.sh` · Cursor: `.cursor/skills/module-artifact-parity-audit/` |
| [wiki-markdown-frontmatter](./wiki-markdown-frontmatter.md) | Creare/edit `.md` wiki/modulo/tema | — | `validate-wiki-frontmatter.sh` · Cursor: `.cursor/skills/wiki-markdown-frontmatter/` |
| [on-demand-skill-maintenance](./on-demand-skill-maintenance.md) | Repeated workflow undocumented | One-off fix | Skill page + trigger row |
| `brainstorming` | New feature / behavior change | Typo-only fix | Design notes in wiki/issue |
| `systematic-debugging` | Bug / test failure | Known one-liner | Repro + root cause logged |
| `verification-before-completion` | Before “done” / PR | Trivial read-only Q | Commands run + output cited |
| `writing-plans` | Multi-step spec | Single-file patch | Plan linked in issue |
| `executing-plans` | Approved plan exists | Ad-hoc exploration | Checkpoints in log |
| `test-driven-development` | Feature/bugfix implementation | Docs-only | Red-green evidence |
| `using-git-worktrees` | Isolated feature branch work | Docs/wiki only | Worktree path exists |

## Implementation

| Skill | When | Not when | Related |
|-------|------|----------|---------|
| `filament-pro` / `resource` / `forms` / `tables` | Filament admin UI | Pure API | `filament-rules-summary`, XotBase rules |
| `laravel-11-12-app-guidelines` | Laravel app change | Bash-only wiki | `laravel/AGENTS.md` stub → wiki |
| `livewire-development` | Livewire components | Blade static only | Module wiki |
| `pest-testing` | PHP tests | Manual-only check | CI test suite |
| `tailwindcss*` | Styling / layout | Backend-only | Theme wiki |
| [header-design-comuni-parity](./header-design-comuni-parity.md) | Header slim logged/guest vs DC | Backend API only | `design-comuni-header-parity.md`, STORY-147 |

## Domain (module wiki)

| Skill | Path |
|-------|------|
| Filament page creation | `laravel/Modules/Xot/docs/wiki/skills/filament-page-creation.md` |
| Filament translation audit | `laravel/Modules/User/docs/wiki/skills/filament-translation-audit.md` |
| Translation key audit | `laravel/Modules/Lang/docs/wiki/skills/translation-key-audit.md` |

## Maintenance

| Skill | When |
|-------|------|
| `qmd` | Wiki search / index refresh |
| `on-demand-skill-maintenance` | New repeatable agent workflow |
| `docs-guardian` (agent) | Large doc drift / naming audit |

```bash
qmd search "skill:<name-or-trigger>" --limit 5
```

**Upstream:** [Trigger Map](../rules/00-TRIGGER_MAP.md)
