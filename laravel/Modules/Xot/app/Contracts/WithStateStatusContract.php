<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
/**
 * @property object|string|null $status
 *
 * @phpstan-require-extends Model
 */
interface WithStateStatusContract {}
=======
use Spatie\ModelStates\State;

/**
 * @property State $status
 *
 * @phpstan-require-extends Model
 */
interface WithStateStatusContract
{
}
>>>>>>> 8215f950 (.)
