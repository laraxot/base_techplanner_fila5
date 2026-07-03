<?php

declare(strict_types=1);

namespace Modules\UI\Livewire\Components\Map;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Webmozart\Assert\Assert;

/**
 * Componente Livewire per la mappa interattiva.
 *
 * Fornisce funzionalità per visualizzare marker geografici,
 * filtri dinamici e interazione con la mappa.
 */
final class InteractiveMap extends Component
{
    public array $center = [45.4642, 9.1900]; // Milano

    public int $zoom = 10;

    public array $markers = [];

    /** @var array<string, mixed> */
    public array $filters = [
        'tickets' => true,
        'users' => false,
        'locations' => false,
        'status' => [],
        'priority' => [],
        'type' => [],
        'roles' => [],
        'location_types' => [],
    ];

    public array $stats = [];

    public bool $showControls = true;

    public bool $isLoading = false;

    public string $searchQuery = '';

    /**
     * Untyped to match HandlesEvents::$listeners.
     *
     * @var array<string, string>
     */
    protected $listeners = [
        'markerSelected' => 'selectMarker',
        'filtersChanged' => 'updateFilters',
        'mapBoundsChanged' => 'updateBounds',
        'refreshMap' => 'loadMarkers',
    ];

    public function mount(?array $center = null, ?int $zoom = null, array $filters = []): void
    {
        if ($center) {
            $this->center = $center;
        }

        if ($zoom) {
            $this->zoom = $zoom;
        }

        if ($filters) {
            $this->filters = array_merge($this->filters, $filters);
        }

        $this->loadMarkers();
    }

    public function render(): View
    {
        /** @var view-string $viewName */
        $viewName = 'ui::livewire.components.map.interactive-map';

        return view($viewName);
    }

    /**
     * Seleziona un marker.
     */
    public function selectMarker(int $markerId): void
    {
        $marker = collect($this->markers)
            ->firstWhere('id', $markerId);

        $this->selectedMarker = \is_array($marker) ? $marker : null;

        $this->dispatch('markerSelected', $this->selectedMarker);
    }

    /**
     * Aggiorna i filtri.
     *
     * @param  array<string, mixed>  $filters
     * @param  array<string, mixed>  $filters
     */
    public function updateFilters(array $filters): void
    {
        $this->filters = array_merge($this->filters, $filters);
        $this->loadMarkers();
    }

    /**
     * Aggiorna i bounds della mappa.
     */
    public function updateBounds(array $bounds): void
    {
        $this->filters['bounds'] = $bounds;
        $this->loadMarkers();
    }

    /**
     * Carica i marker.
     */
    public function loadMarkers(): void
    {
        $this->isLoading = true;
    }

    /**
     * Resetta la vista della mappa.
     */
    public function resetView(): void
    {
        $this->dispatch('resetMapView');
    }

    /**
     * Esporta i dati della mappa.
     */
    public function exportData(string $format = 'json'): void {}

    /**
     * Cerca un indirizzo.
     */
    public function searchAddress(): void
    {
        if (empty($this->searchQuery)) {
            return;
        }

    }

    /**
     * Ottiene suggerimenti per la ricerca.
    }

    /**
     * Toggle controlli mappa.
     */
    public function toggleControls(): void
    {
        $this->showControls = ! $this->showControls;
    }

    /**
     * Filtra per tipo.
     */
    public function filterByType(string $type, bool $enabled): void
    {
        $this->filters[$type] = $enabled;
        $this->loadMarkers();
    }

    /**
     * Filtra per stato.
     */
    public function filterByStatus(string $status, bool $enabled): void
    {
        $currentStatus = $this->filters['status'] ?? [];
        Assert::isArray($currentStatus, 'Status filter must be array');
        $statusList = array_values(array_filter(
            $currentStatus,
            static fn (mixed $value): bool => \is_string($value),
        ));

        if ($enabled) {
            $statusList[] = $status;
            $this->filters['status'] = array_values(array_unique($statusList));
            $this->loadMarkers();

            return;
        }

        $statusList = array_values(array_diff($statusList, [$status]));
        $this->filters['status'] = array_values(array_unique($statusList));
        $this->loadMarkers();
    }

    /**
     * Filtra per priorità.
     */
    public function filterByPriority(string $priority, bool $enabled): void
    {
        $currentPriority = $this->filters['priority'] ?? [];
        Assert::isArray($currentPriority, 'Priority filter must be array');
        $priorityList = array_values(array_filter(
            $currentPriority,
            static fn (mixed $value): bool => \is_string($value),
        ));

        if ($enabled) {
            $priorityList[] = $priority;
            $this->filters['priority'] = array_values(array_unique($priorityList));
            $this->loadMarkers();

            return;
        }

        $priorityList = array_values(array_diff($priorityList, [$priority]));
        $this->filters['priority'] = array_values(array_unique($priorityList));
        $this->loadMarkers();
    }

    /**
     * Pulisce tutti i filtri.
     */
    public function clearFilters(): void
    {
        $this->filters = [
            'tickets' => true,
            'users' => false,
            'locations' => false,
            'status' => [],
            'priority' => [],
            'type' => [],
            'roles' => [],
            'location_types' => [],
        ];

        $this->loadMarkers();
    }

    /**
     * Ottiene le proprietà computate.
    }

    public function getVisibleMarkersCountProperty(): int
    {
        return \count($this->markers);
    }

    public function getFilteredMarkersCountProperty(): int
    {
        return \count($this->markers);
    }

    /**
     * Ottiene il MIME type per il formato di esportazione.
     */
    private function getMimeType(string $format): string
    {
        return match ($format) {
            'csv' => 'text/csv',
            'geojson' => 'application/geo+json',
            'kml' => 'application/vnd.google-earth.kml+xml',
            default => 'application/json',
        };
    }
}
