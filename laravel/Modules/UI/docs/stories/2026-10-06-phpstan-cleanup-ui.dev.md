---
title: "[DEV] PHPStan cleanup — UI"
type: dev
module: UI
story: "./2026-10-06-phpstan-cleanup-ui.story.md"
status: done
created: 2026-10-06
updated: 2026-10-06
tags: [phpstan, cleanup, bmad, ui]
---

# [DEV] PHPStan cleanup — UI

## Technical Plan

- Costanti: tipo nativo; nessun enum (nomi di default)
- Calendario: spostare la risoluzione dello stato fuori dal doppio ciclo

## Files to Modify

- `app/Filament/Tables/Columns/{Address,Event,OpeningHours,Organization,Person,SortableId}Column.php`
- `app/Filament/Forms/Components/InlineDatePicker.php`
- `tests/Feature/GroupColumnTest.php`
- `docs/README.md` (write-back)

## Implementation Steps

- [x] Tipizzate le 6 costanti `DEFAULT_NAME`
- [x] Introdotto `getSelectedDate()` e usato in `generateCalendarData()`
- [x] Test: il valore di ogni campo e' letto tramite il nome della colonna
- [x] PHPStan + `php -l`

## Testing

Test eseguiti: nessuno (la vista del calendario non e' coperta da test unitari; verifica manuale consigliata sulla pagina che usa `InlineDatePicker`).

## Verification

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules/Tenant Modules/Activity Modules/Media Modules/AI Modules/UI Modules/Job Modules/Gdpr Modules/TechPlanner Modules/Seo --memory-limit=-1 --no-progress
php -l <file toccati>

```

Esito: 0 errori sui 9 moduli del gruppo (anche con run completo `./vendor/bin/phpstan analyse` senza argomenti).

## Lessons Learned

- Una ridondanza dentro un ciclo spesso nasconde un calcolo che andava fatto fuori dal ciclo: l'errore indicava il sintomo, il fix e' strutturale (1 `getState()` invece di ~42).
- Un `catch (\Throwable)` che azzera una variabile gia' azzerata era una copia difensiva: il commento ora dice *perche'* si ignora l'errore.
- Segnalazione NON mia nel working tree (pre-esistente, non toccata): `tests/Unit/Models/AssetModelTest.php` ha `@phpstan-ignore` riscritti in forma inline (vietato dal brief).
- Duplicati non toccati: `Enums/TableLayout.php` e `Enums/TableLayoutEnum.php` coesistono.
