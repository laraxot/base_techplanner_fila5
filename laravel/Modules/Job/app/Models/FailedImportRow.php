<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;
use Override;

/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|FailedImportRow newModelQuery()
 * @method static Builder<static>|FailedImportRow newQuery()
 * @method static Builder<static>|FailedImportRow query()
 *
 * @property string $id
 * @property array<array-key, mixed> $data
 * @property int $import_id
 * @property string|null $validation_error
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|FailedImportRow whereCreatedAt($value)
 * @method static Builder<static>|FailedImportRow whereCreatedBy($value)
 * @method static Builder<static>|FailedImportRow whereData($value)
 * @method static Builder<static>|FailedImportRow whereId($value)
 * @method static Builder<static>|FailedImportRow whereImportId($value)
 * @method static Builder<static>|FailedImportRow whereUpdatedAt($value)
 * @method static Builder<static>|FailedImportRow whereUpdatedBy($value)
 * @method static Builder<static>|FailedImportRow whereValidationError($value)
 *
 * @mixin \Eloquent
 */
class FailedImportRow extends BaseModel
{
    protected $fillable = [
        'id',
        'data',
        'import_id',
        'validation_error',
    ];

    #[Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'data' => 'json',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'payload' => 'array',
            'completed_at' => 'datetime',
            // 'updated_at' => 'datetime:Y-m-d H:00',
            // 'created_at' => 'datetime:Y-m-d',
            // 'created_at' => 'datetime:d/m/Y H:i'
        ];
    }
}
