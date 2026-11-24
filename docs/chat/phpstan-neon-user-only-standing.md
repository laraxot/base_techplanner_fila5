---
title: "Standing — phpstan.neon solo utente"
type: handoff
status: standing
updated: 2026-08-28
related:
  - ../wiki/rules/phpstan-neon-immutable.md
  - ../wiki/rules/phpstan-neon-user-only.md
  - ../wiki/memories/phpstan-neon-immutable.md
  - ../wiki/memories/phpstan-neon-immutable-agents.md
---

# Standing order — `laravel/phpstan.neon`

**Solo l’utente umano** modifica `laravel/phpstan.neon`.

Gli agenti:

- eseguono `cd laravel && ./vendor/bin/phpstan analyse …` **con** quel neon
- **non** editano / creano / ripristinano alcun `*.neon`
- **non** usano `-c` / `--level`
- se il neon manca o è sabotato → stop + chiedere all’utente

Violazione nota: sessione quality-gates 2026-08-27/28 (riscrittura neon). Non ripetere.
