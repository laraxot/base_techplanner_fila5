<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
=======
use Error;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
use ValueError;
>>>>>>> 6ed19256f (.)

class SafeArrayByModelCastAction
{
    use QueueableAction;

    /**
     * @return array<string, mixed>
     */
    public function execute(Model $model): array
    {
        try {
<<<<<<< HEAD
            /** @var array<string, mixed> $res */
            $res = $model->attributesToArray();

            return $res;
        } catch (\ValueError|\Error|\Exception $e) {
=======
            return $model->attributesToArray();
        } catch (ValueError|Error|Exception $e) {
>>>>>>> 6ed19256f (.)
            return $this->safeExecute($model);
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function safeExecute(Model $model): array
    {
        $data = [];
        foreach ($model->getAttributes() as $key => $value) {
            try {
<<<<<<< HEAD
                $data[$key] = $model->getAttribute($key);
            } catch (\ValueError|\Error) {
=======
                $data[$key] = $model->$key;

                /** @phpstan-ignore-next-line */
            } catch (ValueError|Error $e) {
>>>>>>> 6ed19256f (.)
            }
        }

        return $data;
    }
}
