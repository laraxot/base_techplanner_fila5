# Technical Specification: PHPStan Module Analysis and Fixes

**Date:** 2026-09-06
**Author:** Devin AI Agent
**Version:** 1.0
**Track:** Quick Flow (1-15 stories)
**Status:** Draft

> **Quick Flow track** — this document replaces a separate PRD and architecture file for
> small-scope work. If scope grows beyond ~15 stories, migrate to the BMad Method track
> (bmad-prd + bmad-architecture) before continuing.

---

## Related Documents

- Project context: `bmad-output/project-context.md`
- Decision log: `bmad-output/decision-log.md`
- PHPStan configuration: `laravel/phpstan.neon` (USER-ONLY, cannot be modified)

---

## Problem & Solution

### Problem Statement

PHPStan analysis on the Modules directory revealed 26 static analysis errors across 2 modules:
- **Activity module**: 1 error (type coverage issue)
- **Employee module**: 25 errors (deprecated Filament methods, type mismatches, unknown classes)

These errors prevent the codebase from meeting PHPStan max-level standards and indicate potential runtime issues, deprecated API usage, and type safety problems.

### Proposed Solution

Systematically fix all 26 PHPStan errors by:
1. Replacing deprecated Filament methods with current API equivalents
2. Fixing type mismatches and adding proper type annotations
3. Resolving unknown class references (likely Filament v5 API changes)
4. Improving type coverage where below 99%
5. Validating each fix with PHPStan, PHPMD, PHPInsights, and Pest
6. Synchronizing each module with git after fixes
7. Updating module documentation to reflect changes

### Goals

- Achieve zero PHPStan errors across all Modules
- Maintain or improve code quality metrics (PHPMD, PHPInsights)
- Increase Pest test coverage where applicable
- Ensure all modules are properly synchronized with git
- Update documentation to reflect architectural improvements

---

## Scope

### In Scope

- Fix all 26 PHPStan errors in Activity and Employee modules
- Run PHPStan, PHPMD, PHPInsights validation on each fixed file
- Add/improve Pest tests for fixed code
- Git synchronization (fetch, merge, commit, push) for each module
- Update module documentation (docs/ folders)
- Use BMAD methodology with story creation and coordination

### Out of Scope

- Modifying phpstan.neon configuration (USER-ONLY restriction)
- Changes to other modules not showing errors
- Feature additions beyond fixing the reported errors
- Performance optimizations not related to type safety

---

## Requirements

### Functional Requirements

#### FR-001: Fix Activity Module Type Coverage Error [MUST]

Resolve type coverage issue in `Activity/app/Actions/RedactModelAttributesAction.php` by improving constant type coverage from 97.9% to over 99%.

**Acceptance Criteria:**
- Type coverage reaches 99% or higher
- PHPStan reports no errors for Activity module
- PHPMD and PHPInsights pass without new issues

---

#### FR-002: Fix Employee Module Deprecated Methods [MUST]

Replace deprecated `form()` method with `schema()` in `Employee/app/Filament/Resources/WorkHourResource/Pages/TimeClockPage.php`.

**Acceptance Criteria:**
- Deprecated method call removed
- New schema() method properly implemented
- PHPStan deprecation error resolved
- Functionality remains equivalent

---

#### FR-003: Fix Employee Module Type Mismatches [MUST]

Resolve `strval()` parameter type issues in `Employee/app/Filament/Resources/WorkHourResource/Pages/TimeClockPage.php` by adding proper type annotations or type guards.

**Acceptance Criteria:**
- All strval() calls receive properly typed parameters
- PHPStan type errors resolved
- No runtime type errors introduced

---

#### FR-004: Fix Employee Widget TextEntry Class Issues [MUST]

Resolve unknown class `Filament\Schemas\Components\TextEntry` errors in Employee widgets by using correct Filament v5 API classes.

**Affected files:**
- `Employee/app/Filament/Widgets/AttendanceOverviewWidget.php`
- `Employee/app/Filament/Widgets/LeaveBalanceWidget.php`
- `Employee/app/Filament/Widgets/TeamPresenceWidget.php`

**Acceptance Criteria:**
- Correct Filament v5 TextEntry classes used
- All unknown class errors resolved
- Widget functionality preserved
- Schema parameter types corrected

---

#### FR-005: Fix Employee Module Type Coverage [MUST]

Improve constant type coverage in `Employee/app/Models/WorkHour.php` from 97.9% to over 99%.

**Acceptance Criteria:**
- Type coverage reaches 99% or higher
- No functional changes to model behavior
- PHPStan type coverage error resolved

---

