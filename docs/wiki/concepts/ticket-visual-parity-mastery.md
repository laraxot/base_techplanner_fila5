---
title: "Segnalazione Visual Parity — Mastery Tracking"
type: concept
sources: ["raw/articles/2026-05-04-design-comuni-reference.md"]
confidence: high
created: 2026-05-04
updated: 2026-05-04
tags: [segnalazione, visual-parity, design-comuni, master-tracking, fixcity, sixteen, tailwind, alpine, lit]
related:
  - ../../laravel/Modules/Fixcity/docs/wiki/concepts/segnalazione-design-comuni-comparison.md
  - ../../laravel/Themes/Sixteen/docs/wiki/concepts/segnalazione-visual-parity-correction-plan.md
  - concepts/visual-control-mastery.md
  - concepts/sixteen-header-composition-rule.md
  - concepts/theme-owned-css-parity-rule.md
---

# Segnalazione Visual Parity — Mastery Tracking

> **Purpose**: Master document tracking ALL visual differences between Design Comuni reference and our implementation.
>
> **Goal**: Achieve **visual parity** (same rendered look) using **Tailwind CSS + Alpine.js + Lit**, NOT Bootstrap Italia.
>
> **Strategy**: HTML parity ≠ Visual parity. We use different tech stack but must match the rendered output.

## Reference Sources (Design Comuni)

| Page | URL | Purpose |
|------|-----|---------|
| Step 1 — Privacy | `https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-01-privacy.html` | GDPR consent |
| Step 2 — Dati | `https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-02-dati.html` | Location, service type, attachments |
| Step 3 — Riepilogo | `https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-03-riepilogo.html` | Summary before submit |
| Step 4 — Conferma | `https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-04-conferma.html` | Success state |
| Elenco | `https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html` | List + map view |
| Dettaglio | `https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-dettaglio.html` | Single ticket view |

## Implementation (Our Stack)

| Aspect | Design Comuni (Reference) | Our Implementation | Parity Strategy |
|--------|---------------------------|---------------------------|-------------------|
| **CSS Framework** | Bootstrap Italia (Bootstrap 5 + custom) | **Tailwind CSS v4** | Map Bootstrap classes to Tailwind utilities |
| **JS Behavior** | Bootstrap JS (`data-bs-toggle="dropdown"`) | **Alpine.js** (`x-data`, `x-show`) | Alpine replaces Bootstrap JS |
| **Map** | Static HTML (no JS in reference) | **Leaflet via Lit** (`coordinate-picker-lit.js`) | Lit component is our standard |
| **Templating** | Handlebars `.hbs` → static HTML | **Blade + Livewire + Filament** | Different by design (CMS vs app) |
| **Build** | Webpack (npm run build) | **Vite** (`npm run build && npm run copy`) | Same: build + copy to `public_html/themes/Sixteen/` |

## Critical Rules (NEVER FORGET)

### Rule 1: NO Inline CSS in Blade
**VIETATO** `<style>` blocks in Blade files.
- ✅ CSS goes in: `laravel/Themes/Sixteen/resources/css/app.css`
- ✅ JS goes in: `laravel/Themes/Sixteen/resources/js/app.js`
- ✅ Build: `cd laravel/Themes/Sixteen && npm run build && npm run copy`
- ✅ Verify: `ls -la public_html/themes/Sixteen/`

### Rule 2: Visual Parity ≠ HTML Parity
- **HTML parity**: Same HTML structure (impossible — we use Blade/Livewire, reference uses Handlebars)
- **Visual parity**: Same rendered appearance (**achievable** with Tailwind mapping)

**Key Insight**: Bootstrap `mb-3` = Tailwind `mb-4` (both = 1rem). Same spacing scale!

### Rule 3: Where Things Live

| What | Where | Command |
|------|------|---------|
| CSS/JS | `laravel/Themes/Sixteen/resources/` | Edit here |
| Build | `laravel/Themes/Sixteen/` | `npm run build` |
| Copy to public | Same | `npm run copy` |
| Blade templates | `laravel/Themes/Sixteen/resources/views/` | Edit directly |
| Filament widgets | `laravel/Modules/Fixcity/resources/views/filament/` | Edit directly |
| Module logic | `laravel/Modules/Fixcity/` | PHP/Filament changes |

### Rule 4: Bootstrap → Tailwind Mapping

| Bootstrap Class | Tailwind Equivalent | Notes |
|----------------|----------------------|-------|
| `container` | `container` (custom) or `max-w-7xl mx-auto px-4` | Use Tailwind's container plugin |
| `row` | `flex flex-wrap -mx-4` | Or use CSS Grid |
| `col-md-6` | `md:w-1/2 px-4` | Tailwind uses fractions |
| `mb-3` | `mb-4` | **Both = 1rem!** Tailwind: 1 = 0.25rem, 4 = 1rem |
| `p-4` | `p-4` | **Same!** |
| `text-center` | `text-center` | **Same!** |
| `d-flex` | `flex` | Tailwind removes prefixes |
| `justify-content-between` | `justify-between` | Tailwind shorthand |
| `align-items-center` | `items-center` | Tailwind shorthand |
| `bg-primary` | `bg-primary` (if configured) or `bg-[#0066CC]` | Use theme tokens |
| `text-white` | `text-white` | **Same!** |

