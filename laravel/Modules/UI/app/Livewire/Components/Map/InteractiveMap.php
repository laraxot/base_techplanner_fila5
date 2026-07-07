<?php

declare(strict_types=1);

namespace Modules\UI\Livewire\Components\Map;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\Geo\Services\GeocodingService;
use Modules\Geo\Services\MapService;
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

<<<<<<< HEAD
    /** @var array<string, mixed> */
=======
>>>>>>> 6ed19256f (.)
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

    public ?array $selectedMarker = null;

    public array $stats = [];

    public bool $showControls = true;

    public bool $isLoading = false;

    public string $searchQuery = '';

<<<<<<< HEAD
    /**
     * Untyped to match HandlesEvents::$listeners.
     *
     * @var array<string, string>
     */
=======
    /** @var array<string, string> */
>>>>>>> 6ed19256f (.)
    protected $listeners = [
        'markerSelected' => 'selectMarker',
        'filtersChanged' => 'updateFilters',
        'mapBoundsChanged' => 'updateBounds',
        'refreshMap' => 'loadMarkers',
    ];

<<<<<<< HEAD
    /**
     * @param array<string, mixed> $filters
     * @param array<string, mixed> $filters
     */
=======
>>>>>>> 6ed19256f (.)
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

<<<<<<< HEAD
        $this->selectedMarker = \is_array($marker) ? $marker : null;
=======
        $this->selectedMarker = is_array($marker) ? $marker : null;
>>>>>>> 6ed19256f (.)

        $this->dispatch('markerSelected', $this->selectedMarker);
    }

    /**
     * Aggiorna i filtri.
<<<<<<< HEAD
     *
     * @param array<string, mixed> $filters
     * @param array<string, mixed> $filters
=======
>>>>>>> 6ed19256f (.)
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

        try {
<<<<<<< HEAD
            $mapService = app(MapService::class);
            $filters = $this->getMapFilters();
            $this->markers = $mapService->getMarkers($filters);
            $this->stats = $mapService->getMapStats($filters);
=======
            /** @phpstan-ignore-next-line class.notFound */
            $mapService = app(MapService::class);
            /* @phpstan-ignore-next-line class.notFound, assign.propertyType */
            $this->markers = $mapService->getMarkers($this->filters);
            /* @phpstan-ignore-next-line class.notFound, assign.propertyType */
            $this->stats = $mapService->getMapStats($this->filters);
