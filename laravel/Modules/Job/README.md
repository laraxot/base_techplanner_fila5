---
id: module-job-readme
<<<<<<< .merge_file_PBYQX6
<<<<<<< .merge_file_00gLhO
title: "Job — documentazione del modulo"
type: module-readme
module: Job
status: active
updated: 2026-09-28
tags: [module, laraxot, job]
related:
  - "./docs/"
---

# Job Module (BMAD Fix — Second Brain)
## Score
73/100 | Grade C
## Fixes
- Added README (docs 0->60)
- Deep nesting reduced (GetTaskCommandsAction.php)
- QA gate passed
## Next
Batch 4: UI/Comment/Rating/SEO
---

## Scheda tecnica verificata (2026-09-28)

| Voce | Valore |
|---|---|
| Nome dichiarato | `Job` |
| Namespace | `Modules\\Job\\` |
| File PHP (escluso vendor) | 506 |
| File PHP di test | 76 |
| Aree `app/` rilevate | Actions, Console, Contracts, Datas, Enums, Events, Filament, Http, Models, Notifications, Observers, Phpstan, Providers, Rules, Services, Traits |
| Migrazioni PHP | 45 |
| SSoT locale | [`docs/`](docs/) e [`docs/bmad/`](docs/bmad/) |

Questa scheda è un inventario statico, non una dichiarazione di qualità. Per ogni
modifica eseguire i gate dal progetto Laravel:

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Job
./vendor/bin/pest Modules/Job
```

La responsabilità del modulo, le decisioni architetturali e le opportunità sono
documentate negli artefatti BMAD sotto [`docs/bmad/`](docs/bmad/). I numeri vanno
rigenerati quando il modulo cambia; non copiarli in badge non verificati.
=======
=======
>>>>>>> .merge_file_z7Ln0Y
title: "Job — Gestione dei Lavori Asincroni"
type: module-readme
category: module-documentation
module: Job
status: active
tags: [job, queue, async, retries]
created: 2026-09-14
updated: 2026-09-22
qmd: "job queue async actions retries module documentation"
issues:
  - "https://github.com/laraxot/module_job_fila5/issues/54"
  - "https://github.com/laraxot/module_job_fila5/issues/59"
discussions:
  - "https://github.com/laraxot/module_job_fila5/discussions/55"
related:
  - "./docs/architecture.md"
  - "./docs/bmad/livewire-inventory.md"
  - "./docs/stories/12.1.retire-job-http-livewire.story.md"
sources: []
---

# ⚙️ Job

> **Gestione dei lavori asincroni.**

Pattern per job, code e monitoraggio delle elaborazioni differite.

## Cosa offre

- **Job Laravel** – definizione e scheduling
- **Azioni accodabili** – azioni da eseguire dopo completamento
- **Retry e stato** – gestione fallimenti e riorganizzazione
- **Activity/Notify** – integrazione con altri moduli

## Confini architetturali

```bash
cd laravel
php artisan module:list
./vendor/bin/phpstan analyse Modules/Job
```

See [architecture](./docs/architecture.md) and [livewire inventory](./docs/bmad/livewire-inventory.md).

**Modulo** `job` · **Laraxot** · PHPStan max · Filament 5
<<<<<<< .merge_file_PBYQX6
>>>>>>> .merge_file_Vi6Stw
=======
>>>>>>> .merge_file_z7Ln0Y
