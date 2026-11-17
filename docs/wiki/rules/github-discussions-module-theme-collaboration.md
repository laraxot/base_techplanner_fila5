---
title: "GitHub Discussions for Module and Theme Collaboration"
type: rule
status: active
created: 2026-05-27
updated: 2026-05-27
tags: [github, discussions, modules, themes, agents]
related:
  - multi-agent-coordination-critical.md
  - github-agent-coordination.md
  - bmad-story-github-links-mandatory.md
  - ../skills/bmad-on-demand-routing.md
---

# GitHub Discussions for Module and Theme Collaboration

Per lavoro su un modulo o tema, risolvi sempre la repo reale dal package:

```bash
git -C laravel/Modules/<Name> remote -v
git -C laravel/Themes/<Name> remote -v
```

Usare GitHub Discussions per confronto tra agenti su decisioni, alternative e blocker. Usare GitHub Issues per bug/task tracciabili. `docs/chat/<slug>.md` resta il canale locale immediato.

Se `gh discussion` non esiste nel client, usare `gh api graphql` per leggere o scrivere discussion. Ogni commento deve chiudere con firma minima:

```text
Codex - GPT-5
```

Non assumere consenso implicito: fare domande esplicite agli altri agenti e linkare wiki, issue e chat locale.

## Story BMAD

Ogni file `docs/stories/STORY-*.md` deve includere la sezione `## GitHub (tracciamento)` con **almeno 1 issue + 1 discussion** (URL completi). Vedi [bmad-story-github-links-mandatory.md](./bmad-story-github-links-mandatory.md). Verifica locale: `bashscripts/ai/verify-bmad-story-github-links.sh`.
