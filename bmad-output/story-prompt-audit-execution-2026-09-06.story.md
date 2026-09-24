---
slug: prompt-audit-execution-phase1
epic: 7
story: 1
title: Analyze, Improve, Execute Core Prompts (Phase 1)
owner_module: null
owner_theme: null
status: READY_FOR_DEV
priority: HIGH
created_at: 2026-09-06T00:00:00Z
---

# Story: Analyze, Improve, Execute Core Prompts (Phase 1)

## GitHub (tracciamento)

| Risorsa | URL | Stato |
|---------|-----|-------|
| Issue | TBD | [pending] |

## Context

**Problem**: 150 prompt files in `bashscripts/docs/prompts/` — many with outdated metadata, some deprecated, unclear execution order.

**Objective**: 
1. Audit metadata (frontmatter YAML completeness)
2. Improve prompts (add triggers, fix descriptions)
3. Execute 5-7 high-priority operational prompts
4. Document execution results in wiki

## Phase 1: High-Priority Execution

**Selected prompts for immediate execution:**

1. **03-quality-gates.md** (Pint → PHPStan → Pest → PHPMD → PHPInsights)
   - Status: active, v3.24.0
   - Task: Run full quality gate validation on Media modulo (post story 16.5)
   - Scope: `cd laravel && vendor/bin/pint --dirty && vendor/bin/phpstan analyse Modules/Media --memory-limit=-1 && php artisan test Modules/Media --pest`

2. **13-path-and-naming-rules.md** (Audit naming conventions)
   - Status: stable
   - Task: Audit Media modulo for naming rule compliance
   - Scope: Check class names, file paths, namespace conventions vs 13-path-and-naming-rules

3. **19-docs-second-brain.md** (Wiki-first documentation)
   - Status: stable  
   - Task: Update bashscripts/ai/wiki/ with prompt analysis findings
   - Scope: Document prompt execution results, create trigger mappings

4. **47-rules-ondemand.md** (On-demand rule loading)
   - Status: stable
   - Task: Verify on-demand rule access via QMD + TRIGGER_MAP
   - Scope: Check bashscripts/ai/wiki/rules/ linkage

5. **15-bmad.md** (BMAD methodology)
   - Status: stable
   - Task: Verify BMAD application to prompt execution workflow
   - Scope: Sprint-status tracking, story definition, closure ritual

## Deliverables

### 1. Metadata Audit Report
- File: `bmad-output/PROMPT-METADATA-AUDIT.md`
- Content: Missing frontmatter fields, version gaps, status review for 150 files
- Format: Tabular (file, status, metadata_complete?, needs_update?)

### 2. Prompt Execution Logs
- File: `bmad-output/PROMPT-EXECUTION-LOG-2026-09-06.md`
- Content: Per-prompt execution summary (status: OK/FAIL, errors, exit code)
- Prompts: 03, 13, 19, 47, 15 (priority 1)

### 3. Quality Gates Report
- File: `laravel/Modules/Media/docs/coverage.md`
- Content: Post-story 16.5 quality validation (Pint, PHPStan L10, Pest)
- Acceptance: 0 new errors, test pass rate 100%

### 4. Wiki Update
- Path: `bashscripts/ai/wiki/concepts/prompt-execution-workflow.md` (NEW)
- Content: Prompt routing via 00-TRIGGER_MAP, on-demand loading pattern
- Links: Cross-ref to INDEX.md, consolidation opportunities

## Acceptance Criteria

- [ ] Metadata audit: 100% frontmatter check (150 files)
- [ ] 03-quality-gates.md: execution OK, 0 new PHPStan errors
- [ ] 13-path-and-naming-rules.md: audit complete, findings logged
- [ ] 19-docs-second-brain.md: wiki entry created, trigger map updated
- [ ] PROMPT-METADATA-AUDIT.md written + committed
- [ ] PROMPT-EXECUTION-LOG-2026-09-06.md written + committed

## Related Files

- `bashscripts/docs/prompts/INDEX.md` — canonical index (150 files)
- `bashscripts/docs/prompts/03-quality-gates.md` — quality validation
- `bashscripts/docs/prompts/13-path-and-naming-rules.md` — naming audit
- `bashscripts/docs/prompts/19-docs-second-brain.md` — wiki pattern
- `bashscripts/ai/wiki/rules/00-TRIGGER_MAP.md` — prompt routing
- `laravel/Modules/Media/docs/coverage.md` — coverage baseline

## Execution Flow

1. **Audit phase**: Read all 150 prompt files, check metadata YAML
2. **Prioritization**: Select 5-7 high-impact prompts
3. **Execution phase**: Run quality-gates + naming audit + wiki update
4. **Reporting phase**: Document results in PROMPT-EXECUTION-LOG.md
5. **Closure phase**: Commit all changes + update sprint-status.yaml

## Blockers

None — straightforward audit + execution.

---

*Story created: 2026-09-06 via BMAD create-story workflow*
