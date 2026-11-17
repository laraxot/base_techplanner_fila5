---
title: "BMAD story — link obbligatori a GitHub Issue e Discussion"
type: rule
status: active
created: 2026-05-28
updated: 2026-05-28
tags: [bmad, github, issue, discussion, story, agents]
related:
  - bmad-v6-on-demand.md
  - github-discussions-module-theme-collaboration.md
  - agent-github-issue-mandatory-cycle.md
  - ../memories/bmad-story-github-links-mandatory.md
---

# BMAD story — link obbligatori GitHub

## Regola (obbligatoria)

Ogni volta che un agente **crea** o **modifica** un file story BMAD (`docs/stories/STORY-*.md`, `docs/stories/*.md` sotto convenzione progetto, o output equivalente in `implementation_artifacts/`):

1. La story deve contenere una sezione **`## GitHub (tracciamento)`** (o equivalente esplicito con lo stesso contenuto).
2. **Minimo 1 GitHub Issue** con URL assoluto `https://github.com/.../issues/N` nella repo **owner** del codice toccato (modulo/tema/root).
3. **Minimo 1 GitHub Discussion** con URL assoluto `https://github.com/.../discussions/N` (coordinamento, decision log, o thread tecnico della stessa boundary).
4. Se non esiste ancora issue o discussion: **crearla** (`gh issue create` / `gh api graphql` `createDiscussion`) **prima** di considerare la story completa — non chiedere permesso ([issue #83](https://github.com/laraxot/base_fixcity_fila5/issues/83)).
5. A ogni **modifica** successiva della story: aggiornare la sezione GitHub (nuove issue/discussion, commenti rilevanti).

## Formato canonico nella story

```markdown
## GitHub (tracciamento)

| Tipo | Repo | # | URL |
|------|------|---|-----|
| **Discussion** (canon) | laraxot/base_fixcity_fila5 | 133 | https://github.com/laraxot/base_fixcity_fila5/discussions/133 |
| Issue (owner tema) | laraxot/theme_sixteen_fila5 | 12 | https://github.com/laraxot/theme_sixteen_fila5/issues/12 |
```

- La riga **Discussion** deve essere presente e marcata se è il thread di coordinamento principale.
- Issue aggiuntive per ogni repo owner toccata (cross-boundary).

## Fallback discussion disabilitate

Se la repo owner del modulo non ha Discussions (es. `module_fixcity_fila5`):

1. Aprire/commentare issue sul modulo.
2. Usare discussion sulla repo più vicina al boundary (di solito `base_fixcity_fila5` o `theme_sixteen_fila5`).
3. Nella story, notare il fallback in una riga della tabella.

Vedi anche [github-discussions-module-theme-collaboration.md](./github-discussions-module-theme-collaboration.md).

## Checklist create-story / dev-story

- [ ] Sezione `## GitHub (tracciamento)` presente
- [ ] ≥ 1 issue URL valido
- [ ] ≥ 1 discussion URL valido
- [ ] Commento su issue owner con link alla discussion
- [ ] Commento su discussion con link alla story locale (`docs/stories/...`)

## Collegamenti

- [bmad-v6-on-demand.md](./bmad-v6-on-demand.md) — regole 6–7
- [agent-conduct-rules.md](./agent-conduct-rules.md)
- Esempio story conforme: [STORY-062](../../stories/STORY-062-segnalazioni-elenco-cms-blocks-decomposition.md)
