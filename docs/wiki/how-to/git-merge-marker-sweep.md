---
title: "Git merge marker sweep"
type: how-to
tags: [git, merge, conflict, second-brain, phpstan, bashscripts]
created: 2026-06-06
updated: 2026-06-06
qmd: "git merge conflict marker sweep collision resolution ours theirs second brain php restore fix-conflicts bashscripts tools git"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/24"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
related:
  - ../rules/00-TRIGGER_MAP.md
  - ../../stories/story-git-collision-resolution.md
  - ../../stories/STORY-147-git-collision-cleanup.md
  - ../concepts/second-brain-techplanner-efficiency.md
---

# Git merge marker sweep

Procedura per risolvere collisioni Git su larga scala nel monorepo TechPlanner, integrata con second brain on-demand.

## Quando usare

- `git status` mostra «unmerged paths»
- `rg '^<<<<<<< '` trova marker in PHP/Blade/config
- PHPStan fallisce con «syntax error, unexpected token `<`»

## Strategia (business logic)

1. **Codice runtime** → preferire **ours** (branch locale con fix produzione)
2. **Harness agenti** (`AGENTS.md`, `CLAUDE.md`) → preferire **theirs** (stub ≤50 righe + wiki)
3. **`docs/wiki/`** → preferire **theirs** (SSoT second brain)
4. **Lockfile** → theirs poi `composer validate` / `composer install`
5. **Conflitto con lato vuoto** → tenere il lato con contenuto

## Comandi rapidi

```bash
# Inventario
git diff --name-only --diff-filter=U | wc -l
rg -l '^<<<<<<< ' .

# Ripristino selettivo da origin/dev (stub)
git show origin/dev:AGENTS.md > AGENTS.md
git show origin/dev:CLAUDE.md > CLAUDE.md
git checkout origin/dev -- docs/wiki

# Verifica post-sweep
rg '^<<<<<<< ' laravel --glob '*.{php,blade.php,json,neon}'
cd laravel && php artisan test --filter=MigrationSyntax
```

## Script Python (multi-pass)

Script canonico (master): `bashscripts/tools/git/resolve-conflict-markers.py`  
PHP dedicato: `bashscripts/tools/git/fix-conflicts.php` (non in root repo)  
Recovery PHP: `bashscripts/tools/git/repair-php-after-conflict-resolution.sh`

Documentazione operativa: `bashscripts/docs/fix-conflicts-guide.md`  
Decisione architettura: `bashscripts/docs/architecture-git-conflict-tools.md`

Regole implementate:

- PHP/Blade → delegati a `fix-conflicts.php` (incoming/dev, non HEAD cieco)
- Altri testi → incoming side in `resolve-conflict-markers.py`
- Post-pass → `repair-php-after-conflict-resolution.sh` (`php -l` + checkout da `origin/master`)
- Concept: [git-collision-prevention-and-repair](../concepts/git-collision-prevention-and-repair.md)

### Recovery post-sweep (critico)

Se PHPStan/`php -l` segnala `unexpected token "protected"` in Factory o ServiceProvider:

```bash
bashscripts/tools/git/repair-php-after-conflict-resolution.sh
# oppure ripristino puntuale da commit pre-conflitto
git checkout 6b9f55ad -- laravel/Modules/User/database/factories/
php artisan package:discover
```

Non applicare risoluzione HEAD-only su PHP senza repair pass immediato.


## Post-risoluzione

1. Aggiornare `docs/wiki/log.md`
2. `git add` file risolti
3. Completare merge: `git commit` (solo su richiesta utente)
4. PHPStan + test mirati sul modulo toccato

## Anti-pattern

- ❌ `git checkout --theirs .` su tutto il repo (perde codice produzione)
- ❌ Risoluzione automatica senza regola per categoria file
- ❌ Ignorare stub AGENTS — rigonfia context window agenti

## Collegamenti

- [00-TRIGGER_MAP](../rules/00-TRIGGER_MAP.md)
- [agent-bootstrap-compact](../concepts/agent-bootstrap-compact.md)
- [llm-wiki-operational-discipline](../concepts/llm-wiki-operational-discipline.md)

## GitHub (tracciamento)

| Tipo | URL |
|------|-----|
| Issue | https://github.com/laraxot/base_techplanner_fila5/issues/24 |
| Discussion | https://github.com/laraxot/base_techplanner_fila5/discussions/19 |