#### FR-006: Validate Fixes with Multiple Tools [MUST]

Run comprehensive validation on each fixed file using PHPStan, PHPMD, PHPInsights, and Pest.

**Acceptance Criteria:**
- PHPStan reports zero errors for fixed files
- PHPMD passes without new issues
- PHPInsights passes without new issues
- Pest tests pass with coverage maintained or improved

---

#### FR-007: Git Synchronization for Each Module [MUST]

Properly synchronize each module with git using the specified workflow: fetch, merge, commit, push.

**Acceptance Criteria:**
- Git fetch from laraxot dev branch completed
- Merge with --allow-unrelated-histories -s resolve completed
- All changes committed with descriptive messages
- Push to remote with -u flag completed
- No force push used

---

#### FR-008: Update Module Documentation [SHOULD]

Update docs/ folders in Activity and Employee modules to reflect the fixes and any architectural improvements.

**Acceptance Criteria:**
- Documentation updated to reflect API changes
- Type safety improvements documented
- Migration notes added if applicable

---

### Non-Functional Requirements

#### Performance

- Static analysis execution time should not significantly increase
- Runtime performance should not be negatively impacted

#### Security

- Type safety improvements should reduce potential runtime type errors
- No security vulnerabilities introduced by fixes

#### Accessibility / Compliance

- Code should maintain PHPStan level 10 compliance
- Follow Laravel and Filament best practices

#### Other

- Maintain backward compatibility where possible
- Follow existing code conventions in each module

---

## Technical Approach

### Technology Stack

| Layer | Technology | Notes |
|-------|-----------|-------|
| Static Analysis | PHPStan level 10 | Configuration file: phpstan.neon (USER-ONLY) |
| Code Quality | PHPMD, PHPInsights | Located in ./tools directory |
| Testing | Pest | Increment coverage with fixes |
| Version Control | Git | Separate .git per module |
| Framework | Laravel, Filament v5 | Target current API |

### Architecture Overview

The fix process follows a module-by-module approach:

1. **Analysis Phase**: Run PHPStan to identify all errors per module
2. **Fix Phase**: Systematically address each error category
3. **Validation Phase**: Run PHPStan, PHPMD, PHPInsights, Pest on each fixed file
4. **Documentation Phase**: Update module docs to reflect changes
5. **Synchronization Phase**: Git fetch, merge, commit, push per module
6. **Coordination Phase**: Use BMAD stories for agent coordination

### Key Components

#### PHPStan Error Categories

**Purpose:** Categorize errors for systematic fixing

**Responsibilities:**
- Type coverage issues (constant types)
- Deprecated method calls (Filament API)
- Type mismatches (parameter types)
- Unknown class references (API changes)

**Interfaces / Contracts:**
- Fix one category at a time
- Validate after each category
- Document API changes

---

#### Validation Pipeline

**Purpose:** Ensure code quality after each fix

**Responsibilities:**
- Run PHPStan on fixed files
- Run PHPMD from ./tools
- Run PHPInsights from ./tools
- Run Pest with coverage reporting

**Interfaces / Contracts:**
- All tools must pass before proceeding
- Coverage should not decrease
- New issues should not be introduced

---

#### Git Workflow

**Purpose:** Synchronize module changes with remote

**Responsibilities:**
- Fetch from laraxot dev branch
- Merge with unrelated histories
- Commit with descriptive messages
- Push to remote without force

**Interfaces / Contracts:**
- Pattern: `git fetch laraxot dev && git merge laraxot/dev --allow-unrelated-histories -s resolve && git push -u`
- Never use --force
- Work in current branch only

---

### Data Model

No data model changes - this is static analysis and code quality improvement only.

### API Design

No API design changes - fixing existing code to meet type safety standards.

### Error Handling Strategy

- If PHPStan cannot be fixed without modifying phpstan.neon, escalate to user
- If fixes break existing functionality, add tests to prevent regression
- If git merge conflicts occur, coordinate with other agents via BMAD stories

---

## Story List

| # | Epic | Story Title | Notes |
|---|------|-------------|-------|
| 1 | Activity Module | Fix Activity Type Coverage Error | Improve constant type coverage in RedactModelAttributesAction |
| 2 | Employee Module | Fix Employee Deprecated Methods | Replace form() with schema() in TimeClockPage |
| 3 | Employee Module | Fix Employee Type Mismatches | Resolve strval() parameter type issues |
| 4 | Employee Module | Fix Employee Widget TextEntry Issues | Resolve unknown class errors in 3 widgets |
| 5 | Employee Module | Fix Employee Model Type Coverage | Improve constant type coverage in WorkHour model |
| 6 | Validation | Validate All Fixes with Quality Tools | Run PHPStan, PHPMD, PHPInsights, Pest |
| 7 | Git Sync | Synchronize Activity Module with Git | Fetch, merge, commit, push Activity module |
| 8 | Git Sync | Synchronize Employee Module with Git | Fetch, merge, commit, push Employee module |
| 9 | Documentation | Update Module Documentation | Update docs/ folders in both modules |

