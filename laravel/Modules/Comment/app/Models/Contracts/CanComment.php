<?php

declare(strict_types=1);

namespace Modules\Comment\Models\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Comment\Enums\NotificationSubscriptionType;
use Modules\Comment\Support\CommentatorProperties;

/**
 * Capacità Eloquent: modello che può commentare (commentator).
 *
 * Firme loose come Spatie — PHP 8.4: vietato `getKey(): mixed`
 * (fatal vs Eloquent Model).
 *
 * @see Modules\Comment\docs\wiki\concepts\can-comment-contract-php84.md
 */
interface CanComment
{
    public function commentatorComments(): MorphMany;

    public function reactions(): MorphMany;

    public function commentatorProperties(): CommentatorProperties;

    /** @return int|string|null */
    public function getKey();

    /** @return string */
    public function getMorphClass();

    /**
     * @param mixed $instance
     *
     * @return void
     */
    public function notify($instance);

    /** @return void */
    public function subscribeToCommentNotifications(
        Model $hasComments,
        NotificationSubscriptionType $subscriptionType,
    );

    public function unsubscribeFromCommentNotifications(
        Model $hasComments,
    ): self;

    public function unsubscribeFromAllCommentNotifications(): self;

    public function notificationSubscriptionType(
        Model $hasComment,
    ): ?NotificationSubscriptionType;
}
