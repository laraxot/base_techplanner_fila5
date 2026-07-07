<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

/**
 * @property object|string|null $status
=======
use Spatie\ModelStates\State;

/**
 * @property State $status
>>>>>>> 6ed19256f (.)
 *
 * @phpstan-require-extends Model
 */
interface WithStateStatusContract
{
}
