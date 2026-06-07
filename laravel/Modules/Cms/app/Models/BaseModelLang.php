<?php

declare(strict_types=1);

namespace Modules\Cms\Models;

use Spatie\Translatable\HasTranslations;

/**
 * Class BaseModel.
 */
abstract class BaseModelLang extends BaseModel
{
    use HasTranslations;

<<<<<<< HEAD
    /** @var array<int, string> */
    public $translatable = [
        'name',
        'blocks',
    ];

    /** @var list<string> */
    protected $fillable = [
        'name',
        'slug',
        'blocks',
    ];

    protected array $schema = [
=======
    /** @var list<string> */
    public array $translatable = [
        'name',
        'blocks',
    ];

    /** @var array<string, string> */
    protected $schema = [
>>>>>>> dev
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
     * @return array<string, mixed>
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    /**
     * The attributes that should be mutated to dates.
     *
<<<<<<< HEAD
     * @return array<string, string> */
=======
     * @return array<string, string>
     */
>>>>>>> dev
    #[\Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'name' => 'string',
            'slug' => 'string',
            'blocks' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
