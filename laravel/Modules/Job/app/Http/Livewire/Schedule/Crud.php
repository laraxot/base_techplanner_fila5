<?php

declare(strict_types=1);

namespace Modules\Job\Http\Livewire\Schedule;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;
use Modules\Job\Actions\ExecuteTaskAction;
use Modules\Job\Models\Task;
use Modules\Xot\Actions\GetViewAction;
use Symfony\Component\Console\Command\Command;
use Webmozart\Assert\Assert;

/**
 * Class Schedule\Crud.
 */
class Crud extends Component
{
    public bool $create = false;

    /**
     * Return available frequencies.
     */
    public static function getFrequencies(): array
    {
        $res = config('totem.frequencies');
        if (is_array($res)) {
            return $res;
        }

<<<<<<< HEAD
        throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
=======
        throw new Exception('[' . __LINE__ . '][' . class_basename(self::class) . ']');
>>>>>>> 6ed19256f (.)
    }

    public function render(): Renderable
    {
        $view = app(GetViewAction::class)->execute();
        $tasks = Task::paginate(20);
        $view_params = [
            'tasks' => $tasks,
            /*
             * 'task' => new Task(),
             * 'commands' => $this->getCommands(),
             * 'timezones' => timezone_identifiers_list(),
             * 'frequencies' => $this->getFrequencies(),
             */
        ];

        return view($view, $view_params);
    }

    public function taskCreate(): void
    {
        $this->dispatch('modal.open', 'modal.schedule.create');
    }

    /**
     * Return collection of Artisan commands filtered if needed.
     */
    public function getCommands(): Collection
    {
        config('totem.artisan.command_filter');
        config('totem.artisan.whitelist', true);
        /** @var Collection<string, Command> $all_commands */
        $all_commands = collect(Artisan::all());

        /*
         * if (! empty($command_filter)) {
         * // $all_commands = $all_commands->filter(function (Command $command) use ($command_filter, $whitelist) {
         * $all_commands = $all_commands->filter(
         * function ($command) use ($command_filter, $whitelist) {
         * foreach ($command_filter as $filter) {
         * if (fnmatch($filter, $command->getName())) {
         * return $whitelist;
         * }U/Notifications/VerifyEmail.php
         * }
         *
         * return ! $whitelist;
         * }
         * );
         * }
         */

        return $all_commands->sortBy(
<<<<<<< HEAD
=======
            /**
             * @param  Command  $command
             */
>>>>>>> 6ed19256f (.)
            static function (Command $command): string {
                Assert::string($name = $command->getName());

                if (mb_strpos($name, ':') === false) {
<<<<<<< HEAD
                    return ':'.$name;
=======
                    return ':' . $name;
>>>>>>> 6ed19256f (.)
                }

                return $name;
            },
        );
    }

    public function executeTask(string $task_id): void
    {
        app(ExecuteTaskAction::class)->execute($task_id);

<<<<<<< HEAD
        session()->flash('message', 'task ['.$task_id.'] executed at '.now());
=======
        session()->flash('message', 'task [' . $task_id . '] executed at ' . now());
>>>>>>> 6ed19256f (.)
    }
}
