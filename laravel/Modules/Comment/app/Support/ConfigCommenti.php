<?php

declare(strict_types=1);

namespace Modules\Comment\Support;

use Illuminate\Support\Str;

/**
 * Configuration for the Comment module.
 * Italian-named replacement for Spatie Config.
 */
class ConfigCommenti
{
    /**
     * Get the comment model class.
     */
    public static function modelloCommento(): string
    {
        return \Modules\Comment\Models\Comment::class;
    }

    /**
     * Get the reaction model class.
     */
    public static function modelloReazione(): string
    {
        return \Modules\Comment\Models\Reaction::class;
    }

    /**
     * Get the comment notification subscription model class.
     */
    public static function modelloSottoscrizioneNotifica(): string
    {
        return \Modules\Comment\Models\CommentNotificationSubscription::class;
    }

    /**
     * Get the name field for the commentator model.
     */
    public static function campoNomeModelloCommentatore(): string
    {
        $value = config('commenti.commentator_name_field', 'name');

        return is_string($value) ? $value : 'name';
    }

    /**
     * Get the avatar field for the commentator model.
     */
    public static function campoAvatarModelloCommentatore(): string
    {
        $value = config('commenti.commentator_avatar_field', 'avatar_url');

        return is_string($value) ? $value : 'avatar_url';
    }

    /**
     * Get the default Gravatar image.
     */
    public static function immagineDefaultGravatar(): string
    {
        $value = config('commenti.gravatar_default_image', 'mp');

        return is_string($value) ? $value : 'mp';
    }

    /**
     * Get the markdown parser.
     */
    public static function markdownParser(): callable
    {
        $value = config('commenti.markdown_parser', fn (string $text) => Str::markdown($text));

        return is_callable($value) ? $value : fn (string $text): string => Str::markdown($text);
    }

    /**
     * Get the mentions parser.
     */
    public static function mentionsParser(): callable
    {
        $value = config('commenti.mentions_parser', fn (string $text) => $text);

        return is_callable($value) ? $value : fn (string $text): string => $text;
    }

    /**
     * Check if comments are threaded.
     */
    public static function commentiThreaded(): bool
    {
        return (bool) config('commenti.threaded', true);
    }

    /**
     * Check if comments require approval.
     */
    public static function richiedeApprovazione(): bool
    {
        return (bool) config('commenti.require_approval', false);
    }

    /**
     * Get the default subscription type.
     */
    public static function tipoSottoscrizioneDefault(): string
    {
        $value = config('commenti.default_subscription_type', 'participating');

        return is_string($value) ? $value : 'participating';
    }
}
