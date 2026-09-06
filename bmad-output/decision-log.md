
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
- Baseline: 61 remaining errors post-Phase-2A (vs 108 on 2026-09-06)
- Fix strategy: cast errors → concrete types; generics.notGeneric → HasXotFactory trait generic (H1); typeCoverage → explicit constants; deprecated → Filament v5 API
- Owned scope: All 16 modules (Xot,Activity,Job,Lang,Cms,User,Notify,AI,Geo,Employee,Gdpr,Media,Seo,TechPlanner,Tenant,UI)
- Status: ready-for-dev (complete AC, source-cited Dev Notes, locked sections)
- Execution: Per-module fixes + phpstan+phpmd+phpinsights+pest verification + git sync per module + root commit
- Source: [bmad-output/stories/9.1.phpstan-l10-phase2-fixes.story.md] [bmad-output/investigation-hasxotfactory-phpstan.md] [bmad-output/PHASE2_EXECUTION_PLAN.md]
