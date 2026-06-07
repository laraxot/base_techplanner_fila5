<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Tables\Columns;

use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
<<<<<<< HEAD
use Spatie\ModelStates\HasStatesContract;
use Spatie\ModelStates\State;
=======
>>>>>>> dev

class SelectStateColumn extends SelectColumn
{
    protected function setUp(): void
    {
        parent::setUp();
        //  $this->selectablePlaceholder(false);
<<<<<<< HEAD
        $this->options(function (Model&HasStatesContract $record, mixed $state): array {
            $name = $this->getName();
            if (null === $state) {
                // Record implements HasStatesContract which provides getDefaultStateFor()
                $defaultStates = $record->getDefaultStateFor($name);
                $states = Arr::wrap($defaultStates);
                /** @var array<int|string, mixed> $states */
                $states = is_array($states) ? $states : [];
                $statesValues = array_map(fn ($v) => is_string($v) ? $v : (string) $v, array_values($states));
                $statesKeys = array_map(fn ($k) => is_string($k) ? $k : (string) $k, array_keys($states));
                $combined = array_combine($statesKeys, $statesValues);

                /* @var array<int|string, int|string> $result */
=======
        $this->options(function (Model $record, mixed $state): array {
            $name = $this->getName();
            if (null === $state) {
                // Record implements HasStatesContract which provides getDefaultStateFor()
                if (! method_exists($record, 'getDefaultStateFor')) {
                    return [];
                }
                $defaultStates = $record->getDefaultStateFor($name);
                $states = Arr::wrap($defaultStates);
                /** @var array<int|string, mixed> $states */
                $states = \is_array($states) ? $states : [];
                $statesValues = array_map(static fn ($v) => \is_string($v) ? $v : (string) $v, array_values($states));
                $statesKeys = array_map(static fn ($k) => \is_string($k) ? $k : (string) $k, array_keys($states));
                $combined = array_combine($statesKeys, $statesValues);

>>>>>>> dev
                return $combined ? $combined : [];
            }

            $states = [];
            try {
<<<<<<< HEAD
                if (is_object($state) && method_exists($state, 'transitionableStates')) {
                    $transitionableStates = $state->transitionableStates();
                    if (is_iterable($transitionableStates)) {
                        $states = is_array($transitionableStates) ? $transitionableStates : iterator_to_array($transitionableStates);
=======
                if (\is_object($state) && method_exists($state, 'transitionableStates')) {
                    $transitionableStates = $state->transitionableStates();
                    if (is_iterable($transitionableStates)) {
                        $states = \is_array($transitionableStates) ? $transitionableStates : iterator_to_array($transitionableStates);
>>>>>>> dev
                    }
                }
            } catch (\Exception $e) {
                // Record implements HasStatesContract which provides getStatesFor()
<<<<<<< HEAD
                $fetchedStates = $record->getStatesFor($name);
                $statesArray = $fetchedStates->toArray();
=======
                if (! method_exists($record, 'getStatesFor')) {
                    return [];
                }
                $fetchedStates = $record->getStatesFor($name);
                $statesArray = \is_object($fetchedStates) && method_exists($fetchedStates, 'toArray')
                    ? $fetchedStates->toArray()
                    : [];
>>>>>>> dev
                $states = $statesArray;
            }

            /** @var array<int|string, mixed> $states */
<<<<<<< HEAD
            if (is_object($state)) {
=======
            if (\is_object($state)) {
>>>>>>> dev
                $stateClass = $state::class;
                if (class_exists($stateClass)) {
                    $stateNameProperty = null;
                    // ✅ Usa Reflection invece di property_exists per maggiore affidabilità
                    try {
                        $reflection = new \ReflectionClass($stateClass);
                        if ($reflection->hasProperty('name')) {
                            $nameProperty = $reflection->getStaticPropertyValue('name');
<<<<<<< HEAD
                            $stateNameProperty = is_string($nameProperty) ? $nameProperty : null;
=======
                            $stateNameProperty = \is_string($nameProperty) ? $nameProperty : null;
>>>>>>> dev
                        }
                    } catch (\ReflectionException) {
                        // Property non esiste, $stateNameProperty rimane null
                    }
                    if (null !== $stateNameProperty) {
                        $statesValues = array_values($states);
                        /** @var list<int|string> $statesValuesTyped */
                        $statesValuesTyped = $statesValues;
                        $states = [$stateNameProperty, ...$statesValuesTyped];
                    }
                }
            }

            /** @var array<int|string, mixed> $states */
<<<<<<< HEAD
            $statesFiltered = array_filter($states, function (mixed $item): bool {
                return is_string($item) || is_int($item);
            });

            /** @var array<int|string> $statesKeys */
            $statesKeys = array_map(fn ($k) => is_string($k) ? $k : (string) $k, array_keys($statesFiltered));
            /** @var array<int|string> $statesValues */
            $statesValues = array_map(fn ($v) => is_string($v) ? $v : (string) $v, array_values($statesFiltered));
            $combined = array_combine($statesKeys, $statesValues);
            /** @var array<int|string, int|string> $combinedTyped */
            $combinedTyped = $combined ? $combined : [];

            /** @var array<int|string> $statesKeys */
            $statesKeys = array_map(fn ($k) => is_string($k) ? $k : (string) $k, array_keys($statesFiltered));
            /** @var array<int|string> $statesValues */
            $statesValues = array_map(fn ($v) => is_string($v) ? $v : (string) $v, array_values($statesFiltered));
=======
            $statesFiltered = array_filter($states, static function (mixed $item): bool {
                return \is_string($item) || \is_int($item);
            });

            /** @var array<int|string> $statesKeys */
            $statesKeys = array_map(static fn ($k) => \is_string($k) ? $k : (string) $k, array_keys($statesFiltered));
            /** @var array<int|string> $statesValues */
            $statesValues = array_map(static fn ($v) => \is_string($v) ? $v : (string) $v, array_values($statesFiltered));
            $combined = array_combine($statesKeys, $statesValues);
            /** @var array<int|string, int|string> $combinedTyped */
            $combinedTyped = $combined ?: [];

            /** @var array<int|string> $statesKeys */
            $statesKeys = array_map(static fn ($k) => \is_string($k) ? $k : (string) $k, array_keys($statesFiltered));
            /** @var array<int|string> $statesValues */
            $statesValues = array_map(static fn ($v) => \is_string($v) ? $v : (string) $v, array_values($statesFiltered));
>>>>>>> dev
            $combined = array_combine($statesKeys, $statesValues);

            /* @var array<int|string, int|string> $combinedTyped */
            return $combined ? $combined : [];
        });

<<<<<<< HEAD
        $this->beforeStateUpdated(function (Model&HasStatesContract $record, mixed $stateRaw): void {
            // Type narrowing per $state: deve essere State|string
            if (! is_string($stateRaw) && ! ($stateRaw instanceof State)) {
                return;
            }

            $state = is_string($stateRaw) ? $stateRaw : $stateRaw;
            $message = '';

            if (! isset($record->state) || ! is_object($record->state)) {
                return;
            }

<<<<<<< HEAD
            if (! $record->state instanceof State) {
=======
            if (! ($record->state instanceof State)) {
>>>>>>> 4b6b99016 (first commit)
                return;
            }

            /** @var State $stateObj */
            $stateObj = $record->state;
            $stateObj->transitionTo($state, $message);
=======
        $this->beforeStateUpdated(static function (Model $record, mixed $stateRaw): void {
            // Type narrowing per $state: deve essere State|string
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
>>>>>>> dev
        });
    }
}
