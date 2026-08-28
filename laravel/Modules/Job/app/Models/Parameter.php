<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;

/**
 * Modules\Job\Models\Parameter.
 *
 * @property-read Profile|null $creator
 * @property-read Frequency|null $task
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|Parameter newModelQuery()
 * @method static Builder<static>|Parameter newQuery()
 * @method static Builder<static>|Parameter query()
 *
 * @property int $id
 * @property int $frequency_id
 * @property string $name
 * @property string $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|Parameter whereCreatedAt($value)
 * @method static Builder<static>|Parameter whereCreatedBy($value)
 * @method static Builder<static>|Parameter whereFrequencyId($value)
 * @method static Builder<static>|Parameter whereId($value)
 * @method static Builder<static>|Parameter whereName($value)
 * @method static Builder<static>|Parameter whereUpdatedAt($value)
 * @method static Builder<static>|Parameter whereUpdatedBy($value)
 * @method static Builder<static>|Parameter whereValue($value)
 *
 * @mixin \Eloquent
 */
class Parameter extends BaseModel
{
    // protected $table = 'frequency_parameters';

    protected $fillable = [
        'id',
        'name',
        'value',
    ];

    /**
     * @return BelongsTo<Frequency, $this>
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Frequency::class);
    }

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'id' => 'integer',
            'frequency_id' => 'integer',
            'name' => 'string',
            'value' => 'string',
            'created_by' => 'string',
            'updated_by' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ]);
    }
}
