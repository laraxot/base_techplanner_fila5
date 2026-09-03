<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Traits\Fixtures;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Traits\HasRoles;
use Modules\Xot\Models\BaseModel;
use Modules\Xot\Models\Traits\RelationX;

/**
 * PHPStan fixture: keeps custom HasRoles trait in analysed graph.
 *
 * @phpstan-use RelationX<Model>
 */
final class HasRolesTraitFixture extends BaseModel
{
    use HasRoles;
    use RelationX;

    protected $table = 'model_has_roles';
}
