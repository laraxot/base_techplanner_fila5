<?php

declare(strict_types=1);

namespace Modules\Fixcity\Models;

use Modules\Xot\Models\XotBaseModel;

/** Shared Eloquent base for Fixcity domain models. */
abstract class BaseModel extends XotBaseModel
{
    protected $connection = 'fixcity';
}
