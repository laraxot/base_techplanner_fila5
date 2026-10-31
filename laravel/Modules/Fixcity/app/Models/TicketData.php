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
 * @method static Builder<static>|TicketData newModelQuery()
 * @method static Builder<static>|TicketData newQuery()
 * @method static Builder<static>|TicketData query()
 * @property string $id
 * @property string|null $field_name
 * @property string|null $field_value
 * @property int|null $ticket_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder<static>|TicketData whereCreatedAt($value)
 * @method static Builder<static>|TicketData whereFieldName($value)
 * @method static Builder<static>|TicketData whereTicketId($value)
 * @method static Builder<static>|TicketData whereUpdatedAt($value)
 * @method static Builder<static>|TicketData whereFieldName($value)
 * @method static Builder<static>|TicketData whereFieldValue($value)
 */
class TicketData extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'field_name',
        'field_value',
        'ticket_id',
    ];
}
