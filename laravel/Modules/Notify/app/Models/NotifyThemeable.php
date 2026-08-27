<?php

declare(strict_types=1);

namespace Modules\Notify\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\TechPlanner\Models\Profile;

/**
 * Modules\Notify\Models\NotifyThemeable.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|NotifyThemeable newModelQuery()
 * @method static Builder<static>|NotifyThemeable newQuery()
 * @method static Builder<static>|NotifyThemeable query()
 * @property string $id
 * @property string|null $model_type
 * @property int|null $model_id
 * @property int|null $notify_theme_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|NotifyThemeable whereCreatedAt($value)
 * @method static Builder<static>|NotifyThemeable whereCreatedBy($value)
 * @method static Builder<static>|NotifyThemeable whereDeletedAt($value)
 * @method static Builder<static>|NotifyThemeable whereDeletedBy($value)
 * @method static Builder<static>|NotifyThemeable whereId($value)
 * @method static Builder<static>|NotifyThemeable whereModelId($value)
 * @method static Builder<static>|NotifyThemeable whereModelType($value)
 * @method static Builder<static>|NotifyThemeable whereNotifyThemeId($value)
 * @method static Builder<static>|NotifyThemeable whereUpdatedAt($value)
 * @method static Builder<static>|NotifyThemeable whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class NotifyThemeable extends BaseMorphPivot
{
    // ...
}
