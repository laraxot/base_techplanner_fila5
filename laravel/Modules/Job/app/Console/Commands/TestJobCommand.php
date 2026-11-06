<?php

declare(strict_types=1);
/**
 * @see https://github.com/husam-tariq/filament-database-schedule/blob/v2.0.0/src/Console/Commands/TestJobCommand.php
 */

namespace Modules\Job\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TestJobCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:test-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command that display a friendly message that is intented to test a job.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Hello the test worked.');
<<<<<<< HEAD
        Log::debug('Hello the test worked.');
=======
        Log::info('Hello the test worked.');
>>>>>>> 6ed19256f (.)

        return 0;
    }
}
