<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Expression;
use Webmozart\Assert\Assert;

trait GeographicalScopes
{
    /**
     * Scope per calcolare la distanza tra due punti.
     */
    public function scopeWithDistance(Builder $query, float $latitude, float $longitude): Builder
    {
        return $query->select('*', $this->getDistanceExpression($latitude, $longitude, 'distance'));
    }

    /**
     * Scope per ordinare i risultati per distanza.
     */
    public function scopeOrderByDistance(Builder $query, float $latitude, float $longitude): Builder
    {
        return $query->orderBy($this->getDistanceExpression($latitude, $longitude));
    }

    public function getDistanceExpression(
        float $latitude,
        float $longitude,
        ?string $alias = null,
    ): Expression|\Illuminate\Contracts\Database\Query\Expression {
        $sql = sprintf(
            '(6371 * acos(
                cos(radians(%F)) *
                cos(radians(latitude)) *
                cos(radians(longitude) - radians(%F)) +
                sin(radians(%F)) *
                sin(radians(latitude))
            ))',
            $latitude,
            $longitude,
            $latitude,
        );
        if ($alias !== null) {
            $sql .= sprintf(' AS %s', $alias);
        }

        Assert::string($sql);

        /** @var literal-string $literalSql */
        $literalSql = $sql;

        return new Expression($literalSql);

        // AS distance
    }
}
