<?php

/**
 * @see https://github.com/buyersclub/laravel-eloquent-model-interface/blob/master/src/EloquentModelInterface.php
 */

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\SchemalessAttributes\SchemalessAttributes;

/**
 * Modules\Xot\Contracts\ExtraContract.
 *
 * @property SchemalessAttributes $extra_attributes
 *
 * @method static Builder<Model>|ExtraContract newModelQuery()
 * @method static Builder<Model>|ExtraContract newQuery()
 * @method static Builder<Model>|ExtraContract query()
 * @method static Builder<Model>|ExtraContract withExtraAttributes()
 *
 * @property int $id
 * @property string $model_type
 * @property string $model_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder<Model>|ExtraContract whereCreatedAt($value)
 * @method static Builder<Model>|ExtraContract whereCreatedBy($value)
 * @method static Builder<Model>|ExtraContract whereDeletedAt($value)
 * @method static Builder<Model>|ExtraContract whereDeletedBy($value)
 * @method static Builder<Model>|ExtraContract whereExtraAttributes($value)
 * @method static Builder<Model>|ExtraContract whereId($value)
 * @method static Builder<Model>|ExtraContract whereModelId($value)
 * @method static Builder<Model>|ExtraContract whereModelType($value)
 * @method static Builder<Model>|ExtraContract whereUpdatedAt($value)
 * @method static Builder<Model>|ExtraContract whereUpdatedBy($value)
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
interface ExtraContract {}
