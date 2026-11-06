<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Geo\Actions\Distance\CalculateGeoDistanceAction;
use Modules\Xot\Actions\Cast\SafeFloatCastAction;
use Webmozart\Assert\Assert;

/**
 * Distanza e scope geografici per modelli con colonne `latitude` / `longitude`.
 *
 * Perché: un solo punto per Haversine su Address (e consumer futuri), senza
 * mutator JSON legacy che collidono con accessor già definiti sui modelli.
 * SQL letterale + binding (come Address::scopeNearby) per tipizzare literal-string.
 *
 * @property float|null $latitude
 * @property float|null $longitude
 *
 * @phpstan-require-extends Model
 */
trait GeoTrait
{
    public function distance(?float $lat = null, ?float $lng = null): ?float
    {
        $distance = app(CalculateGeoDistanceAction::class)->execute(
            SafeFloatCastAction::cast($this->latitude),
            SafeFloatCastAction::cast($this->longitude),
            $lat,
            $lng,
            '',
        );

        return $distance !== null ? SafeFloatCastAction::cast($distance) : null;
    }

    public function distanceCustomField(
        string $lat_field,
        string $lng_field,
        ?float $lat = null,
        ?float $lng = null,
        ?string $unit = '',
    ): ?float {
        Assert::regex($lat_field, '/^[A-Za-z_][A-Za-z0-9_]*$/');
        Assert::regex($lng_field, '/^[A-Za-z_][A-Za-z0-9_]*$/');

        $latFromField = SafeFloatCastAction::cast($this->{$lat_field});
        $lngFromField = SafeFloatCastAction::cast($this->{$lng_field});

        $distance = app(CalculateGeoDistanceAction::class)->execute(
            $latFromField,
            $lngFromField,
            $lat,
            $lng,
            $unit,
        );

        return $distance !== null ? SafeFloatCastAction::cast($distance) : null;
    }

