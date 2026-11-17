<?php

declare(strict_types=1);

namespace Modules\Comment\Models;

use Closure;
use Illuminate\Contracts\Database\Query\Expression;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Comment\Database\Factories\CommentNotificationOptOutFactory;
use Modules\Xot\Contracts\ProfileContract;
use Spatie\Comments\Models\CommentNotificationOptOut as BaseCommentNotificationOptOut;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @method static CommentNotificationOptOutFactory factory($count = null, $state = [])
 * @method static Builder|CommentNotificationOptOut newModelQuery()
 * @method static Builder|CommentNotificationOptOut newQuery()
 * @method static Builder|CommentNotificationOptOut query()
 *
 * @property-read Model|\Eloquent $commentable
 * @property-read Model|\Eloquent $commentator
 *
 * @method static CommentNotificationOptOut|null first()
 * @method static Collection<int, CommentNotificationOptOut> get()
 * @method static CommentNotificationOptOut create(array $attributes = [])
 * @method static CommentNotificationOptOut firstOrCreate(array $attributes = [], array $values = [])
 * @method static Builder<static>|CommentNotificationOptOut where((string|Closure) $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static Builder<static>|CommentNotificationOptOut whereNotNull((string|Expression) $columns)
 * @method static int count(string $columns = '*')
 *
 * @mixin \Eloquent
 */
class CommentNotificationOptOut extends BaseCommentNotificationOptOut
{
    protected $connection = 'comment';
}
