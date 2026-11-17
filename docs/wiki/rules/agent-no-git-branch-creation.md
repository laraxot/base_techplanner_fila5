---
title: "Agent: no Git branch creation or checkout"
type: rule
confidence: high
created: 2026-05-23
updated: 2026-05-29
tags: [git, conduct, branch, standing-rule, agents]
related:
  - rules/agent-conduct-rules.md
  - rules/git-forward-only.md
  - rules/git/github-agent-coordination.md
  - memories/agent-no-git-branch-creation.md
---

# Agent: no Git branch creation or checkout

**Regola permanente e innegociabile** per ogni agente AI in `base_fixcity_fila5`.

## Scopo

Solo l’utente decide branch, naming e quando aprire isolamento. L’agente lavora **solo** sul branch già attivo nella working tree — senza crearne né cambiarne uno.

## Vietato (sempre)

| Comando / azione | Motivo |
|------------------|--------|
| `git checkout -b …` | Crea branch |
| `git switch -c …` | Crea branch |
| `git branch <name>` (senza solo elenco) | Crea branch |
| `git checkout <altro-branch>` | Cambia branch |
| `git switch <altro-branch>` | Cambia branch |
| Script/workflow che creano branch (GSD `pr-branch`, worktree su nuovo branch, ecc.) **senza ordine esplicito dell’utente nello stesso messaggio** | Delega branch all’utente |
| Aprire PR con **head branch creato dall’agente** | Stesso principio |

## Consentito

- `git branch --show-current`, `git status`, `git log`, `git diff`, `git show`, `git blame` (read-only)
- `git add`, `git commit` sul **branch corrente** dell’utente (se l’utente ha chiesto commit)
- `git push` solo se l’utente lo chiede esplicitamente
- Chiedere: «Su quale branch devo lavorare?» se il task implica isolamento

## PR e push

- **Non** creare un branch «pulito» per la PR: l’utente prepara il branch o indica quello esistente.
- Push/PR solo su branch già presente e autorizzato dall’utente.

## Relazione con Git forward-only

- [`git-forward-only.md`](git-forward-only.md): niente rollback/restore come scorciatoia.
- Questa regola: niente **nuovi** branch né **cambio** branch da agente.

## Se serve un branch

Messaggio tipo all’utente:

> Per questo lavoro serve un branch dedicato. **Non posso crearlo io.** Crea/spostati tu su `<nome-suggerito>` e dimmi quando la working tree è pronta.

## Incidenti

| Data | Cosa |
|------|------|
| 2026-05-21 | Agente creò `fix/actions-latest-tags` per CI — revert policy |
| 2026-05-29 | Richiesta esplicita utente: **«tu non puoi creare nuovi git branch ! aggiorna tutto !»** — aggiornamento massivo: `rules.mdc` (Windsurf auto-load), wiki, second brain, memoria persistente |

## Enforcement (multi-layer)

| Layer | File | Caricamento |
|-------|------|-------------|
| **Windsurf auto-load** ⭐ | `.windsurf/rules.mdc` | **Ogni sessione automaticamente** |
| Wiki regola canonica | `docs/wiki/rules/agent-no-git-branch-creation.md` | On-demand |
| Wiki memoria | `docs/wiki/memories/agent-no-git-branch-creation.md` | On-demand |
| AGENTS.md root stub | `AGENTS.md` (root) | Ogni sessione (stub) |
| Second brain persistente | Windsurf Memory | Sempre attivo |

- Trigger: `branch`, `checkout -b`, `switch -c`, `nuovo branch`, `feature branch`, `pr-branch`
- Prima di qualsiasi comando `git` non-read verificare: è solo su branch corrente?
