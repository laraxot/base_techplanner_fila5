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
 * @method static Builder<static>|TicketStatus newModelQuery()
 * @method static Builder<static>|TicketStatus newQuery()
 * @method static Builder<static>|TicketStatus query()
 * @property string $id
 * @property string|null $name
 * @property string|null $description
 * @property string $color
 * @property int $order
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder<static>|TicketStatus whereCreatedAt($value)
 * @method static Builder<static>|TicketStatus whereDeletedAt($value)
 * @method static Builder<static>|TicketStatus whereDescription($value)
 * @method static Builder<static>|TicketStatus whereId($value)
 * @method static Builder<static>|TicketStatus whereName($value)
 * @method static Builder<static>|TicketStatus whereOrder($value)
 * @method static Builder<static>|TicketStatus whereUpdatedAt($value)
 */
class TicketStatus extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'name',
        'description',
        'color',
        'order',
    ];
}
