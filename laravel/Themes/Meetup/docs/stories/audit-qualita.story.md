---
title: "Audit qualita' — tema Meetup"
type: story
theme: Meetup
status: done
created: 2026-11-19
updated: 2026-11-19
issue: https://github.com/laraxot/base_techplanner_fila5/issues/64
tags: [bmad, audit, docs, qualita]
---

# Audit qualita' — tema Meetup

**Fase BMAD**: Dev + QA. **Issue**: [#64](https://github.com/laraxot/base_techplanner_fila5/issues/64).
Audit parallelo dei temi (nomi `.md` senza date, indice unico della docs, file morti, PHPStan, test).

## Risultati

- Nomi `.md` datati: `redundancy-audit-2026-05-21.md` era la copia superata di `redundancy-audit.md`: rimosso.
- Duplicati esatti rimossi: `wiki/readme.md` (= `wiki/README.md`), `PROJECT-STRUCTURE.md` (= `project-structure.md`).
- Cartelle con data nel nome: `docs/screenshots/2026-02-02/` e `docs/screenshots/events/2026-02-17/` contengono solo immagini
  e sono citate dai docs: non rinominate (la regola riguarda i `.md`).

## Codice

- Rimosso `resources/js/_ide_helper.php`: file generato da barryvdh/laravel-ide-helper, finito tra gli asset JS, mai incluso;
  da solo produceva 1722 errori PHPStan.
- Rimosso `lang/it/home.php.backup_20260216_100545` (backup non usato).
- PHPStan: restano 10 errori in `Http/Controllers/EventBookingController.php` (usa `Modules\Meetup\Models\Event`, modulo
  assente in questo progetto).
