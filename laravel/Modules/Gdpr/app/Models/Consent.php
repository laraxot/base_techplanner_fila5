<?php

declare(strict_types=1);

namespace Modules\Gdpr\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
<<<<<<< HEAD
=======
use Modules\Gdpr\Database\Factories\ConsentFactory;
>>>>>>> 6ed19256f (.)
use Modules\Xot\Contracts\ProfileContract;

/**
 * Modules\Gdpr\Models\Consent.
 *
<<<<<<< HEAD
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $subject_id
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property string               $user_type
 * @property string|null          $user_id
 * @property string|null          $type
 * @property string|null          $accepted_at
 * @property ProfileContract|null $creator
 * @property Treatment|null       $treatment
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $subject_id
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property string               $user_type
 * @property string|null          $user_id
 * @property string|null          $type
 * @property string|null          $accepted_at
 * @property ProfileContract|null $creator
 * @property Treatment|null       $treatment
 * @property ProfileContract|null $updater
 *
=======
 * @property string $id
 * @property string|null $treatment_id
 * @property string|null $subject_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string $user_type
 * @property string|null $user_id
 * @property string|null $type
 * @property string|null $accepted_at
 *
 * @property-read ProfileContract|null $creator
 * @property-read Treatment|null $treatment
 * @property-read ProfileContract|null $updater
 *
 * @method static ConsentFactory factory($count = null, $state = [])
>>>>>>> 6ed19256f (.)
 * @method static Builder<static>|Consent newModelQuery()
 * @method static Builder<static>|Consent newQuery()
 * @method static Builder<static>|Consent query()
 * @method static Builder<static>|Consent whereAcceptedAt($value)
 * @method static Builder<static>|Consent whereCreatedAt($value)
 * @method static Builder<static>|Consent whereCreatedBy($value)
 * @method static Builder<static>|Consent whereDeletedAt($value)
 * @method static Builder<static>|Consent whereDeletedBy($value)
 * @method static Builder<static>|Consent whereId($value)
 * @method static Builder<static>|Consent whereSubjectId($value)
 * @method static Builder<static>|Consent whereTreatmentId($value)
 * @method static Builder<static>|Consent whereType($value)
 * @method static Builder<static>|Consent whereUpdatedAt($value)
 * @method static Builder<static>|Consent whereUpdatedBy($value)
 * @method static Builder<static>|Consent whereUserId($value)
 * @method static Builder<static>|Consent whereUserType($value)
 *
<<<<<<< HEAD
 * @property ProfileContract|null $deleter
 * @property string|null          $ip_address
 * @property string|null          $user_agent
 *
 * @method static \Modules\Gdpr\Database\Factories\ConsentFactory factory($count = null, $state = [])
 * @method static Builder<static>|Consent                         whereIpAddress($value)
 * @method static Builder<static>|Consent                         whereUserAgent($value)
 *
 * @property string|null $ip_address
 * @property string|null $user_agent
 *
 * @method static \Modules\Gdpr\Database\Factories\ConsentFactory factory($count = null, $state = [])
 * @method static Builder<static>|Consent                         whereIpAddress($value)
 * @method static Builder<static>|Consent                         whereUserAgent($value)
=======
 * @property-read ProfileContract|null $deleter
>>>>>>> 6ed19256f (.)
 *
 * @mixin \Eloquent
 */
class Consent extends BaseModel
{
    use HasUuids;

    // protected $table = 'consent';

    public $incrementing = false;

<<<<<<< HEAD
    public $fillable = [
        'id',
        'subject_id',
        'treatment_id',
        'user_id',
        'user_type',
        'type',
        'accepted_at',
        'created_by',
        'updated_by',
        'ip_address',
        'user_agent',
    ];
=======
    public $fillable = ['subject_id', 'treatment_id'];
>>>>>>> 6ed19256f (.)

    public function treatment(): BelongsTo
    {
        return $this->belongsTo(Treatment::class);
    }
}
