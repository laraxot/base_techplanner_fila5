# Rule: AI Development Methodologies Integration

**Status**: 🔴 CRITICAL  
**Priority**: MANDATORY  
**Created**: 2026-03-27  
**Updated**: 2026-03-28  
**Enforcement**: ALWAYS

---

## Rule Statement

> **ALL AI development MUST use the integrated methodology stack: GSD + BMAD + Ralph Loop + OpenViking.**

---

## The Four Methodologies

### 1. GSD (Get Shit Done) — Planning & Orchestration

**Role**: WHAT and WHEN  
**Repository**: https://github.com/gsd-build/get-shit-done  
**Stars**: 43.4K

**Core Commands**:
- `/gsd:new-project` — Initialize project
- `/gsd:discuss-phase N` — Capture decisions
- `/gsd:plan-phase N` — Research & plan
- `/gsd:execute-phase N` — Execute plans
- `/gsd:verify-work N` — Validate
- `/gsd:ship N` — Create PR
- `/gsd:quick` — Ad-hoc tasks

**Configuration**: `.planning/config.json`

### 2. BMAD (Breakthrough Method for Agile AI Driven Development) — Methodology & Governance

**Role**: WHY and Standards  
**Repository**: https://github.com/bmad-code-org/BMAD-METHOD  
**Version**: v6.2.2  
**Stars**: 42.6K

**Key Agents**: PM, Architect, Developer, UX, Scrum Master, QA, Tech Writer

**Key Workflows**:
- Create PRD, Architecture, Epics & Stories
- Sprint Planning, Code Review, Retrospective

### 3. Ralph Loop — Execution Engine

**Role**: HOW of autonomous work  
**Creator**: Geoffrey Huntley  
**Source**: https://ghuntley.com/loop/

**Four Phases**: Execute → Evaluate → Fix → Repeat

**State Files**: `.ralph/` (progress.md, guardrails.md, activity.log, errors.log)

**Integration**:
```
GSD: /gsd-plan-phase → /ralph-phase N → /gsd-verify-work
```

### 4. OpenViking — Context Database

**Role**: Memory & Retrieval  
**Repository**: https://github.com/volcengine/OpenViking  
**Creator**: ByteDance  
**License**: Apache 2.0

**Key Features**:
- Filesystem paradigm with `viking://` URIs
- L0/L1/L2 hierarchical context loading
- 91% token cost reduction
- Automatic session memory extraction
- Six memory categories

---

## Integration Rules

### Rule 1: GSD for Planning
- ALWAYS use GSD for project planning and phase management
- NEVER skip `/gsd:discuss-phase` for complex features
- Use `/gsd:quick` for simple ad-hoc tasks

### Rule 2: BMAD for Standards
- ALWAYS use BMAD agents for specialized tasks
- NEVER bypass BMAD workflows for architecture decisions
- Use BMAD QA for verification

### Rule 3: Ralph Loop for Execution
- ALWAYS use Ralph Loop for well-defined tasks with clear completion criteria
- NEVER use Ralph Loop for ambiguous requirements
- Cap iterations (10-20 for small, 30-50 for large)

### Rule 4: OpenViking for Context
- ALWAYS use OpenViking for project documentation indexing and retrieval
- Treat OpenViking runtime as global and repository responsibility as docs plus `./.openviking` workspace state
- NEVER load full L2 content without L0/L1 filtering
- Commit sessions to extract memories

---

## Workflow Integration

### Standard Feature Development

```
1. BMAD PM → Create PRD
2. GSD → Create phases from PRD
3. GSD Discuss → Capture decisions
4. GSD Plan → Research & plan
5. Ralph Loop → Execute plan
6. OpenViking → Store context
7. BMAD QA → Verify
8. GSD Ship → Create PR
```

### Bug Fix

```
1. Ralph Loop → Define completion criteria
2. Ralph Loop → Execute fix iteratively
3. GSD Verify → Confirm fix
4. GSD Ship → Commit fix
```

### Large Refactor

```
1. BMAD Architect → Design approach
2. GSD Plan → Break into phases
3. Ralph Loop → Execute each phase
4. GSD Verify → Confirm no regressions
```

---

## Quality Gates

Every iteration MUST pass:
1. **PHPStan** — Level 10
2. **PHPMD** — Mess detection
3. **Pest** — Test suite
4. **Pint** — Code formatting

---

## Documentation Requirements

- Update `docs/ai-methodologies-2026.md` when methodologies change
- Update `.ralph/guardrails.md` with lessons learned
- Update `.ralph/progress.md` with iteration results
- Commit OpenViking sessions to extract memories
- OpenViking runtime is global; repository docs only own indexed content and `./.openviking` workspace state

---

## References

- Full documentation: `docs/ai-methodologies-2026.md`
- OpenViking integration: `docs/openviking-integration.md`
- GSD config: `.planning/config.json`
- Ralph Loop state: `.ralph/`
- BMAD skills: `.claude/skills/bmad-*/`
