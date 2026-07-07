<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);

namespace Modules\Xot\Actions;

<<<<<<< HEAD
=======
use Exception;
>>>>>>> 6ed19256f (.)
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetModelClassByModelTypeAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $model_type): string
    {
        $morph_map = config('morph_map');
        if (! is_array($morph_map)) {
<<<<<<< HEAD
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
=======
            throw new Exception('['.__LINE__.']['.class_basename($this).']');
>>>>>>> 6ed19256f (.)
        }

        Assert::string($res = collect($morph_map)->get($model_type));

        return $res;
    }
}
