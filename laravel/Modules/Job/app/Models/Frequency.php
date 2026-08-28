<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;

// use Modules\Job\Models\Traits\HasParameters;
/**
 * Modules\Job\Models\Frequency.
 *
 * @property-read Profile|null $creator
 * @property-read Collection<int, Parameter> $parameters
 * @property-read int|null $parameters_count
 * @property-read Task|null $task
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|Frequency newModelQuery()
 * @method static Builder<static>|Frequency newQuery()
 * @method static Builder<static>|Frequency query()
 *
 * @property int $id
 * @property int $task_id
 * @property string $label
 * @property string $interval
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|Frequency whereCreatedAt($value)
 * @method static Builder<static>|Frequency whereCreatedBy($value)
 * @method static Builder<static>|Frequency whereId($value)
 * @method static Builder<static>|Frequency whereInterval($value)
 * @method static Builder<static>|Frequency whereLabel($value)
 * @method static Builder<static>|Frequency whereTaskId($value)
 * @method static Builder<static>|Frequency whereUpdatedAt($value)
 * @method static Builder<static>|Frequency whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class Frequency extends BaseModel
{
    // use HasParameters;

    // protected $table = 'task_frequencies';

    protected $fillable = [
        'id',
        'label',
        'interval',
    ];

    /**
     * @return BelongsTo<Task, $this>
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * @return HasMany<Parameter, $this>
     */
    public function parameters(): HasMany
    {
        return $this->hasMany(Parameter::class);
    }

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'id' => 'integer',
            'task_id' => 'integer',
            'label' => 'string',
            'interval' => 'string',
            'created_by' => 'string',
            'updated_by' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ]);
    }
}
