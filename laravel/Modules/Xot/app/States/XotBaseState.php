<?php

declare(strict_types=1);

namespace Modules\Xot\States;

use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Xot\Contracts\StateContract;
use Modules\Xot\Filament\Traits\TransTrait;
<<<<<<< HEAD
* @property string $name Il nome dello stato
 * @property string $value Il valore dello stato nel database
 */
abstract class XotBaseState implements StateContract
{
=======
use Spatie\ModelStates\State;{
>>>>>>> 8215f950 (.)
    use TransTrait;

    public static string $name;

    public static function getName(): string
    {
<<<<<<< HEAD
return static::$name ?? Str::of(class_basename(static::class))->snake()->toString();
    }
    public function label(): string
=======
        /* @phpstan-ignore-next-line */
        return static::$name ?? Str::of(class_basename(static::class))->snake()->toString();
    }

    #[\Override]    public function label(): string
>>>>>>> 8215f950 (.)
    {
        return static::transClass(static::class, 'states.'.static::getName().'.label');

        // return 'Annullato';
    }

<<<<<<< HEAD

    public function bgColor(): string
=======
    #[\Override]    public function bgColor(): string
>>>>>>> 8215f950 (.)
    {
        return static::transClass(static::class, 'states.'.static::getName().'.bg_color');

        // return 'info';
    }

<<<<<<< HEAD

    public function modalHeading(): string
=======
    #[\Override]    public function modalHeading(): string
>>>>>>> 8215f950 (.)
    {
        return static::transClass(static::class, 'states.'.static::getName().'.modal_heading');

        // return 'Annulla Appuntamento';
    }

<<<<<<< HEAD

    public function modalFormSchema(): array
=======
    #[\Override]    public function modalFormSchema(): array
>>>>>>> 8215f950 (.)
    {
        return [
            'message' => Textarea::make('message')->required()->maxLength(255),
        ];
    }

    /**
     * Fill form data for modal.
     *
<<<<<<< HEAD
* @param  array<string, mixed>  $arguments
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
     *     * @return array<string, mixed>
>>>>>>> 8215f950 (.)
     */
    public function modalFillForm(array $arguments, array $data): array
    {
        return $data;
    }

    /**
     * Fill form data for modal by record.
     *
     * @return array<string, mixed>
     */
<<<<<<< HEAD
* @param  array<string, mixed>  $arguments
     * @param  array<string, mixed>  $data
     */
=======
    #[\Override]     */
>>>>>>> 8215f950 (.)
    public function modalAction(array $arguments, array $data): void
    {
        $this->processStateAction($arguments, $data);
    }

    /**
     * Process state action.
     *
<<<<<<< HEAD
* @param  array<string, mixed>  $arguments
     * @param  array<string, mixed>  $data
     */
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data     */
>>>>>>> 8215f950 (.)
    public function processStateAction(array $arguments, array $data): void
    {
        $message = Arr::get($data, 'message');
        $stateClass = static::class;
        /*
         *
         * $appointmentId = $arguments['appointment'];
         * $appointment = Appointment::firstWhere('id',$appointmentId);
         *
         * $appointment?->state->transitionTo($stateClass,$message);
         */
<<<<<<< HEAD
// Fallback safe-mode when model-states package is not available.
        // Transition by generic arguments is intentionally a no-op.
    }
=======
        $record = $this->getModel();
        /* @phpstan-ignore-next-line */
        $record->state->transitionTo($stateClass, $message);    }
>>>>>>> 8215f950 (.)

    /**
     * Execute modal action by record.
     *
<<<<<<< HEAD
* @param  array<string, mixed>  $data
     */
    public function modalActionByRecord(Model $record, array $data): void
=======
     * @param array<string, mixed> $data
     */
    #[\Override]    public function modalActionByRecord(Model $record, array $data): void
>>>>>>> 8215f950 (.)
    {
        $this->processStateActionByRecord($record, $data);
    }

    /**
     * Process state action by record.
     *
<<<<<<< HEAD
* @param  array<string, mixed>  $data
     */
=======
     * @param array<string, mixed> $data     */
>>>>>>> 8215f950 (.)
    public function processStateActionByRecord(Model $record, array $data): void
    {
        $message = Arr::get($data, 'message');
        $stateClass = static::class;
        /*
         *
         * $appointmentId = $arguments['appointment'];
         * $appointment = Appointment::firstWhere('id',$appointmentId);
         *
         * $appointment?->state->transitionTo($stateClass,$message);
         */
<<<<<<< HEAD
if (isset($record->state) && \is_object($record->state) && method_exists($record->state, 'transitionTo')) {
            $record->state->transitionTo($stateClass, $message);
        }
    }
=======
        /* @phpstan-ignore-next-line */
        $record->state->transitionTo($stateClass, $message);    }
>>>>>>> 8215f950 (.)

    public function isMessageRequired(): bool
    {
        return false;
    }

    public static function getOptions(): array
    {
<<<<<<< HEAD
if (! method_exists(static::class, 'getStateMapping')) {
            return [];
        }

        $mapping = static::getStateMapping();
        if (! \is_object($mapping) || ! method_exists($mapping, 'toArray')) {
            return [];
        }
        /** @var array<int|string, mixed> $states */
        $states = $mapping->toArray();

=======
        $states = static::getStateMapping()->toArray();
>>>>>>> 8215f950 (.)
        $states = Arr::map($states, fn ($_stateClass, $state) => static::transClass(
            static::class,
            'states.'.(is_string($state) ? $state : (string) $state).'.label',
        ));

        return $states;
    }
}
