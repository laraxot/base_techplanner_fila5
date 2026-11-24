<?php

declare(strict_types=1);

/*
 * Debito di architettura di Modules\Job: classi che oggi violano una regola di Modules/Xot/tests/Arch/ArchitectureTest.php.
 * Misurato il 2026-11-18. Solo in discesa: chi corregge una classe la toglie, chi aggiunge una voce lo spiega nella PR.
 * Ogni voce deve stare nel namespace di questo pacchetto (lo verifica ArchitectureTest).

 * ADR: Modules/Xot/docs/adr/architecture-tests-pest-arch.md
 */

return [
    // classi in un namespace Services (regola No Services, DCP-270); NoServicesTest le vede come cartelle
    //
    // Vuota dal 2026-11-20 (base_quaeris_fila5#247): logica in
    // `Actions/Schedule/GetActiveSchedulesAction` +
    // `Actions/Schedule/ClearScheduleCacheAction`.
    // 2026-11-23: `app/Services/ScheduleService.php` e' ancora on-disk come stub
    // SUPERSEDED (no-delete senza auth); zero caller; Observer/Command usano
    // `Actions/Schedule/ClearScheduleCacheAction`. Non rientra in debito: non e'
    // business logic attiva.
    'services' => [],
];
