---
title: "Frontend Stack Canonico — Tailwind + Alpine + Lit + DaisyUI + Flowbite + Filament"
type: rule
confidence: high
created: 2026-06-01
updated: 2026-06-01
tags: [frontend, tailwind, alpine, lit, daisyui, flowbite, filament, no-bootstrap, stack, canonical]
related:
  - rules/cms-block-naming-tailwind-flowbite.md
  - rules/00-TRIGGER_MAP.md
  - rules/00-INDEX.md
---

# Frontend Stack Canonico

## Stack (NO Bootstrap)

| Layer | Tecnologia | Versione | Scopo |
|-------|-----------|----------|-------|
| CSS Framework | **Tailwind CSS** | v4 | Utility-first CSS |
| Componenti UI | **DaisyUI** | v5 | Componenti Tailwind-ready |
| Componenti UI extra | **Flowbite** | latest | Dropdown, datepicker, ecc. |
| Interattività | **Alpine.js** | v3 | Toggle, modal, tabs, form |
| Web Components | **Lit** | v3 | Mappa interattiva (Leaflet) |
| Admin Panel | **Filament** | 5.x | Backoffice (Livewire + Tailwind) |
| Build | **Vite** | latest | Bundling, HMR, production |

## Regola

> **MAI** usare classi Bootstrap nei file Blade del tema Sixteen o dei moduli.
> Usare sempre equivalenti Tailwind/DaisyUI/Flowbite.

## Naming blocchi CMS

> Le sottocartelle di `resources/views/components/blocks/` prendono i nomi da:
> - https://tailwindcss.com/plus/ui-blocks
> - https://flowbite.com/blocks/

Vedi regola completa: `rules/cms-block-naming-tailwind-flowbite.md`

## Trigger

Qualsiasi menzione di: Bootstrap, Tailwind, Alpine, Lit, DaisyUI, Flowbite, Filament, stack frontend, blocchi CMS, naming view.

## Story di riferimento

STORY-112: `docs/stories/STORY-112-frontend-stack-canonical-rule.md`
