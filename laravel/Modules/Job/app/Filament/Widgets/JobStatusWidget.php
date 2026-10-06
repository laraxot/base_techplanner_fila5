<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Widgets;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Job\Actions\DummyAction;
use Modules\Job\Models\FailedJob;
use Modules\Job\Models\Job;
use Modules\Job\Models\JobBatch;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

use function Safe\putenv;

/**
 * Gemello Filament del ritirato Http\Livewire\Job\Status.
 *
 * Monta la stessa dashboard (contatori queue, selettore connessione,
 * comandi queue:*, dummy action) dentro Modules\Job\Filament\Pages\JobMonitor,
 * sostituendo il tag <livewire:job.status>.
 */
class JobStatusWidget extends XotBaseWidget
{
    /** @var array<string, string> */
    public array $form_data = [];

    public string $out = '';

    public string $old_value = '';

    /** @var view-string */
    protected string $view = 'job::filament.widgets.job-status';

    protected int|string|array $columnSpan = 'full';

    public function mount(): void
    {
        Artisan::call('queue:monitor', ['queues' => 'default,queue01,emails']);
        $this->out .= Artisan::output();
        Artisan::call('worker:check');
        $this->out .= Artisan::output();

        $this->out .= '<br/>['.Job::count().'] Jobs';
        $this->out .= '<br/>['.FailedJob::count().'] Failed Jobs';
        $this->out .= '<br/>['.JobBatch::count().'] Job Batch';

        $queueConn = getenv('QUEUE_CONNECTION');
        if ($queueConn === false) {
            throw new Exception('['.__LINE__.']['.class_basename($this).']');
        }

        $this->old_value = $queueConn;
        $this->form_data['conn'] = $queueConn;
    }

    public function artisan(string $cmd): void
    {
        if (! in_array($cmd, $this->getAllowedCommands(), true)) {
            return;
        }

        $this->out .= '<hr/>';
        Artisan::call('queue:'.$cmd);
        $this->out .= e(Artisan::output());
        $this->out .= '<hr/>';
    }

    public function updatedFormData(string $value, string $key): void
    {
        if ($key === 'conn') {
            $this->saveEnv();
        }
    }

    public function saveEnv(): void
    {
        $envFile = base_path('.env');
        $envContent = File::get($envFile);

        $conn = $this->form_data['conn'] ?? null;
        Assert::string($conn, '['.__LINE__.']['.class_basename($this).']');

        $newContent = Str::replace(
            'QUEUE_CONNECTION='.$this->old_value,
            'QUEUE_CONNECTION='.$conn,
            $envContent,
        );
        putenv('QUEUE_CONNECTION='.$conn);
        Assert::string($newContent, '['.__LINE__.']['.class_basename($this).']');
        File::put($envFile, $newContent);
        $this->old_value = $conn;
    }

    public function dummyAction(): void
    {
        for ($i = 0; $i < 1000; $i++) {
            app(DummyAction::class)->onQueue()->execute();
        }

        session()->flash('message', '1000 dummy Action');
    }

    /**
     * Comandi queue:* esposti dal pannello (whitelist, invariata rispetto
     * al componente Livewire originale).
     *
     * @return array<int, string>
     */
    public function getAllowedCommands(): array
    {
        return [
            'clear',
            'failed',
            'flush',
            'prune-batches',
            'prune-failed',
            'restart',
            'retry',
        ];
    }
}
