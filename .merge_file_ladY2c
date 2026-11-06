<?php

declare(strict_types=1);

namespace Modules\Notify\Models;

<<<<<<< HEAD
use Modules\Xot\Models\XotBaseModel;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Factory\GetFactoryAction;
use Modules\Xot\Traits\Updater;
>>>>>>> 6ed19256f (.)
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class BaseModel.
 */
<<<<<<< HEAD
abstract class BaseModel extends XotBaseModel implements HasMedia
{
    use InteractsWithMedia;

    public $incrementing = true;

    public $timestamps = true;

=======
abstract class BaseModel extends Model implements HasMedia
{
    // use Searchable;
    use HasFactory;
    use InteractsWithMedia;
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
>>>>>>> 6ed19256f (.)
    protected $connection = 'notify';

    /** @var list<string> */
    protected $appends = [];

<<<<<<< HEAD
=======
    /** @var string */
>>>>>>> 6ed19256f (.)
    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';

    /** @var list<string> */
<<<<<<< HEAD
    protected $hidden = [];
=======
    protected $hidden = [
        // 'password'
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory<static>
     */
    protected static function newFactory()
    {
        return app(GetFactoryAction::class)->execute(static::class);
    }
>>>>>>> 6ed19256f (.)

    /** @return array<string, string> */
    protected function casts(): array
    {
<<<<<<< HEAD
        return array_merge(parent::casts(), [
            'published_at' => 'datetime',
        ]);
=======
        return [
            'id' => 'string',
            'uuid' => 'string',
            'published_at' => 'datetime',
            'verified_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
>>>>>>> 6ed19256f (.)
    }
}
