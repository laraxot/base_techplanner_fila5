<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Tables\Columns;

use Exception;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\On;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Contracts\StateContract;
<<<<<<< .merge_file_J6tHPx
use Modules\Xot\Filament\Tables\Columns\XotBaseColumn;
=======
<<<<<<< HEAD
=======
use Spatie\ModelStates\HasStatesContract;
use Spatie\ModelStates\State;
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_aycKvw

/**
 * IconStateSplitColumn - Enhanced state transition column with compact grid layout.
 *
 * This column displays state transition icons in a compact grid layout with:
 * - Optimized space usage with responsive grid
 * - Enhanced tooltips and visual feedback
 * - Smooth animations and hover effects
 * - Proper error handling and notifications
 * - Mobile-friendly design
 */
final class IconStateSplitColumn extends XotBaseColumn
{
    protected string $view = 'ui::filament.tables.columns.icon-state-split';

    protected string $stateClass = '';

    protected string $modelClass = '';

    /**
     * Configure the state class and model class for this column.
     *
<<<<<<< .merge_file_J6tHPx
     * @param  string  $stateClass  The state machine class (e.g., AppointmentState::class)
     * @param  string  $modelClass  The model class (e.g., Appointment::class)
=======
     * @param string $stateClass The state machine class (e.g., AppointmentState::class)
     * @param string $modelClass The model class (e.g., Appointment::class)
<<<<<<< HEAD
     * @param string $stateClass The state machine class (e.g., AppointmentState::class)
     * @param string $modelClass The model class (e.g., Appointment::class)
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_aycKvw
     */
    public function stateClass(string $stateClass, string $modelClass): static
    {
        $this->stateClass = $stateClass;
        $this->modelClass = $modelClass;

        return $this;
    }

    /**
     * @return array<string, array{class: StateContract, icon: string, label: string, color: string, tooltip: string}>
     */
    public function getRecordStates(): array
    {
        $stateMapping = $this->getStateMapping();
        $record = $this->getRecord();
        $result = [];

        foreach ($stateMapping as $stateKey => $stateClassItem) {
            $stateInstance = $this->getStateInstance($stateClassItem, $record);

            if (! $stateInstance) {
                continue;
            }

            $labelString = SafeStringCastAction::cast($stateInstance->label());

            $result[$stateKey] = [
                'class' => $stateInstance,
                'icon' => SafeStringCastAction::cast($stateInstance->icon()),
                'label' => $labelString,
                'color' => SafeStringCastAction::cast($stateInstance->color()),
                'tooltip' => $labelString,
            ];
        }

        return $result;
    }

    public function canTransitionTo(int|string $recordId, string $stateClass): bool
    {
        try {
            $record = $this->getCachedRecord($recordId);

<<<<<<< HEAD
            $recordState = $record?->getAttribute('state');

            return \is_object($recordState) && method_exists($recordState, 'canTransitionTo')
                ? (bool) $recordState->canTransitionTo($stateClass)
=======
            return $record && isset($record->state) && $record->state instanceof State
                ? $record->state->canTransitionTo($stateClass)
>>>>>>> 6ed19256f (.)
                : false;
        } catch (Exception) {
            return false;
        }
    }

    /**
     * Metodo per testare le azioni.
     */
    public function prova(int|string $recordId): void
    {
        Notification::make()
            ->title(__('ui::actions.test_action.title'))
            ->body(__('ui::actions.test_action.body', ['id' => $recordId]))
            ->success()
            ->send();
    }

    /**
     * Restituisce le azioni per gli stati.
     *
     * @return array<string, Action>
     */
    public function getStateActions(): array
    {
        $actions = [];
        $actions['prova'] = $this->getProvaAction();

        $states = $this->getRecordStates();
        foreach ($states as $stateKey => $stateData) {
            $transitionAction = $this->getTransitionAction($stateKey, $stateData);

            if ($transitionAction) {
                $actions["transition_to_{$stateKey}"] = $transitionAction;
            }
        }

        return $actions;
    }

