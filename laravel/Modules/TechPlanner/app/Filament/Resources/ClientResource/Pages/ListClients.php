<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources\ClientResource\Pages;

<<<<<<< HEAD
=======
use Modules\Geo\Actions\UpdateCoordinatesAction;
use Illuminate\Database\Eloquent\Collection;
>>>>>>> 4b6b99016 (first commit)
use Exception;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\ImportAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;
=======
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Arr;
>>>>>>> 4b6b99016 (first commit)
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
<<<<<<< HEAD
use Modules\Geo\Actions\UpdateCoordinatesAction;
use Modules\Geo\Filament\Actions\UpdateCoordinatesBulkAction;
use Modules\Geo\Filament\Tables\Columns\AddressColumn; // NEW IMPORT
use Modules\Notify\Filament\Actions\SendRecordsNotificationBulkAction;
use Modules\Notify\Filament\Tables\Columns\ContactColumn;
=======
use Modules\Notify\Filament\Tables\Columns\ContactColumn;
use Modules\Notify\Filament\Actions\SendRecordsNotificationBulkAction; // NEW IMPORT
use Modules\Geo\Filament\Actions\UpdateCoordinatesBulkAction;
use Modules\Geo\Filament\Tables\Columns\AddressColumn;
>>>>>>> 4b6b99016 (first commit)
use Modules\TechPlanner\Filament\Imports\ClientImporter;
use Modules\TechPlanner\Filament\Resources\ClientResource;
use Modules\TechPlanner\Models\Client;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Override;
<<<<<<< HEAD
=======
use Throwable;

use function Safe\preg_replace;
>>>>>>> 4b6b99016 (first commit)

/**
 * @property ClientResource $resource
 */
class ListClients extends XotBaseListRecords
{
    protected static string $resource = ClientResource::class;

    public ?int $selectedClientId = null;

    protected ?Builder $tableQuery = null;

    /**
     * Configura i widget dell'header della pagina.
     */
    protected function getHeaderWidgets(): array
    {
        return [
            // \Modules\TechPlanner\Filament\Widgets\ClientMapWidget::class, //WIP
        ];
    }

    /**
     * Summary of getListTableColumns.
     */
    public function getTableColumns(): array
    {
        /** @var Collection<int, Client> $rows */
        $rows = Client::whereNull('route')->whereNotNull('address')->get();
        foreach ($rows as $row) {
            if ($row instanceof Client) {
                $row->update([
                    'route' => $row->address,
                ]);
            }
        }

        $columns = [
            'distance' => TextColumn::make('distance')->formatStateUsing(function (string|int|float|null $state): string {
                $distance = is_numeric($state) ? (float) $state : 0.0;

                return number_format($distance, 2).' km';
            }),
            // ...parent::getListTableColumns(),

            'longitude' => TextColumn::make('longitude')->sortable()->toggleable(isToggledHiddenByDefault: true),
            'latitude' => TextColumn::make('latitude')->sortable()->toggleable(isToggledHiddenByDefault: true),
            'business_closed' => TextColumn::make('business_closed')->toggleable(isToggledHiddenByDefault: true),
            'activity' => TextColumn::make('activity')
                ->searchable()
                ->sortable()
                ->wrap(),
            'company_name' => TextColumn::make('company_name')
                ->searchable()
                ->sortable()
<<<<<<< HEAD
                // ->formatStateUsing(fn($record) => dddx($record))
=======
                //->formatStateUsing(fn($record) => dddx($record))
>>>>>>> 4b6b99016 (first commit)
                ->wrap(),
            'fiscal_code' => TextColumn::make('fiscal_code')->toggleable(isToggledHiddenByDefault: true),
            'full_address' => TextColumn::make('full_address')
                ->searchable(['city', 'company_office', 'postal_code', 'province', 'country', 'address'])
                ->sortable()
                ->wrap(),
            'city' => TextColumn::make('city')->toggleable(isToggledHiddenByDefault: true),
            'province' => TextColumn::make('province')->toggleable(isToggledHiddenByDefault: true),
            'country' => TextColumn::make('country')->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => TextColumn::make('updated_at')->toggleable(isToggledHiddenByDefault: true)->sortable(),
            'created_at' => TextColumn::make('created_at')->toggleable(isToggledHiddenByDefault: true)->sortable(),

            'address' => AddressColumn::make('full_address'),
            'contacts' => ContactColumn::make('contacts'),
        ];

        return $columns;
    }

<<<<<<< HEAD
=======


>>>>>>> 4b6b99016 (first commit)
    public function getTableFilters(): array
    {
        // Cache del filtro attività per ridurre query e memory usage
        $activities = Cache::remember('client_activities_filter', 3600, function () {
            return static::getModel()::query()
                ->whereNotNull('activity')
                ->distinct()
                ->limit(100) // Limitare il numero di attività per evitare overhead
                ->pluck('activity', 'activity')
                ->map(app(SafeStringCastAction::class)->execute(...))
                ->toArray();
        });

        /** @var array<string, string> $activities */

        return [
            ...parent::getTableFilters(),
            TernaryFilter::make('business_closed')->default(false),
            SelectFilter::make('activity')
                ->multiple()
                ->preload()
                ->options($activities),
        ];
    }

    #[Override]
    public function getHeaderActions(): array
    {
        /** @var array<string, Action> $actions */
        $actions = [
            ...parent::getHeaderActions(),
            ImportAction::make('importClient')->importer(ClientImporter::class),
            Action::make('populateCoordinates')
                ->icon('heroicon-o-globe-alt')
                ->action(function () {
                    $this->populateAllCoordinates();
                })
                ->requiresConfirmation()
                ->modalHeading(trans('tech_planner::client.actions.populateCoordinates.modal.heading'))
                ->modalDescription(trans('tech_planner::client.actions.populateCoordinates.modal.description'))
                ->modalSubmitActionLabel(trans('tech_planner::client.actions.populateCoordinates.modal.submit_label')),
        ];

        return $actions;
    }

