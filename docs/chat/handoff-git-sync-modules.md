---
title: "Handoff — git sync moduli/temi post-PHPStan"
type: handoff
tags: [git, sync, modules, themes, phpstan]
created: 2026-07-24
updated: 2026-07-24
related:
  - ./handoff-phpstan-modules.md
  - ./INDEX.md
  - ../wiki/rules/module-git-sync-after-fix.md
---

# Handoff — sync `Modules/*` + `Themes/Sixteen`

Dopo `phpstan analyse Modules` → 0 errori: sync dei repo toccati con `git fetch` + `pull --rebase` su `laraxot/dev`.

Log: `laravel/build/git-sync-modules-final.log`  
PHPStan post-sync: `laravel/build/phpstan/modules-after-git-sync.log` → **[OK] No errors**

## Esito sync (ahead/behind = 0)

| Path | Pull | Stato locale |
|------|------|--------------|
| Activity, AI, Employee, Gdpr, Notify, Seo, Tenant, UI, User | Already up to date | clean |
| Media | Already up to date | clean + stash `ponytail: sync` (non toccato) |
| Xot | Fast-forward `2e62d6e..373366b` | dirty: `tests/Support/PestFunctionBridge.php` (rigenerato, 0 marker) |
| Themes/Sixteen | Already up to date | clean |

## Xot — bridge

Remote aveva avuto marker di conflitto in `PestFunctionBridge.php`; FF `373366b` ha ripulito HEAD. Locale: bridge **rigenerato** con `bashscripts/tools/generate-pest-phpstan-bridge.php` (213 ns, 10434 righe). PHPStan Xot + Modules OK. **Non committato** (attende richiesta utente).

## Non fatto

- Push / commit
- Pop stash Media (`ponytail: sync`)
