<?php

declare(strict_types=1);

namespace Modules\Employee\Models;

use Modules\TechPlanner\Models\Profile;
use Modules\Employee\Database\Factories\DepartmentFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
<<<<<<< HEAD
use Modules\Employee\Database\Factories\DepartmentFactory;
<<<<<<< .merge_file_D45e6L
use Modules\Xot\Contracts\ProfileContract;
=======
use Modules\TechPlanner\Models\Profile;
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_DpJYkm

/**
 * Class Department.
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $manager_id
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Employee> $employees
 * @property-read int|null $employees_count
<<<<<<< .merge_file_D45e6L
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $deleter
 * @property-read ProfileContract|null $updater
=======
 * @property-read Profile|null $creator
 * @property-read Profile|null $deleter
 * @property-read Profile|null $updater
<<<<<<< HEAD
>>>>>>> .merge_file_DpJYkm
 *
=======
>>>>>>> 6ed19256f (.)
 * @method static DepartmentFactory factory($count = null, $state = [])
 * @method static Builder<static>|Department newModelQuery()
 * @method static Builder<static>|Department newQuery()
 * @method static Builder<static>|Department query()
 *
 * @mixin \Eloquent
 */
class Department extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'manager_id',
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
            'is_active' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the employees for the department.
     *
     * @return HasMany<Employee, $this>
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
