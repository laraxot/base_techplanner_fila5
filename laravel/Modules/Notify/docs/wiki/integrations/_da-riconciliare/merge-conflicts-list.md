---
qmd: "merge conflicts list"
issues: []
discussions: []
<<<<<<< HEAD
title: "Merge conflict markers: Notify"
=======
title: "Merge conflict markers — Notify"
>>>>>>> laraxot/dev
module: notify
type: integration
tags: [integrations, modules, notify]
created: 2026-08-24
updated: 2026-08-24
<<<<<<< HEAD
status: draft
---

# Merge conflict markers: Notify
=======
---

# Merge conflict markers — Notify
>>>>>>> laraxot/dev

## Stato (2026-08-02)

Resolved forward-only:
<<<<<<< HEAD
- [x] `resources/svg/*.svg` (13): SVG reale, non puntatore Git LFS
- [x] `app/Filament/Resources/**/Tables/*Table.php` (3 conflitti + 3 allineati): corpo HEAD, firma `public function getTableColumns()` (non `static`)
- [x] `docs/redundancy-report.md`: HEAD version
## Stato (2026-05-26)

- [x] `app/Filament/Resources/**/Tables/*Table.php` (3 conflitti + 3 allineati): corpo HEAD, firma `public function getTableColumns()` (non `static`: vedi memoria sotto)
- [x] `docs/redundancy-report.md`: HEAD
=======
- [x] `resources/svg/*.svg` (13) — SVG reale, non puntatore Git LFS
- [x] `app/Filament/Resources/**/Tables/*Table.php` (3 conflitti + 3 allineati) — corpo HEAD, firma `public function getTableColumns()` (non `static`)
- [x] `docs/redundancy-report.md` — HEAD version
## Stato (2026-05-26)

- [x] `app/Filament/Resources/**/Tables/*Table.php` (3 conflitti + 3 allineati) — corpo HEAD, firma `public function getTableColumns()` (non `static`: vedi memoria sotto)
- [x] `docs/redundancy-report.md` — HEAD
>>>>>>> laraxot/dev
- [x] Rimossi `*.php.up` backup con marker

## Verifica

```bash
cd laravel && git grep -n '^<<<<<<< ' -- Modules/Notify/
./vendor/bin/phpstan analyse Modules/Notify --memory-limit=2G
```

## Memoria

<<<<<<< HEAD
[`docs/wiki/memories/merge-collision-notify-lessons.md`](../../memories/merge-collision-notify-lessons.md)
[`docs/wiki/memories/merge-collision-notify-lessons.md`](../../memories/merge-collision-notify-lessons.md)
=======
[`docs/wiki/memories/merge-collision-notify-lessons.md`](wiki/memories/merge-collision-notify-lessons.md)
>>>>>>> laraxot/dev
