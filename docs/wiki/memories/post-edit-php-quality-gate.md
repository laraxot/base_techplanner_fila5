---
title: "Post-edit PHP quality gate (FLVP)"
type: memory
tags: [phpstan, phpmd, phpinsights, pest, flvp, second-brain]
created: 2026-06-06
updated: 2026-06-06
qmd: "post edit php quality gate phpstan phpmd phpinsights pest tools"
related:
  - ../how-to/git-merge-marker-sweep.md
  - git-collision-repair-pass.md
---

# Post-edit PHP quality gate (FLVP)

**Obbligatorio** dopo ogni create/modify di file `.php` (inclusi fix collision Git).

## Comando canonico

```bash
cd laravel
./tools/post-edit-php.sh <path/file.php> [Modules/Modulo/tests]
```

Esegue in ordine:

1. **PHPStan** — `./vendor/bin/phpstan analyse <file>`
2. **PHPMD** — `./tools/phpmd.sh <file> text phpmd.xml`
3. **PHP Insights** — informativo (non blocca exit code)
4. **Pest** — opzionale se passi cartella test modulo

## Esempi

```bash
# Migrazione TechPlanner
./tools/post-edit-php.sh Modules/TechPlanner/database/migrations/2026_02_22_000000_create_profiles_table.php

# Provider Xot + test regressione marker
./tools/post-edit-php.sh Modules/Xot/app/Providers/XotBaseServiceProvider.php
./vendor/bin/pest Modules/User/tests/Feature/Database/Migrations/UserMigrationSyntaxTest.php --compact
```

## Regole agente

- Non considerare completato un fix collision finché `post-edit-php.sh` è verde sul file toccato
- Dopo sweep massivo: `UserMigrationSyntaxTest` (116 test) come rete di sicurezza migrazioni User
- `git grep '^<<<<<<< '` deve restare **0** su codice runtime

## Collegamenti

- [Git merge marker sweep](../how-to/git-merge-marker-sweep.md)
- [Git collision repair pass](git-collision-repair-pass.md)
