# Epics — PHPStan Module Fixes

> The epic MAP. A thin index, not a context object. Each epic lists its goal, the
> requirements it covers (cited to prd.md), its ordered stories, and cross-epic
> dependencies. Story detail lives in the individual {epic}.{story}.{slug}.story.md files.
>
> Track: Quick Flow
> Sources: tech-spec.md

---

## Epic 1: Activity Module Fixes

**Goal:** Fix PHPStan type coverage error in Activity module to achieve 99%+ type coverage.

**In scope (cited):**
- FR-001 — Fix Activity Module Type Coverage Error [Source: tech-spec.md#FR-001]

**Architecture touchpoints:** Activity module actions, PHPStan type coverage analysis [Source: tech-spec.md#Technical-Approach]

**Out of scope:** Changes to other modules, feature additions

**Stories (ordered):**

| ID | Slug | Intent | Status |
|------|------|--------|--------|
| 1.1 | activity-type-coverage | Fix constant type coverage in RedactModelAttributesAction | backlog |

**Cross-epic dependencies:**
- Blocked by: None
- Blocks: Epic 2 (Employee Module) — establishes pattern for type coverage fixes

---

## Epic 2: Employee Module Fixes

**Goal:** Fix all 25 PHPStan errors in Employee module including deprecated methods, type mismatches, and unknown class references.

**In scope (cited):**
- FR-002 — Fix Employee Module Deprecated Methods [Source: tech-spec.md#FR-002]
- FR-003 — Fix Employee Module Type Mismatches [Source: tech-spec.md#FR-003]
- FR-004 — Fix Employee Widget TextEntry Class Issues [Source: tech-spec.md#FR-004]
- FR-005 — Fix Employee Module Type Coverage [Source: tech-spec.md#FR-005]

**Architecture touchpoints:** Employee module Filament resources, widgets, models, PHPStan validation [Source: tech-spec.md#Technical-Approach]

**Out of scope:** Changes to other modules, feature additions

**Stories (ordered):**

| ID | Slug | Intent | Status |
|------|------|--------|--------|
| 2.1 | employee-deprecated-methods | Replace deprecated form() with schema() in TimeClockPage | backlog |
| 2.2 | employee-type-mismatches | Resolve strval() parameter type issues in TimeClockPage | backlog |
| 2.3 | employee-widget-textentry | Fix unknown TextEntry class errors in 3 widgets | backlog |
| 2.4 | employee-model-coverage | Improve constant type coverage in WorkHour model | backlog |

**Cross-epic dependencies:**
- Blocked by: Epic 1 — establishes pattern for type coverage fixes
- Blocks: Epic 3 (Validation)

---

## Epic 3: Validation and Quality Assurance

**Goal:** Validate all fixes with PHPStan, PHPMD, PHPInsights, and Pest to ensure code quality standards are met.

**In scope (cited):**
- FR-006 — Validate Fixes with Multiple Tools [Source: tech-spec.md#FR-006]

**Architecture touchpoints:** Validation pipeline, quality tools integration [Source: tech-spec.md#Technical-Approach]

**Out of scope:** New feature development, performance optimization

**Stories (ordered):**

| ID | Slug | Intent | Status |
|------|------|--------|--------|
| 3.1 | validation-tools | Run comprehensive validation on all fixed files | backlog |

**Cross-epic dependencies:**
- Blocked by: Epic 1, Epic 2 — requires all fixes to be complete
- Blocks: Epic 4 (Git Synchronization)

---

## Epic 4: Git Synchronization

**Goal:** Synchronize both Activity and Employee modules with git using the specified workflow.

**In scope (cited):**
- FR-007 — Git Synchronization for Each Module [Source: tech-spec.md#FR-007]

**Architecture touchpoints:** Git workflow, module synchronization [Source: tech-spec.md#Technical-Approach]

**Out of scope:** Force push, branch creation, working in other branches

**Stories (ordered):**

| ID | Slug | Intent | Status |
|------|------|--------|--------|
| 4.1 | git-sync-activity | Synchronize Activity module with git | backlog |
| 4.2 | git-sync-employee | Synchronize Employee module with git | backlog |

**Cross-epic dependencies:**
- Blocked by: Epic 3 — requires validation to pass
- Blocks: Epic 5 (Documentation)

---

## Epic 5: Documentation Updates

**Goal:** Update module documentation to reflect the fixes and architectural improvements.

**In scope (cited):**
- FR-008 — Update Module Documentation [Source: tech-spec.md#FR-008]

**Architecture touchpoints:** Module docs/, documentation maintenance [Source: tech-spec.md#Technical-Approach]

**Out of scope:** User-facing documentation, API documentation

**Stories (ordered):**

| ID | Slug | Intent | Status |
|------|------|--------|--------|
| 5.1 | update-module-docs | Update docs/ folders in Activity and Employee modules | backlog |

**Cross-epic dependencies:**
- Blocked by: Epic 4 — requires git sync to be complete
- Blocks: None

---

## Delivery Tracking (count-based)

No story points, velocity, or burndown. Track by COUNT only:

- Total stories: 9
- Done: 0
- Remaining: 9
- Completion rate: 0%

## Notes

Sequential execution recommended: Activity fixes → Employee fixes → Validation → Git sync → Documentation. This ensures each phase builds on the previous one and reduces coordination complexity. However, stories within Epic 2 (Employee fixes) could potentially run in parallel if they don't touch the same files.