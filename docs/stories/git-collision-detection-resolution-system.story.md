---
title: "Git Collision Detection and Resolution System"
type: story
tags: [git, conflicts, collision, detection, resolution, automation, bmad, second-brain]
created: 2026-09-03
updated: 2026-09-03
qmd: "git collision detection resolution automation systematic bmad second brain forward-only"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/TBD"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/TBD"
epic: "Git Operations Automation"
status: "planned"
priority: "high"
effort: "medium"
---

# Git Collision Detection and Resolution System

## Summary

Sviluppare un sistema sistematico per la rilevazione e risoluzione delle collisioni Git nel progetto Laraxot, migliorando il second brain con pattern automatizzati e conformi alla disciplina forward-only.

## Problem Statement

Attualmente le collisioni Git vengono gestite in modo non sistematico:
- Marker di conflitto (`<<<<<<<`, `=======`, `>>>>>>>`) trovati in 115 file documentazione (2026-05-26)
- Mancanza di detection automatizzata per collisioni sistemiche
- Confusione tra script di risoluzione esistenti (`resolve-conflicts-keep-incoming.sh`)
- Violazioni occasionali della disciplina forward-only (`git reset` forbidden)

## User Story

**As a** developer  
**I want** un sistema automatizzato per rilevare e risolvere le collisioni Git  
**So that** posso mantenere l'integrità del repository e seguire la disciplina forward-only

## Acceptance Criteria

### AC1: Detection System
- [ ] Script bash per rilevare marker di conflitto in tutto il repository
- [ ] Report per tipo di file (PHP, MD, SH, JSON)
- [ ] Detection per collisioni remote wrong-base (pattern Tenant module)
- [ ] Integrazione con lock system per multi-agent coordination

### AC2: Resolution Patterns
- [ ] Documentazione pattern risoluzione deterministica (non vuoto, superset, metadata)
- [ ] Script per risoluzione keep-incoming con backup .bak
- [ ] Script per risoluzione keep-head con backup .bak
- [ ] Script per risoluzione manuale assistita

### AC3: Second Brain Integration
- [ ] Aggiornamento wiki con pattern di collision detection
- [ ] Documentazione `docs/wiki/rules/git-collision-detection-resolution.md`
- [ ] Junction con bashscripts/ai/wiki skills
- [ ] Frontmatter GitHub obbligatorio su tutti i file wiki

### AC4: Forward-Only Enforcement
- [ ] Hook pre-commit per prevenire `git reset`
- [ ] Detection automatica di operazioni distruttive
- [ ] Report violazioni con forward alternatives
- [ ] Integrazione con quality gates

### AC5: Multi-Agent Coordination
- [ ] Protocollo per dichiarazione intent su file in conflitto
- [ ] System di lock per prevenire modifiche concorrenti
- [ ] Chat coordination in `docs/chat/` per conflitti complessi
- [ ] GitHub issue/discussion tracking per conflitti persistenti

## Technical Approach

### Phase 1: Detection Infrastructure
```bash
# Script principale
bashscripts/git/detect-git-conflicts.sh
  - Scan per marker: <<<<<<<, =======, >>>>>>>
  - Filter per estensione file
  - Report JSON + Markdown
  - Integrazione con QMD per pattern matching
```

### Phase 2: Resolution Scripts
```bash
# Pattern esistenti migliorati
bashscripts/git/resolve-conflicts-keep-incoming.sh --validate
bashscripts/git/resolve-conflicts-keep-head.sh --validate
bashscripts/git/resolve-conflicts-manual.sh --interactive
```

### Phase 3: Documentation & Second Brain
```markdown
docs/wiki/rules/git-collision-detection-resolution.md
  - Pattern detection
  - Strategy matrix (keep-head vs keep-incoming vs manual)
  - Forward-only alternatives table
  - Multi-agent coordination protocol
```

### Phase 4: Quality Gates
```bash
# Pre-commit hook
.githooks/pre-commit
  - Check per marker di conflitto
  - Blocco operazioni distruttive (reset, checkout --force)
  - Report forward alternatives
```

## Dependencies

- Bash scripts organization: `bashscripts/git/`
- QMD integration per second brain queries
- Lock system: `bashscripts/lock/`
- Git forward-only discipline: existing rules
- Multi-agent coordination: existing protocol

## Out of Scope

- Automatic merge resolution (usare sempre approccio manuale/documentato)
- Git reset recovery (forbidden by policy)
- LFS/binari handling (LFS vietato nel progetto)
- Branch management automation (scope separato)

## Implementation Plan

### Step 1: Create Detection Script
- Write `bashscripts/git/detect-git-conflicts.sh`
- Test su repository corrente
- Generate report baseline

### Step 2: Document Resolution Patterns
- Create `docs/wiki/rules/git-collision-detection-resolution.md`
- Integrate existing scripts documentation
- Add forward-only alternatives

### Step 3: Update Second Brain
- Add QMD queries per git conflicts
- Create junction skills
- Update trigger map

### Step 4: Multi-Agent Protocol
- Define lock coordination
- Create chat protocol
- Update multi-agent coordination docs

### Step 5: Quality Gates
- Implement pre-commit hook
- Add to quality gate script
- Test with deliberate violations

## Testing Strategy

### Unit Tests
- Test detection script su vari tipi di file
- Test resolution scripts su conflitti sintetici
- Test hook con operazioni permesse/vietate

### Integration Tests
- Test detection su repository reale
- Test multi-agent coordination con lock
- Test quality gate integration

### Manual Tests
- Test risoluzione manuale conflitto reale
- Test forward-only enforcement
- Test second brain queries

## Definition of Done

- [ ] Tutti gli acceptance criteria completati
- [ ] Test passanti (unit + integration)
- [ ] Documentazione aggiornata (wiki + second brain)
- [ ] Frontmatter GitHub su tutti i file wiki
- [ ] Issue/discussion GitHub create per tracking
- [ ] PHPStan level 10 compliant (se codice PHP coinvolto)
- [ ] Quality gates verdi
- [ ] Multi-agent coordination testato

## GitHub Tracking

### Issue
- TBD: Create issue in appropriate module repo

### Discussion
- TBD: Create discussion for architectural decisions

## Related Work

- Existing: `bashscripts/git/resolve-conflicts-keep-incoming.sh`
- Existing: `brain/sources/git-collision-docs-cleanup-report.md`
- Existing: `bashscripts/ai/ai/wiki/rules/10-git/git-reset-forbidden-use-forward-alternatives.md`
- Existing: `laraxot-git-conflicts` skill

## Risk Mitigation

| Risk | Mitigation |
|------|------------|
| Detection false positives | Configurable filters + manual review |
| Resolution data loss | Mandatory .bak backups + validation |
| Forward-only violations | Pre-commit hook + code review enforcement |
| Multi-agent conflicts | Lock system + chat coordination protocol |

## Success Metrics

- Zero marker di conflitto in commit
- Zero violazioni forward-only post-deployment
- < 5 min per detection scan full repository
- 100% compliance con lock system multi-agent
- Second brain recall > 90% per git conflict queries

## Notes

- Seguire disciplina BMAD per planning e execution
- Integrare con existing `laraxot-git-conflicts` skill
- Maintain ponytail lazy dev principles
- Use graphify per codebase analysis pre-implementation
- Headroom integration per context optimization

---

**Generated with Devin**  
**BMAD Story Approach**  
**Visionary Eccentric Programmer Mode: ON**