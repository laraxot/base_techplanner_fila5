<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\TechPlanner\Database\Factories\EventFactory;

/**
<<<<<<< .merge_file_MIc6Ot
 * @method static \Modules\TechPlanner\Database\Factories\EventFactory factory($count = null, $state = [])
=======
 * @property int $id
 * @property string|null $treatment_id
 * @property string|null $consent_id
 * @property string $subject_id
 * @property string $ip
 * @property string $action
 * @property string $payload
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
<<<<<<< HEAD
 *
=======
>>>>>>> 6ed19256f (.)
 * @method static EventFactoryFactory factory($count = null, $state = [])
>>>>>>> .merge_file_uodO5Q
 * @method static Builder<static>|Event newModelQuery()
 * @method static Builder<static>|Event newQuery()
 * @method static Builder<static>|Event query()
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $start_at
 * @property string $end_at
 * @property string|null $status
 *
 * @method static Builder<static>|Event whereDescription($value)
 * @method static Builder<static>|Event whereEndAt($value)
 * @method static Builder<static>|Event whereId($value)
<<<<<<< .merge_file_MIc6Ot
 * @method static Builder<static>|Event whereName($value)
 * @method static Builder<static>|Event whereStartAt($value)
 * @method static Builder<static>|Event whereStatus($value)
=======
 * @method static Builder<static>|Event whereIp($value)
 * @method static Builder<static>|Event wherePayload($value)
 * @method static Builder<static>|Event whereSubjectId($value)
 * @method static Builder<static>|Event whereTreatmentId($value)
 * @method static Builder<static>|Event whereUpdatedAt($value)
 * @method static Builder<static>|Event whereUpdatedBy($value)
<<<<<<< HEAD
>>>>>>> .merge_file_uodO5Q
 *
=======
>>>>>>> 6ed19256f (.)
 * @mixin \Eloquent
 */
class Event extends Model
{
    /** @use HasFactory<EventFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
        ]);
    }

    protected static function newFactory(): EventFactory
    {
        return EventFactory::new();
    }
}
