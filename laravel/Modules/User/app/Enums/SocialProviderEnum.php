<?php

declare(strict_types=1);

namespace Modules\User\Enums;

<<<<<<< HEAD
use Filament\Support\Contracts\HasLabel;
use Modules\Xot\Traits\EnumTrait;

enum SocialProviderEnum: string implements HasLabel
{
    use EnumTrait;
    case GOOGLE = 'google';
=======
enum SocialProviderEnum: string
{    case GOOGLE = 'google';
>>>>>>> 8215f950 (.)
    case AUTH0 = 'auth0';
}
