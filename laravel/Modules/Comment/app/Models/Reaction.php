<?php

declare(strict_types=1);

namespace Modules\Comment\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Modules\Comment\Database\Factories\ReactionFactory;
use Modules\Xot\Contracts\ProfileContract;
use Spatie\Comments\Models\Reaction as BaseReaction;

/**
 * @property int $id
 * @property string|null $commentator_type
 * @property int|null $commentator_id
 * @property int $comment_id
 * @property string $reaction
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property-read Comment|null $comment
 * @property-read Model|\Eloquent $commentator
 *
 * @method static ReactionFactory factory($count = null, $state = [])
 * @method static Builder<static> newModelQuery()
 * @method static Builder<static> newQuery()
 * @method static Builder<static> query()
 * @method static Reaction create(array<string, mixed> $attributes = [])
 * @method static Reaction firstOrCreate(array<string, mixed> $attributes = [], array<string, mixed> $values = [])
 *
 * @mixin \Eloquent
 */
class Reaction extends BaseReaction
{
    protected $connection = 'comment';
}
