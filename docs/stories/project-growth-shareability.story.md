---
title: "Project growth and shareability foundations"
type: story
status: ready-for-dev
priority: high
tags: [growth, seo, sharing, accessibility, multilingual, theme-two, filament]
qmd: "project growth shareability viral seo social previews multilingual accessible sharing"
---

# Project growth and shareability foundations

## Intent

Increase qualified discovery and voluntary sharing by making every public Theme Two
page understandable, indexable, previewable and easy to share. “Viral” is treated as
a measurable product loop, not as blind traffic generation: useful content → clear
value → accessible share/save action → attributable return visit.

## Guardrails

- Theme Two is the active front office; Sixteen parity work is out of scope.
- Preserve Folio/Volt/Laraxot front-office routing and multilingual translation rules.
- Keep SEO ownership in Cms/Seo; do not couple Seo to domain modules.
- Filament changes use XotBase/LangBase and the existing project abstractions.
- No intrusive tracking, dark patterns, hardcoded Italian copy, or guessed routes.
- No commit and no broad documentation renames in this pass.

## Acceptance criteria

- Public pages expose one coherent canonical URL, locale alternates, useful title and
  description, valid social preview metadata, and appropriate Schema.org data.
- Private/authenticated pages are not promoted as public growth landing pages.
- Share actions are keyboard accessible, have translated labels, work without a
  third-party JavaScript SDK, and expose a copy-link fallback.
- Growth instrumentation is opt-in/consent-aware and documents events without PII.
- Sitemap, robots policy and head policy share one source of truth.
- PHPStan L10, focused Pest tests, view compilation and `git diff --check` pass.
- Mobile verification covers 390px width, light/dark themes, focus states and no
  horizontal overflow.

## Investigation backlog

1. Reconcile existing `SocialShareData`, `GenerateSocialShareLinksAction` and Theme
   Two rendering; remove duplication before adding UI.
2. Verify all public CMS pages have translated content before inclusion in sitemap.
3. Add/complete social image and favicon deployment checks.
4. Define privacy-safe event names and a consent boundary before any analytics code.
5. Add Filament/Blueprint-facing content fields only if the current CMS model lacks
   the data needed for previews; avoid schema changes without evidence.

## Verification matrix

| Surface | Checks |
| --- | --- |
| HTML head | canonical, hreflang, OG/Twitter, JSON-LD, robots |
| Share UI | accessible name, focus, translated copy, copy fallback |
| Mobile | 390px, dark/light, overflow, hero/header spacing |
| Crawl | sitemap/robots status, indexable URL parity |
| Quality | PHPStan, focused Pest, view cache, diff check |

## Current evidence

- The repository already contains SEO and social-share building blocks in Cms/Seo.
- Composer audit currently reports a vulnerable `symfony/mime` lock entry.
- Provider manifests currently disagree for AI, Geo and Seo.
- Full Pest discovery is blocked by a legacy Cms content-integrity data provider
  expecting absent Sixteen/Fixcity fixtures; this must be resolved explicitly.
