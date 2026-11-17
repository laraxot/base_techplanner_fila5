---
title: "No .blade.php files inside tests — use fixtures"
type: "rule"
tags: [testing, conventions, views]
created: "2026-05-20"
---

Rule summary

Do not place production or view templates (.blade.php) inside tests/ directories. Test suites must not contain Blade view files except when explicitly marked as test fixtures in a dedicated fixtures folder. This avoids accidental inclusion of test-only templates in production bundles and prevents confusion about canonical view locations.

Why

- Blade files under tests may be picked up by some tooling or by packaging scripts, leading to duplication or unexpected behavior.
- Tests should validate views using fixtures or published stubs, not by embedding view files in the tests tree.
- Keeps separation of concerns: views live in module/theme resources (e.g., Modules/<Name>/Resources/views or Themes/<Name>/resources/views).

Rule details

- Never add `.blade.php` files directly under `tests/` or similar test folders.
- Create a fixtures folder for view test assets: `tests/fixtures/views/` or `laravel/Modules/<Module>/tests/fixtures/views/`.
- Use the framework helpers to render a file fixture (e.g., `view()->file($fixturePath)` or `Blade::render()`), or publish test stubs under `resources/views/test-fixtures/`.
- If a test requires a view file to live in the normal views path, place it under `resources/views/test-fixtures/` and load it via `view('test-fixtures.name')` within the test.

Migration steps for existing blade tests

1. Locate any `.blade.php` found under `tests/` (search: `find . -path "*/tests/*" -name "*.blade.php"`).
2. Move the file to `tests/fixtures/views/<relative-path>/` preserving filename.
3. Update the test to load the fixture by file path (`view()->file`) or by published view name.
4. Document the change in the module/theme `docs/wiki/CHANGELOG.md` and add an entry to `docs/chat/`.

Examples

- Good: `laravel/Modules/Fixcity/tests/fixtures/views/segnalazione-02-dati.blade.php`
- Bad: `laravel/Modules/Fixcity/tests/segnalazione-02-dati.blade.php`

Enforcement

- CI should include a check that fails the pipeline if any `*.blade.php` file exists under a `tests/` directory (unless under a `fixtures` subfolder). Add a small script `bashscripts/checks/no-test-blades.sh` and include it in CI.

Notes

- This is a repository-wide convention. Update module and theme docs (`<module>/docs/wiki/`) when migrating files.
- Add any exceptions explicitly to the module docs if necessary and justify in the changelog.

Avoid pre-fetching blocks in components

- Never pre-fetch and pass raw block collections (e.g., $blocks = Page::getBlocksBySlug(...)) from the page-mounted component into a generic <x-page> component. Always pass only orthogonal state (slug, side, data). Reasons:
  - Coupling: passing internal block objects couples caller and component to internal block shape and to DB-layer structure.
  - Staleness: pre-fetched blocks may be stale or lack theme-specific overrides; component should decide how to resolve caching/overrides.
  - Duplication: callers that prefetch may duplicate queries or bypass component-level optimizations (fragment caching, eager-loading, transforms).
  - API surface: keeping <x-page> props minimal (slug, side, data) keeps the component contract stable and easier to theme/override.

- Recommended pattern:
  1. Components accept slug, side, data. Internally the component may fetch blocks (Page::getBlocksBySlug) and apply caching/eager-loading and theme overrides.
  2. Provide an explicit optional API to accept precomputed render data (e.g., :precomputed-data) only for advanced performance paths — document and test this carefully.
  3. Keep the page-level Volt/Livewire mount minimal: set slug/pageSlug/data only; do NOT fetch blocks or perform redirects there.

- Action: update laravel/Themes/Sixteen/resources/views/pages/tests/[slug].blade.php to remove any $this->blocks = Page::getBlocksBySlug(...) and use <x-page side="content" :slug="$slug" :data="$data" />. Add docs/wiki/concepts/component-patterns.md explaining the contract and add a CI lint to detect passing $blocks into generic components.

Second-brain update

- Added rule: "component-avoid-prefetch-blocks" — prefer minimal component API: pass slug/side/data, let component fetch blocks and manage cache/overrides. Tags: components, performance, maintainability.
- Suggested TODO: implement CI check that flags patterns like 'getBlocksBySlug(' and ':blocks=>' in theme/page templates.
