<?php

declare(strict_types=1);

namespace Modules\Comment\Enums;

use Modules\Xot\Actions\Cast\SafeStringCastAction;

enum NotificationSubscriptionType: string
{
    case Participating = 'participating';
    case All = 'all';
    case None = 'none';

    public function description(): string
    {
        return match ($this) {
            self::Participating => SafeStringCastAction::cast(__('comments::notifications.enum_description_participating')),
            self::All => SafeStringCastAction::cast(__('comments::notifications.enum_description_all')),
            self::None => SafeStringCastAction::cast(__('comments::notifications.enum_description_none')),
        };
    }

    public function longDescription(): string
    {
        return match ($this) {
            self::Participating => SafeStringCastAction::cast(__('comments::notifications.enum_longdescription_participating')),
            self::All => SafeStringCastAction::cast(__('comments::notifications.enum_longdescription_all')),
            self::None => SafeStringCastAction::cast(__('comments::notifications.enum_longdescription_none')),
        };
    }
}
