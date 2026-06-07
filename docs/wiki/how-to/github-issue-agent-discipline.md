---
title: "GitHub issue e discussion — disciplina agente AI"
type: how-to
tags: [github, issue, discussion, agent, audit-trail, multi-agent]
created: 2026-06-06
updated: 2026-06-06
qmd: "github issue discussion agent discipline audit trail gh remote multi-agent coordination"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/18"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
related:
  - ./multi-agent-coordination-discipline.md
  - ./module-theme-github-issues.md
  - ../memories/multi-agent-coordination-standing.md
  - ../rules/wiki-markdown-frontmatter-mandatory.md
  - ../concepts/agent-bootstrap-compact.md
  - ../../chat/INDEX.md
---

# GitHub issue ↔ wiki — disciplina agente

## Perché

Lo **stesso task** viene dato a **più agenti AI**. GitHub è il bus asincrono tra sessioni; `docs/wiki/` resta SSoT versionata.

## Repo corretta

```bash
git remote -v   # nella root del task (progetto, modulo, tema)
```

| Contesto | Remote tipico |
|----------|---------------|
| Progetto TechPlanner | `laraxot/base_techplanner_fila5` |
| Modulo standalone | `laraxot/module_<name>_fila5` (in `Modules/<Name>/`) |
| Tema standalone | `laraxot/theme_<name>_fila5` |

**Regola:** issue e discussion sulla repo **owner** del codice che stai modificando.

## Workflow obbligatorio

0. **Multi-agente** — leggi `docs/chat/INDEX.md` + handoff topic ([multi-agent-coordination-discipline.md](./multi-agent-coordination-discipline.md))
1. `git remote -v` → identifica `OWNER/REPO`
2. `gh issue list --search "<topic>" --repo OWNER/REPO`
3. Se esiste issue pertinente → **commenta** stato (non duplicare)
4. Se manca → `gh issue create` con body: contesto, file toccati, criteri done
5. Discussion per thread lunghi / domande architetturali: `gh api graphql` o UI
6. URL numerati in frontmatter wiki: `issues:` + `discussions:`
7. Handoff sessione → `docs/chat/<slug>.md` con link issue

## Firma commento

```markdown
— Auto (Cursor Agent)
Stato: [in corso | fatto | bloccato]
File: path/to/file.php
Wiki: docs/wiki/...
```

## Cosa va su issue vs wiki vs chat

| Contenuto | Dove |
|-----------|------|
| Decisione duratura, regola, canon | `docs/wiki/` + frontmatter GitHub |
| Stato turno, lock file, «ho fatto X» | Issue comment + `docs/chat/` |
| Brainstorm, domande aperte | Discussion GitHub |
| Log audit progetto | `docs/wiki/log.md` |

## Collegamenti

- Coordinamento multi-agente: [multi-agent-coordination-discipline.md](./multi-agent-coordination-discipline.md)
- Frontmatter: [wiki-markdown-frontmatter-mandatory.md](../rules/wiki-markdown-frontmatter-mandatory.md)

## GitHub (tracciamento)

| Tipo | URL |
|------|-----|
| Issue | https://github.com/laraxot/base_techplanner_fila5/issues/18 |
| Discussion | https://github.com/laraxot/base_techplanner_fila5/discussions/19 |
