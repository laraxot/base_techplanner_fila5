---
title: "GitHub Issue/Discussion in Every BMAD Story"
type: rule
confidence: high
created: 2026-05-29
updated: 2026-05-29
tags: [bmad, story, github, issue, discussion, mandatory]
related:
  - ../../AGENTS.md
  - ../../stories/STORY-058-it-segnalazioni-elenco-html-visual-parity.md
  - ../../stories/STORY-060-no-standalone-livewire-frontoffice.md
  - ../../stories/STORY-062-segnalazioni-elenco-cms-blocks-decomposition.md
---

# GitHub Issue/Discussion in Every BMAD Story

## REGOLA PERMANENTE

**Ogni BMAD story (`docs/stories/STORY-*.md`) DEVE includere MINIMO 1 GitHub issue link e MINIMO 1 GitHub discussion link.**

### Dove cercare

- Issue e discussion su: `base_fixcity_fila5`, `theme_sixteen_fila5`, `module_*_fila5`
- Issue aperte: `gh issue list --repo laraxot/{repo} --state open`
- Discussion (se attive): `gh api repos/laraxot/{repo}/discussions`

### Se la repo non ha discussions attive

Commentare le issue esistenti con la proposta architetturale invece di creare discussion.

### Dove inserire nella story

Sezione dedicata `## GitHub (tracciamento)` oppure `## Dependencies`:

```markdown
## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [base_repo#N](https://github.com/laraxot/base_repo/issues/N) | Descrizione issue |
| [theme_repo#M](https://github.com/laraxot/theme_repo/issues/M) | Descrizione issue tema |
| [module_repo#K](https://github.com/laraxot/module_repo/issues/K) | Descrizione issue modulo |
| [discussions/D](https://github.com/laraxot/repo/discussions/D) | Discussion architetturale |
```

### Perché

- Tracciamento bidirezionale tra storie BMAD e issue GitHub
- Chiunque (AI o umano) può navigare da issue → story → issue
- Discussioni architetturali registrate e linkabili
- Allineamento tra codice, documentazione e issue tracking

### Esempi

- STORY-058: issue #132 (sidebar), theme#12 (blocchi), geo#4 (mappa)
- STORY-060: issue #132 (bug Livewire), discussion #36 (architettura)
- STORY-062: issue #91 (E2E), theme#12 (blocchi), geo#4 (mappa), discussion #36
