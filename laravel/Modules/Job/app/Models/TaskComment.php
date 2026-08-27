<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\TechPlanner\Models\Profile;
use Modules\User\Models\User;

/**
 * Class TaskComment.
 *
 * @property-read Profile|null $creator
 * @property-read Task|null $task
 * @property-read Profile|null $updater
 * @property-read User|null $user
 *
 * @method static Builder<static>|TaskComment newModelQuery()
 * @method static Builder<static>|TaskComment newQuery()
 * @method static Builder<static>|TaskComment query()
 *
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
