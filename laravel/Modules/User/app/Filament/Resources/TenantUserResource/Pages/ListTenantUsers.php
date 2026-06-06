<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantUserResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\CreateAction;
<<<<<<< HEAD
=======
use Modules\User\Filament\Resources\TenantUserResource;
>>>>>>> origin/dev
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * Class ListTenantUsers.
 */
class ListTenantUsers extends XotBaseListRecords
{
<<<<<<< HEAD
    protected static string $resource = \Modules\User\Filament\Resources\TenantUserResource::class;
=======
    protected static string $resource = TenantUserResource::class;
>>>>>>> origin/dev

    /**
     * @return array<string, Action>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
        ];
    }
}
