---
title: "TechPlanner LLM Wiki Log"
type: "log"
tags:
  - second-brain
  - qmd
  - techplanner
created: "2026-06-06"
updated: "2026-06-06"
qmd: "tp-wiki-root"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/11"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/12"
---

# TechPlanner LLM Wiki Log

## 2026-06-06

- **PHPStan Modules re-verifica** — `./vendor/bin/phpstan analyse Modules` → **4822 file, zero errori**; fix post-merge: `XotBaseServiceProvider` (marker Git), migrazioni `team_user`/`profiles`/`client_table`, `XotBaseWizardWidget` view-string; memoria: [phpstan-modules-zero-2026-06-06](./memories/phpstan-modules-zero-2026-06-06.md)
- **architettura fix-conflicts.php** — SSoT `bashscripts/tools/git/fix-conflicts.php`; shim deprecato `bashscripts/fix/`; doc `bashscripts/docs/fix-conflicts-guide.md` + `architecture-git-conflict-tools.md`; creato `repair-php-after-conflict-resolution.sh`; vietato in root monorepo
- **git merge sweep (sessione 4, dev)** — zero marker su codice PHP; 457 file docs/script ripuliti da marker orfani; ripristino `ce96248f` per XotBaseServiceProvider e servizi Xot; `composer.lock` rigenerato; 111 test Pest corretti (`uses(TestCase::class)`); FLVP eseguito su file toccati
- **git merge sweep (sessione 2)** — ~2054 file con marker; script `bashscripts/conflict/resolve-git-conflicts.py`; recovery `Modules/*/app/` da `6b9f55ad`; how-to: [git-merge-marker-sweep](./how-to/git-merge-marker-sweep.md); story: [STORY-GIT-001](../stories/story-git-collision-resolution.md)
- **git merge sweep (sessione 3, master)** — script + repair PHP; zero marker; quality gate `post-edit-php.sh`
- **git collision + FLVP (sessione 4)** — `XotBaseServiceProvider` ripulito da marker residui; `post-edit-php.sh` fixato; memoria [post-edit-php-quality-gate](./memories/post-edit-php-quality-gate.md); Pest `UserMigrationSyntaxTest` 116 pass
- Added `public-theme-resolution-and-vite-assets`: prevent wrong `pub_theme` diagnosis and missing Vite deploy assets for Theme Two.
