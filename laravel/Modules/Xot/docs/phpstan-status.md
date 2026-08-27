---
title: "PHPStan status — Xot / Modules"
type: status
module: Xot
updated: 2026-08-27
related:
  - ./stories/5.43.phpstan-modules-bootstrap-and-ide-helper.story.md
  - ../phpstan/pest-internal-ignore.neon
  - ../../../../docs/wiki/how-to/git-merge-marker-sweep.md
---

# PHPStan status — campagna XOT-5.43

## Gate

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=-1 --no-progress
# [OK] No errors
```

Misura 2026-08-27: bootstrap-fail → 2625 → 820 → **0** (re-check sera: ancora 0 + ide-helper refresh).

## Decisioni (perché)

1. Marker merge: resolve tipizzato; file irrecuperabili da blob clean history (forward-only).
2. Pest 4 `method.internalClass`: `Modules/Xot/app/PHPStan/PestInternalClassAccessIgnoreExtension` (Pest 5 richiede PHPUnit 13).
3. `HasDynamicFillable`: niente property nel trait — override `getDynamicFillableEnums()` nel modello (evita fatal PHP composition).
4. ide-helper: `generate` + `meta` + `models --nowrite`; DB `techplanner_*` creati; symlink merge `sottana~HEAD` rimossi.

## Artefatti

- Story: `stories/5.43.phpstan-modules-bootstrap-and-ide-helper.story.md`
- Extension: `app/PHPStan/PestInternalClassAccessIgnoreExtension.php`
- Neon: `phpstan/pest-internal-ignore.neon` incluso da `laravel/phpstan.neon`
