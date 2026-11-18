<?php

declare(strict_types=1);

namespace Modules\Comment\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Modules\Comment\Database\Factories\CommentNotificationSubscriptionFactory;
use Modules\Xot\Contracts\ProfileContract;
use Spatie\Comments\Models\CommentNotificationSubscription as BaseCommentNotificationSubscription;

/**
 * @property int $id
 * @property string $commentable_type
 * @property int $commentable_id
 * @property string $subscriber_type
 * @property int $subscriber_id
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property-read Model|\Eloquent $commentable
 * @property-read Model|\Eloquent $subscriber
 *
 * @method static CommentNotificationSubscriptionFactory factory($count = null, $state = [])
 * @method static Builder<static> newModelQuery()
 * @method static Builder<static> newQuery()
 * @method static Builder<static> query()
 * @method static CommentNotificationSubscription create(array<string, mixed> $attributes = [])
 * @method static CommentNotificationSubscription firstOrCreate(array<string, mixed> $attributes = [], array<string, mixed> $values = [])
 *
 * @mixin \Eloquent
 */
class CommentNotificationSubscription extends BaseCommentNotificationSubscription
{
    protected $connection = 'comment';
}
