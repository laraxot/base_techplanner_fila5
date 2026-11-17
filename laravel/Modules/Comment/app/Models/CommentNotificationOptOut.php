<?php

declare(strict_types=1);

namespace Modules\Comment\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Comment\Database\Factories\CommentNotificationOptOutFactory;
use Modules\Xot\Contracts\ProfileContract;
use Spatie\Comments\Models\CommentNotificationOptOut as BaseCommentNotificationOptOut;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property-read Model|\Eloquent $commentable
 * @property-read Model|\Eloquent $commentator
 *
 * @method static CommentNotificationOptOutFactory factory($count = null, $state = [])
 * @method static Builder<static> newModelQuery()
 * @method static Builder<static> newQuery()
 * @method static Builder<static> query()
 * @method static CommentNotificationOptOut create(array<string, mixed> $attributes = [])
 * @method static CommentNotificationOptOut firstOrCreate(array<string, mixed> $attributes = [], array<string, mixed> $values = [])
 *
 * @mixin \Eloquent
 */
class CommentNotificationOptOut extends BaseCommentNotificationOptOut
{
    protected $connection = 'comment';
}
