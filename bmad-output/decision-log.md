# Decision Log

## [2026-09-06] PHPStan Module Fixes - Tech Spec Creation

**Decision:** Create Quick Flow tech spec for PHPStan error fixes across Activity and Employee modules

**Rationale:** 
- PHPStan analysis revealed 26 errors across 2 modules
- Scope is well-defined and small (9 stories estimated)
- Clear requirements: fix errors, validate with tools, git sync, update docs
- Quick Flow track appropriate for 1-15 story range

**Context:**
- Cannot modify phpstan.neon (USER-ONLY restriction)
- Must use BMAD methodology with story creation
- Must coordinate with other agents via stories
- Each module has separate .git directory
- Git workflow: fetch, merge, commit, push (no --force)

**Impact:** Enables systematic fix of all PHPStan errors with proper validation and coordination

---

## [2026-09-06] Cms Module PHPStan Errors - Scope and Story Creation

**Decision:** Add Epic 6 (Cms Module Fixes) with 2 stories to handle argument.type and cast.string errors

**Rationale:**
- PHPStan quality-gates optimization run identified 6 Cms test errors
- Errors in PublicProfileRouteTest.php (argument.type) and HomepageContentManagementTest.php (cast.string + function.alreadyNarrowedType)
- Scope is independent of previous epics; can run in parallel with docs/git-sync
- Fixes follow established pattern: narrow mixed → is_*() guard, remove redundant casts

**Context:**
- Quality gates prompt (v4.0.0) improved and optimized; now includes quick-start sequence
- Git sync script created (bashscripts/tools/git/sync-module.sh) to prevent future divergence
- Cms module git sync happened after quality-gate run
- Stories 6.1 and 6.2 marked ready-for-dev

**Impact:** Closes quality gaps in Cms test suite; establishes pattern for cast.string fixes across all modules