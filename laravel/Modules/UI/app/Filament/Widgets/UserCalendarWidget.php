<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Widgets;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Illuminate\Support\Str;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

class UserCalendarWidget extends XotBaseSchemaWidget
{
    public string $type;

=======
use Modules\Xot\Filament\Widgets\XotBaseWidget;

class UserCalendarWidget extends XotBaseWidget
{
    public string $type;
>>>>>>> 6ed19256f (.)
    protected string $view = 'ui::filament.widgets.user-calendar';

    public function getActionName(string $function): string
    {
<<<<<<< HEAD
        $actionSuffix = Str::of($function)->studly()->append('Action')->toString();
=======
        $action_suffix = Str::of($function)->studly()->append('Action')->toString();
>>>>>>> 6ed19256f (.)
        $resource = XotData::make()->getUserResourceClassByType($this->type);
        $model = $resource::getModel();
        $modelString = \is_string($model) ? $model : (string) $model;

        return Str::of($modelString)
            ->replace('\Models\\', '\\Actions\\')
<<<<<<< HEAD
            ->append('\\Calendar\\'.$actionSuffix)
=======
            ->append('\\Calendar\\'.$action_suffix)
>>>>>>> 6ed19256f (.)
            ->toString();
    }

    /**
     * @param array<string, mixed> $fetchInfo
<<<<<<< HEAD
     * @param array<string, mixed> $fetchInfo
=======
>>>>>>> 6ed19256f (.)
     *
     * @return array<int, array<string, mixed>>
     */
    public function fetchEvents(array $fetchInfo): array
    {
        $action = $this->getActionName(__FUNCTION__);

        if (! class_exists($action)) {
            return [];
        }

        $actionInstance = app($action);
        if (! \is_object($actionInstance) || ! method_exists($actionInstance, 'execute')) {
            return [];
        }

<<<<<<< HEAD
        return self::normalizeEventsArray($actionInstance->execute($fetchInfo));
=======
        $resultRaw = $actionInstance->execute($fetchInfo);

        if (! self::isValidEventsArray($resultRaw)) {
            return [];
        }

        /** @var array<int, array<string, mixed>> $result */
        $result = $resultRaw;

        return $result;
>>>>>>> 6ed19256f (.)
    }

    /**
     * @return array<int, TextInput|Grid>
     */
    public function getFormSchema(): array
    {
        $action = $this->getActionName(__FUNCTION__);

        if (class_exists($action)) {
            $actionInstance = app($action);
            if (\is_object($actionInstance) && method_exists($actionInstance, 'execute')) {
<<<<<<< HEAD
                return self::normalizeFormSchema($actionInstance->execute());
=======
                $resultRaw = $actionInstance->execute();
                if (self::isValidFormSchema($resultRaw)) {
                    /** @var array<int, TextInput|Grid> $result */
                    $result = $resultRaw;

                    return $result;
                }
>>>>>>> 6ed19256f (.)
            }
        }

        // Fallback schema
        return [
            TextInput::make('title'),
            Grid::make()
                ->schema([
                    DateTimePicker::make('starts_at'),
                    DateTimePicker::make('ends_at'),
                ]),
        ];
    }

    /**
     * @SuppressWarnings("PHPMD.UnusedFormalParameter")
     */
    public function onDateSelect(string $start, ?string $end, bool $allDay, ?array $view, ?array $resource): void
    {
        // TODO: Implementare la logica per la selezione della data
    }

    /**
<<<<<<< HEAD
     * Normalize dynamic calendar action output into typed event arrays.
     *
     * @return array<int, array<string, mixed>>
     */
    private static function normalizeEventsArray(mixed $value): array
    {
        if (! \is_array($value)) {
            return [];
        }

        /** @var array<int, array<string, mixed>> $events */
        $events = [];
        foreach ($value as $event) {
            if (! \is_array($event)) {
                continue;
            }

            $normalizedEvent = [];
            foreach ($event as $key => $eventValue) {
                if (! \is_string($key)) {
                    continue 2;
                }

                $normalizedEvent[$key] = $eventValue;
            }

            $events[] = $normalizedEvent;
        }

        return $events;
    }

    /**
     * @phpstan-return array<int, TextInput|Grid>
     */
    private static function normalizeFormSchema(mixed $value): array
    {
        if (! \is_array($value)) {
            return [];
        }

        $schema = [];
        foreach ($value as $key => $item) {
            if (! \is_int($key)) {
                return [];
            }

            if (! ($item instanceof TextInput) && ! ($item instanceof Grid)) {
                return [];
            }

            $schema[] = $item;
        }

        return $schema;
=======
     * Validate that the given value is an array of events with string keys.
     */
    private static function isValidEventsArray(mixed $value): bool
    {
        if (! \is_array($value)) {
            return false;
        }

        foreach ($value as $event) {
            if (! \is_array($event)) {
                return false;
            }

            foreach (array_keys($event) as $key) {
                if (! \is_string($key)) {
                    return false;
                }
            }
        }

        return true;
    }

    private static function isValidFormSchema(mixed $value): bool
    {
        if (! \is_array($value)) {
            return false;
        }

        foreach ($value as $key => $item) {
            if (! \is_int($key)) {
                return false;
            }

            if (! ($item instanceof TextInput) && ! ($item instanceof Grid)) {
                return false;
            }
        }

        return true;
>>>>>>> 6ed19256f (.)
    }
}
