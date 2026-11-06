---
slug: phpstan-l10-zero-global
epic: 9
story: 1
title: PHPStan L10 → Zero Errors (All Modules) — Comprehensive Orchestration
owner_module: ALL
owner_theme: null
status: READY_FOR_ORCHESTRATION
priority: CRITICAL
created_at: 2026-09-06T00:00:00Z
---

# Epic: PHPStan L10 → Zero Errors (All 16 Modules)

## Status

- **Global Errors**: 37 (as of 2026-09-06)
- **Modules Affected**: Media (4), User (5), + 11+ others unknown
- **Strategy**: Parallel multi-module orchestration via BMAD fan-out
- **Quality Gates**: No suppression, no @phpstan-ignore, replace mixed with specifics

## Known Errors (Categorized)

### Category A: HasXotFactory Generics (User: 5 errors)
- BaseUser, Notification, Permission, PersonalAccessToken, Role
- **Issue**: Generic trait not specified via @use
- **Fix**: Defer to Xot trait redesign (Phase 2) OR add proper @use annotations

### Category B: Deprecated Filament API (Media: 2 errors — FIXED)
- MediaConvertSchemasTest.php, MediaTableTest.php
- **Status**: COMMENTED OUT, placeholder tests added

### Category C: Type Casting Issues (User: 1 error — FIXED)
- SetCurrentTeamCommand: cast string → int

### Category D: Generic Type Annotations (Media: 2 errors — FIXED)
- Media.php, TemporaryUpload.php
- **Fix**: Removed incorrect @use specifications

### Category E: Other Modules (Unknown — 28 errors)
- Require full scan and categorization

---

## Orchestration Plan

### Phase 1: Scan & Categorize (In Progress)
```bash
./vendor/bin/phpstan analyse Modules --no-progress --memory-limit=-1
```
**Output**: Full error inventory by category + module

### Phase 2: Per-Module Fix Workflow (Parallel)
For each module with errors:
1. **BMAD story creation** (module-specific)
2. **PHPStan fix** (no suppression)
3. **PHPMD validation** (`./tools/phpmd.sh`)
4. **Pest coverage boost** (increment %)
5. **Git sync** (fetch, merge, push per module remote)
6. **Coverage.md update**

### Phase 3: Verification (Sequential)
```bash
./vendor/bin/phpstan analyse Modules --no-progress --memory-limit=-1
# Exit code 0 = success
```

---

## Rules (Non-Negotiable)

1. **Never suppress** errors via @phpstan-ignore or ignoreErrors
2. **Never edit phpstan.neon** (user-only file)
3. **Replace all `mixed`** with specific types (union types, named types)
4. **PHPMD first**, then PHPStan, then Pest
5. **Coverage must increase**, not decrease
6. **Each module = separate git repo** (remote per module + root)

---

## Blockers

- PHPInsights removed (incompatible with Pest 5) — skip it
- QMD offline — second brain via memory files only
- Parallel execution risk: each subagent locks module before edit

---

## Next Action

1. Generate full error matrix (`./vendor/bin/phpstan analyse Modules --no-progress --memory-limit=-1 > /tmp/phpstan-errors.txt`)
2. Parse per-module + per-category
3. Fan-out BMAD stories to subagents (1 story per high-impact module)
4. Track in sprint-status.yaml

---

*Comprehensive orchestration story created: 2026-09-06*
