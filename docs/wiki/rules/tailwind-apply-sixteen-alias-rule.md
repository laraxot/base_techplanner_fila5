---
title: "Tailwind @apply — alias semantici tema Sixteen"
type: rule
confidence: high
created: 2026-05-15
updated: 2026-05-15
tags: [tailwind, sixteen, daisyui, design-comuni, css, on-demand]
related:
  - theme-css-build-workflow.md
  - design-comuni-theme-css-only-rule.md
  - 011-blocks-view-convention.md
  - ../skills/sixteen-theme-tailwind-daisyui-governance.md
---

# Tailwind `@apply` — alias nel tema Sixteen (regola on-demand)

## Quando caricare questa regola

- Task su **CSS / Tailwind / DaisyUI** nel **pub_theme Sixteen**
- PR che toccano **Blade moduli** con classi utility lunghe
- Allineamento **Design Comuni** / nomi classe **Bootstrap Italia** senza import Bootstrap runtime

## Regola

1. **Preferire `@apply` nei fogli CSS del tema** (`laravel/Themes/Sixteen/resources/css/`) per definire **alias** su nomi semantici (`.btn-*`, `.it-*`, `.cmp-*`, classi interne controllate).
2. **Non** spargere lunghe catene Tailwind nei Blade dei **moduli** Fixcity/altri: boundary in [wizard-architecture-filament-theme-boundary](../../../laravel/Modules/Fixcity/docs/wiki/concepts/wizard-architecture-filament-theme-boundary.md).
3. **Evitare** `<style>` + `@apply` nei Blade modulo: il compilatore Tailwind del tema può non processarli.
4. **Dopo modifiche CSS tema**: `cd laravel/Themes/Sixteen && npm run build && npm run copy` (vedi [theme-css-build-workflow.md](./theme-css-build-workflow.md)).

## Filosofia e riferimenti (SSoT)

- Filosofia completa: [`laravel/Themes/Sixteen/docs/wiki/concepts/bootstrap-italia-tailwind-philosophy.md`](../../../laravel/Themes/Sixteen/docs/wiki/concepts/bootstrap-italia-tailwind-philosophy.md)
- Mapping PA + DaisyUI + Filament: [`laravel/Themes/Sixteen/docs/wiki/entities/design-comuni-class-mapping.md`](../../../laravel/Themes/Sixteen/docs/wiki/entities/design-comuni-class-mapping.md)
- Pro/contro/percentuali DaisyUI: [`laravel/Modules/Cms/docs/daisyui-pro-contro-metriche.md`](../../../laravel/Modules/Cms/docs/daisyui-pro-contro-metriche.md)
- Coordinamento issue GitHub: **#42** (`laraxot/base_fixcity_fila5`)

## Skill associata

- [`sixteen-theme-tailwind-daisyui-governance`](../skills/sixteen-theme-tailwind-daisyui-governance.md)
