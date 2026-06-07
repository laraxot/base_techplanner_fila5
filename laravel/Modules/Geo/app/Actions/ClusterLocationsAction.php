<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Geo\Contracts\CalculateDistanceActionContract;
=======
>>>>>>> 4b6b99016 (first commit)
=======
use Modules\Geo\Contracts\CalculateDistanceActionContract;
>>>>>>> dev
use Modules\Geo\Datas\LocationData;
use Modules\Geo\Exceptions\InvalidLocationException;

readonly class ClusterLocationsAction
{
    public function __construct(
<<<<<<< HEAD
<<<<<<< HEAD
        private CalculateDistanceActionContract $distanceCalculator,
=======
        private CalculateDistanceAction $distanceCalculator,
>>>>>>> 4b6b99016 (first commit)
=======
        private CalculateDistanceActionContract $distanceCalculator,
>>>>>>> dev
    ) {
    }

    /**
     * Raggruppa le posizioni in cluster basati sulla distanza.
     *
     * @param array<LocationData> $locations   Lista delle posizioni da raggruppare
     * @param float               $maxDistance Distanza massima in km tra i punti di un cluster
     *
     * @throws InvalidLocationException Se i dati della posizione non sono validi
     *
     * @return array<array{center: LocationData, points: array<LocationData>}>
     */
    public function execute(array $locations, float $maxDistance = 1.0): array
    {
        $clusters = [];

        foreach ($locations as $location) {
<<<<<<< HEAD
<<<<<<< HEAD
            if (! $location instanceof LocationData) {
=======
            if (! ($location instanceof LocationData)) {
>>>>>>> 4b6b99016 (first commit)
=======
            if (! $location instanceof LocationData) {
>>>>>>> dev
                throw InvalidLocationException::invalidData();
            }

            $assigned = false;

            foreach ($clusters as &$cluster) {
                $distance = $this->distanceCalculator->execute($cluster['center'], $location);
                $distanceKm = ((float) $distance['distance']['value']) / 1000;

                if ($distanceKm <= $maxDistance) {
                    $cluster['points'][] = $location;
                    $this->updateClusterCenter($cluster);
                    $assigned = true;
                    break;
                }
            }

            if (! $assigned) {
                $clusters[] = [
                    'center' => $location,
                    'points' => [$location],
                ];
            }
        }

        return $clusters;
    }

    /**
     * Aggiorna il centro del cluster calcolando la media delle coordinate.
     *
     * @param array{center: LocationData, points: array<LocationData>} $cluster
     */
    private function updateClusterCenter(array &$cluster): void
    {
        $latSum = array_sum(array_map(fn (LocationData $point) => $point->latitude, $cluster['points']));

        $lonSum = array_sum(array_map(fn (LocationData $point) => $point->longitude, $cluster['points']));

        $count = count($cluster['points']);

        $cluster['center'] = new LocationData(
            latitude: $latSum / $count,
            longitude: $lonSum / $count,
        );
    }
}
