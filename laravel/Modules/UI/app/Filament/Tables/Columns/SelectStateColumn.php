<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Tables\Columns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Tables\Columns\XotBaseSelectColumn;
<<<<<<< HEAD
=======
use ReflectionClass;
>>>>>>> laraxot/dev

class SelectStateColumn extends XotBaseSelectColumn
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->options(function (Model $record, mixed $state): array {
            $name = $this->getName();
<<<<<<< HEAD
            if (null === $state) {
=======
            if ($state === null) {
>>>>>>> laraxot/dev
                if (! method_exists($record, 'getDefaultStateFor')) {
                    return [];
                }
                $defaultStates = $record->getDefaultStateFor($name);
                $states = Arr::wrap($defaultStates);
                /** @var array<int|string, mixed> $states */
                $states = \is_array($states) ? $states : [];

                return $this->combineStateOptions($states);
            }

            $states = [];
            try {
                if (\is_object($state) && method_exists($state, 'transitionableStates')) {
                    $transitionableStates = $state->transitionableStates();
                    if (is_iterable($transitionableStates)) {
                        $states = \is_array($transitionableStates) ? $transitionableStates : iterator_to_array($transitionableStates);
                    }
                }
            } catch (\Exception) {
                if (! method_exists($record, 'getStatesFor')) {
                    return [];
                }
                $fetchedStates = $record->getStatesFor($name);
                $statesArray = \is_object($fetchedStates) && method_exists($fetchedStates, 'toArray')
                    ? $fetchedStates->toArray()
                    : [];
                $states = $statesArray;
            }

            /** @var array<int|string, mixed> $states */
            if (\is_object($state)) {
                $stateClass = $state::class;
                if (class_exists($stateClass)) {
                    $stateNameProperty = null;
                    try {
<<<<<<< HEAD
                        $reflection = new \ReflectionClass($stateClass);
=======
                        $reflection = new ReflectionClass($stateClass);
>>>>>>> laraxot/dev
                        if ($reflection->hasProperty('name')) {
                            $nameProperty = $reflection->getStaticPropertyValue('name');
                            $stateNameProperty = \is_string($nameProperty) ? $nameProperty : null;
                        }
                    } catch (\ReflectionException) {
                        // Intentionally ignored: fall back to $stateNameProperty === null below.
                    }
<<<<<<< HEAD
                    if (null !== $stateNameProperty) {
=======
                    if ($stateNameProperty !== null) {
>>>>>>> laraxot/dev
                        $statesValues = array_values($states);
                        /** @var list<int|string> $statesValuesTyped */
                        $statesValuesTyped = $statesValues;
                        $states = [$stateNameProperty, ...$statesValuesTyped];
                    }
                }
            }

            /** @var array<int|string, mixed> $states */
            $statesFiltered = array_filter($states, static function (mixed $item): bool {
                return \is_string($item) || \is_int($item);
            });

            return $this->combineStateOptions($statesFiltered);
        });

        $this->beforeStateUpdated(static function (Model $record, mixed $stateRaw): void {
            if (! \is_string($stateRaw)) {
                return;
            }

            $state = $stateRaw;
            $message = '';

            $recordState = $record->getAttribute('state');
            if (! \is_object($recordState)) {
                return;
            }

            if (! method_exists($recordState, 'transitionTo')) {
                return;
            }

            $recordState->transitionTo($state, $message);
        });
    }

    /**
<<<<<<< HEAD
     * @param array<int|string, mixed> $states
     *
=======
     * @param  array<int|string, mixed>  $states
>>>>>>> laraxot/dev
     * @return array<int|string, string>
     */
    private function combineStateOptions(array $states): array
    {
        $statesKeys = array_map(
            static fn (int|string $key): string => SafeStringCastAction::cast($key),
            array_keys($states),
        );
        $statesValues = array_map(
<<<<<<< HEAD
            SafeStringCastAction::cast(...),
=======
            static fn (mixed $value): string => SafeStringCastAction::cast($value),
>>>>>>> laraxot/dev
            array_values($states),
        );
        $combined = array_combine($statesKeys, $statesValues);

        return $combined ? $combined : [];
    }
}
