<?php

/**
 * @see https://dev.to/jackmiras/laravels-exceptions-part-2-custom-exceptions-1367
 */

declare(strict_types=1);

namespace Modules\Xot\Exceptions;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
<<<<<<< HEAD
use JsonSerializable;
use Override;

use function Safe\json_encode;

readonly class ApplicationError implements Arrayable, Jsonable, JsonSerializable
=======

use function Safe\json_encode;

readonly class ApplicationError implements \JsonSerializable, Arrayable, Jsonable
>>>>>>> dev
{
    public function __construct(
        private string $help = '',
        private string $error = '',
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> dev

    public function toArray(): array
    {
        return [
            'error' => $this->error,
            'help' => $this->help,
        ];
    }

<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> dev
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function toJson($options = 0): string
    {
        return json_encode($this->jsonSerialize(), $options);
    }
}
