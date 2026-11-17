---
title: "Audit approfondito modulo Job"
type: audit
status: review
updated: 2026-11-16
module: Job
qmd: "audit approfondito Job inventario PHPStan Pest policy Filament Actions"
---

# Audit approfondito — Job

## Metodo

Source-first (2026-11-16): inventario filesystem, `rg` su policy/marker/label,
lettura purpose esistente, PHPStan globale Modules già a 0 errori. Nessuna UI
inventata. Pest dichiarato solo se eseguito.

## Inventario misurato

| Area | Conteggio |
|---|---:|
| PHP in `app/` | 176 |
| Test PHP | 84 |
| Models (`app/Models/*.php`) | 17 |
| Policy files (approx) | 32 |
| Resource Filament | 9 |
| Actions | 16 |
| Services | 1 |
| Migration | 14 |
| Lang IT files | 114 |
| Marker conflitto | 0 |
| Occorrenze `return true` in Policy | 5 |
| Ratio test/app | 0.48 |

## Scopo (da docs esistenti / codice)

## Lo scopo in una frase **Job rende visibile e governabile tutto cio' che accade fuori dalla richiesta HTTP: code, importazioni, esportazioni, lavori pianificati — e soprattutto i loro

## Finding preliminari (da inventario)

- **P1** `1` file sotto `app/Services/`: verificare migrazione ad Actions Queueable (convenzione PTVX).

## Finding approfonditi (codice)

- **P0** `create()` → `return true` su Job/FailedJob/JobBatch policy (pattern Jetstream/Team).
- **P0/P1** Import concreti `Modules\User\Models\User` / Team da modelli Job.
- **P1** `ScheduleService` duplica `GetActiveSchedulesAction` (anti-pattern Service).
- **P2** `echo` in `DummyAction`; `exec()` in `WorkerCheck`.

## Gate

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Job
# Pest solo fuori da 10.100.200.15 e con DB testing raggiungibile
./vendor/bin/pest Modules/Job/tests --no-coverage
```

PHPStan `Modules` (2026-11-16): **0 errori** sul tree completo.

## Piano

Vedi [piano-miglioramento.md](../piano-miglioramento.md).

## Riferimenti

- [audit.md](../audit.md)
- [ECC](../../ecc/job-ecc-audit.md)
- [Story](../stories/module-bmad-audit.story.md)