    public function getTableBulkActions(): array
    {
        return [
            'updateCoordinates' => UpdateCoordinatesBulkAction::make('updateCoordinates'),
            'sendRecordsNotification' => SendRecordsNotificationBulkAction::make('sendRecordsNotification'),
        ];
    }

    private function populateAllCoordinates(): void
    {
        $batchSize = 50;
        $totalProcessed = 0;
        $totalSuccess = 0;
        $errors = [];

        Client::whereNull('latitude')
            ->orWhereNull('longitude')
            ->chunk($batchSize, function ($clients) use (&$totalProcessed, &$totalSuccess, &$errors) {
                /** @var \Illuminate\Database\Eloquent\Collection<int, Client> $clients */
                /** @var UpdateCoordinatesAction $action */
                $action = app(UpdateCoordinatesAction::class);
                // Client extends Model, so Collection<int, Client> is compatible with Collection<int, Model>
                /** @phpstan-ignore-next-line */
                $result = $action->execute($clients);

                if ($result === null) {
                    return;
                }

                $totalSuccess += (int) $result->successCount;
                $totalProcessed += (int) $result->totalProcessed;

                // Collect errors for notification
                $resultErrors = is_array($result->errors) ? $result->errors : [];
                foreach ($resultErrors as $error) {
<<<<<<< HEAD
                    if (! is_array($error)) {
=======
                    if (!is_array($error)) {
>>>>>>> 4b6b99016 (first commit)
                        continue;
                    }
                    $model = isset($error['model']) ? (string) $error['model'] : 'Unknown';
                    $errorMsg = isset($error['error']) ? (string) $error['error'] : 'Unknown error';
                    $errors[] = "Error updating {$model}: {$errorMsg}";
                }
            });

        $message = "Processed {$totalProcessed} clients. Successfully updated {$totalSuccess} coordinates.";

        if (! empty($errors)) {
            Notification::make()
                ->warning()
                ->title('Coordinate Update Completed with Errors')
                ->body($message."\n\n".implode("\n", array_slice($errors, 0, 5)))
                ->persistent()
                ->send();

            return;
        }

        Notification::make()
            ->success()
            ->title('Coordinates Updated Successfully')
            ->body($message)
            ->send();
    }

    // private function updateClientCoordinates($client): void
    // {
    //     // This method is now only used for single updates
    //    use Modules\Geo\Actions\GetAddressDataFromFullAddressAction;
    //         ->execute($client->full_address);
    //     if ($addressData) {
    //         $client->update($addressData->toArray());
    //     }
    // }
    /**
     * @return array<int|string, Action|ActionGroup>
     */
    /**
     * {@inheritDoc}
     *
     * @return array<string, Action|ActionGroup>
     */
    /**
     * {@inheritDoc}
     *
     * @return array<string, Action|ActionGroup>
     */
    public function getTableActions(): array
    {
        /** @var array<string, Action|ActionGroup> $actions */
        $actions = [
            ...parent::getTableActions(),
            Action::make('sortByDistance')
                ->icon('heroicon-o-map')
                ->action(function (Client $record) {
                    $latValue = $record->getAttribute('latitude');
                    $lngValue = $record->getAttribute('longitude');
                    $latitude = is_numeric($latValue) ? (float) $latValue : null;
                    $longitude = is_numeric($lngValue) ? (float) $lngValue : null;
                    if ($latitude === null || $longitude === null) {
                        Notification::make()
                            ->warning()
                            ->title('Attenzione')
                            ->body('Il cliente selezionato non ha coordinate valide')
                            ->send();

                        return;
                    }

                    Session::put('user_latitude', $latitude);
                    Session::put('user_longitude', $longitude);

                    // Aggiorna i cookie per persistenza
                    Cookie::queue('user_latitude', (string) $latitude, 60 * 24 * 30); // 30 giorni
                    Cookie::queue('user_longitude', (string) $longitude, 60 * 24 * 30);

                    // Aggiorna il widget delle coordinate
                    $this->dispatch('coordinates-updated');

                    // Applica l'ordinamento per distanza
                    $this->applySort('distance');

                    Notification::make()
                        ->success()
                        ->title('Coordinate aggiornate')
                        ->body('La tabella è stata ordinata in base alla distanza dal cliente selezionato')
                        ->send();
                })
                ->label('Ordina per distanza'),
        ];

        return $actions;
    }

    public function applySort(string $field): void
    {
        if ($field === 'distance') {
            $this->resetTable();
        }
    }

    #[On('sort-by-distance')]
    public function handleSortByDistance(): void
    {
        $this->applySort('distance');
    }

<<<<<<< HEAD
=======

>>>>>>> 4b6b99016 (first commit)
    protected function getTableQuery(): Builder
    {
        $query = parent::getTableQuery();
        if ($query === null) {
            throw new Exception('Query is null');
        }

        // Ensure we return a Builder, not a Relation
        if ($query instanceof Relation) {
            /** @var Builder */
            $query = $query->getQuery();
        }

        // Ensure we have a proper Builder instance
        if (! $query instanceof Builder) {
            throw new Exception('Query is not a Builder instance');
        }

        /** @var Builder $query */
        $latitude = Session::get('user_latitude');
        $longitude = Session::get('user_longitude');

        return $query->when($latitude && $longitude, function (Builder $q) use ($latitude, $longitude): Builder {
            /** @phpstan-ignore-next-line */
            $q->withDistance($latitude, $longitude)->orderByDistance($latitude, $longitude);

            return $q;
        });
    }
}
