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
use Override;
use Spatie\ModelStates\State;
=======
>>>>>>> dev

/**
 * Abstract base class for appointment state management.
 *
 * Defines the state machine configuration and required methods
 * that must be implemented by each concrete state class.
 *
<<<<<<< HEAD
 * @property string $name Il nome dello stato
 * @property string $value Il valore dello stato nel database
 */
abstract class XotBaseState extends State implements StateContract
=======
 * @property string $name  Il nome dello stato
 * @property string $value Il valore dello stato nel database
 */
abstract class XotBaseState implements StateContract
>>>>>>> dev
{
    use TransTrait;

    public static string $name;

    public static function getName(): string
    {
        /* @phpstan-ignore-next-line */
        return static::$name ?? Str::of(class_basename(static::class))->snake()->toString();
    }

<<<<<<< HEAD
    #[Override]
=======
>>>>>>> dev
    public function label(): string
    {
        return static::transClass(static::class, 'states.'.static::getName().'.label');

        // return 'Annullato';
    }

<<<<<<< HEAD
    #[Override]
=======
>>>>>>> dev
    public function color(): string
    {
        return static::transClass(static::class, 'states.'.static::getName().'.color');
    }

<<<<<<< HEAD
    #[Override]
=======
>>>>>>> dev
    public function bgColor(): string
    {
        return static::transClass(static::class, 'states.'.static::getName().'.bg_color');

        // return 'info';
    }

<<<<<<< HEAD
    #[Override]
=======
>>>>>>> dev
    public function icon(): string
    {
        return static::transClass(static::class, 'states.'.static::getName().'.icon');

        // return 'heroicon-o-x-circle';
    }

<<<<<<< HEAD
    #[Override]
=======
>>>>>>> dev
    public function modalHeading(): string
    {
        return static::transClass(static::class, 'states.'.static::getName().'.modal_heading');

        // return 'Annulla Appuntamento';
    }

<<<<<<< HEAD
    #[Override]
=======
>>>>>>> dev
    public function modalDescription(): string
    {
        // $appointment non utilizzata - rimossa

        return static::transClass(static::class, 'states.'.static::getName().'.modal_description');

        // return 'Sei sicuro di voler annullare questo appuntamento?';
    }

<<<<<<< HEAD
    #[Override]
=======
>>>>>>> dev
    public function modalFormSchema(): array
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
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
     *
>>>>>>> dev
     * @return array<string, mixed>
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
    #[Override]
=======
>>>>>>> dev
    public function modalFillFormByRecord(Model $record): array
    {
        return [];
    }

    /**
     * Execute modal action.
     *
<<<<<<< HEAD
     * @param  array<string, mixed>  $arguments
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
>>>>>>> dev
     */
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
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
>>>>>>> dev
     */
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
        $record = $this->getModel();
        /* @phpstan-ignore-next-line */
        $record->state->transitionTo($stateClass, $message);
=======
        // Fallback safe-mode when model-states package is not available.
        // Transition by generic arguments is intentionally a no-op.
>>>>>>> dev
    }

    /**
     * Execute modal action by record.
     *
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
     */
    #[Override]
=======
     * @param array<string, mixed> $data
     */
>>>>>>> dev
    public function modalActionByRecord(Model $record, array $data): void
    {
        $this->processStateActionByRecord($record, $data);
    }

    /**
     * Process state action by record.
     *
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $data
>>>>>>> dev
     */
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
        /* @phpstan-ignore-next-line */
        $record->state->transitionTo($stateClass, $message);
=======
        if (isset($record->state) && \is_object($record->state) && method_exists($record->state, 'transitionTo')) {
            $record->state->transitionTo($stateClass, $message);
        }
>>>>>>> dev
    }

    public function isMessageRequired(): bool
    {
        return false;
    }

    public static function getOptions(): array
    {
<<<<<<< HEAD
        $states = static::getStateMapping()->toArray();
=======
        if (! method_exists(static::class, 'getStateMapping')) {
            return [];
        }

        $mapping = static::getStateMapping();
        if (! \is_object($mapping) || ! method_exists($mapping, 'toArray')) {
            return [];
        }
        /** @var array<int|string, mixed> $states */
        $states = $mapping->toArray();
>>>>>>> dev

        $states = Arr::map($states, fn ($_stateClass, $state) => static::transClass(
            static::class,
            'states.'.(is_string($state) ? $state : (string) $state).'.label',
        ));

        return $states;
    }
}
