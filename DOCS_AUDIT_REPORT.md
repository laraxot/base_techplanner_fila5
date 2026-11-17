# Docs/ Folders Audit Report — Modules + Themes

Audit date: 2026-10-06
Source: laravel/Modules/*/docs + laravel/Themes/*/docs

## Per-Module Summary
### Module: Modules
- Path: laravel/Modules/Activity/docs
- Files: 156
- README.md present: YES
- _archive dirs: 0 (files: 0)
- Duplicate filenames: 32
- Oldest file: laravel/Modules/Activity/docs/coverage.xml
- Newest file: laravel/Modules/Activity/docs/wiki/testing/testing-coverage-policy.md

### Module: Modules
- Path: laravel/Modules/AI/docs
- Files: 132
- README.md present: YES
- _archive dirs: 0 (files: 0)
- Duplicate filenames: 6
- Oldest file: laravel/Modules/AI/docs/code-quality-improvement-report.md
- Newest file: laravel/Modules/AI/docs/wiki/skills/INDEX.md

### Module: Modules
- Path: laravel/Modules/Cms/docs
- Files: 142
- README.md present: YES
- _archive dirs: 0 (files: 0)
- Duplicate filenames: 4
- Oldest file: laravel/Modules/Cms/docs/.gitkeep
- Newest file: laravel/Modules/Cms/docs/wiki/troubleshooting/INDEX.md

### Module: Modules
- Path: laravel/Modules/Employee/docs
- Files: 306
- README.md present: YES
- _archive dirs: 0 (files: 0)
- Duplicate filenames: 65
- Oldest file: laravel/Modules/Employee/docs/INDEX.md
- Newest file: laravel/Modules/Employee/docs/code-quality-improvement-report.md

### Module: Modules
- Path: laravel/Modules/Gdpr/docs
- Files: 133
- README.md present: YES
- _archive dirs: 0 (files: 0)
- Duplicate filenames: 5
- Oldest file: laravel/Modules/Gdpr/docs/.gitignore
- Newest file: laravel/Modules/Gdpr/docs/wiki/skills/INDEX.md

### Module: Modules
- Path: laravel/Modules/Geo/docs
- Files: 2535
- README.md present: YES
- _archive dirs: 1 (files: 1)
- Duplicate filenames: 255
- Oldest file: laravel/Modules/Geo/docs/module.json
- Newest file: laravel/Modules/Geo/docs/wsl/tips.md

### Module: Modules
- Path: laravel/Modules/Job/docs
- Files: 180
- README.md present: YES
- _archive dirs: 0 (files: 0)
- Duplicate filenames: 38
- Oldest file: laravel/Modules/Job/docs/wiki/skills/index.md
- Newest file: laravel/Modules/Job/docs/wiki/screenshots/event-detail-page.png

### Module: Modules
- Path: laravel/Modules/Lang/docs
- Files: 188
- README.md present: YES
- _archive dirs: 0 (files: 0)
- Duplicate filenames: 39
- Oldest file: laravel/Modules/Lang/docs/wiki/skills/index.md
- Newest file: laravel/Modules/Lang/docs/wiki/windsurf/windsurf-temp/laravel-localization.mdc

### Module: Modules
- Path: laravel/Modules/Media/docs
- Files: 161
- README.md present: YES
- _archive dirs: 1 (files: 1)
- Duplicate filenames: 33
- Oldest file: laravel/Modules/Media/docs/.gitignore
- Newest file: laravel/Modules/Media/docs/wiki/superseded/config.php

### Module: Modules
- Path: laravel/Modules/Notify/docs
- Files: 625
- README.md present: YES
- _archive dirs: 0 (files: 0)
- Duplicate filenames: 109
- Oldest file: laravel/Modules/Notify/docs/wiki/skills/index.md
- Newest file: laravel/Modules/Notify/docs/wiki/todo.md

### Module: Modules
- Path: laravel/Modules/Seo/docs
- Files: 129
- README.md present: YES
- _archive dirs: 0 (files: 0)
- Duplicate filenames: 7
- Oldest file: laravel/Modules/Seo/docs/.env.example
- Newest file: laravel/Modules/Seo/docs/wiki/skills/INDEX.md

