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
    /** @var list<string> */
    public array $translatable = [
=======
    /** @var array<int, string> */
    public $translatable = [
>>>>>>> 6ed19256f (.)
        'name',
        'blocks',
    ];

<<<<<<< HEAD
    /** @var array<string, string> */
<<<<<<< .merge_file_F9VyMp
    protected array $schema = [
=======
    protected $schema = [
=======
    /** @var list<string> */
    protected $fillable = [
        'name',
        'slug',
        'blocks',
    ];

    protected array $schema = [
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_MowVJM
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
     * @return array<string, string>
     */
<<<<<<< .merge_file_F9VyMp
=======
=======
     * @return array<string, string> */
>>>>>>> 6ed19256f (.)
    #[\Override]
>>>>>>> .merge_file_MowVJM
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
