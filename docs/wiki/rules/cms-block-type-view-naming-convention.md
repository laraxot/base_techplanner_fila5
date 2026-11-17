---
title: "CMS Block type ↔ view naming convention"
type: rule
confidence: high
created: 2026-06-01
updated: 2026-06-01
tags: [cms, blocks, filament, naming-convention, architecture]
related:
  - rules/bmad-v6-on-demand.md
  - concepts/folio-api-no-controllers.md
---

# CMS Block type ↔ view naming convention

## Regola canonicale

**Nel file JSON CMS, il campo `"type"` e `"view"` devono seguire la convenzione:**

| Caso | `"type"` | `"view"` |
|------|----------|----------|
| **Pattern standard** | `"type": "ticket-layout"` | `"view": "pub_theme::components.blocks.ticket-layout.layout"` |
| **Con view puntata** | `"type": "ticket"` | `"view": "pub_theme::components.blocks.ticket.layout"` |

## Perché esiste questa regola

1. **Filament builder** si aspetta che il tipo corrisponda alla view
2. **Consistenza** tra CMS JSON e filesystem Blade templates
3. **Evita ambiguità** tra `ticket-layout` e `ticket`

## Esempio corretto

```json
{
  "type": "ticket-layout",
  "data": {
    "view": "pub_theme::components.blocks.ticket-layout.layout"
  }
}
```

oppure

```json
{
  "type": "ticket",
  "data": {
    "view": "pub_theme::components.blocks.ticket.layout"
  }
}
```

## Violationi note

- `"type": "ticket-layout"` con `"view": "pub_theme::components.blocks.ticket.layout"` → **ERRATO**
- `"type": "ticket"` con `"view": "pub_theme::components.blocks.ticket-layout.layout"` → **ERRATO**

## File esistenti

- `laravel/config/local/fixcity/database/content/pages/home.json` → `"type": "ticket-layout"` con view punto
- `laravel/Themes/Sixteen/resources/views/components/blocks/ticket/` (cartella con layout.blade.php)