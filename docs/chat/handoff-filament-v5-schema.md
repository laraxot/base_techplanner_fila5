---
title: "Handoff — Filament 5 schema docs + second brain"
type: handoff
tags: [filament, schema, verification, second-brain]
created: 2026-07-24
updated: 2026-07-24
related:
  - ./INDEX.md
  - ./handoff-filament-v5-form-view-cache.md
  - ../wiki/concepts/filament-v5-schema-in-blade.md
  - ../wiki/memories/filament-schema-components.md
---

# Handoff — schema Filament 5

Fonte: https://filamentphp.com/docs/5.x/components/schema

## Prove (eseguite)

```text
composer show filament/schemas → v5.7.3
ls vendor/filament/schemas/resources/views/components/ → fieldset.blade.php grid.blade.php
rg RestrictsFileUploads Modules → 0
XotBaseInfolistWidget Blade → {{ $this->infolist }}
php artisan view:cache → EXIT 0
```

## Delta second brain

| Artefatto | Ruolo |
|-----------|--------|
| `concepts/filament-v5-schema-in-blade.md` | Canon schema generico vs form |
| `memories/filament-schema-components.md` | Anti-hallucination |
| `Xot/docs/xotbase-schemawidget-pattern.md` | Riscritto su codice reale (niente trait Xot inventato) |
| `Xot/.../xotbase-infolist-widget-schema.md` | Match doc `{{ $this->infolist }}` |
| Rule/skill `xotbase-schemawidget` / widgets | Corretti vs shim `XotBaseWidget` |

## Gap dichiarato (non inventato come fatto)

`RestrictsFileUploadsToSchemaComponents` consigliato upstream, **non** applicato nei moduli FO.
