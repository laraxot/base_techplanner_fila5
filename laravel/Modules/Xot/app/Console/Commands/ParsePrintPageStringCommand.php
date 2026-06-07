<?php

declare(strict_types=1);

/**
 * @see ---
 */

namespace Modules\Xot\Console\Commands;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> dev
use Illuminate\Console\Command;
use Modules\Xot\Actions\ParsePrintPageStringAction;

class ParsePrintPageStringCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xot:parse-print-page {str}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' esplode';

    /**
     * Create a new command instance.
     */

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $str = $this->argument('str');
        if (! is_string($str)) {
<<<<<<< HEAD
            throw new Exception('argument str must be a string');
=======
            throw new \Exception('argument str must be a string');
>>>>>>> dev
        }
        dddx(app(ParsePrintPageStringAction::class)->execute($str));
    }
}
