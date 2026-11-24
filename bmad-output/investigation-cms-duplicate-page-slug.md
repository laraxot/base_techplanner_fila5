---
title: "CMS duplicate page slug diagnostics"
type: investigation
status: resolved
created: 2026-10-06
updated: 2026-10-06
tags: [cms, duplicate, slug, sushi-json, folio, error-diagnostics]
---

# CMS duplicate page slug diagnostics

## Symptom summary

GET /it raised Illuminate\Database\MultipleRecordsFoundException with the
unhelpful message "2 records were found." while rendering the CMS home page.

## Evidence

| Grade | Evidence | Source |
|---|---|---|
| A | Page::getBlocksBySlug('home', 'content') reproduces the exception path. | Direct application tinker run |
| A | The Page query returns id=3 and id=1, both with slug=home. | Direct database query |
| A | HasBlocks::getBlocksBySlug() calls sole() on where('slug', $slug). | Modules/Cms/app/Models/Traits/HasBlocks.php:121-124 |
| B | JSON-backed Sushi rows are loaded from config/local/<tenant>/database/content/pages/*.json. | Modules/Tenant/app/Models/Traits/SushiToJsons.php |
| A | The raw exception does not identify model, slug, side, or conflicting IDs. | Laravel exception output |

## Root cause

The CMS contract requires one content record per slug, but the Sushi JSON
source contains multiple page rows for home. sole() correctly detects the
data-integrity violation; its default exception message does not provide
enough context to repair the source.

## Implemented resolution

HasBlocks::getBlocksBySlug() now keeps the fail-fast behavior and throws a
contextual exception containing:

- model class;
- number of matching records;
- requested slug and side;
- conflicting record IDs and slugs.

The previous first() fallback was removed because it silently selected an
arbitrary content record.

## Verification

- PHPStan on HasBlocks.php: PASS.
- Pint on HasBlocks.php: PASS.
- Direct reproduction reports id=3 slug=home, id=1 slug=home.
- CMS Pest execution is blocked by unavailable test database
  techplanner_data_test; no test assertion ran.

## Follow-up

Remove or rename the duplicate JSON content rows according to the intended
tenant content, then add a uniqueness check for JSON-backed CMS slugs.
