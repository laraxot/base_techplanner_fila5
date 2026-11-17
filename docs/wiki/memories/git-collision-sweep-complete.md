---
title: "Git collision sweep complete"
type: memory
tags: [git, merge, collision, flvp, second-brain]
related:
  - ../how-to/git-merge-marker-sweep.md
  - post-edit-php-quality-gate.md
  - git-collision-repair-pass.md
  - ../../../laravel/Themes/Two/docs/conflict-resolution.md
---

# Git collision sweep complete

## Stato verificato

| Check | Esito |
|-------|-------|
| `git grep -l '^<<<<<<<'` | **0** file |
| `git grep -l '^>>>>>>>'` | **0** file |
| PHPStan `Modules` | **0 errori** |
| `UserMigrationSyntaxTest` | **118 passed** |
| `http://127.0.0.1:8000/it` | **200** |

## Tipi residui (non bloccanti)

- **~69 file** citano `<<<<<<<` in documentazione o script (regex, how-to) — non sono conflitti aperti.
- **Orphan marker** (`>>>>>>> sha` senza blocco) — rimossi con strip su 56 file doc/bashscripts.
- **`.backup` lang** in `Themes/Two/lang/` — eliminati (debris merge).

## Harness agenti

`AGENTS.md` e `CLAUDE.md` root ripristinati come **stub ≤50 righe** (riferimento `dev`, forward-only).

## Quality gate obbligatorio

Dopo ogni modifica PHP:

```bash
cd laravel
./tools/post-edit-php.sh <file.php> [Modules/Modulo/tests]
```

Ordine: PHPStan → PHPMD → PHPInsights → Pest.

## Comandi inventario

```bash
git grep -l '^<<<<<<< ' .
python3 bashscripts/tools/git/resolve-conflict-markers.py
bash bashscripts/tools/git/repair-php-after-conflict-resolution.sh
cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=-1
```
