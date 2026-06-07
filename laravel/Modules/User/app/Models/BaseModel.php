<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\Xot\Models\XotBaseModel;

/**
 * Class BaseModel.
 */
abstract class BaseModel extends XotBaseModel
{
<<<<<<< HEAD
    /** @var string */
=======
>>>>>>> dev
    protected $connection = 'user';

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            // 'id' => 'string',
=======
            'id' => 'string',
>>>>>>> 4b6b99016 (first commit)
=======
            // 'id' => 'string',
>>>>>>> dev
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
    }
}
