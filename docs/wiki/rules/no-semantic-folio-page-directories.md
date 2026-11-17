---
title: "Vietato directory semantiche in pages/ del tema"
type: rule
tags: [folio, sixteen, container0, pages, dry, kiss]
created: 2026-06-05
updated: 2026-06-05
qmd: "vietato pages tickets news services directory semantica folio container0 slug0 tema sixteen"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/294"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/294"
related:
  - ../../../laravel/Themes/Sixteen/docs/page-directory-structure.md
  - ../memories/container0-pattern-philosophy.md
  - ../../../laravel/Modules/Fixcity/docs/wiki/concepts/tickets-view-cms-folio-page.md
  - ../../../.cursor/rules/no-semantic-folio-page-dirs.mdc
---

# Vietato directory semantiche in `pages/` del tema

## Regola

In `Themes/*/resources/views/pages/` **non** creare cartelle per dominio editoriale (`tickets`, `news`, `servizi`, …).

Un URL come `/it/tickets/14` è già coperto da:

| Step | Artefatto |
|------|-----------|
| Folio | `[container0]/[slug0]/index.blade.php` |
| `mount` | `container0=tickets`, `slug0=14` |
| CMS slug | `tickets.view` |
| Contenuto | JSON CMS + widget modulo (`Ticket\ViewWidget`) |

## Checklist agente (obbligatoria)

Prima di proporre o eseguire `mkdir pages/<dominio>`:

1. Leggere [page-directory-structure.md](../../../laravel/Themes/Sixteen/docs/page-directory-structure.md)
2. Cercare `rg "\[container0\]" Themes/Sixteen/resources/views/pages`
3. Se serve UI ticket/servizio/evento → **modulo owner** (Infolist, widget, viste `fixcity::`)

## Enforcement

- Script: `bashscripts/tools/verify-no-semantic-folio-pages.sh`
- Pest: `Themes/Sixteen/tests/Unit/NoSemanticFolioPageDirectoriesTest.php`
- Gate: `bashscripts/quality-gates/verify-llm-wiki.sh` (sezione Folio pages)

## Esempio errore

```bash
# ❌ VIETATO
mkdir -p laravel/Themes/Sixteen/resources/views/pages/tickets
```

```bash
# ✅ CORRETTO — già esiste
# pages/[container0]/[slug0]/index.blade.php
# + Fixcity TicketInfolist / ViewWidget
```

## Backlink

- [container0-pattern-philosophy.md](../memories/container0-pattern-philosophy.md)
- [tickets-view-cms-folio-page.md](../../../laravel/Modules/Fixcity/docs/wiki/concepts/tickets-view-cms-folio-page.md)
- [folio-page-pattern.md](../../../laravel/Themes/Sixteen/docs/folio-page-pattern.md)
