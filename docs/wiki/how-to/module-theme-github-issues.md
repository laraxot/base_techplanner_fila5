---
title: "Issue GitHub — scelta repo modulo/tema (git remote -v)"
type: how-to
tags: [github, issue, module, theme, remote, laraxot, monorepo]
created: 2026-06-06
updated: 2026-06-06
qmd: "module theme github issues git remote monorepo laraxot module_xot_fila5 base_techplanner_fila5"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/18"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
related:
  - ./github-issue-agent-discipline.md
  - ../memories/multi-agent-coordination-standing.md
  - ../memories/module-github-remote-discipline.md
---

# Issue GitHub — repo modulo vs monorepo

## Regola

```bash
cd laravel/Modules/<Name>   # o Themes/<Name>
git remote -v
```

| Esito | Dove aprire issue |
|-------|-------------------|
| Remote `laraxot/module_*` **esiste** (200) | Repo modulo/tema |
| Remote **404** o assente | `laraxot/base_techplanner_fila5` (monorepo) |
| Cross-cutting (composer merge, PHPStan globale, agent bootstrap) | **Sempre monorepo** |

## Esempi TechPlanner (2026-06)

| Path | Remote tipico | Issue |
|------|---------------|-------|
| Root | `base_techplanner_fila5` | #11 frontmatter, #16 pdf, #29 multi-agent |
| `Modules/Xot` | `module_xot_fila5` | monorepo se submodule remoto non clonato |
| `Modules/Cms` | `module_cms_fila5` | idem |
| `Modules/TechPlanner` | spesso 404 | monorepo #7 dominio |

## Verifica remote vivo

```bash
gh repo view laraxot/module_xot_fila5 --json name 2>&1 || echo "→ usa monorepo"
```

## Frontmatter wiki

Ogni `.md` wiki deve avere `issues:` + `discussions:` sulla **stessa repo** scelta per l'argomento (o monorepo fallback).

## Collegamenti

- [github-issue-agent-discipline.md](./github-issue-agent-discipline.md)
- [multi-agent-coordination-standing.md](../memories/multi-agent-coordination-standing.md)
