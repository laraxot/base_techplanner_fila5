<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;
use Modules\Xot\Filament\Widgets\XotBaseChartWidget;

<<<<<<< HEAD
final class UserTypeRegistrationsChartWidget extends XotBaseChartWidget
{
    /** @var class-string */
=======
class UserTypeRegistrationsChartWidget extends XotBaseChartWidget
{
>>>>>>> 6ed19256f (.)
    public string $model;

    protected ?string $heading = null;

    protected static ?int $sort = 1;

    protected static bool $isLazy = true;

    #[\Override]
<<<<<<< HEAD
    public function getHeading(): string
    {
        return self::transClass($this->model, 'widgets.user_type_registrations_chart.heading');
=======
    public function getHeading(): ?string
    {
        return static::transClass($this->model, 'widgets.user_type_registrations_chart.heading');
>>>>>>> 6ed19256f (.)
    }

    #[\Override]
    protected function getData(): array
    {
        // Debug: Verifica se i filtri sono disponibili
        $filters = $this->getFilters();

        // Accesso sicuro ai filtri della pagina con fallback appropriati
        $startDate = null;
        $endDate = null;

        // Verifica se i filtri sono disponibili e validi
        if (is_array($filters) && ! empty($filters)) {
<<<<<<< HEAD
            $startDate = self::parseFilterDate($filters['startDate'] ?? null);
            $endDate = self::parseFilterDate($filters['endDate'] ?? null);
=======
            /** @phpstan-ignore-next-line */
            $startDate = ! empty($filters['startDate']) ? Carbon::parse($filters['startDate']) : null;
            /** @phpstan-ignore-next-line */
            $endDate = ! empty($filters['endDate']) ? Carbon::parse($filters['endDate']) : null;
>>>>>>> 6ed19256f (.)
        }

        // Fallback ai valori di default se i filtri non sono disponibili
        if (null === $startDate) {
            $startDate = now()->subDays(30);
        }
        if (null === $endDate) {
            $endDate = now();
        }

        try {
            $data = Trend::model($this->model)
                ->between(
                    start: $startDate,
                    end: $endDate,
                )
                ->perDay()
                ->count();

            return [
                'datasets' => [
                    [
<<<<<<< HEAD
                        'label' => self::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
=======
                        'label' => static::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
>>>>>>> 6ed19256f (.)
                        'data' => $data->map(fn (mixed $value) => $value instanceof TrendValue
                            ? $value->aggregate
                            : 0),
                        'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                        'borderColor' => 'rgb(59, 130, 246)',
                        'borderWidth' => 2,
                        'tension' => 0.4,
                    ],
                ],
                'labels' => $data->map(fn (mixed $value) => $value instanceof TrendValue
                    ? \Carbon\Carbon::parse($value->date)->format('d/m')
                    : ''),
            ];
        } catch (\Exception $e) {
            // Fallback appropriato senza logging inutile
            return [
                'datasets' => [
                    [
<<<<<<< HEAD
                        'label' => self::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
=======
                        'label' => static::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
>>>>>>> 6ed19256f (.)
                        'data' => [],
                        'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                        'borderColor' => 'rgb(59, 130, 246)',
                        'borderWidth' => 2,
                        'tension' => 0.4,
                    ],
                ],
                'labels' => [],
            ];
        }
    }

    #[\Override]
    protected function getType(): string
    {
        return 'line';
    }
<<<<<<< HEAD

    private static function parseFilterDate(mixed $value): ?Carbon
    {
        if (! is_string($value) && ! is_int($value) && ! is_float($value)) {
            return null;
        }

        return Carbon::parse($value);
    }
=======
>>>>>>> 6ed19256f (.)
}
