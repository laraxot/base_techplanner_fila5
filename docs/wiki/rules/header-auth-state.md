---
paths:
  - "laravel/Themes/Sixteen/resources/views/components/sections/header/**/*.blade.php"
  - "laravel/Themes/Sixteen/resources/views/components/sections/header/v1.blade.php"
  - "laravel/Themes/Sixteen/docs/wiki/concepts/header-*.md"
---

# Header Auth State Rule

## Source Of Truth

When the layout uses `<x-section slug="header" />`, the owner file is:

`laravel/Themes/Sixteen/resources/views/components/sections/header/v1.blade.php`

Do not patch deprecated header shells or Bootstrap Italia wrappers for this flow.

## Required Behavior

Guest users:

- show one login block/button for the personal area;
- do not show avatar, user name, or user dropdown.

Authenticated users:

- show the slim header user block;
- resolve the visible name from profile/user fields, then email fallback;
- show translated dropdown entries;
- logout must remain a POST action;
- do not show the guest login button.

## Dropdown Contract

Header dropdowns are controlled by the existing Alpine `x-data` / `x-show` wiring in `v1.blade.php`.

Do not add a second dropdown system with Bootstrap JS, `data-bs-toggle`, or custom vanilla JS.

## Visual Contract

- The readable user name is the primary signal.
- Avatar/icon is secondary.
- Dropdown affordance must remain visible.
- Slim header icons on blue background must be white.

## Verification

Runtime verification must include guest, authenticated, and open-menu states.

Canonical theme docs:

- `laravel/Themes/Sixteen/docs/wiki/concepts/header-authenticated-state.md`
- `laravel/Themes/Sixteen/docs/wiki/concepts/header-slim-dropdown-behavior.md`
