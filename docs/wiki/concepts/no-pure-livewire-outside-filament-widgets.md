---
title: "No Livewire puro fuori dai widget Filament"
type: concept
status: active
created: 2026-05-28
updated: 2026-05-29
tags: [livewire, filament, frontoffice, fixcity, architecture]
related:
  - ../rules/no-http-livewire-runtime.mdc
  - ../rules/filament-auth-widgets-rule.md
  - ../concepts/bmad-laraxot-implementation-guardrails.md
  - ../../laravel/Modules/Fixcity/docs/wiki/concepts/frontoffice-no-standalone-livewire.md
---

# No Livewire puro fuori dai widget Filament

## Regola (obbligatoria)

**Non** introdurre né riusare componenti Livewire/Volt «standalone» nel frontoffice (Folio, pagine CMS, blocchi tema).

| Consentito | Vietato |
|------------|---------|
| Widget in `Modules/*/app/Filament/Widgets/*` (anche se montati con `@livewire(RegisterWidget::class)` nelle Blade auth) | Classi in `Modules/*/app/Livewire/*` |
| Blade + blocchi CMS (`<x-page>`, `components/blocks/**/*.blade.php` senza `@volt` dominio) | `@livewire(Modules\Fixcity\Livewire\...)` su pagine pubbliche |
| Lit / Alpine / `map-lit` nel tema o modulo Geo | Volt page (`@volt('ticket_list')`) come sostituto di layout CMS |
| Query e ViewModel in PHP nel blocco Blade | Nuovi `Http/Livewire/*` (vedi anche [no-http-livewire-runtime](../rules/no-http-livewire-runtime.mdc)) |

## Perché

- Incidente `/it` 500: `Modules\Fixcity\Livewire\TicketList` montato su Folio mentre la view target era un file Volt (`ticket_list/agid.blade.php`).
- Duplicazione con `ticket/layout.blade.php` (percorso canonico elenco segnalazioni).
- Multi-agente: un solo pattern runtime (Filament widget) per stato, form, wizard.

## Pattern canonico Fixcity — elenco segnalazioni su `/it`

1. Folio: `Themes/Sixteen/resources/views/pages/index.blade.php` → `<x-page slug="home" />`.
2. JSON: `config/local/fixcity/database/content/pages/1.json` → blocco `ticket-layout`.
3. View: `pub_theme::components.blocks.ticket.layout` (dati ticket, filtri, mappa `map-lit`).
4. Wizard segnalazione: `CreateTicketWizardWidget` (Filament), non Livewire in `app/Livewire/`.

Reference parity: [Elenco segnalazioni — Design Comuni](https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html).

## Stato cleanup (2026-05-29)

| Asset | Stato |
|-------|--------|
| `Modules/Fixcity/app/Livewire/TicketList.php` | **Rimosso** — zero `@livewire(TicketList)` in `laravel/` |
| `View/Components/Blocks/TicketList*` | **Rimosso** — `_components.json` vuoto |
| `ticket_list/agid.blade.php` (Volt) | **Assente** in repo — non usare per `/it` |
| `TicketListBlock.php` (Filament CMS builder) | Resta: blocco legacy CMS `ticket_list`, distinto dal Livewire eliminato |

## Story collegate

- [STORY-059](../../stories/STORY-059-it-ticketlist-500-uninitialized-fix.md) — incidente
- [STORY-060](../../stories/STORY-060-no-standalone-livewire-frontoffice.md) — governance e cleanup
- [STORY-058](../../stories/STORY-058-it-segnalazioni-elenco-html-visual-parity.md) — parity HTML/visuale
