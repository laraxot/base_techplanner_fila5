---
tags: [documentation]
created: 2026-09-26
qmd: "merge collision notify lessons"
issues: []
discussions: []
title: lezioni merge collision Notify
type: memory
module: Notify
updated: 2026-05-26
related:
  - ../../merge-conflicts-list.md
  - ../../../../../../docs/wiki/how-to/git-merge-marker-sweep.md
<<<<<<< HEAD
status: draft
---

# Lezioni merge: modulo Notify
=======
---

# Lezioni merge — modulo Notify
>>>>>>> laraxot/dev

## SVG (`resources/svg/`)

| Lato conflitto | Contenuto | Scelta |
|----------------|-----------|--------|
| HEAD | XML SVG | **Tenere** |
| Incoming | Riga `git-lfs.github.com/spec/v1` | Scartare nel working tree mono (asset inline) |

## Filament `*Table.php`

<<<<<<< HEAD
**Canon (sempre):** `public function getTableColumns(): array`: filosofia Filament + `XotBaseResourceTable`.
=======
**Canon (sempre):** `public function getTableColumns(): array` — filosofia Filament + `XotBaseResourceTable`.
>>>>>>> laraxot/dev

| Lato merge | Firma | Azione |
|------------|-------|--------|
| HEAD | `static` | Rimuovere `static` |
| Incoming / canon | `public function` | **Obbligatorio** |

Corpo colonne (chiavi stringa): di solito da HEAD.

## File da eliminare, non risolvere

<<<<<<< HEAD
- `*.php.up`: backup merge; rimuovere se compaiono marker.
=======
- `*.php.up` — backup merge; rimuovere se compaiono marker.
>>>>>>> laraxot/dev

## Post-fix obbligatorio

```bash
cd laravel
./vendor/bin/phpstan analyse Modules/Notify --memory-limit=2G
./tools/phpmd.sh Modules/Notify/app/Filament/Resources/...
./tools/phpinsights.sh analyse Modules/Notify/app/...
```
