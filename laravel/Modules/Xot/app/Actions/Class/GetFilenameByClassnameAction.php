<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Class;

// use Modules\Xot\Services\ArrayService;
<<<<<<< HEAD
use Exception;
use ReflectionClass;
=======
>>>>>>> dev
use Spatie\QueueableAction\QueueableAction;

class GetFilenameByClassnameAction
{
    use QueueableAction;

    public function execute(string $class_name): string
    {
        $filename = null;
        try {
            if (class_exists($class_name)) {
<<<<<<< HEAD
                $reflector = new ReflectionClass($class_name);
                $filename = $reflector->getFileName();
            }
        } catch (Exception $e) {
=======
                $reflector = new \ReflectionClass($class_name);
                $filename = $reflector->getFileName();
            }
        } catch (\Exception $e) {
>>>>>>> dev
            $filename = str_replace('\\', '/', $class_name);
            $filename = base_path($filename).'.php';
        }

        if (is_string($filename)) {
            return $filename;
        }
<<<<<<< HEAD
        throw new Exception('['.__LINE__.']['.class_basename($this).']['.$class_name.']');
=======
        throw new \Exception('['.__LINE__.']['.class_basename($this).']['.$class_name.']');
>>>>>>> dev
    }
}
