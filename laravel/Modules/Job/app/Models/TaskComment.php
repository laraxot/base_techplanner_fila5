<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Job\Database\Factories\TaskCommentFactory;
use Modules\User\Models\User;
use Modules\Xot\Contracts\ProfileContract;

/**
 * Class TaskComment.
 *
 * @property ProfileContract|null $creator
 * @property Task|null $task
 * @property ProfileContract|null $updater
 * @property User|null $user
 * @method static Builder<static>|TaskComment newModelQuery()
 * @method static Builder<static>|TaskComment newQuery()
 * @method static Builder<static>|TaskComment onlyTrashed()
 * @method static Builder<static>|TaskComment query()
 * @method static Builder<static>|TaskComment withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|TaskComment withoutTrashed()
 * @property-read ProfileContract|null $deleter
 * @method static TaskCommentFactory factory($count = null, $state = [])
 * @property string $id
 * @property int $task_id
 * @property int|null $user_id
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|TaskComment whereComment($value)
 * @method static Builder<static>|TaskComment whereCreatedAt($value)
 * @method static Builder<static>|TaskComment whereCreatedBy($value)
 * @method static Builder<static>|TaskComment whereDeletedAt($value)
 * @method static Builder<static>|TaskComment whereDeletedBy($value)
 * @method static Builder<static>|TaskComment whereId($value)
 * @method static Builder<static>|TaskComment whereTaskId($value)
 * @method static Builder<static>|TaskComment whereUpdatedAt($value)
 * @method static Builder<static>|TaskComment whereUpdatedBy($value)
 * @method static Builder<static>|TaskComment whereUserId($value)
 * @mixin \Eloquent
 */
class TaskComment extends BaseModel
{
    protected $table = 'task_comments';

    protected $fillable = [
        'task_id',
        'user_id',
        'comment',
    ];

    /**
     * @return BelongsTo<Task, $this>
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }
}
