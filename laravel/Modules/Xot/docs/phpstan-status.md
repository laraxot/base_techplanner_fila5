---
title: "PHPStan status — Xot / Modules"
type: status
module: Xot
updated: 2026-08-28
related:
  - ./stories/5.43.phpstan-modules-bootstrap-and-ide-helper.story.md
  - ./stories/5.44.quality-gates-prompt-exec.story.md
  - ./phpstan-config-immutability.md
  - ../../../../docs/wiki/memories/phpstan-neon-immutable.md
  - ../../../../bashscripts/docs/prompts/03-quality-gates.md
---

# PHPStan status

## Gate

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=-1 --no-progress
```

Usa **sempre** `laravel/phpstan.neon`. **Solo l’utente** lo modifica. Agenti: zero touch su qualsiasi `*.neon`.

## Hard rule (2026-08-28)

Qualsiasi “fix” al neon da parte di un agente è **fuori policy**, anche se il WIP parallelo
lo ha svuotato. In quel caso: stop + chiedere all’utente. Non ripristinare, non creare include.

Canon: [phpstan-neon-immutable.md](../../../../docs/wiki/memories/phpstan-neon-immutable.md)

## Pest binding

`pest()->extend(TestCase::class)->in(...)` **consigliato** (XOT-5.41). XOR con `uses(TestCase)` per-file.
