<?php

/**
 * @see https://github.com/foothing/laravel-gdpr-consent
 */

declare(strict_types=1);

namespace Modules\Gdpr\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;

=======
use Modules\Gdpr\Database\Factories\EventFactory;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> 6ed19256f (.)
use function Safe\json_encode;

/**
 * Modules\Gdpr\Models\Event.
 *
<<<<<<< HEAD
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $consent_id
 * @property string               $subject_id
 * @property string               $ip
 * @property string               $action
 * @property string               $payload
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property Consent|null         $consent
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $consent_id
 * @property string               $subject_id
 * @property string               $ip
 * @property string               $action
 * @property string               $payload
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property Consent|null         $consent
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $consent_id
 * @property string               $subject_id
 * @property string               $ip
 * @property string               $action
 * @property string               $payload
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property Consent|null         $consent
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $consent_id
 * @property string               $subject_id
 * @property string               $ip
 * @property string               $action
 * @property string               $payload
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property Consent|null         $consent
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $consent_id
 * @property string               $subject_id
 * @property string               $ip
 * @property string               $action
 * @property string               $payload
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property Consent|null         $consent
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $consent_id
 * @property string               $subject_id
 * @property string               $ip
 * @property string               $action
 * @property string               $payload
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property Consent|null         $consent
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $consent_id
 * @property string               $subject_id
 * @property string               $ip
 * @property string               $action
 * @property string               $payload
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property Consent|null         $consent
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
=======
 * @property string $id
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
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @property-read Consent|null $consent
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 *
 * @method static EventFactory factory($count = null, $state = [])
>>>>>>> 6ed19256f (.)
 * @method static Builder<static>|Event newModelQuery()
 * @method static Builder<static>|Event newQuery()
 * @method static Builder<static>|Event query()
 * @method static Builder<static>|Event whereAction($value)
 * @method static Builder<static>|Event whereConsentId($value)
 * @method static Builder<static>|Event whereCreatedAt($value)
 * @method static Builder<static>|Event whereCreatedBy($value)
 * @method static Builder<static>|Event whereDeletedAt($value)
 * @method static Builder<static>|Event whereDeletedBy($value)
 * @method static Builder<static>|Event whereId($value)
 * @method static Builder<static>|Event whereIp($value)
 * @method static Builder<static>|Event wherePayload($value)
 * @method static Builder<static>|Event whereSubjectId($value)
 * @method static Builder<static>|Event whereTreatmentId($value)
 * @method static Builder<static>|Event whereUpdatedAt($value)
 * @method static Builder<static>|Event whereUpdatedBy($value)
 *
<<<<<<< HEAD
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\Gdpr\Database\Factories\EventFactory factory($count = null, $state = [])
=======
 * @property-read ProfileContract|null $deleter
>>>>>>> 6ed19256f (.)
 *
 * @mixin \Eloquent
 */
class Event extends BaseModel
{
    use HasUuids;

<<<<<<< HEAD
=======
    // protected $table = 'event';

>>>>>>> 6ed19256f (.)
    public $fillable = [
        'id',
        'action',
        'treatment_id',
        'consent_id',
        'subject_id',
        'payload',
    ];

<<<<<<< HEAD
    protected $table = 'gdpr_events';

=======
>>>>>>> 6ed19256f (.)
    public function consent(): BelongsTo
    {
        return $this->belongsTo(Consent::class);
    }

    public function setPayloadAttribute(?string $value): void
    {
        $this->attributes['payload'] = Crypt::encrypt(json_encode($value, JSON_THROW_ON_ERROR));
    }

    public function setIpAttribute(?string $value): void
    {
        $this->attributes['ip'] = Crypt::encrypt($value);
    }
}
