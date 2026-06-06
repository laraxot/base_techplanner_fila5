<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantUserResource\Pages;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Modules\User\Filament\Resources\TenantUserResource;
<<<<<<< HEAD
    protected static string $resource = TenantUserResource::class;
=======
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Class ViewTenantUser.
 */
class ViewTenantUser extends XotBaseViewRecord
{
    protected static string $resource = \Modules\User\Filament\Resources\TenantUserResource::class;
>>>>>>> 8215f950 (.)

    /**
     * @return array<string, Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return [
            'tenant_user' => Section::make()->schema([
                'id' => TextEntry::make('id'),
                'tenant' => TextEntry::make('tenant.name'),
                'user' => TextEntry::make('user.name'),
                'role' => TextEntry::make('role'),
                'created_at' => TextEntry::make('created_at')->dateTime(),
                'updated_at' => TextEntry::make('updated_at')->dateTime(),
            ]),
        ];
    }
}
