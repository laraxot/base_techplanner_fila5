# Leveraging Design Comuni Assets

## Overview
When implementing UI components that aim for visual parity with Design Comuni, it is more efficient to leverage existing Design Comuni source code and assets rather than reimplementing from scratch. This approach reduces development time, ensures consistency, and allows focus on adapting the design to our specific stack (Tailwind CSS, Alpine.js, Lit) rather than recreating the design.

## Why Leverage Existing Assets?
- **Consistency**: Directly using Design Comuni's HTML structure, CSS variables, and SVG assets ensures pixel-perfect parity.
- **Efficiency**: Saves time by avoiding redesign and reimplementation of common UI patterns.
- **Maintainability**: Updates to Design Comuni can be more easily tracked and integrated.
- **Focus**: Allows developers to concentrate on stack-specific adaptations (e.g., converting Bootstrap classes to Tailwind, integrating Alpine.js behavior, replacing vanilla JS with Lit components).

## How to Leverage Design Comuni Assets in Fixcity
1. **Source Acquisition**:
   - Clone or download the Design Comuni static site repository: `https://github.com/italia/design-comuni-pagine-statiche`
   - Store the raw source in `docs/raw/design-comuni/` (or similar) for version control and reference.

2. **Analysis and Extraction**:
   - Identify the specific component or page needed (e.g., header from `segnalazione-02-dati.hbs`).
   - Extract the HTML structure, noting unique classes, IDs, and data attributes.
   - Extract relevant CSS (custom properties, component-specific styles) and JS (if any).

3. **Adaptation to Fixcity Stack**:
   - **HTML**: Convert to Blade syntax, preserving structure and semantic meaning.
   - **CSS**:
     - Map Design Comuni CSS variables to Tailwind CSS via `design-comuni-tokens.css` or similar.
     - Convert component-specific styles to Tailwind utility classes or custom CSS in `app.css`.
     - Ensure dark mode and responsive considerations are maintained.
   - **JavaScript**:
     - Replace any vanilla JS with Alpine.js directives where appropriate.
     - For complex interactions, consider Lit web components (as used in Fixcity for maps, etc.).
     - Ensure compatibility with Livewire (used in Fixcity wizards) by avoiding direct DOM manipulation that conflicts with Livewire's morphing.

4. **Integration**:
   - Place adapted Blade components in the appropriate theme directory (e.g., `laravel/Themes/Sixteen/resources/views/components/sections/header/`).
   - Update asset imports (images, SVGs) to point to the correct locations in `public/` or `resources/`.
   - Add any necessary Tailwind configuration (if custom CSS is required).

5. **Verification**:
   - Use visual regression tools or manual comparison to ensure parity with the Design Comuni reference.
   - Test across breakpoints and states (e.g., dropdown open/closed, authenticated/guest).

## Example: Header Implementation
For the Fixcity header (based on Design Comuni's `segnalazione-02-dati.html`):
- **HTML Structure**: The header's skeleton (container, rows, columns) was preserved.
- **Branding Colors**: Adapted the color scheme to use Fixcity's local branding (dark green `#00402B` and green `#007A52`) while maintaining the same layout.
- **Components**:
  - Language switcher: Adapted from Design Comuni's dropdown, using `data-bs-toggle` for compatibility with Sixteen's runtime owner-side JavaScript.
  - User dropdown: Similarly adapted, ensuring it works after Livewire re-renders.
  - Logo and text: The "Il mio Comune" and "Un comune da vivere" were kept, with the regione name made transparent to inherit the slim header background.
- **Assets**: Logos, icons (from Bootstrap Italia SVG sprite), and other assets were copied and referenced correctly.

## Documentation and Wiki Updates
When leveraging Design Comuni assets:
- Create a wiki page in `docs/wiki/concepts/` detailing the specific component adaptation (e.g., `header-design-comuni-adaptation.md`).
- Update `docs/wiki/log.md` with the ingestion and adaptation process.
- Reference the raw source in the wiki page's frontmatter.

## Related Concepts
- [[concepts/header-section-owner-rule]] - Defines the single source of truth for the header component.
- [[concepts/sixteen-header-composition-rule]] - Governs how header subcomponents are organized.
- [[concepts/design-comuni-header-auth-state]] - Details the header's behavior for guest vs. authenticated users.
- [[concepts/theme-owned-css-parity-rule]] - States that the theme owns CSS/assets, while the module/widget owns markup/state/schema.

## Implementation Notes
- Always check for existing adaptations in the theme before creating new ones to avoid duplication.
- When updating from a new Design Comuni release, diff the raw source and adapt changes accordingly.
- Use the `design-comuni-tokens.css` file to manage color, spacing, and typography tokens derived from Design Comuni.

---
*This document was created to capture the lesson learned during the implementation of header visual parity stories (7-106, 8-103, 8-104, etc.) and to guide future work on Design Comuni parity.*