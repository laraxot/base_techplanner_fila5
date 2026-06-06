<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Resources\Pages\PageRegistration;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Filament\Clusters\Passport;
use Modules\User\Filament\Clusters\Passport\Resources\OauthPersonalAccessClientResource\Pages\CreateOauthPersonalAccessClient;
use Modules\User\Filament\Clusters\Passport\Resources\OauthPersonalAccessClientResource\Pages\EditOauthPersonalAccessClient;
use Modules\User\Filament\Clusters\Passport\Resources\OauthPersonalAccessClientResource\Pages\ListOauthPersonalAccessClients;
use Modules\User\Filament\Clusters\Passport\Resources\OauthPersonalAccessClientResource\Pages\ViewOauthPersonalAccessClient;
use Modules\User\Models\OauthPersonalAccessClient;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * Class OauthPersonalAccessClientResource.
 */
final class OauthPersonalAccessClientResource extends XotBaseResource
{
    protected static ?string $cluster = Passport::class;

* @return array<string, Action>
     */
    public static function getTableActions(): array
    {
        return [
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
        ];
    }

    /**
     * Get the table bulk actions for the resource.
     *
* @return array<string, Action|ActionGroup>
     */
    public static function getTableBulkActions(): array
    {
        return [
            'delete' => BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ];
    }

    /**
* @return array<string, PageRegistration>
     */
    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListOauthPersonalAccessClients::route('/'),
            'create' => CreateOauthPersonalAccessClient::route('/create'),
            'edit' => EditOauthPersonalAccessClient::route('/{record}/edit'),
            'view' => ViewOauthPersonalAccessClient::route('/{record}'),
        ];
    }

    /**
     * Configure the model query.
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['client']);
    }
}
