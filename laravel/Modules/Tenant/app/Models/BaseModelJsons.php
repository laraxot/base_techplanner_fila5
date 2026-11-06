<?php

declare(strict_types=1);

namespace Modules\Tenant\Models;

use Modules\Tenant\Models\Traits\SushiToJsons;

/**
 * Class BaseModelJsons.
 *
<<<<<<< .merge_file_BfXgbT
 * @property array<string, mixed> $form
=======
 * @property array $form
<<<<<<< HEAD
>>>>>>> .merge_file_6sHZRX
 * @property array<string, mixed> $schema
=======
>>>>>>> 6ed19256f (.)
 */
abstract class BaseModelJsons extends BaseModel
{
    use SushiToJsons;
}
