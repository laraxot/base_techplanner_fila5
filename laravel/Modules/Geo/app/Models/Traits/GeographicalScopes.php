<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
=======
use Illuminate\Database\Query\Expression;
>>>>>>> 6ed19256f (.)

trait GeographicalScopes
{
    /**
     * Scope per calcolare la distanza tra due punti.
     */
    public function scopeWithDistance(Builder $query, float $latitude, float $longitude): Builder
    {
<<<<<<< HEAD
        return $query->select('*')->selectRaw(
            $this->getDistanceSql(withAlias: true),
            [$latitude, $longitude, $latitude],
        );
=======
        return $query->select('*', $this->getDistanceExpression($latitude, $longitude, 'distance'));
>>>>>>> 6ed19256f (.)
    }

    /**
     * Scope per ordinare i risultati per distanza.
     */
    public function scopeOrderByDistance(Builder $query, float $latitude, float $longitude): Builder
    {
<<<<<<< HEAD
        return $query->orderByRaw(
            $this->getDistanceSql(),
            [$latitude, $longitude, $latitude],
        );
    }

    private function getDistanceSql(bool $withAlias = false): string
    {
        $sql = '
            (6371 * acos(
                cos(radians(?)) *
                cos(radians(latitude)) *
                cos(radians(longitude) - radians(?)) +
                sin(radians(?)) *
                sin(radians(latitude))
            ))
        ';

        return $withAlias ? $sql.' AS distance' : $sql;
=======
        return $query->orderBy($this->getDistanceExpression($latitude, $longitude));
    }

    public function getDistanceExpression(
        float $latitude,
        float $longitude,
        ?string $alias = null,
    ): Expression|\Illuminate\Contracts\Database\Query\Expression {
        $sql = "
            (6371 * acos(
                cos(radians({$latitude})) *
                cos(radians(latitude)) *
                cos(radians(longitude) - radians({$longitude})) +
                sin(radians({$latitude})) *
                sin(radians(latitude))
            ))
        ";
        if (null !== $alias) {
            $sql .= " AS {$alias}";
        }

        return new Expression($sql);

        // AS distance
>>>>>>> 6ed19256f (.)
    }
}
