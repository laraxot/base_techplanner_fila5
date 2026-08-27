---
title: Job Module - Gestione Code Asincrone
type: documentation
tags:
  - module
  - documentation
  - jobs
  - queue
  - async
created: 2026-06-05
updated: 2026-07-28
---

# ⚙️ Job Module - Gestione Code Asincrone

[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![PHP 8.4](https://img.shields.io/badge/PHP-8.4-blueviolet.svg)](https://www.php.net/)
[![Queue Processing](https://img.shields.io/badge/Queue-Processing-orange.svg)](https://laravel.com/docs/queues)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)

> **Job Module**: Gestione intelligente di job asincroni, code di elaborazione e retry logic.

## 📋 Overview

Il modulo **Job** fornisce un sistema completo e affidabile per la gestione di task asincroni all'interno dell'ecosistema Laraxot. Abilita:

- Dispatching e gestione delle code
- Retry logic intelligente con backoff esponenziale
- Tracking di job falliti e recovery
- Monitoraggio e statistiche queue
- Batch processing per operazioni bulk
- Integrazione con Filament per la gestione UI

### Principi Fondamentali

- **Affidabilità**: Garantisce esecuzione dei job anche in caso di failure
- **Trasparenza**: Tracking completo e audit trail di ogni job
- **Flessibilità**: Supporta multipli driver di queue
- **Composabilità**: Pattern uniforme per job in tutto il sistema

## 🏗️ Architettura

### Directory Structure

```
Modules/Job/
├── app/
│   ├── Actions/
│   │   ├── DispatchJobAction.php
│   │   ├── RetryFailedJobAction.php
│   │   └── ProcessBatchAction.php
│   ├── Models/
│   │   ├── Job.php
│   │   ├── FailedJob.php
│   │   └── JobBatch.php
│   ├── Services/
│   │   ├── JobDispatcher.php
│   │   ├── QueueManager.php
│   │   └── JobMonitor.php
│   ├── Jobs/
│   │   ├── BaseQueueableJob.php
│   │   └── [Specific Jobs]
│   ├── Filament/
│   │   ├── Resources/
│   │   │   ├── JobResource.php
│   │   │   ├── FailedJobResource.php
│   │   │   └── JobBatchResource.php
│   │   └── Widgets/
│   ├── Contracts/
│   └── Events/
├── database/
│   ├── migrations/
│   │   ├── create_jobs_table.php
│   │   ├── create_failed_jobs_table.php
│   │   └── create_job_batches_table.php
│   └── factories/
├── resources/
│   └── views/
└── tests/
```

### Core Models

#### Job

Modello che rappresenta un singolo job in coda.

**Attributi:**
- `id` — Identificativo unico
- `queue` — Nome della coda (default, mail, heavy, etc.)
- `payload` — Dati serializzati del job
- `attempts` — Numero di tentativi
- `status` — Stato (pending, processing, completed, failed)
- `created_at`, `updated_at` — Timestamp

#### FailedJob

Traccia i job falliti per recovery e debugging.

**Attributi:**
- `id`, `uuid` — Identificativi
- `connection` — Driver di queue utilizzato
- `queue` — Coda di appartenenza
- `payload` — Dati del job
- `exception` — Stack trace dell'errore
- `failed_at` — Timestamp del fallimento

#### JobBatch

Raggruppa più job per elaborazione coordinata.

## 🚀 Utilizzo Comune

### Creare un Job Queueable

```php
namespace Modules\Notify\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\QueueableAction\QueueableAction;

class SendEmailJob implements ShouldQueue
{
    use QueueableAction;

    public function __construct(
        public string $email,
        public string $subject,
        public string $body,
    ) {}

    public function handle(): void
    {
        Mail::to($this->email)
            ->send(new MailMessage($this->subject, $this->body));
    }
}
```

### Dispatch con Retry Logic

```php
dispatch(new SendEmailJob($email))->retry(3)->delay(60);

dispatch(new SendEmailJob($email))
    ->retryUntil(now()->addHours(1))
    ->backoff([10, 60, 600]);
```

### Monitorare Job

```php
$failedCount = FailedJob::count();
$processingCount = Job::where('status', 'processing')->count();
```

## 🔗 Integrazioni Cross-Module

### Notify Module
Utilizza Job module per dispatching di notifiche asincrone.

### Activity Module
Registra audit trail dei job tramite Activity Log.

### User Module
Traccia job relativi a operazioni utente.

## 📊 Queue Configuration

**File:** `config/queue.php`

```php
'connections' => [
    'database' => [
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
    ],
    'mail' => [
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'mail',
        'retry_after' => 300,
    ],
],
```

## 🧪 Testing

```bash
php artisan test Modules/Job/Tests/Unit
php artisan test Modules/Job/Tests/Feature
```

## 📝 Monitoraggio in Produzione

### Filament Dashboard

L'Admin Panel espone widget per:
- Statistiche code in tempo reale
- Job falliti con stack trace
- Batch status e progress

### Artisan Commands

```bash
php artisan queue:work
php artisan queue:retry all
php artisan queue:prune-batches
```

## 📖 Vedi anche

- [Xot Module](../Xot/docs/README.md) — Framework base
- [Notify Module](../Notify/docs/README.md) — Notifiche asincrone
- [Activity Module](../Activity/docs/README.md) — Audit trail
- [Laravel Queue Documentation](https://laravel.com/docs/queues)

## 📄 License & Authors

**Authors:**
- Marco Sottana <marco.sottana@gmail.com>

**License:** MIT

---

**Last Updated:** 2026-07-28 — Documentazione aggiornata a standard EXCELLENT
