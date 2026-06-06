<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
<<<<<<< HEAD
use Illuminate\Support\Carbon;
=======
>>>>>>> 06ccbd93 (.)
use Modules\Xot\Contracts\ProfileContract;

/**
 * Team Permission Model.
 *
 * Represents a permission assigned to a user within a team context.
 *
<<<<<<< HEAD
 * @property string $id
 * @property string $team_id
 * @property string $user_id
 * @property string $permission
=======
 * @property string         $id
 * @property string         $team_id
 * @property string         $user_id
 * @property string         $permission
>>>>>>> 06ccbd93 (.)
 * @property \DateTime|null $created_at
 * @property \DateTime|null $updated_at
 * @property Team           $team
 * @property User           $user
 *
 * @method static Builder<static>|TeamPermission newModelQuery()
 * @method static Builder<static>|TeamPermission newQuery()
 * @method static Builder<static>|TeamPermission query()
 *
 * @mixin IdeHelperTeamPermission
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 *
 * @mixin \Eloquent
 */
class TeamPermission extends BaseModel
{
    /**
     * The database connection that should be used by the model.
<<<<<<< HEAD
=======
     *
     * @var string
>>>>>>> 06ccbd93 (.)
     */
    protected $connection = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'team_id',
        'user_id',
        'permission',
    ];

    /**
     * Get the team that owns the permission.
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get the user that owns the permission.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
