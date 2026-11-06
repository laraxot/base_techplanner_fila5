<?php

declare(strict_types=1);
/**
 * @see https://www.freshleafmedia.co.uk/blog/streaming-laravel-command-output-to-the-browser
 */

namespace Modules\Job\Filament\Widgets;

use Illuminate\Support\Facades\Process;
<<<<<<< .merge_file_tu9xI5
use Modules\Xot\Filament\Widgets\XotBaseWidget;
=======
<<<<<<< HEAD
use Symfony\Component\Console\Output\StreamOutput;

use function Safe\fopen;
>>>>>>> .merge_file_oWMAUO

class ClockWidget extends XotBaseWidget
{
    public string $time = '---';
=======
use function Safe\fopen;
use Symfony\Component\Console\Output\StreamOutput;

class ClockWidget extends Widget
{
    /** @var string */
    public $time = '---';
>>>>>>> 6ed19256f (.)

    public bool $run = false;

    /** @var view-string */
    protected string $view = 'job::filament.widgets.clock-widget';

    protected int|string|array $columnSpan = 'full';

    public function begin(): void
    {
        $this->beginProcess();
    }

    public function beginProcess(): void
    {
        $this->time = '';
        $process = Process::path(base_path())->start('php artisan queue:listen --timeout=0');
        while ($process->running()) {
            // ...
            $this->stream(
                to: 'count',
                content: $this->time,
                replace: true,
            );
            // Pause for 1 second between numbers...
            sleep(3);
            // se no troppe richieste

            $this->time .= $process->latestOutput();
        }

        $process->wait();
    }

    /**
     * Esperimento di streaming (blog freshleafmedia) mai completato: lo streaming reale e' beginProcess().
     * Nessun chiamante: la vista usa begin().
     */
    public function beginStream(): void
    {
<<<<<<< .merge_file_tu9xI5
        throw new \LogicException('ClockWidget::beginStream() non implementato');
=======
        $this->run = ! $this->run;
        // $output = new BufferedOutput();
        /*
         * $output = new class() extends StreamOutput {
         * public function __construct()
         * {
         * parent::__construct(fopen('php://output', 'w'));
         * }
         *
         * protected function doWrite(string $message, bool $newline): void
         * {
         * if ('' != $message) {
         * dddx($message);
         * }
         *
         * $message = str_replace("\n", '<br>', $message);
         *
         * if ($newline) {
         * $message .= '<br>';
         * }
         *
         * parent::doWrite($message, false);
         * }
         * };
         */
        $resource = fopen('php://stdout', 'w');
        if ($resource === false) {
<<<<<<< HEAD
            throw new Exception('['.__LINE__.']['.class_basename($this).']');
=======
            throw new Exception('[' . __LINE__ . '][' . class_basename($this) . ']');
>>>>>>> 6ed19256f (.)
        }
        $output = new StreamOutput($resource);
        // $output = new StreamOutput(fopen('/path/to/output.log', 'a', false));

        Artisan::call('route:list', [], $output);
        dddx($output);

        // dddx($output);
        // dddx($output->fetch());
        /*
         * while ($this->run) {
         * // Stream the current count to the browser...
         * $this->stream(
         * to: 'count',
         * content: $this->time,
         * replace: true,
         * );
         *
         * // Pause for 1 second between numbers...
         * sleep(1);
         *
         * // Decrement the counter...
         * // $this->time = (string) Carbon::now()->format('H:i:s');
         * $this->time = $output->fetch().PHP_EOL;
         * }
         */
>>>>>>> .merge_file_oWMAUO
    }
}
