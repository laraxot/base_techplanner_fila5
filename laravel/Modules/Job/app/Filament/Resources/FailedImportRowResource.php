<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

use Modules\Job\Models\FailedImportRow;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class FailedImportRowResource extends XotBaseResource
{
    protected static ?string $model = FailedImportRow::class;

    #[Override]
    public static function getRelations(): array
    {
        return [];
    }
}
