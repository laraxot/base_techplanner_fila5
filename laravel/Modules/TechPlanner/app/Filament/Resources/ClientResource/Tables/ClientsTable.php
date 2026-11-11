<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources\ClientResource\Tables;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Modules\Geo\Filament\Actions\UpdateCoordinatesBulkAction;
use Modules\Geo\Filament\Tables\Columns\AddressColumn;
use Modules\Notify\Filament\Actions\SendRecordsNotificationBulkAction;
use Modules\Notify\Filament\Tables\Columns\ContactColumn;
use Modules\TechPlanner\Filament\Resources\Tables\TechPlannerBaseTable;
use Modules\TechPlanner\Models\Client;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Override;

class ClientsTable extends TechPlannerBaseTable
{
    /**
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            /*
             * `distance` esiste solo se ListClients ha applicato `withDistance()`. Leggerla come
             * `$record->distance` farebbe trattare a Eloquent il metodo `GeoTrait::distance()` come
             * relazione (LogicException, pagina in errore alla prima visita): si legge l'attributo grezzo.
             */
            'distance' => TextColumn::make('distance')
                ->getStateUsing(static fn (Model $record): mixed => $record->getAttributes()['distance'] ?? null)
                ->formatStateUsing(static fn (mixed $state): string => is_numeric($state)
                    ? number_format((float) $state, 2, ',', '.').' km'
                    : '—')
                ->placeholder('—'),
            'longitude' => TextColumn::make('longitude')->sortable()->toggleable(isToggledHiddenByDefault: true),
            'latitude' => TextColumn::make('latitude')->sortable()->toggleable(isToggledHiddenByDefault: true),
            'business_closed' => TextColumn::make('business_closed')->toggleable(isToggledHiddenByDefault: true),
            // Telefono: la card ha una riga per colonna. Di un cliente servono nome, distanza, indirizzo e contatti
            // (chiamare/navigare); l'attivita' merceologica compare da `md`.
            'activity' => TextColumn::make('activity')
                ->searchable()
                ->sortable()
                ->wrap()
                ->visibleFrom('md'),
            'company_name' => TextColumn::make('company_name')
                ->searchable()
                ->sortable()
                ->wrap(),
            'fiscal_code' => TextColumn::make('fiscal_code')->toggleable(isToggledHiddenByDefault: true),
            /*
            'full_address' => TextColumn::make('full_address')
                ->searchable(['city', 'company_office', 'postal_code', 'province', 'country', 'address'])
                ->sortable()
                ->wrap(),

            'city' => TextColumn::make('city')->toggleable(isToggledHiddenByDefault: true),
            'province' => TextColumn::make('province')->toggleable(isToggledHiddenByDefault: true),
            'country' => TextColumn::make('country')->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => TextColumn::make('updated_at')->toggleable(isToggledHiddenByDefault: true)->sortable(),
            'created_at' => TextColumn::make('created_at')->toggleable(isToggledHiddenByDefault: true)->sortable(),

            */
            'address' => AddressColumn::make('address'),
            'contacts' => ContactColumn::make('contacts'),
        ];
    }

    /*
     * Filtri, «Ordina per distanza» e azioni di gruppo stavano in ListClients, ma la tabella della
     * lista è costruita da questa classe (XotBaseResource::table()): là erano codice morto e nel
     * pannello non comparivano (verificato con Playwright il 2026-11-05). Spostati qui.
     */

    #[Override]
    public function table(Table $table): Table
    {
        return parent::table($table)->modifyQueryUsing(static function (Builder $query): Builder {
            $latitude = Session::get('user_latitude');
            $longitude = Session::get('user_longitude');
            if (! is_numeric($latitude) || ! is_numeric($longitude)) {
                return $query;
            }

            /** @var Builder<Client> $query */
            return $query->withDistance((float) $latitude, (float) $longitude);
        });
    }

    /**
     * @return array<string|int, Filter|TernaryFilter|BaseFilter>
     */
    #[Override]
    public function getTableFilters(): array
    {
        return [
            ...parent::getTableFilters(),
            'business_closed' => TernaryFilter::make('business_closed')->default(false),
            'activity' => SelectFilter::make('activity')
                ->multiple()
                ->options(static fn (): array => Client::query()
                    ->whereNotNull('activity')
                    ->distinct()
                    ->orderBy('activity')
                    ->limit(100)
                    ->pluck('activity', 'activity')
                    ->map(app(SafeStringCastAction::class)->execute(...))
                    ->all()),
        ];
    }

    /**
     * @return array<int|string, Action|ActionGroup>
     */
    #[Override]
    public function getTableActions(): array
    {
        return [
            ...parent::getTableActions(),
            'sortByDistance' => Action::make('sortByDistance')
                ->icon('heroicon-o-map')
                ->hidden(static fn (Client $record): bool => $record->trashed())
                ->action(static function (Client $record, HasTable $livewire): void {
                    $latitude = $record->getAttribute('latitude');
                    $longitude = $record->getAttribute('longitude');
                    if (! is_numeric($latitude) || ! is_numeric($longitude)) {
                        Notification::make()
                            ->warning()
                            ->title(__('techplanner::client.actions.sortByDistance.no_coordinates.title'))
                            ->body(__('techplanner::client.actions.sortByDistance.no_coordinates.body'))
                            ->send();

                        return;
                    }

                    Session::put('user_latitude', (float) $latitude);
                    Session::put('user_longitude', (float) $longitude);
                    Cookie::queue('user_latitude', (string) $latitude, 60 * 24 * 30);
                    Cookie::queue('user_longitude', (string) $longitude, 60 * 24 * 30);

                    if ($livewire instanceof Component) {
                        $livewire->dispatch('coordinates-updated');
                    }
                    if (method_exists($livewire, 'resetTable')) {
                        $livewire->resetTable();
                    }

                    Notification::make()
                        ->success()
                        ->title(__('techplanner::client.actions.sortByDistance.done.title'))
                        ->body(__('techplanner::client.actions.sortByDistance.done.body', ['name' => SafeStringCastAction::cast($record->getAttribute('company_name'))]))
                        ->send();
                }),
        ];
    }

    /**
     * @return array<int|string, BulkAction>
     */
    #[Override]
    public function getTableBulkActions(): array
    {
        return [
            ...parent::getTableBulkActions(),
            'updateCoordinates' => UpdateCoordinatesBulkAction::make('updateCoordinates'),
            'sendRecordsNotification' => SendRecordsNotificationBulkAction::make('sendRecordsNotification'),
        ];
    }
}
