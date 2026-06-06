---
title: "Git collision repair pass obbligatorio"
type: memory
tags: [git, merge, php, second-brain]
created: 2026-06-06
updated: 2026-06-06
---

# Git collision repair pass obbligatorio

Dopo ogni sweep automatico dei marker Git su PHP:

1. `python3 bashscripts/tools/git/resolve-conflict-markers.py`
2. `bashscripts/tools/git/repair-php-after-conflict-resolution.sh`
3. `git grep -l '^<<<<<<< '` → deve essere **0**
4. Campione `php -l` su `Modules/User/database/factories/`

**Mai** `--prefer-head` cieco su PHP: tronca `class` nelle Factory.

How-to: [git-merge-marker-sweep](../how-to/git-merge-marker-sweep.md)
