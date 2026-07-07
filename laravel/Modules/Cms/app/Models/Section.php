<?php

declare(strict_types=1);

namespace Modules\Cms\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Cms\Database\Factories\SectionFactory;
use Modules\Cms\Models\Traits\HasBlocks;
use Modules\Tenant\Models\Traits\SushiToJsons;
use Modules\Xot\Contracts\ProfileContract;

/**
 * Modules\Cms\Models\Section.
 *
<<<<<<< HEAD
 * @property string $id
 *
 * @method static array<string, \Modules\Cms\Datas\BlockData> getBlocksBySlug(string $slug, ?string $side = null)
 *
=======
>>>>>>> 6ed19256f (.)
 * @property string                       $id
 * @property array<array-key, mixed>|null $name
 * @property string|null                  $slug
 * @property array<array-key, mixed>|null $blocks
 * @property Carbon|null                  $created_at
 * @property Carbon|null                  $updated_at
 * @property string|null                  $created_by
 * @property string|null                  $updated_by
 * @property ProfileContract|null         $creator
 * @property mixed                        $translations
 * @property ProfileContract|null         $updater
 *
 * @method static Builder<static>|Section newModelQuery()
 * @method static Builder<static>|Section newQuery()
 * @method static Builder<static>|Section query()
 * @method static Builder<static>|Section whereBlocks($value)
 * @method static Builder<static>|Section whereCreatedAt($value)
 * @method static Builder<static>|Section whereCreatedBy($value)
 * @method static Builder<static>|Section whereId($value)
 * @method static Builder<static>|Section whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Section whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Section whereLocale(string $column, string $locale)
 * @method static Builder<static>|Section whereLocales(string $column, array $locales)
 * @method static Builder<static>|Section whereName($value)
 * @method static Builder<static>|Section whereSlug($value)
 * @method static Builder<static>|Section whereUpdatedAt($value)
 * @method static Builder<static>|Section whereUpdatedBy($value)
 * @method static int                     count()
 * @method static Builder<static>|Section where($column, $operator = null, $value = null, $boolean = 'and')
 *
 * @property ProfileContract|null $deleter
 *
<<<<<<< HEAD
 * @method static SectionFactory                   factory($count = null, $state = [])
 * @method        array<int, array<string, mixed>> getSushiRows()
=======
 * @method static SectionFactory factory($count = null, $state = [])
>>>>>>> 6ed19256f (.)
 *
 * @mixin \Eloquent
 */
class Section extends BaseModelLang
{
    use HasBlocks;
    use SushiToJsons;

<<<<<<< HEAD
    /** @var list<string> */
    public array $translatable = [
=======
    /** @var array<int, string> */
    public $translatable = [
>>>>>>> 6ed19256f (.)
        'name',
        'blocks',
    ];

    /** @var list<string> */
    protected $fillable = [
        'name',
        'slug',
        'blocks',
    ];

<<<<<<< HEAD
    /** @var array<string, string> */
    protected $schema = [
=======
    protected array $schema = [
>>>>>>> 6ed19256f (.)
        'id' => 'integer',
        'name' => 'json',
        'slug' => 'string',
        'blocks' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_by' => 'string',
        'updated_by' => 'string',
    ];

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getRows(): array
    {
        return $this->getSushiRows();
<<<<<<< HEAD
=======

        /* @var array<int, array<string, mixed>> $typedRows */
>>>>>>> 6ed19256f (.)
    }

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    #[\Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'name' => 'array',
            'slug' => 'string',
            'blocks' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
