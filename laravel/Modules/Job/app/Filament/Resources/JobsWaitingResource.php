<?php

declare(strict_types=1);
/**
 * @see https://github.com/mooxphp/jobs/blob/main/src/resources/JobsWaitingResource.php
 */

namespace Modules\Job\Filament\Resources;

use Modules\Job\Filament\Resources\JobsWaitingResource\Widgets\JobsWaitingOverview;
use Modules\Job\Models\JobsWaiting;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class JobsWaitingResource extends XotBaseResource
{
    /**
     * Il modello e' `JobsWaiting`, non `Job`.
     *
     * Da `$model` Filament ricava per convenzione il nome delle classi che
     * accompagnano la resource. Con `Job::class` risolveva
     * `JobsWaitingResource\Tables\JobsTable`, e la tabella scritta per questa
     * resource — `JobsWaitingsTable`, nella stessa cartella — non veniva usata
     * da nessuno: codice morto per una parola sbagliata in una riga.
     *
     * La differenza fra le due non e' cosmetica: `JobsWaitingsTable` rende la
     * colonna `id` con `IDColumn` del modulo UI, `JobsTable` con una
     * `TextColumn` nuda. Era la versione **peggiore** a essere in uso
     * (base_quaeris_fila5#245).
     *
     * `Modules\Job\Models\JobsWaiting` e' oggi `class JobsWaiting extends Job {}`,
     * una sottoclasse vuota: il cambio non altera quali righe si vedono. Che
     * **debba** restare vuota e' un'altra questione — una pagina intitolata
     * «lavori in attesa» che mostra tutti i lavori, compresi quelli gia' presi
     * in carico (`reserved_at` valorizzato), non fa quello che il titolo
     * promette. Sta nella stessa segnalazione.
     */
    protected static ?string $model = JobsWaiting::class;

    protected static bool $shouldRegisterNavigation = true;

    #[Override]
    public static function getWidgets(): array
    {
        return [
            JobsWaitingOverview::class,
        ];
    }
}
