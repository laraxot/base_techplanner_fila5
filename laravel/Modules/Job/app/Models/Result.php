<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\TechPlanner\Models\Profile;
use Override;

/**
 * Modules\Job\Models\Result.
 *
 * @property-read Profile|null $creator
 * @property-read Task|null $task
 * @property-read Profile|null $updater
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result query()
 *
 * @property string $id
 * @property int $task_id
 * @property Carbon $ran_at
 * @property numeric $duration
 * @property string $result
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereRanAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class Result extends BaseModel
{
    protected $fillable = [
        'duration',
        'result',
        'task_id',
    ];

    /**
     * @return BelongsTo<Task, $this>
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function getLastRun(): Builder
    {
        return $this->select('ran_at')
            // ->whereColumn('task_id', TOTEM_TABLE_PREFIX.'tasks.id')
            ->whereColumn('task_id', 'tasks.id')
            ->latest()
            ->limit(1)
            ->getQuery();
    }

    public function getAverageRunTime(): Builder
    {
        return $this->select(DB::raw('avg(duration)'))
            // ->whereColumn('task_id', TOTEM_TABLE_PREFIX.'tasks.id')
            ->whereColumn('task_id', 'tasks.id')
            ->getQuery();
    }

    #[Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'ran_at' => 'datetime',
        ];
    }
}
