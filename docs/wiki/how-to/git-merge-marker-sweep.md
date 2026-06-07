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
  - ../rules/git-forward-only.md
  - ../memories/git-forward-only-standing-rule.md
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
6. **JSON Sushi CMS** (`config/local/*/database/content/sections/`) → **un solo file per slug**: non lasciare sia `1.json` che `header.json` (Sushi carica tutti `*.json` → `sole()` fallisce con `MultipleRecordsFoundException`)

## Comandi rapidi

```bash
# Inventario
git diff --name-only --diff-filter=U | wc -l
rg -l '^<<<<<<< ' .

# Studio read-only (MAI redirect > file — vedi git-forward-only.md)
git show origin/dev:laravel/Modules/Xot/app/Providers/XotServiceProvider.php | less
git diff HEAD -- path/to/file.php

# Verifica post-sweep
rg '^<<<<<<< ' laravel --glob '*.{php,blade.php,json,neon}'
cd laravel && php artisan test --filter=MigrationSyntax
```

**Forward-only:** risoluzione marker e sintassi solo con patch manuale sul working tree. Vietato `git checkout <ref> --`, `git restore --source=`, `git show ref:path > path`.

## Script Python (multi-pass)

Script canonico (master): `bashscripts/tools/git/resolve-conflict-markers.py`  
PHP dedicato: `bashscripts/tools/git/fix-conflicts.php` (non in root repo)  
Recovery PHP: `bashscripts/tools/git/repair-php-after-conflict-resolution.sh`

Documentazione operativa: `bashscripts/docs/fix-conflicts-guide.md`  
Decisione architettura: `bashscripts/docs/architecture-git-conflict-tools.md`

Regole implementate:

- PHP/Blade → delegati a `fix-conflicts.php` (incoming/dev, non HEAD cieco)
- Altri testi → incoming side in `resolve-conflict-markers.py`
- Post-pass → `repair-php-after-conflict-resolution.sh` (`php -l` + patch forward — **no** `git checkout` da commit storico; vedi [git-forward-only.md](../rules/git-forward-only.md))
- Concept: [git-collision-prevention-and-repair](../concepts/git-collision-prevention-and-repair.md)

### Recovery post-sweep (critico)

Se PHPStan/`php -l` segnala `unexpected token "protected"` in Factory o ServiceProvider:

```bash
bashscripts/tools/git/repair-php-after-conflict-resolution.sh
# Se serve il contratto storico: git show <sha>:path (read-only) → patch manuale sul file attuale
php artisan package:discover
```

Non applicare risoluzione HEAD-only su PHP senza repair pass immediato.


## Corruzione post-merge (senza marker)

Alcuni file su `origin/dev` hanno **corruzione strutturale** senza `<<<<<<<`: metodi orfani, docblock troncati, `use` mancanti, trait commentati.

**Recovery:**

1. `php -l` su `Modules/*/app/**/*.php` — inventario syntax error
2. Per ogni file rotto: `git show origin/master:laravel/<path>` — **solo lettura**; applicare patch forward sul file corrente
3. Se master assente o invalido: fix manuale; integrare metodi necessari da dev senza checkout/restore
4. Bootstrap: `cd laravel && php artisan about`
5. Comandi Artisan: verificare `protected $name` o `$signature` su ogni `Console/Commands/*`

Esempi risolti in STORY-GIT-001: `XotBaseMigration`, `XotData`, `HasTeams::teams()` commentato, import `Filament\Tables\Table` mancanti.

## PHPStan dopo merge

```bash
cd laravel
./vendor/bin/phpstan clear-result-cache
./vendor/bin/phpstan analyse Modules --memory-limit=-1
```

Se compare `Cannot use …\Builder as Builder because the name is already in use` → alias duplicato nello stesso file (non sempre visibile come marker Git). Vedi [phpstan-fixes-log Fix #2](../../laravel/Modules/Xot/docs/wiki/concepts/phpstan-fixes-log.md) e [phpstan-modules-zero-2026-06-06](../memories/phpstan-modules-zero-2026-06-06.md).

## Quality gate obbligatorio (PHP)

Dopo ogni modifica/creazione file PHP:

```bash
cd laravel
bash ./tools/post-edit-php.sh Modules/<Modulo>/path/to/File.php [Modules/<Modulo>/tests]
```

Esegue in sequenza: **PHPStan** → **PHPMD** (`phpmd.xml`) → **PHPInsights** → **Pest** (path modulo opzionale).

## Orphan marker (senza `<<<<<<<` in testa)

Dopo sweep automatico possono restare righe `>>>>>>> sha` o `=======` orfane in `.md` / `.backup`:

```bash
python3 bashscripts/tools/git/resolve-conflict-markers.py
# oppure strip mirato — vedi memoria git-collision-sweep-complete.md
find laravel/Themes -name '*.backup' -delete
```

## Post-risoluzione

1. Aggiornare `docs/wiki/log.md` o memoria `git-collision-sweep-complete.md`
2. `git add` file risolti
3. Completare merge: `git commit` (solo su richiesta utente)
4. `post-edit-php.sh` su ogni file PHP toccato
5. `UserMigrationSyntaxTest` (118 test) come rete sicurezza migrazioni User

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