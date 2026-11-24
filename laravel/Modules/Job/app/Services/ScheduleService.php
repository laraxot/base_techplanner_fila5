<?php

declare(strict_types=1);

namespace Modules\Job\Services;

/**
 * SUPERSEDED — non usare. Residuo on-disk (no-delete senza autorizzazione).
 *
 * Logica migrata a:
 * - {@see \Modules\Job\Actions\Schedule\GetActiveSchedulesAction}
 * - {@see \Modules\Job\Actions\Schedule\ClearScheduleCacheAction}
 *
 * Zero caller di produzione (verificato 2026-11-23). `tests/Arch/debt.php`
 * tiene `services => []` (#247). Rimozione file richiede autorizzazione esplicita.
 *
 * @deprecated Use Schedule Actions instead.
 */
final class ScheduleService
{
}
