<?php

declare(strict_types=1);

namespace Modules\User\Enums;

<<<<<<< HEAD
enum SystemRole: string
{
=======
use Modules\Xot\Traits\EnumTrait;
enum SystemRole: string
{
    use EnumTrait;

>>>>>>> dev
    case SuperAdmin = '%';
}
