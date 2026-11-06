<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Widgets;

use Filament\Schemas\Components\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
<<<<<<< .merge_file_eSoQBh
use Modules\TechPlanner\Models\Client;
=======
<<<<<<< HEAD
use Modules\TechPlanner\Filament\Resources\ClientResource;
>>>>>>> .merge_file_9SW3Kx
use Modules\Xot\Filament\Widgets\XotBaseWidget;
=======
use Livewire\Attributes\Reactive;
use Modules\TechPlanner\Filament\Resources\ClientResource;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Override;
>>>>>>> 6ed19256f (.)

class ClientMapWidget extends XotBaseWidget
{
    protected string $view = 'techplanner::filament.widgets.map';

    protected int|string|array $columnSpan = 'full';

    /**
<<<<<<< .merge_file_eSoQBh
     * @return array<int, Component>
=======
<<<<<<< HEAD
     * @return array<string, Component>
     */
=======
     * Get the form schema for the widget.
     *
     * @return array<string, Component>
>>>>>>> .merge_file_9SW3Kx
     */
    #[Override]
>>>>>>> 6ed19256f (.)
    public function getFormSchema(): array
    {
        return [];
    }

    /**
     * Ottiene i dati dei clienti per la mappa.
     *
     * @return array<string, mixed>
     */
    protected function getData(): array
    {
        return [
            'clients' => $this->getClientsQuery()
                ->whereNotNull('latitude')
                ->whereNotNull('longitude')
                ->limit(500) // Limit to prevent memory issues
                ->get(['latitude', 'longitude', 'name'])
                ->toArray(),
        ];
    }

    /**
     * Ottiene la query per i clienti.
     *
     * @return Builder<Client>
     */
    protected function getClientsQuery(): Builder
    {
        /** @var Builder<Client> $query */
        $query = Client::query();

        return $query;
    }

    public function render(): View
    {
        /** @var array<string, mixed> */
        $data = $this->getData();

        return view($this->view, $data);
    }
}
