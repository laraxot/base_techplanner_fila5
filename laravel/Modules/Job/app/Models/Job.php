<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;
use Override;
use Webmozart\Assert\Assert;

use function Safe\json_decode;

/**
 * Modules\Job\Models\Job.
 *
 * @property-read Profile|null $creator
 * @property-read string|null $display_name
 * @property-read string $status
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|Job newModelQuery()
 * @method static Builder<static>|Job newQuery()
 * @method static Builder<static>|Job query()
 *
 * @property int $id
 * @property string $queue
 * @property array<array-key, mixed> $payload
 * @property int $attempts
 * @property int|null $reserved_at
 * @property int $available_at
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|Job whereAttempts($value)
 * @method static Builder<static>|Job whereAvailableAt($value)
 * @method static Builder<static>|Job whereCreatedAt($value)
 * @method static Builder<static>|Job whereCreatedBy($value)
 * @method static Builder<static>|Job whereId($value)
 * @method static Builder<static>|Job wherePayload($value)
 * @method static Builder<static>|Job whereQueue($value)
 * @method static Builder<static>|Job whereReservedAt($value)
 * @method static Builder<static>|Job whereUpdatedAt($value)
 * @method static Builder<static>|Job whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class Job extends BaseModel
{
    protected $fillable = [
        'id',
        'queue',
        'payload',
        'attempts',
        'reserved_at',
        'available_at',
        'created_at',
    ];

    public function getTable(): string
    {
        Assert::string(
            $res = config('queue.connections.database.table'),
            '['.__LINE__.']['.class_basename($this).']',
        );

        return $res;
    }

    /**
     * @return Attribute<string, never>
     */
    public function status(): Attribute
    {
        return Attribute::make(get: function (): string {
            $reservedAt = $this->attributes['reserved_at'] ?? null;
            if ($reservedAt !== null && $reservedAt > 0) {
                return 'running';
            }

            return 'waiting';
        });
    }

    public function getDisplayNameAttribute(): ?string
    {
        Assert::string($json = $this->attributes['payload'], __FILE__.':'.__LINE__.' - '.class_basename(self::class));
        $payload = json_decode($json, true);
        if (! is_array($payload)) {
            return null;
        }

        Assert::nullOrString($res = $payload['displayName'] ?? null);

        return $res;
    }

    #[Override]
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'queue' => 'string',
            'payload' => 'array',
            'attempts' => 'integer',
            'reserved_at' => 'integer',
            'available_at' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'created_by' => 'string',
            'updated_by' => 'string',
        ];
    }
}
