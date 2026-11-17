<?php

declare(strict_types=1);

namespace Modules\Comment\Support;

class Gravatar
{
    public static function url(string $email): string
    {
        $defaultImage = CommentConfig::gravatarDefaultImage();
        $segment = md5(strtolower($email));

        return "https://www.gravatar.com/avatar/{$segment}?d={$defaultImage}";
    }
}
