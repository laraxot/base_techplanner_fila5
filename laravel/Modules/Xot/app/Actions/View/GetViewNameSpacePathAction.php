<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\View;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> dev
use Nwidart\Modules\Facades\Module;
use Spatie\QueueableAction\QueueableAction;

class GetViewNameSpacePathAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * @throws Exception
     */
    public function execute(?string $module_name = null): string
    {
        if ($module_name !== null && $module_name !== '') {
=======
     * @throws \Exception
     */
    public function execute(?string $module_name = null): string
    {
        if (null !== $module_name && '' !== $module_name) {
>>>>>>> dev
            $module_path = Module::getModulePath($module_name);
            /** @var non-falsy-string $namespace_path */
            $namespace_path = $module_path.'resources/views';
        } else {
            /** @var non-falsy-string $namespace_path */
            $namespace_path = resource_path('views');
        }

        return $namespace_path;
    }
}
