<?php

declare(strict_types=1);

namespace Modules\Job\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Factory\GetFactoryAction;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Traits\Updater;
=======
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Models\XotBaseModel;
>>>>>>> dev

/**
 * Class BaseModel.
 *
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 */
<<<<<<< HEAD
abstract class BaseModel extends Model
{
    use HasFactory;

    // use Searchable;
    // //use Cachable;
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    /** @var bool */
    public $incrementing = true;

    /** @var bool */
    public $timestamps = true;

    /** @var int */
    protected $perPage = 30;

    /** @var string */
    protected $connection = 'job';

    /** @var string|null */
    protected $prefix;

    /** @var list<string> */
    protected $fillable = ['id'];

    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';

    /** @var list<string> */
    protected $hidden = [
        // 'password'
    ];

=======
abstract class BaseModel extends XotBaseModel
{
    /** @var string|null */
    protected $prefix;

>>>>>>> dev
    public function __construct(array $attributes = [])
    {
        if (isset($this->prefix)) {
            $this->table = $this->prefix.$this->table;
        }

        parent::__construct($attributes);
    }

<<<<<<< HEAD
    /**
     * ----
     * Create a new factory instance for the model.
     *
     * @return Factory<static>
     */
    protected static function newFactory()
    {
        return app(GetFactoryAction::class)->execute(static::class);
    }
=======
    public $incrementing = true;

    public $timestamps = true;

    protected $connection = 'job';

    /** @var list<string> */
    protected $fillable = ['id'];

    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';

    /** @var list<string> */
    protected $hidden = [];
>>>>>>> dev

    /** @return array<string, string> */
    protected function casts(): array
    {
<<<<<<< HEAD
        return [
            'id' => 'string',
            'uuid' => 'string',
            'published_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
=======
        return array_merge(parent::casts(), [
            'published_at' => 'datetime',
        ]);
>>>>>>> dev
    }
}
