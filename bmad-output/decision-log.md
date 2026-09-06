
## SPEC created — 2026-09-06
- Source: bashscripts/docs/prompts/ directory analysis
- Key scope decision: DRY-first — link to wiki, don't duplicate content; forward-only git; max 6 .md files per module docs folder

## Epic 1 (Prompt Directory Analysis & Cleanup) — 2026-09-06
- 5 stories created: 1.1 (deduplication), 1.2 (frontmatter), 1.3 (wiki-links), 1.4 (naming), 1.5 (bmad-integration)
- All status: ready-for-dev
- Order: 1.1 → 1.2 → 1.3 → 1.4 → 1.5 (sequential dependencies)
- Next: execute 1.1 deduplication, then session gate

## Story 9.1 (PHPStan L10 Phase 2) — 2026-09-07
- Continuation of Phase 2A (Lang→Activity→Job→User→Notify→Xot blockers)
- Baseline: 61 errors → 44 errors remaining (17 fixed, 27% reduction)
- Execution: Per-module fixes (Activity 14→0, Employee 6 cast fixed, 14/16 modules clean)
- Results: Activity complete (committed, pushed), 14 modules PHPStan clean, Employee blocked on TextEntry migration
- Source: [bmad-output/stories/9.1.phpstan-l10-phase2-fixes.story.md]

## Story 9.2 (Employee Filament TextEntry Migration) — 2026-09-07
- Scope: Employee module, 23 remaining errors (class.notFound TextEntry)
- Root cause: Filament v4→v5 API change (TextEntry moved/renamed)
- Status: ready-for-dev (investigation phase, v5 API location to be confirmed)
- Blocked AC: Identify v5 TextEntry class location (Infolist\Components vs other)
- Source: [bmad-output/stories/9.2.employee-filament-textentry-fix.story.md]
