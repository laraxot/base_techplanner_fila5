<?php

declare(strict_types=1);

namespace Modules\Tenant\Models;

use Modules\Tenant\Models\Traits\SushiToJsons;

/**
 * Class BaseModelJsons.
 *
 * @property array $form
<<<<<<< HEAD
 * @property array<string, mixed> $schema
=======
>>>>>>> 6ed19256f (.)
 */
abstract class BaseModelJsons extends BaseModel
{
    use SushiToJsons;
}
