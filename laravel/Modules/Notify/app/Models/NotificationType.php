<?php

declare(strict_types=1);

namespace Modules\Notify\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Database\Factories\NotificationTypeFactory;
use Override;

/**
 * @method static Builder<static>|NotificationType newModelQuery()
 * @method static Builder<static>|NotificationType newQuery()
 * @method static Builder<static>|NotificationType query()
 *
 * @mixin \Eloquent
 */
class NotificationType extends Model
{
    /** @use HasFactory<NotificationTypeFactory> */
    use HasFactory;

    /** @var list<string> */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category',
        'is_active',
        'channels',
        'settings',
        'template'];

    /** @return array<string, string> */
    #[Override]
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'channels' => 'array',
            'settings' => 'array'];
    }
}