**Total stories:** 9 (Quick Flow ceiling: 15)

---

## Testing Strategy

### Unit Testing Focus

- Add Pest tests for any refactored code paths
- Ensure existing tests continue to pass
- Target coverage improvement where test gaps exist

### Integration / End-to-End Scenarios

- Verify Filament widgets still render correctly after API fixes
- Ensure TimeClockPage functionality preserved after schema() migration
- Validate that type annotations don't break runtime behavior

### Performance / Load Considerations

- Static analysis performance should not degrade
- Runtime performance should be equivalent or better due to type safety

### Security Testing Notes

- Type safety improvements reduce risk of runtime type errors
- No new security vulnerabilities should be introduced

---

## Dependencies

### External Dependencies

| Dependency | Version / Constraint | Purpose | Risk |
|------------|---------------------|---------|------|
| PHPStan | level 10 | Static analysis | Configuration locked, cannot modify |
| PHPMD | via ./tools | Code quality | May need configuration adjustments |
| PHPInsights | via ./tools | Code quality | May need configuration adjustments |
| Pest | current | Testing | Need to maintain coverage |
| Filament | v5 | UI framework | API changes causing unknown class errors |

### Internal / Shared Dependencies

- XotBase patterns for type handling
- LangBase for Filament extensions
- Laraxot for data access patterns

---

## Risks & Mitigations

| Risk | Impact | Probability | Mitigation |
|------|--------|-------------|------------|
| Filament v5 API changes not fully documented | High | Medium | Research Filament v5 upgrade guides, test thoroughly |
| Type annotations break existing functionality | High | Low | Add comprehensive Pest tests before changes |
| Git merge conflicts with other agents | Medium | Medium | Use BMAD stories for coordination, fetch frequently |
| phpstan.neon configuration needs modification | High | Low | Escalate to user if required (USER-ONLY) |
| Documentation updates become outdated | Low | Medium | Keep docs in sync with code changes |

---

## Assumptions & Constraints

### Assumptions

1. Filament v5 TextEntry classes exist but under different namespace
2. Type coverage improvements can be achieved without functional changes
3. Git workflow can accommodate multiple agents working on same modules
4. PHPStan level 10 is achievable without configuration changes

### Constraints

1. Cannot modify phpstan.neon (USER-ONLY restriction)
2. Must use BMAD methodology with story creation and agent coordination
3. Cannot use git --force flag
4. Must work in current branch only (no branch creation)
5. Must replace "mixed" types with more specific types where possible
6. Must replace User model with UserContract or XotData methods where applicable

---

## Success Criteria

How we know this work is complete:

- [ ] PHPStan reports zero errors across all Modules
- [ ] PHPMD passes without new issues
- [ ] PHPInsights passes without new issues
- [ ] Pest tests pass with coverage maintained or improved
- [ ] All modules synchronized with git using specified workflow
- [ ] Module documentation updated to reflect changes
- [ ] All MUST functional requirements implemented and accepted
- [ ] Non-functional targets met (see NFR section)
- [ ] All stories reach `done` status

---

## Decisions Log Summary

| Decision | Rationale | Date |
|----------|-----------|------|
| Use Quick Flow track | Small scope (9 stories), clear requirements | 2026-09-06 |
| Fix by module, not by error type | Better git synchronization workflow | 2026-09-06 |
| Coordinate via BMAD stories | User requirement for multi-agent coordination | 2026-09-06 |

---

## Next Steps

This tech spec is the Quick Flow planning artifact. Proceed to story creation:

1. Use **bmad-epics-and-stories** to expand the Story List into full story files under
   `bmad-output/stories/`.
2. Story file naming: `{epic}.{story}.{slug}.story.md`
   (e.g., `1.1.activity-type-coverage.story.md`)
3. Once stories reach `ready-for-dev` status, hand off to your dev tool / plugin.

If scope has grown beyond 15 stories, switch to the BMad Method track before creating
stories: run **bmad-prd** to capture full requirements, then **bmad-architecture** to
design the system, then return to story planning.

---

*Technical Specification — Quick Flow Track — BMAD Method by the BMAD Code Organization*