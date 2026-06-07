<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

<<<<<<< HEAD
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\File\AddStrictTypesDeclarationAction;
use SplFileInfo;
=======
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\File\AddStrictTypesDeclarationAction;
>>>>>>> dev
use Webmozart\Assert\Assert;

class AddStrictTypesDeclarationCommand extends Command
{
    protected $signature = 'xot:add-strict-types 
                            {--module= : Nome del modulo specifico da processare}
                            {--dry-run : Mostra solo i file che verrebbero modificati senza apportare modifiche}';

    protected $description = 'Aggiunge la dichiarazione strict_types=1 ai file PHP che ne sono sprovvisti';

    /**
     * @var array<string>
     */
    private array $excludedPaths = [
        'views',
        'config',
        'routes',
        'lang',
        'docs',
        '.php-cs-fixer',
    ];

    public function handle(AddStrictTypesDeclarationAction $action): int
    {
        $modulePath = base_path('Modules');
        $moduleOption = $this->option('module');
        $dryRun = $this->option('dry-run');

        if ($moduleOption && is_string($moduleOption)) {
            $modulePath .= '/'.$moduleOption;
            if (! File::isDirectory($modulePath)) {
                $this->error("Il modulo {$moduleOption} non esiste");

                return 1;
            }
        }

        $files = $this->findPhpFiles($modulePath);
        $count = 0;

        foreach ($files as $file) {
<<<<<<< HEAD
            Assert::isInstanceOf($file, SplFileInfo::class);
            if ($this->shouldProcessFile($file)) {
                if ($dryRun) {
                    $fileName = $file->getRealPath();
                    if ($fileName === false) {
                        $fileName = $file->getPathname();
                    }
                    $this->info("Verrebbe processato: {$fileName}");
                    $count++;
=======
            Assert::isInstanceOf($file, \SplFileInfo::class);
            if ($this->shouldProcessFile($file)) {
                if ($dryRun) {
                    $fileName = $file->getRealPath();
                    if (false === $fileName) {
                        $fileName = $file->getPathname();
                    }
                    $this->info("Verrebbe processato: {$fileName}");
                    ++$count;
>>>>>>> dev

                    continue;
                }

                $path = $file->getRealPath();
<<<<<<< HEAD
                if ($path === false) {
=======
                if (false === $path) {
>>>>>>> dev
                    continue;
                }

                // PHPStan hint: at this point $path is definitely a string
                assert(is_string($path));

                try {
                    $action->execute($path);
                    $this->info("Aggiunta dichiarazione strict_types a: {$path}");
<<<<<<< HEAD
                    $count++;
                } catch (Exception $e) {
=======
                    ++$count;
                } catch (\Exception $e) {
>>>>>>> dev
                    $this->error("Errore nel processare {$path}: ".$e->getMessage());
                }
            }
        }

        $action = $dryRun ? 'Trovati' : 'Processati';
        $this->info("{$action} {$count} file");

        return 0;
    }

    /**
<<<<<<< HEAD
     * @return array<SplFileInfo>
=======
     * @return array<\SplFileInfo>
>>>>>>> dev
     */
    private function findPhpFiles(string $path): array
    {
        return File::allFiles($path);
    }

<<<<<<< HEAD
    private function shouldProcessFile(SplFileInfo $file): bool
=======
    private function shouldProcessFile(\SplFileInfo $file): bool
>>>>>>> dev
    {
        // Verifica l'estensione
        if (! str_ends_with($file->getFilename(), '.php')) {
            return false;
        }

        $path = $file->getRealPath();
<<<<<<< HEAD
        if ($path === false) {
=======
        if (false === $path) {
>>>>>>> dev
            return false;
        }

        // Verifica se il file è in un percorso escluso
        foreach ($this->excludedPaths as $excludedPath) {
            if (str_contains($path, "/{$excludedPath}/")) {
                return false;
            }
        }

        // Verifica se il file ha già la dichiarazione strict_types
        $content = File::get($path);

        return ! str_contains($content, 'declare(strict_types=1)');
    }
}
