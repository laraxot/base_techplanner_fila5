<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

<<<<<<< HEAD
use Error;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
use ValueError;
=======
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
>>>>>>> dev

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
<<<<<<< HEAD
=======
>>>>>>> dev
            /** @var array<string, mixed> $res */
            $res = $model->attributesToArray();

            return $res;
<<<<<<< HEAD
=======
            return $model->attributesToArray();
>>>>>>> 4b6b99016 (first commit)
        } catch (ValueError|Error|Exception $e) {
=======
        } catch (\ValueError|\Error|\Exception $e) {
>>>>>>> dev
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
                $data[$key] = $model->$key;

<<<<<<< HEAD
                /** @phpstan-ignore-next-line */
            } catch (ValueError|Error $e) {
=======
                /* @phpstan-ignore-next-line */
            } catch (\ValueError|\Error $e) {
>>>>>>> dev
            }
        }

        return $data;
    }
}