**Color tokens**:
- Bootstrap: `--bs-primary: #0066CC`
- Tailwind: `--color-primary: #0066CC`
- ✅ Same hex values, different variable names!

## Progress Tracking

### ✅ Completed
1. **Comparison document**: `laravel/Modules/Fixcity/docs/wiki/concepts/segnalazione-design-comuni-comparison.md`
   - Full diff matrix (privacy, dati, riepilogo, conferma, elenco)
   - Visual differences matrix with priority levels
   - Technical implementation differences (CSS, JS, Component Architecture)

2. **Correction plan**: `laravel/Themes/Sixteen/docs/wiki/concepts/segnalazione-visual-parity-correction-plan.md`
   - High priority fixes (elenco layout, map height, fullscreen)
   - Medium priority fixes (stepper labels, CTAs, summary layout)
   - Low priority polish (hamburger text, success icon)
   - Bootstrap → Tailwind mapping reference
   - Build & verification checklist

3. **Wiki updates**:
   - ✅ Fixcity index.md: added comparison + correction-plan references
   - ✅ Fixcity log.md: added 2026-05-04 entry
   - ✅ Sixteen index.md: added correction-plan reference (line 31)
   - ✅ Root index.md: added segnalazione-visual-parity-mastery reference
   - ✅ Root log.md: added 2026-05-04 entry

### ⚠️ Still Needed
1. **High Priority Fixes** (apply the correction plan):
   - [ ] Change elenco layout: side-by-side → stacked (map TOP, list BELOW)
   - [ ] Fix map height: set explicit `400px` on elenco page
   - [ ] Add fullscreen button visibility for map in wizard

2. **Medium Priority Fixes**:
   - [ ] Update stepper labels to match reference exactly
   - [ ] Add "Vai all'elenco segnalazioni" CTA to conferma step
   - [ ] Fix summary layout to look like `<dl>` definition list

3. **Build & Verify**:
   - [ ] Edit CSS in `laravel/Themes/Sixteen/resources/css/app.css`
   - [ ] Run `npm run build && npm run copy`
   - [ ] Verify `public_html/themes/Sixteen/` has latest build
   - [ ] Screenshot and compare with reference
   - [ ] **NO inline CSS in Blade** — verify with grep

## Second Brain Reasoning

### Why This Matters
The goal is **not** to copy Bootstrap Italia's implementation (we're using Tailwind + Alpine + Lit), but to achieve the **same visual result**. This means:
- ✅ Same colors → Use same hex values in Tailwind config
- ✅ Same spacing → Use same spacing scale (Tailwind's default matches Bootstrap's)
- ✅ Same typography → Use same font imports
- ✅ Same layout → Use Tailwind grid/flex to reproduce Bootstrap layouts

### Key Insight: HTML Parity vs Visual Parity
- **HTML parity**: Same HTML structure (impossible — we use Blade/Livewire, reference uses Handlebars/static)
- **Visual parity**: Same rendered appearance (**achievable** with Tailwind mapping)

### Technical Strategy
1. **Map Bootstrap classes to Tailwind utilities**:
   ```css
   /* Bootstrap */ .mb-3 { margin-bottom: 1rem; }
   /* Tailwind */ .mb-4 { margin-bottom: 1rem; } /* Same! */
   ```

2. **Use theme tokens for colors**:
   ```css
   /* Bootstrap */ var(--bs-primary)
   /* Tailwind */ theme(colors.primary)
   /* Both should resolve to #0066CC */
   ```

3. **Lit components for interactive elements**:
   - Map: `coordinate-picker-lit.js` (already done)
   - Dropdowns: Alpine.js (already done)
   - Forms: Filament (already done)

## Related Documents

### Module-Level (Fixcity)
- [[segnalazione-design-comuni-comparison]] — Full diff matrix
- [[segnalazione-visual-parity]] — Module-level rules

### Theme-Level (Sixteen)
- [[segnalazione-visual-parity-correction-plan]] — Detailed fix plan
- [[segnalazione-visual-parity]] — Theme-level rules
- [[playwright-visual-testing]] — Screenshot testing guide

### Root-Level (Project-Wide)
- [[visual-control-mastery]] — Playwright/Puppeteer mastery
- [[sixteen-header-composition-rule]] — Header SSoT rule
- [[theme-owned-css-parity-rule]] — CSS parity in theme, not Blade
- [[no-page-specific-css]] — No `.ticket-wizard-root` or `[data-slug="..."]` scoped CSS

---

## Success Criteria (Visual Parity Achieved When)

1. ✅ Elenco page: Map TOP (full width), List BELOW (stacked)
2. ✅ Map height: ~400px on elenco, proper height in wizard
3. ✅ Stepper labels: Exact match with reference
4. ✅ Conferma page: Both CTAs present ("Torna alla homepage" + "Vai all'elenco segnalazioni")
5. ✅ Summary: Looks like `<dl>` definition list
6. ✅ **NO inline CSS** in any Blade file
7. ✅ Theme build copied to `public_html/themes/Sixteen/`

### Command to Verify Build
```bash
cd laravel/Themes/Sixteen
npm run build && npm run copy
ls -la ../../../public_html/themes/Sixteen/
```

---

**Last updated**: 2026-05-04 by LLM Wiki Maintainer
**Next action**: Apply correction plan fixes, then update this document with progress
