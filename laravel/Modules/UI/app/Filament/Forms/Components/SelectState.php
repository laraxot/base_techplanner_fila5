<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Forms\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Forms\Components\XotBaseSelect;
<<<<<<< HEAD
=======
use Spatie\ModelStates\HasStatesContract;
>>>>>>> 6ed19256f (.)

class SelectState extends XotBaseSelect
{
    protected function setUp(): void
    {
        parent::setUp();

<<<<<<< .merge_file_snGMr3
=======
        //  $this->selectablePlaceholder(false);
<<<<<<< HEAD
>>>>>>> .merge_file_sWVURG
        $this->options(function (?Model $record): array {
=======
        $this->options(function ((Model&HasStatesContract)|null $record): array {
>>>>>>> 6ed19256f (.)
            $name = $this->getName();
            if ($record === null) {
                $model = $this->getModel();
                if (\is_string($model) && class_exists($model)) {
                    $instance = app($model);
                    if (\is_object($instance)) {
                        $methodExists = method_exists($instance, 'getDefaultStateFor');
                        if ($methodExists) {
                            $statesRaw = $instance->getDefaultStateFor($name);
                            if (! \is_array($statesRaw)) {
                                $statesRaw = Arr::wrap($statesRaw);
                            }

                            /* @var array<int|string, mixed> $statesRaw */
                            return $this->combineStateOptions($statesRaw);
                        }
                    }
                }

                return [];
            }

<<<<<<< HEAD
            if (! method_exists($record, 'getStatesFor')) {
                return [];
            }

            $statesCollection = $record->getStatesFor($name);
            $statesRaw = \is_object($statesCollection) && method_exists($statesCollection, 'toArray')
                ? $statesCollection->toArray()
                : [];
=======
            // Record implements HasStatesContract which provides getStatesFor()
            $statesCollection = $record->getStatesFor($name);
            // getStatesFor() returns Collection which has toArray()
            $statesRaw = $statesCollection->toArray();
>>>>>>> 6ed19256f (.)
            /** @var array<int|string, mixed> $states */
            $states = $statesRaw;

            return $this->combineStateOptions($states);
        });
        $this->required();
    }

    /**
     * @param  array<int|string, mixed>  $states
     * @return array<int|string, string>
     */
    private function combineStateOptions(array $states): array
    {
        $statesKeys = array_map(
            static fn (int|string $key): string => SafeStringCastAction::cast($key),
            array_keys($states),
        );
        $statesValues = array_map(
            SafeStringCastAction::cast(...),
            array_values($states),
        );
        $combined = array_combine($statesKeys, $statesValues);

        return $combined ? $combined : [];
    }
}
