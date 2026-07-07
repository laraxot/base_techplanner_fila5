<?php

/**
 * @see https://dev.to/jackmiras/laravels-exceptions-part-2-custom-exceptions-1367
 */

declare(strict_types=1);

namespace Modules\Xot\Exceptions;

<<<<<<< HEAD
use Illuminate\Http\Response;

class JsonEncodeException extends ApplicationException
{
    #[\Override]
=======
use Exception;
use Illuminate\Http\Response;
use Override;

class JsonEncodeException extends ApplicationException
{
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
        $res = trans('exception.json_not_encoded.help');
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
        $res = trans('exception.json_not_encoded.error');
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
