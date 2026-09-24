<?php

declare(strict_types=1);

namespace Modules\Employee\Filament\Resources\AbsenceRequestResource\Pages;

use Modules\Employee\Filament\Resources\AbsenceRequestResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewAbsenceRequest extends XotBaseViewRecord
{
    protected static string $resource = AbsenceRequestResource::class;
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return [];
    }

=======
>>>>>>> laraxot/dev
}
