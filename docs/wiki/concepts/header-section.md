---
title: Header Section (Design Comuni)
type: concept
module: UI
updated: 2026-04-20
---

# Header Section

The site header is rendered through a **section component**:

```blade
<x-section slug="header" />
```

This component loads the Blade view located at:

```
laravel/Themes/Sixteen/resources/components/sections/header/v1.blade.php
```

## Source of truth
  
The **canonical implementation** lives at:

```
laravel/Themes/Sixteen/resources/components/sections/header/v1.blade.php
```

- This file is the **single source of truth** for:
  - Slim bar structure and markup
  - Language selector dropdown
  - Authenticated user dropdown
  - Guest state logic
- Do **not** treat `bootstrap-italia/header.blade.php` as the primary reference — it is **not** tied to `<x-section slug="header" />`.

## Behaviour
- **Guest users** see a slim bar with the *"Accedi all'area personale"* button (link to `route('login')`), salvo documented variants.
- **Authenticated users** see display name, avatar (or initial), user dropdown with area personal links, and logout.
- **Language selector** and **user dropdown** in the slim bar use `data-bs-toggle="dropdown"` + `Themes/Sixteen/resources/js/app.js` (Story 7-54); colors/tokens come from Design Comuni CSS, not hard‑coded hex values in Blade.
- The **user avatar** resolves from profile data; a fallback initial appears when no photo is set.

## Implementation notes
- The view uses Blade `@guest` / `@else` directives to switch between guest and authenticated states.
- **Avatar resolution**: profile photo → URL or fallback `images/default-avatar.png`; otherwise initials rendered.
- **Dropdowns** leverage Design Comuni SVG sprite (`/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg`).
- All links and icons follow Design Comuni accessibility rules (ARIA labels, `visually-hidden` text).

## Styling
- Header uses classes `it-header-wrapper` and `it-header-slim-wrapper`.
- Background colour is a **Design Comuni CSS token** (defined in `design-comuni-tokens.css`); avoid inline hex overrides unless explicitly documented.
- Dropdowns use `.dropdown-menu` + `.show` (added by `app.js`) with smooth transitions.

## Testing
- Verify both states on URLs rendering `<x-section slug="header" />` (e.g., `/it/tests/segnalazione-crea`).
- Check dropdown language & user menus: opening, closing, click‑outside, and colour consistency.
- Run the structural regression test: `Themes/Sixteen/tests/Unit/HeaderV1SlimDropdownContractTest.php` (Story 7-54).

## References
- Design Comuni – [Header reference](https://italia.github.io/design-comuni-pagine-statiche/servizi/graduatoria-area-personale.html)
- Companion documents:
  - [Header section owner rule](./header-section-owner-rule.md)
  - Blade file: `laravel/Themes/Sixteen/resources/components/sections/header/v1.blade.php`