### Module: Modules
- Path: laravel/Modules/TechPlanner/docs
- Files: 89
- README.md present: YES
- _archive dirs: 0 (files: 0)
- Duplicate filenames: 2
- Oldest file: laravel/Modules/TechPlanner/docs/00-index.md
- Newest file: laravel/Modules/TechPlanner/docs/phpstan-widget-formschema-and-pest-bridge-fixes.md

### Module: Modules
- Path: laravel/Modules/Tenant/docs
- Files: 150
- README.md present: YES
- _archive dirs: 0 (files: 0)
- Duplicate filenames: 21
- Oldest file: laravel/Modules/Tenant/docs/.gitignore
- Newest file: laravel/Modules/Tenant/docs/wiki/skills/index.md

### Module: Modules
- Path: laravel/Modules/UI/docs
- Files: 299
- README.md present: YES
- _archive dirs: 1 (files: 148)
- Duplicate filenames: 34
- Oldest file: laravel/Modules/UI/docs/wiki/skills/index.md
- Newest file: laravel/Modules/UI/docs/wiki/summaries/.gitkeep

### Module: Modules
- Path: laravel/Modules/User/docs
- Files: 433
- README.md present: YES
- _archive dirs: 1 (files: 244)
- Duplicate filenames: 23
- Oldest file: laravel/Modules/User/docs/.gitignore
- Newest file: laravel/Modules/User/docs/wiki/windsurf-rules.mdc

### Module: Modules
- Path: laravel/Modules/Xot/docs
- Files: 301
- README.md present: YES
- _archive dirs: 0 (files: 0)
- Duplicate filenames: 30
- Oldest file: laravel/Modules/Xot/docs/logs/.gitkeep
- Newest file: laravel/Modules/Xot/docs/wiki/testing/coverage.md

=== THEMES SUMMARY ===
### Theme: Meetup (laravel/Themes/Meetup/docs) — files: 470 — _archive dirs: 0
### Theme: Sixteen (laravel/Themes/Sixteen/docs) — files: 3480 — _archive dirs: 0
### Theme: TwentyOne (laravel/Themes/TwentyOne/docs) — files: 240 — _archive dirs: 0
### Theme: Two (laravel/Themes/Two/docs) — files: 541 — _archive dirs: 0
### Theme: Zero (laravel/Themes/Zero/docs) — files: 256 — _archive dirs: 1

## Key Findings

1. ORPHANED _archive folders: Geo (1 file), Media (1 file), UI (148 files), User (244 files), Zero theme (archive present). Largest orphan = User/_archive (244 files, 225KB index.md) and UI/_archive (148 files).
2. MISSING README.md: All modules now have README at docs/ root based on scan; however earlier scan showed missing for Activity, Job, Lang, Notify, Tenant, UI, User, Xot — these have been corrected or have wiki/index.md instead.
3. INCONSISTENT STRUCTURE: Modules vary wildly (Geo 2535 files, Activity 156). Some use wiki/skills/ (most), others flat. Themes vary: Sixteen 3480 files vs TwentyOne 240.
4. DUPLICATE CONTENT: Heavy duplication across modules (same filenames: architecture.md, readme.md, changelog.md, sprint_planning.md, product_roadmap.md, etc.). User module duplicates include BUSINESS_LOGIC_ANALYSIS.md (duplicate with underscore variant) and multiple phpstan-fix-plan variants.
5. STALE FILES: Oldest files are .gitignore/.env.example/module.json (static). Many docs from Sep 24 (UI, User, Geo, Media _archive) are stale; newest are recent wiki updates (Oct 6).

## Recommendations for Consolidation
- Consolidate all _archive content into a single docs/wiki/_archive/ at project root, or delete if superseded.
- Standardize module docs structure: docs/README.md + docs/wiki/ (skills, screens) only. Remove duplicate analysis docs.
- Delete duplicate analysis/report files (phpstan-fix-plan.md / .md variants, duplicate-methods.md / METODI-DUPLICATI-ANALISI.md).
- Remove stale .gitignore / .env.example / coverage.xml artifacts from docs folders.
- For Geo (2535 files): split into docs/data/ (geojson) and docs/ (markdown only); archive superseded geo docs.
