<?php

/**
 * @see https://github.com/mooxphp/jobs/tree/main
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;

/**
 * Modules\Job\Models\JobsWaiting.
 *
 * @property-read Profile|null $creator
 * @property-read string|null $display_name
 * @property-read string $status
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|JobsWaiting newModelQuery()
 * @method static Builder<static>|JobsWaiting newQuery()
 * @method static Builder<static>|JobsWaiting query()
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
 * @method static Builder<static>|JobsWaiting whereAttempts($value)
 * @method static Builder<static>|JobsWaiting whereAvailableAt($value)
 * @method static Builder<static>|JobsWaiting whereCreatedAt($value)
 * @method static Builder<static>|JobsWaiting whereCreatedBy($value)
 * @method static Builder<static>|JobsWaiting whereId($value)
 * @method static Builder<static>|JobsWaiting wherePayload($value)
 * @method static Builder<static>|JobsWaiting whereQueue($value)
 * @method static Builder<static>|JobsWaiting whereReservedAt($value)
 * @method static Builder<static>|JobsWaiting whereUpdatedAt($value)
 * @method static Builder<static>|JobsWaiting whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class JobsWaiting extends Job {}
