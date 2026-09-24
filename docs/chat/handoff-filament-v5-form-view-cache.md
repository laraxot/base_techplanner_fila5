---
title: "Handoff — Filament 5 form docs + view:cache gate"
type: handoff
tags: [filament, form, view-cache, docs]
created: 2026-07-24
updated: 2026-07-24
related:
  - ./INDEX.md
  - ../wiki/concepts/filament-v5-form-in-blade.md
  - ../wiki/memories/view-cache-gate-mandatory.md
---

# Handoff — Filament 5 form + view:cache

Fonte studiata: https://filamentphp.com/docs/5.x/components/form

## Verifica empirica

```text
cd laravel && php artisan view:cache
→ INFO  Blade templates cached successfully.  EXIT:0
```

(ripetuta a chiusura task)

## Docs aggiornati

| Scope | Path |
|-------|------|
| Root concept | `docs/wiki/concepts/filament-v5-form-in-blade.md` |
| Memories | `filament-form-widgets.md`, `view-cache-gate-mandatory.md`, `agent-confidence-protocol.md`, INDEX |
| Rules | `agent-confidence-protocol`, `validation-post-edit` §3d, TRIGGER_MAP, cursor index |
| Cursor | `.cursor/rules/view-cache-gate-mandatory.mdc` |
| Skill | `.claude/skills/xotbase-filament-widgets/SKILL.md` |
| Xot | `filament-v5-form-wrapper-blade-pattern.md`, wiki `filament-page-form-wrapper` |
| User | `filament-widget-resource-form-delegation.md` |
| Sixteen | `filament5-schema-form-access-rule.md`, `login-widget-form-binding.md` |
| Zero | `filament-v5-schema-not-form.md` (correzione Schema≠Form) |

## Religione sintetica

`HasSchemas` + `fill()` + `getState()` + `<form wire:submit>` + **sempre** `view:cache` prima di chiudere.
