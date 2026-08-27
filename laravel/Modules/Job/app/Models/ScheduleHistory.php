<?php

declare(strict_types=1);

/**
 * @see HusamTariq\FilamentDatabaseSchedule
 */

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;
use Override;

/**
 * Modules\Job\Models\ScheduleHistory.
 *
 * @property-read Schedule|null $command
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|ScheduleHistory newModelQuery()
 * @method static Builder<static>|ScheduleHistory newQuery()
 * @method static Builder<static>|ScheduleHistory query()
 *
 * @property string $id
 * @property array<array-key, mixed>|null $params
 * @property string $output
 * @property array<array-key, mixed>|null $options
 * @property int|null $schedule_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder<static>|ScheduleHistory whereCommand($value)
 * @method static Builder<static>|ScheduleHistory whereCreatedAt($value)
 * @method static Builder<static>|ScheduleHistory whereCreatedBy($value)
 * @method static Builder<static>|ScheduleHistory whereDeletedAt($value)
 * @method static Builder<static>|ScheduleHistory whereDeletedBy($value)
 * @method static Builder<static>|ScheduleHistory whereId($value)
 * @method static Builder<static>|ScheduleHistory whereOptions($value)
 * @method static Builder<static>|ScheduleHistory whereOutput($value)
 * @method static Builder<static>|ScheduleHistory whereParams($value)
 * @method static Builder<static>|ScheduleHistory whereScheduleId($value)
 * @method static Builder<static>|ScheduleHistory whereUpdatedAt($value)
 * @method static Builder<static>|ScheduleHistory whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class ScheduleHistory extends BaseModel
{
    /*
     * The database table used by the model.
     *
     * @var string
     */
    // protected $table;

    protected $fillable = [
        'command',
        'params',
        'output',
        'options',
        // Senza questa riga `ScheduleHistory::create(['schedule_id' => …])` scartava la
        // chiave in silenzio: la riga nasceva con `schedule_id` null e la relazione
        // `Schedule::histories()` non trovava mai niente.
        'schedule_id',
    ];

    /*
     * Creates a new instance of the model.
     *
     * @param array $attributes
     * @return void
     */
    /*
     * public function __construct(array $attributes = [])
     * {
     * parent::__construct($attributes);
     *
     * $this->table = Config::get('filament-database-schedule.table.schedule_histories', 'schedule_histories');
     * }
     *
     */

    /**
     * @return BelongsTo<Schedule, $this>
     */
    public function command(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
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
            'params' => 'array',
            'options' => 'array',
        ];
    }
}
