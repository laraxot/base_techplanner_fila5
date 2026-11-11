<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources\ClientResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\ImportAction;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Modules\Geo\Actions\UpdateCoordinatesFromAddressAction;
use Modules\TechPlanner\Filament\Imports\ClientImporter;
use Modules\TechPlanner\Filament\Resources\ClientResource;
use Modules\TechPlanner\Models\Client;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Override;

/**
 * @property ClientResource $resource
 */
class ListClients extends XotBaseListRecords
{
    protected static string $resource = ClientResource::class;

    public ?int $selectedClientId = null;

    /** @var Builder<Client>|null */
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

    #[Override]
    public function getHeaderActions(): array
    {
        /** @var array<string, Action> $actions */
        $actions = [
            ...parent::getHeaderActions(),
            ImportAction::make('importClient')->importer(ClientImporter::class)
                ->pluralModelLabel(__('techplanner::client.plural_label')),
            Action::make('populateCoordinates')
                ->icon('heroicon-o-globe-alt')
                ->action(function () {
                    $this->populateAllCoordinates();
                })
                ->requiresConfirmation()
                ->modalHeading(trans('techplanner::client.actions.populateCoordinates.modal.heading'))
                ->modalDescription(trans('techplanner::client.actions.populateCoordinates.modal.description'))
                ->modalSubmitActionLabel(trans('techplanner::client.actions.populateCoordinates.modal.submit_label')),
        ];

        return $actions;
    }

    private function populateAllCoordinates(): void
    {
        $batchSize = 50;
        $totalProcessed = 0;
        $totalSuccess = 0;
        $errors = [];

        Client::whereNull('latitude')
            ->orWhereNull('longitude')
            ->chunk($batchSize, function (Collection $clients) use (&$totalProcessed, &$totalSuccess, &$errors): void {
                /** @var Collection<int, Client> $clients */
                $action = app(UpdateCoordinatesFromAddressAction::class);

                foreach ($clients as $client) {
                    if (! $client instanceof Client) {
                        continue;
                    }

                    $totalProcessed++;

                    if ($action->execute($client)) {
                        $totalSuccess++;

                        continue;
                    }

                    foreach ($action->getErrors() as $error) {
                        if (! is_string($error)) {
                            continue;
                        }

                        $errors[] = 'Error updating client #'.$client->id.': '.$error;
                    }
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

    /*
     * Filtri, azioni di riga, azioni di gruppo e query con distanza stanno in ClientsTable
     * (la tabella della lista e' costruita da li'); qui restano le azioni di pagina.
     */
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
}
