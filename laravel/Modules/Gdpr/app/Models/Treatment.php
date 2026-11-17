<?php

declare(strict_types=1);

namespace Modules\Gdpr\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Carbon;
<<<<<<< HEAD
=======
use Modules\Gdpr\Database\Factories\TreatmentFactory;
>>>>>>> 6ed19256f (.)
use Modules\Xot\Contracts\ProfileContract;

/**
 * Modules\Gdpr\Models\Treatment.
 *
<<<<<<< HEAD
 * @property string               $id
 * @property int                  $active
 * @property int                  $required
 * @property string               $name
 * @property string               $description
 * @property string|null          $documentVersion
 * @property string|null          $documentUrl
 * @property int                  $weight
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property string               $id
 * @property int                  $active
 * @property int                  $required
 * @property string               $name
 * @property string               $description
 * @property string|null          $documentVersion
 * @property string|null          $documentUrl
 * @property int                  $weight
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property string               $id
 * @property int                  $active
 * @property int                  $required
 * @property string               $name
 * @property string               $description
 * @property string|null          $documentVersion
 * @property string|null          $documentUrl
 * @property int                  $weight
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property string               $id
 * @property int                  $active
 * @property int                  $required
 * @property string               $name
 * @property string               $description
 * @property string|null          $documentVersion
 * @property string|null          $documentUrl
 * @property int                  $weight
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property string               $id
 * @property int                  $active
 * @property int                  $required
 * @property string               $name
 * @property string               $description
 * @property string|null          $documentVersion
 * @property string|null          $documentUrl
 * @property int                  $weight
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property string               $id
 * @property int                  $active
 * @property int                  $required
 * @property string               $name
 * @property string               $description
 * @property string|null          $documentVersion
 * @property string|null          $documentUrl
 * @property int                  $weight
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property string               $id
 * @property int                  $active
 * @property int                  $required
 * @property string               $name
 * @property string               $description
 * @property string|null          $documentVersion
 * @property string|null          $documentUrl
 * @property int                  $weight
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
=======
 * @property string $id
 * @property int $active
 * @property int $required
 * @property string $name
 * @property string $description
 * @property string|null $documentVersion
 * @property string|null $documentUrl
 * @property int $weight
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 *
 * @method static TreatmentFactory factory($count = null, $state = [])
>>>>>>> 6ed19256f (.)
 * @method static Builder<static>|Treatment newModelQuery()
 * @method static Builder<static>|Treatment newQuery()
 * @method static Builder<static>|Treatment query()
 * @method static Builder<static>|Treatment whereActive($value)
 * @method static Builder<static>|Treatment whereCreatedAt($value)
 * @method static Builder<static>|Treatment whereCreatedBy($value)
 * @method static Builder<static>|Treatment whereDeletedAt($value)
 * @method static Builder<static>|Treatment whereDeletedBy($value)
 * @method static Builder<static>|Treatment whereDescription($value)
 * @method static Builder<static>|Treatment whereDocumentUrl($value)
 * @method static Builder<static>|Treatment whereDocumentVersion($value)
 * @method static Builder<static>|Treatment whereId($value)
 * @method static Builder<static>|Treatment whereName($value)
 * @method static Builder<static>|Treatment whereRequired($value)
 * @method static Builder<static>|Treatment whereUpdatedAt($value)
 * @method static Builder<static>|Treatment whereUpdatedBy($value)
 * @method static Builder<static>|Treatment whereWeight($value)
 *
<<<<<<< HEAD
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\Gdpr\Database\Factories\TreatmentFactory factory($count = null, $state = [])
=======
 * @property-read ProfileContract|null $deleter
>>>>>>> 6ed19256f (.)
 *
 * @mixin \Eloquent
 */
class Treatment extends BaseModel
{
    use HasUuids;

    // protected $table = 'treatment';
    public $incrementing = false;

<<<<<<< HEAD
    protected $fillable = [
        'id',
        'active',
        'required',
        'name',
        'description',
        'documentVersion',
        'documentUrl',
        'weight',
    ];
=======
    protected $fillable = [''];
>>>>>>> 6ed19256f (.)
}
