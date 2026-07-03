<?php

declare(strict_types=1);

namespace Modules\Comment\Models;

use Closure;
use Illuminate\Contracts\Database\Query\Expression;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
 *
 * @method static CommentNotificationSubscriptionFactory factory($count = null, $state = [])
 * @method static Builder|CommentNotificationSubscription newModelQuery()
 * @method static Builder|CommentNotificationSubscription newQuery()
 * @method static Builder|CommentNotificationSubscription query()
 * @method static Builder|CommentNotificationSubscription whereCommentableId($value)
 * @method static Builder|CommentNotificationSubscription whereCommentableType($value)
 * @method static Builder|CommentNotificationSubscription whereCreatedAt($value)
 * @method static Builder|CommentNotificationSubscription whereCreatedBy($value)
 * @method static Builder|CommentNotificationSubscription whereDeletedAt($value)
 * @method static Builder|CommentNotificationSubscription whereDeletedBy($value)
 * @method static Builder|CommentNotificationSubscription whereId($value)
 * @method static Builder|CommentNotificationSubscription whereSubscriberId($value)
 * @method static Builder|CommentNotificationSubscription whereSubscriberType($value)
 * @method static Builder|CommentNotificationSubscription whereType($value)
 * @method static Builder|CommentNotificationSubscription whereUpdatedAt($value)
 * @method static Builder|CommentNotificationSubscription whereUpdatedBy($value)
 *
 * @property-read Model|\Eloquent $commentable
 * @property-read Model|\Eloquent $subscriber
 *
 * @method static CommentNotificationSubscription|null first()
 * @method static Collection<int, CommentNotificationSubscription> get()
 * @method static CommentNotificationSubscription create(array<string, mixed> $attributes = [])
 * @method static CommentNotificationSubscription firstOrCreate(array<string, mixed> $attributes = [], array<string, mixed> $values = [])
 * @method static Builder<static>|CommentNotificationSubscription where((string|Closure) $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static Builder<static>|CommentNotificationSubscription whereNotNull((string|Expression) $columns)
 * @method static int count(string $columns = '*')
 *
 * @mixin \Eloquent
 */
class CommentNotificationSubscription extends BaseCommentNotificationSubscription
{
    protected $connection = 'comment';
}
