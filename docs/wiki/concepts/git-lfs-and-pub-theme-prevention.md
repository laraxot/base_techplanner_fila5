---
title: "Prevenzione GH008 LFS e pub_theme Two/Sixteen"
module: techplanner
type: concept
created: "2026-06-06T00:00:00Z"
updated: "2026-06-06T00:00:00Z"
qmd: "git lfs GH008 push rejected pub_theme Two Sixteen xra XotData TechPlanner frontoffice"
related:
  - "../../../docs/git-lfs-push-gh008-prevention.md"
  - "../../../docs/pub_theme_namespace_rule.md"
---

# Prevenzione GH008 LFS e pub_theme Two/Sixteen

## Quando consultare

| Trigger | Doc canonica |
|---------|----------------|
| `git push` → `GH008` / unknown Git LFS object | [docs/git-lfs-push-gh008-prevention.md](../../../docs/git-lfs-push-gh008-prevention.md) |
| `/it` carica tema sbagliato (Two vs Sixteen) | [docs/pub_theme_namespace_rule.md](../../../docs/pub_theme_namespace_rule.md) |
| `View [language-switcher] not found` | Non cambiare `pub_theme` — allineare header CMS al tema canonico |

## Checklist agente (pre-push)

```bash
git lfs ls-files                    # deve essere vuoto o oggetti pushabili
find laravel/Modules -name '*~cc6378f*'  # zero file
cd laravel && php artisan tinker --execute="echo Modules\Xot\Datas\XotData::make()->pub_theme;"
# TechPlanner → Two
```

## SSoT tema FO TechPlanner

- File: `laravel/config/local/techplanner/xra.php`
- Runtime: `XotData::make()` legge **solo** `xra` (non `xot.php`)
- Canon: **`pub_theme => 'Two'`** per Sottana/TechPlanner marketing

## Regola anti-workaround

**Vietato** impostare `pub_theme => 'Sixteen'` solo perché manca un partial nel tema Two. Portare il partial o cambiare la view in `header.json`.

## Caso 2026-06-06

Push `master` bloccato da `laravel/Modules/Notify/.ai~cc6378f (.)` (LFS orphan). Fix: `git rm` artefatti `*~cc6378f*`, amend, push OK.
