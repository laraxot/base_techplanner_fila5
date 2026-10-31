<?php

declare(strict_types=1);

namespace Modules\Fixcity\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static Builder<static>|Ticket newModelQuery()
 * @method static Builder<static>|Ticket newQuery()
 * @method static Builder<static>|Ticket query()
 * @property string $id
 * @property string|null $title
 * @property string|null $description
 * @property string $status
 * @property string $priority
 * @property string|null $category
 * @property Carbon|null $due_date
 * @property int|null $assignee_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder<static>|Ticket whereCreatedAt($value)
 * @method static Builder<static>|Ticket whereDueDate($value)
 * @method static Builder<static>|Ticket whereId($value)
 * @method static Builder<static>|Ticket wherePriority($value)
 * @method static Builder<static>|Ticket whereUpdatedAt($value)
 * @method static Builder<static>|Ticket whereTitle($value)
 * @method static Builder<static>|Ticket whereCategory($value)
 * @method static Builder<static>|Ticket whereStatus($value)
 */
class Ticket extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'category',
        'due_date',
        'assignee_id',
    ];
}
