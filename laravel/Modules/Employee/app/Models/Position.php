<?php

declare(strict_types=1);

namespace Modules\Employee\Models;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\TechPlanner\Models\Profile;
use Modules\Employee\Database\Factories\PositionFactory;
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Employee\Database\Factories\PositionFactory;
use Modules\TechPlanner\Models\Profile;
=======
>>>>>>> 4b6b99016 (first commit)
=======
use Modules\Employee\Database\Factories\PositionFactory;
use Modules\TechPlanner\Models\Profile;
>>>>>>> dev

/**
 * Class Position.
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $department
 * @property int|null $level
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Employee> $employees
 * @property-read int|null $employees_count
 * @property-read Profile|null $creator
 * @property-read Profile|null $deleter
 * @property-read Profile|null $updater
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
>>>>>>> 4b6b99016 (first commit)
=======
 *
>>>>>>> dev
 * @method static PositionFactory factory($count = null, $state = [])
 * @method static Builder<static>|Position newModelQuery()
 * @method static Builder<static>|Position newQuery()
 * @method static Builder<static>|Position query()
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
>>>>>>> 4b6b99016 (first commit)
=======
 *
>>>>>>> dev
 * @mixin \Eloquent
 */
class Position extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'department',
        'level',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'level' => 'integer',
            'is_active' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the employees for the position.
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
