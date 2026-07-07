<?php

/**
 * @see https://dev.to/jackmiras/laravel-delete-actions-simplified-4h8b
 */

declare(strict_types=1);

namespace Modules\Xot\Exceptions;

<<<<<<< HEAD
use Illuminate\Http\Response;
use Illuminate\Support\Str;
=======
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Override;
>>>>>>> 6ed19256f (.)

class ModelDeletionException extends ApplicationException
{
    private readonly string $model;

    public function __construct(
        private readonly int $id,
        string $model,
    ) {
        $this->model = Str::afterLast($model, '\\');
    }

<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> 6ed19256f (.)
    public function status(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }

<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> 6ed19256f (.)
    public function help(): string
    {
        $res = trans('exception.model_not_deleted.help');
        if (! \is_string($res)) {
<<<<<<< HEAD
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
=======
            throw new Exception('['.__LINE__.']['.class_basename($this).']');
>>>>>>> 6ed19256f (.)
        }

        return $res;
    }

<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> 6ed19256f (.)
    public function error(): string
    {
        $res = trans('exception.model_not_deleted.error', [
            'id' => $this->id,
            'model' => $this->model,
        ]);
        if (! \is_string($res)) {
<<<<<<< HEAD
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
=======
            throw new Exception('['.__LINE__.']['.class_basename($this).']');
>>>>>>> 6ed19256f (.)
        }

        return $res;
    }
}
