---
title: "Coordinamento multi-agente — docs/chat + GitHub"
type: how-to
tags: [multi-agent, coordination, chat, handoff, github, agent, same-task]
created: 2026-06-06
updated: 2026-06-06
qmd: "multi agent coordination discipline same task multiple agents docs chat github issues discussions handoff git remote"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/18"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
related:
  - ./github-issue-agent-discipline.md
  - ./module-theme-github-issues.md
  - ../memories/multi-agent-coordination-standing.md
  - ../../chat/INDEX.md
  - ../concepts/agent-bootstrap-compact.md
---

# Coordinamento multi-agente

## Regola utente (standing)

Lo **stesso task** viene assegnato a **più agenti AI**. Coordinamento obbligatorio:

1. **`docs/chat/`** — handoff sessione (leggi prima di iniziare)
2. **GitHub issue + discussion** — repo da `git remote -v`
3. **`docs/wiki/`** — decisioni durature dopo convergenza

## Checklist inizio sessione

```bash
cat docs/chat/INDEX.md
ls docs/chat/handoff-*.md 2>/dev/null | tail -5
git remote -v
gh issue list --search "<topic>" --limit 10
```

Se handoff esiste per il topic → **leggilo per intero** prima di editare file.

## Handoff (`docs/chat/`)

Template `docs/chat/handoff-<slug>.md`:

```markdown
---
title: "Handoff — <topic>"
updated: YYYY-MM-DD
issue: https://github.com/.../issues/N
agents: [Cursor-Auto, ...]
---

## Stato
- Fatto: ...
- In corso: ...
- Non toccare: ...

## File / lock
- ...

## Prossimo agente
1. ...
```

Aggiorna `docs/chat/INDEX.md` (tabella sessioni).

## Issue vs discussion

| Canale | Uso |
|--------|-----|
| **Issue** | Task tracciabile, commenti stato, chiusura |
| **Discussion #19** | Thread aperto multi-agente stesso tema |
| **Wiki** | Canon dopo decisione |

Workflow issue: [github-issue-agent-discipline.md](./github-issue-agent-discipline.md)

## Repo owner

[module-theme-github-issues.md](./module-theme-github-issues.md)

## GitHub (tracciamento)

| Tipo | URL |
|------|-----|
| Issue | https://github.com/laraxot/base_techplanner_fila5/issues/18 |
| Discussion | https://github.com/laraxot/base_techplanner_fila5/discussions/19 |

## Memoria

[multi-agent-coordination-standing.md](../memories/multi-agent-coordination-standing.md)