    /**
     * Listener per l'evento table-action.
     */
    #[On('table-action')]
    public function handleTableAction(string $action, int|string $recordId): void
    {
        if ($action === 'prova') {
            $this->prova($recordId);
        }
    }

    /**
     * Metodo per eseguire la transizione di stato.
     */
    public function transitionState(int|string $recordId, string $stateClass): void
    {
        try {
            $record = $this->getRecordForTransition($recordId);
            $state = $record->getAttribute('state');
<<<<<<< HEAD
            if (! \is_object($state) || ! method_exists($state, 'transitionTo')) {
<<<<<<< .merge_file_J6tHPx
                throw new Exception(__('ui::icon_state.messages.invalid_state_instance'));
=======
=======
            if (! ($state instanceof State)) {
>>>>>>> 6ed19256f (.)
                throw new \Exception(__('ui::icon_state.messages.invalid_state_instance'));
>>>>>>> .merge_file_aycKvw
            }
            $state->transitionTo($stateClass);

            $this->notifyTransitionSuccess();
        } catch (Exception $e) {
            $this->notifyTransitionError($e->getMessage());
        }
    }

    /**
     * @return array<string, string>
     */
    private function getStateMapping(): array
    {
        if (! class_exists($this->stateClass) || ! method_exists($this->stateClass, 'getStateMapping')) {
            return [];
        }

        $stateMapping = $this->stateClass::getStateMapping();

<<<<<<< HEAD
        if (\is_object($stateMapping) && method_exists($stateMapping, 'toArray')) {
            /** @var array<string, string> $statesArray */
            $statesArray = $stateMapping->toArray();

            return \is_array($statesArray) ? $statesArray : [];
=======
        if (is_object($stateMapping) && method_exists($stateMapping, 'toArray')) {
            /** @var array<string, string> $statesArray */
            $statesArray = $stateMapping->toArray();

            return is_array($statesArray) ? $statesArray : [];
>>>>>>> 6ed19256f (.)
        }

        return [];
    }

    /**
     * @param  array<array-key, mixed>|Model|null  $record
     */
    private function getStateInstance(string $stateClassItem, Model|array|null $record): ?StateContract
    {
        try {
<<<<<<< .merge_file_J6tHPx
            if (! class_exists($stateClassItem)) {
=======
<<<<<<< HEAD
            if (! \is_string($stateClassItem) || ! class_exists($stateClassItem)) {
=======
            if (! is_string($stateClassItem) || ! class_exists($stateClassItem)) {
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_aycKvw
                return null;
            }

            $stateInstance = new $stateClassItem($record);
<<<<<<< HEAD
            if (! $stateInstance instanceof StateContract) {
=======
            if (! ($stateInstance instanceof StateContract)) {
>>>>>>> 6ed19256f (.)
                return null;
            }

            return $stateInstance;
        } catch (Exception) {
            return null;
        }
    }

    private function getCachedRecord(int|string $recordId): ?Model
    {
        if (! class_exists($this->modelClass) || ! method_exists($this->modelClass, 'find')) {
            return null;
        }

        $record = $this->modelClass::find($recordId);

<<<<<<< HEAD
        return \is_object($record) && $record instanceof Model ? $record : null;
=======
        return is_object($record) && $record instanceof Model ? $record : null;
>>>>>>> 6ed19256f (.)
    }

    private function getProvaAction(): Action
    {
        $record = $this->getRecord();

        return Action::make('prova')
            ->icon('heroicon-m-plus')
            ->color('primary')
<<<<<<< HEAD
            ->action(static function () use ($record): void {
<<<<<<< .merge_file_J6tHPx
                $recordId = $record && isset($record->id) ? SafeStringCastAction::cast($record->id) : 'N/A';
=======
=======
            ->action(function () use ($record): void {
>>>>>>> 6ed19256f (.)
                $recordId = $record && isset($record->id) ? ((string) $record->id) : 'N/A';
>>>>>>> .merge_file_aycKvw
                Notification::make()
                    ->title(__('ui::actions.prova.title'))
                    ->body(__('ui::actions.prova.body', ['id' => $recordId]))
                    ->success()
                    ->send();
            });
    }

    /**
<<<<<<< .merge_file_J6tHPx
     * @param  array{class: StateContract, icon: string, label: string, color: string, tooltip: string}  $stateData
=======
     * @param array{class: StateContract, icon: string, label: string, color: string, tooltip: string} $stateData
<<<<<<< HEAD
     * @param array{class: StateContract, icon: string, label: string, color: string, tooltip: string} $stateData
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_aycKvw
     */
    private function getTransitionAction(string $stateKey, array $stateData): ?Action
    {
        $record = $this->getRecord();
<<<<<<< HEAD
        $recordIdRaw = \is_object($record) && isset($record->id) ? $record->id : null;

        if ($recordIdRaw === null || (! \is_int($recordIdRaw) && ! \is_string($recordIdRaw))) {
            return null;
        }

<<<<<<< .merge_file_J6tHPx
        $recordId = \is_int($recordIdRaw) ? $recordIdRaw : SafeStringCastAction::cast($recordIdRaw);
=======
        $recordId = \is_int($recordIdRaw) ? $recordIdRaw : (string) $recordIdRaw;
=======
        $recordIdRaw = is_object($record) && isset($record->id) ? $record->id : null;

        if (null === $recordIdRaw || (! is_int($recordIdRaw) && ! is_string($recordIdRaw))) {
            return null;
        }

        $recordId = is_int($recordIdRaw) ? $recordIdRaw : (string) $recordIdRaw;
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_aycKvw
        $stateClass = $stateData['class'];
        $stateClassName = $stateClass::class;

        if (! $this->canTransitionTo($recordId, $stateClassName)) {
            return null;
        }

        return Action::make("transition_to_{$stateKey}")
            ->icon($stateData['icon'])
            ->color($stateData['color'])
            ->action(function () use ($recordId, $stateClassName): void {
                $this->transitionState($recordId, $stateClassName);
            });
    }

<<<<<<< HEAD
=======
    /**
     * @return Model&HasStatesContract
     */
>>>>>>> 6ed19256f (.)
    private function getRecordForTransition(int|string $recordId): Model
    {
        if (! class_exists($this->modelClass) || ! method_exists($this->modelClass, 'find')) {
            throw new Exception('Model class not found or invalid');
        }

        $recordRaw = $this->modelClass::find($recordId);

<<<<<<< HEAD
        if (! \is_object($recordRaw) || ! ($recordRaw instanceof Model)) {
            throw new Exception(__('ui::icon_state.messages.record_not_found'));
        }

        $recordState = $recordRaw->getAttribute('state');
        if (! \is_object($recordState) || ! method_exists($recordState, 'transitionTo')) {
<<<<<<< .merge_file_J6tHPx
            throw new Exception(__('ui::icon_state.messages.invalid_state_instance'));
=======
=======
        if (! is_object($recordRaw) || ! ($recordRaw instanceof HasStatesContract) || ! ($recordRaw instanceof Model)) {
            throw new \Exception(__('ui::icon_state.messages.record_not_found'));
        }

        if (! isset($recordRaw->state) || ! ($recordRaw->state instanceof State)) {
>>>>>>> 6ed19256f (.)
            throw new \Exception(__('ui::icon_state.messages.invalid_state_instance'));
>>>>>>> .merge_file_aycKvw
        }

        return $recordRaw;
    }

    private function notifyTransitionSuccess(): void
    {
        Notification::make()
            ->title(__('ui::icon_state.messages.transition_completed.title'))
            ->body(__('ui::icon_state.messages.transition_completed.body'))
            ->success()
            ->send();
    }

    private function notifyTransitionError(string $message): void
    {
        Notification::make()
            ->title(__('ui::icon_state.messages.transition_error.title'))
            ->body($message)
            ->danger()
            ->send();
    }
}
