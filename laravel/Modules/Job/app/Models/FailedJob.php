<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\TechPlanner\Models\Profile;
use Override;

/**
 * Modules\Job\Models\FailedJob.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|FailedJob newModelQuery()
 * @method static Builder<static>|FailedJob newQuery()
 * @method static Builder<static>|FailedJob query()
 *
 * @property string $id
 * @property string $uuid
 * @property string $connection
 * @property string $queue
 * @property array<array-key, mixed> $payload
 * @property string $exception
 * @property string $failed_at
 *
 * @method static Builder<static>|FailedJob whereConnection($value)
 * @method static Builder<static>|FailedJob whereException($value)
 * @method static Builder<static>|FailedJob whereFailedAt($value)
 * @method static Builder<static>|FailedJob whereId($value)
 * @method static Builder<static>|FailedJob wherePayload($value)
 * @method static Builder<static>|FailedJob whereQueue($value)
 * @method static Builder<static>|FailedJob whereUuid($value)
 *
 * @mixin \Eloquent
 */
class FailedJob extends BaseModel
{
    protected $fillable = [
        'id',
        'uuid',
        'connection',
        'queue',
        'payload',
        'exception',
        'failed_at',
    ];

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
            'payload' => 'array',
        ];
    }
}
