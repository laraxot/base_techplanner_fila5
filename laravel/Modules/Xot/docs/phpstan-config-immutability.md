---
title: "PHPStan config immutability — Xot"
type: guideline
module: Xot
updated: 2026-08-28
related:
  - ../../../../docs/wiki/guidelines/phpstan-config-immutability.md
  - ../../../../docs/wiki/rules/phpstan-neon-immutable.md
  - ../../../../docs/wiki/memories/phpstan-neon-immutable.md
---

# PHPStan Config Immutability (Xot)

- File: `laravel/phpstan.neon`
- Status: **IMMUTABLE per agenti** — solo l’**utente umano** lo modifica.

## Come analizzare senza toccare il neon

```bash
cd laravel
./vendor/bin/phpstan analyse Modules --memory-limit=-1 --no-progress
./vendor/bin/phpstan analyse Modules/User --memory-limit=-1 --no-progress
```

Vietato: `--level`, `-c`, nuovi `.neon`, restore/edit del config.

Errori → tipizza e correggi il **codice**. Neon sbagliato → chiedi all’utente.
