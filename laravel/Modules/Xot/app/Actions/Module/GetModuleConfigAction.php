<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Module;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> dev
use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;

class GetModuleConfigAction
{
    use QueueableAction;

    public function execute(string $moduleName, string $config): array
    {
        $configPath = app(GetModulePathByGeneratorAction::class)->execute($moduleName, 'config');
        $configFile = $configPath.'/'.$config.'.php';
        if (! file_exists($configFile)) {
<<<<<<< HEAD
            throw new Exception('Config file not found: '.$configFile);
=======
            throw new \Exception('Config file not found: '.$configFile);
>>>>>>> dev
        }
        dddx(File::getRequire($configFile));

        return [];
    }
}
