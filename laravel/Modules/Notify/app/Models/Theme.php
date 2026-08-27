<?php

declare(strict_types=1);

namespace Modules\Notify\Models;

use Illuminate\Database\Eloquent\Model;

<<<<<<< .merge_file_gBSKC2
=======
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Theme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Theme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Theme query()
 *
 * @mixin \Eloquent
 */
>>>>>>> .merge_file_1WHikI
class Theme extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'name', 'description', 'colors', 'fonts',
        'version', 'is_active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'colors' => 'array',
            'fonts' => 'array',
        ];
    }
}
