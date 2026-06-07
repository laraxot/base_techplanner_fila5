---
<<<<<<< HEAD
title: "TechPlanner wiki log"
type: log
tags: [wiki, log, second-brain]
created: 2026-06-06
updated: 2026-06-06
qmd: "wiki log second brain runtime bootstrap fixes"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/21"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
---

# TechPlanner wiki log

## 2026-06-06

- Added runtime bootstrap prevention notes for Composer autoload case sensitivity, tenant SQLite config, and User trait method collisions.
- Added smoke-test sequence for `composer dump-autoload`, `php artisan optimize:clear`, `php artisan about`, and FO HTTP checks.
=======
title: "TechPlanner LLM Wiki Log"
type: "log"
tags:
  - second-brain
  - qmd
  - techplanner
created: "2026-06-06"
updated: "2026-06-07"
qmd: "tp-wiki-root"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/11"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/12"
---

# TechPlanner LLM Wiki Log

## 2026-06-07

- **PHPStan Modules zero errori** — da `laravel/`: `./vendor/bin/phpstan analyse Modules --memory-limit=-1` → **4993 file, [OK] No errors**. Fix principali: Comment generic/view-string/class-string, Blog `ProfileContract` no Fixcity, Xot form fill/view/string palette, Geo raw SQL con binding, Notify enum/attachment shape, Employee case-only page.
- **PHPStan Modules no-flag recheck** — da `laravel/`: `./vendor/bin/phpstan analyse Modules` → **4993 file, [OK] No errors**. Follow-up DTO concreti: factory `make()`/`from()` tipizzate `self` e istanziate con `new self()` per evitare `new.static`/`return.type`; ripuliti residui parse nei DTO Xot.
- **Second brain root riparato** — `docs/wiki/{concepts,rules,skills,commands}` ripristinati come directory mirror da `bashscripts/ai/*`; rimossi marker merge in `docs/wiki/log.md` e `docs/wiki/memories/phpstan-modules-zero-2026-06-06.md`.
- **QMD collection reale** — `techplanner-wiki` non esiste nel checkout; collection valida usata: `tp-wiki-root`.
- **Healthcheck residuo** — `second-brain-healthcheck.sh phpstan` ora trova i file SSoT root, ma `verify-llm-wiki.sh` resta rosso per temi infrastrutturali separati dal fix PHPStan: `.agents/node_modules`, MCP server mancanti, owner composer `laravel/folio`, `Modules/User/vendor`, directory Folio semantiche.

## 2026-06-06

- **PHPStan Modules re-verifica** — `./vendor/bin/phpstan analyse Modules` → **4822 file, zero errori**; fix post-merge: `XotBaseServiceProvider` (marker Git), migrazioni `team_user`/`profiles`/`client_table`, `XotBaseWizardWidget` view-string; memoria: [phpstan-modules-zero-2026-06-06](./memories/phpstan-modules-zero-2026-06-06.md)
- **architettura fix-conflicts.php** — SSoT `bashscripts/tools/git/fix-conflicts.php` (repo `bashscripts_fila5`); shim `bashscripts/fix/fix-conflicts.php`; doc `bashscripts/docs/fix-conflicts-guide.md` + `architecture-git-conflict-tools.md`; monorepo `.gitignore` ignora clone annidato; vietato in root monorepo
- **git merge sweep (sessione 4, dev)** — zero marker su codice PHP; 457 file docs/script ripuliti da marker orfani; ripristino `ce96248f` per XotBaseServiceProvider e servizi Xot; `composer.lock` rigenerato; 111 test Pest corretti (`uses(TestCase::class)`); FLVP eseguito su file toccati
- **git merge sweep (sessione 2)** — ~2054 file con marker; script `bashscripts/conflict/resolve-git-conflicts.py`; recovery `Modules/*/app/` da `6b9f55ad`; how-to: [git-merge-marker-sweep](./how-to/git-merge-marker-sweep.md); story: [STORY-GIT-001](../stories/story-git-collision-resolution.md)
- **git merge sweep (sessione 3, master)** — script + repair PHP; zero marker; quality gate `post-edit-php.sh`
- **git collision + FLVP (sessione 4)** — `XotBaseServiceProvider` ripulito da marker residui; `post-edit-php.sh` fixato; memoria [post-edit-php-quality-gate](./memories/post-edit-php-quality-gate.md); Pest `UserMigrationSyntaxTest` 116 pass
- **git merge sweep** — risolti ~3700 conflitti `dev` ↔ `origin/dev`; codice ours, stub AGENTS/CLAUDE theirs; how-to: [git-merge-marker-sweep](./how-to/git-merge-marker-sweep.md); story: [STORY-GIT-001](../stories/story-git-collision-resolution.md)
- **corruzione post-merge** — 59 PHP syntax error ripristinati da `origin/master`; bootstrap `php artisan about` OK; recovery docblock/import/`$name` comandi; quality gate: `laravel/tools/post-edit-php.sh`
- **phpstan Modules** — parse blocker risolti (alias `Builder` duplicati); full run 4800 file → **413 errori** tipizzati; memoria: [phpstan-modules-zero-2026-06-06](./memories/phpstan-modules-zero-2026-06-06.md), Fix #2 in [phpstan-fixes-log](../laravel/Modules/Xot/docs/wiki/concepts/phpstan-fixes-log.md)
- Added `public-theme-resolution-and-vite-assets`: prevent wrong `pub_theme` diagnosis and missing Vite deploy assets for Theme Two.
>>>>>>> dev