>>>>>>> 6ed19256f (.)
        } catch (\Exception $e) {
            $this->addError('map', 'Errore nel caricamento dei marker: '.$e->getMessage());
            $this->markers = [];
            $this->stats = [];
        } finally {
            $this->isLoading = false;
        }
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
    public function exportData(string $format = 'json'): void
    {
        try {
<<<<<<< HEAD
            $mapService = app(MapService::class);
            $data = $mapService->exportData($this->getMapFilters(), $format);
=======
            /** @phpstan-ignore-next-line class.notFound */
            $mapService = app(MapService::class);
            /** @phpstan-ignore-next-line class.notFound */
            $data = $mapService->exportData($this->filters, $format);
>>>>>>> 6ed19256f (.)

            $filename = 'map_export_'.now()->format('Y_m_d_H_i_s').'.'.$format;

            $this->dispatch('downloadFile', [
                'content' => $data,
                'filename' => $filename,
                'mimeType' => $this->getMimeType($format),
            ]);

            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Dati esportati con successo!',
            ]);
        } catch (\Exception $e) {
            $this->addError('export', 'Errore nell\'esportazione: '.$e->getMessage());
        }
    }

    /**
     * Cerca un indirizzo.
     */
    public function searchAddress(): void
    {
        if (empty($this->searchQuery)) {
            return;
        }

        try {
<<<<<<< HEAD
            $geocodingService = app(GeocodingService::class);
=======
            /** @phpstan-ignore-next-line class.notFound */
            $geocodingService = app(GeocodingService::class);
            /** @phpstan-ignore-next-line class.notFound */
>>>>>>> 6ed19256f (.)
            $result = $geocodingService->geocodeAddress($this->searchQuery);
            Assert::isArray($result, 'Geocoding result must be array');

            $address = $result['address'] ?? '';
            Assert::string($address, 'Address must be string');

            $this->center = [$result['latitude'], $result['longitude']];
            $this->zoom = 15;

            $this->dispatch('updateMapCenter', $this->center, $this->zoom);

            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Indirizzo trovato: '.$address,
            ]);
        } catch (\Exception $e) {
            $this->addError('search', 'Indirizzo non trovato: '.$e->getMessage());
        }
    }

    /**
     * Ottiene suggerimenti per la ricerca.
     */
    public function getSuggestions(): array
    {
<<<<<<< HEAD
        if (\strlen($this->searchQuery) < 3) {
=======
        if (strlen($this->searchQuery) < 3) {
>>>>>>> 6ed19256f (.)
            return [];
        }

        try {
<<<<<<< HEAD
            $geocodingService = app(GeocodingService::class);

            /** @var array<int, array<string, mixed>> $suggestions */
            $suggestions = $geocodingService->getSuggestions($this->searchQuery);

            return $suggestions;
=======
            /** @phpstan-ignore-next-line class.notFound */
            $geocodingService = app(GeocodingService::class);

            /* @phpstan-ignore-next-line class.notFound, return.type */
            return $geocodingService->getSuggestions($this->searchQuery);
>>>>>>> 6ed19256f (.)
        } catch (\Exception $e) {
            return [];
        }
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
<<<<<<< HEAD
        $statusList = array_values(array_filter(
            $currentStatus,
            static fn (mixed $value): bool => \is_string($value),
        ));

        if ($enabled) {
            $statusList[] = $status;
            $this->filters['status'] = array_values(array_unique($statusList));
=======

        if ($enabled) {
            $currentStatus[] = $status;
            $this->filters['status'] = array_unique($currentStatus);
>>>>>>> 6ed19256f (.)
            $this->loadMarkers();

            return;
        }

<<<<<<< HEAD
        $statusList = array_values(array_diff($statusList, [$status]));
        $this->filters['status'] = array_values(array_unique($statusList));
=======
        $currentStatus = array_diff($currentStatus, [$status]);
        $this->filters['status'] = array_unique($currentStatus);
>>>>>>> 6ed19256f (.)
        $this->loadMarkers();
    }

    /**
     * Filtra per priorità.
     */
    public function filterByPriority(string $priority, bool $enabled): void
    {
        $currentPriority = $this->filters['priority'] ?? [];
        Assert::isArray($currentPriority, 'Priority filter must be array');
<<<<<<< HEAD
        $priorityList = array_values(array_filter(
            $currentPriority,
            static fn (mixed $value): bool => \is_string($value),
        ));

        if ($enabled) {
            $priorityList[] = $priority;
            $this->filters['priority'] = array_values(array_unique($priorityList));
=======

        if ($enabled) {
            $currentPriority[] = $priority;
            $this->filters['priority'] = array_unique($currentPriority);
>>>>>>> 6ed19256f (.)
            $this->loadMarkers();

            return;
        }

<<<<<<< HEAD
        $priorityList = array_values(array_diff($priorityList, [$priority]));
        $this->filters['priority'] = array_values(array_unique($priorityList));
=======
        $currentPriority = array_diff($currentPriority, [$priority]);
        $this->filters['priority'] = array_unique($currentPriority);
>>>>>>> 6ed19256f (.)
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
     */
    public function getMarkersByTypeProperty(): array
    {
        return collect($this->markers)
            ->groupBy('type')
<<<<<<< HEAD
            ->map(static fn ($markers) => $markers->count())
=======
            ->map(fn ($markers) => $markers->count())
>>>>>>> 6ed19256f (.)
            ->toArray();
    }

    public function getVisibleMarkersCountProperty(): int
    {
<<<<<<< HEAD
        return \count($this->markers);
=======
        return count($this->markers);
>>>>>>> 6ed19256f (.)
    }

    public function getFilteredMarkersCountProperty(): int
    {
<<<<<<< HEAD
        return \count($this->markers);
=======
        return count($this->markers);
>>>>>>> 6ed19256f (.)
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
<<<<<<< HEAD

    /**
     * @return array<string, mixed>
     */
    private function getMapFilters(): array
    {
        $filters = [];

        foreach ($this->filters as $key => $value) {
            if (! \is_string($key)) {
                continue;
            }

            $filters[$key] = $value;
        }

        return $filters;
    }
=======
>>>>>>> 6ed19256f (.)
}
