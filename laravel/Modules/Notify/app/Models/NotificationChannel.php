<?php

declare(strict_types=1);

namespace Modules\Notify\Models;

use Modules\Media\Models\Media;
use Modules\TechPlanner\Models\Profile;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

/**
 * @property-read Profile|null $creator
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Profile|null $updater
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel query()
 *
 * @mixin \Eloquent
 */
class NotificationChannel extends BaseModel
{
    protected $table = 'notification_channels';

    protected $fillable = [
        'name',
        'driver',
        'config',
        'is_enabled',
        'priority'];

    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'config' => 'array',
            'is_enabled' => 'boolean',
            'priority' => 'integer']);
    }
}