    /**
<<<<<<< .merge_file_fnJVT0
     * Ordina per distanza Haversine da un punto (colonna distance in select).
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
=======
     * Get latitude attribute.
     */
    public function getLatitudeAttribute(mixed $value): ?float
    {
        if (is_float($value) || is_int($value)) {
            return (float) $value;
        }
        $address = $this->address;
        if (null === $address) {
            return null;
        }
<<<<<<< HEAD
        if (is_string($address) && \Illuminate\Support\Str::isJson($address)) {
=======
        if (is_string($address) && isJson($address)) {
>>>>>>> 6ed19256f (.)
            $geo = GeoData::from(json_decode($address, true, 512, JSON_THROW_ON_ERROR));
            $latlng = $geo->latlng;
            $lat = is_float($latlng['lat'] ?? null) || is_int($latlng['lat'] ?? null) ? (float) ($latlng['lat']) : null;
            $lng = is_float($latlng['lng'] ?? null) || is_int($latlng['lng'] ?? null) ? (float) ($latlng['lng']) : null;
            if (null !== $lat && null !== $lng) {
                $this->update([
                    'latitude' => $lat,
                    'longitude' => $lng,
                ]);
                $this->save();
            }

            return $lat;
        }
        // call to function is_object() with string will always evaluate to false
        // if (\is_object($address)) {
        //    dddx($address);
        // }
        // Call to function is_array() with string will always evaluate to false
        /*
         * if (\is_array($address)) {
         * $lat = $address['latlng']['lat'];
         * $lng = $address['latlng']['lng'];
         * $this->update([
         * 'latitude' => $lat,
         * 'longitude' => $lng,
         * ]);
         * $this->save();
         *
         * return $lat;
         * }
         */

        return null;
    }

    /**
     * Set address attribute with proper type handling.
>>>>>>> .merge_file_L13qii
     */
    public function scopeWithDistance(Builder $query, float $lat, float $lng): Builder
    {
<<<<<<< .merge_file_fnJVT0
        if (! is_finite($lat) || ! is_finite($lng) || abs($lat) > 90 || abs($lng) > 180) {
            return $query;
=======
        // *

<<<<<<< HEAD
        if (is_string($value) && \Illuminate\Support\Str::isJson((string) $value)) {
=======
        if (is_string($value) && isJson((string) $value)) {
>>>>>>> 6ed19256f (.)
            /*
             * @var array<string, mixed>
             */
            // $json = json_decode($value, true);
            // $json['latitude'] = $json['latlng']['lat'];
            // $json['longitude'] = $json['latlng']['lng'];

            $geo = GeoData::from(json_decode((string) $value, true, 512, JSON_THROW_ON_ERROR));
            $latlng = $geo->latlng;
            $lat = $latlng['lat'];
            $lng = $latlng['lng'];

            // unset($json['latlng'], $json['value']);
            // $this->attributes = array_merge($this->attributes, $json);
            $this->attributes['latitude'] = $lat;
            $this->attributes['longitude'] = $lng;
            if (! isset($this->attributes['full_address'])) {
                $this->attributes['full_address'] = ',,';
            }

            $fullAddress = (string) ($this->attributes['full_address'] ?? '');
            if (strlen($fullAddress) < 10) {
                $tmp = [];
                $tmp[] = $geo->route ?? '';
                $tmp[] = $geo->street_number ?? '';
                $tmp[] = $geo->postal_code ?? '';
                $tmp[] = $geo->administrative_area_level_3 ?? '';
                $tmp[] = $geo->administrative_area_level_2_short ?? '';
                $this->attributes['full_address'] = implode(', ', $tmp);
            }
        }

        if (\is_array($value)) {
            $value = json_encode($value, JSON_THROW_ON_ERROR);
>>>>>>> .merge_file_L13qii
        }

        return $query
            ->selectRaw(
                '*, (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) * 1.1515 AS distance',
                [$lat, $lng, $lat],
            )
            ->orderBy('distance');
    }

    /**
     * Filtra le righe il cui poligono JSON (`zone_polygon`) contiene il punto.
     *
     * L'SQL grezzo del progetto deve essere letterale (`literal-string`), quindi il nome della
     * colonna non si interpola: `zone_polygon` e' l'unica colonna supportata. Il parametro resta
     * per compatibilita' con i chiamanti; un'altra colonna e' un errore, non una query sbagliata.
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeOfInPolygon(Builder $query, string $polygon_field, float $lat, float $lng): Builder
    {
<<<<<<< .merge_file_fnJVT0
        Assert::same($polygon_field, 'zone_polygon', 'scopeOfInPolygon supporta solo la colonna zone_polygon.');

        return $query
            ->whereNotNull('zone_polygon')
            ->whereRaw(
                <<<'SQL'
                    ST_Contains(
                        ST_GeomFromText(
                            concat('POLYGON((',
                            REPLACE(
                            REPLACE(
                            REPLACE(
                            REPLACE(
                            replace(CONCAT(
                            replace(replace(JSON_extract(zone_polygon,'$'),']',''),'[',''),
                            ',',JSON_extract(zone_polygon,'$[0]'))
                            ,'"lat":','')
                            ,',"lng":',' ')
                            ,'{',' ')
                            ,', "lng":',' ')
                            ,'}','')
                            ,'))')
                        ), ST_GeomFromText(CONCAT('POINT(', ?, ' ', ?, ')'))
                    )
                    SQL,
                [$lat, $lng],
            );
=======
        if (null === $this->address) {
            return null;
        }
<<<<<<< HEAD
        if (is_string($this->address) && \Illuminate\Support\Str::isJson($this->address)) {
=======
        if (is_string($this->address) && isJson($this->address)) {
>>>>>>> 6ed19256f (.)
            /*
             * $addr = json_decode($this->address);
             * if (\is_object($addr)) {
             * $addr = get_object_vars($addr);
             * }
             *
             * extract($addr);
             */
            $geo = GeoData::from(json_decode((string) $this->address, true, 512, JSON_THROW_ON_ERROR));

            $value = str_ireplace(', Italia', '', $geo->value);
            // Call to function is_array() with string will always evaluate to false.
            // if (\is_array($value)) {
            //    $value = implode(' ', $value);
            // }
            if (isset($geo->street_number)) {
                $str = $geo->street_number.', ';
                $before = Str::before($geo->value, $str);
                $after = Str::after($geo->value, $str);

                return $before.$str.''.($geo->postal_code ?? '').', '.$after;
            }
            if (isset($geo->administrative_area_level_3)) {
                $str = ', '.$geo->administrative_area_level_3;
                $before = Str::before($geo->value, $str);
                $after = Str::after($geo->value, $str);

                return $before.', '.($geo->postal_code ?? '').''.$str.''.$after;
            }
        }
        // Call to function is_object() with string|null will always evaluate to false.
        /*
         * if (\is_object($this->address)) {
         * $address = collect($this->address)->except(['value', 'latlng']);
         * $up = false;
         * foreach ($address->all() as $k => $v) {
         * if ($this->$k !== $v) {
         * $up = true;
         * break;
         * }
         * }
         * if ($up) {
         * $this->update($address->all());
         * }
         *
         * $tmp = [];
         * $tmp[] = $address->get('route');
         * $tmp[] = $address->get('street_number');
         * $tmp[] = $address->get('postal_code');
         * $tmp[] = $address->get('administrative_area_level_3');
         * $tmp[] = $address->get('administrative_area_level_2_short');
         * $value = implode(', ', $tmp);
         *
         * return $value;
         * }
         */
        $tmp = [];
        $tmp[] = $this->route;
        $tmp[] = $this->street_number;
        $tmp[] = $this->postal_code;
        $tmp[] = $this->administrative_area_level_3;
        $tmp[] = $this->administrative_area_level_2_short;

        return implode(', ', $tmp);
>>>>>>> .merge_file_L13qii
    }
}
