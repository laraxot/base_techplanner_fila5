<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

use Carbon\Carbon;
<<<<<<< HEAD
use Exception;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Override;
=======
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
>>>>>>> dev

class ModelTrendChartWidget extends XotBaseChartWidget
{
    public string $model;

    protected ?string $heading = null;

    protected static ?int $sort = 5;

    protected static bool $isLazy = true;

    protected ?string $pollingInterval = '300s'; // 5 minuti

<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> dev
    public function getHeading(): ?string
    {
        return static::transClass($this->model, 'widgets.model_trend_chart.heading');
    }

<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> dev
    protected function getData(): array
    {
        try {
            $data = Trend::model($this->model)
                ->between(
                    start: now()->subDays(30),
                    end: now(),
                )
                ->perDay()
                ->count();

            return [
                'datasets' => [
                    [
                        'label' => __('<nome modulo>::widgets.appointment_creation_chart.label'),
                        'data' => $data->map(fn (mixed $value) => $value instanceof TrendValue
                            ? $value->aggregate
                            : 0),
                        'backgroundColor' => 'rgba(139, 92, 246, 0.5)',
                        'borderColor' => 'rgb(139, 92, 246)',
                        'borderWidth' => 2,
                        'tension' => 0.4,
                    ],
                ],
                'labels' => $data->map(fn (mixed $value) => $value instanceof TrendValue
                    ? Carbon::parse($value->date)->format('d/m')
                    : ''),
            ];
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (\Exception $e) {
>>>>>>> dev
            // Fallback appropriato senza logging inutile
            return [
                'datasets' => [
                    [
                        'label' => __('<nome modulo>::widgets.appointment_creation_chart.label'),
                        'data' => [],
                        'backgroundColor' => 'rgba(139, 92, 246, 0.5)',
                        'borderColor' => 'rgb(139, 92, 246)',
                        'borderWidth' => 2,
                        'tension' => 0.4,
                    ],
                ],
                'labels' => [],
            ];
        }
    }

<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> dev
    protected function getType(): string
    {
        return 'line';
    }
}
