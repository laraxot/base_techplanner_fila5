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

## Investigation: CMS Duplicate Page Slug Diagnostics — 2026-10-06

- Symptom: CMS home rendering exposed only "2 records were found."
- Root cause: Page JSON-backed data contains duplicate home rows (id=3, id=1).
- Decision: Keep sole() fail-fast semantics and add model/slug/side/ID context; remove arbitrary first() fallback.
- Artifacts: bmad-output/investigation-cms-duplicate-page-slug-2026-10-06.md and story 8.5.cms-duplicate-page-slug-diagnostics.

# Domain enums over Employee model constants — 2026-10-06

- Decision: replace finite Employee status vocabularies with backed enums.
- Scope: absence-request status/type and time-entry status; technical constants remain constants.
- Rationale: improve domain typing and preserve the existing persisted string contract without turning URLs, cache keys or limits into artificial enums.
- Story: bmad-output/stories/8.6.domain-enums-over-model-constants.story.md.
