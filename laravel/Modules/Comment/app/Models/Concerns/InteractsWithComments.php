<?php

declare(strict_types=1);

namespace Modules\Comment\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\URL;
use Modules\Comment\Enums\NotificationSubscriptionType;
use Modules\Comment\Support\CommentConfig;
use Modules\Comment\Support\CommentatorProperties;

/**
 * CanComment senza RoutesNotifications — BaseUser usa già Notifiable.
 */
trait InteractsWithComments
{
    public function commentatorComments(): MorphMany
    {
        return $this->morphMany(CommentConfig::commentModelClass(), 'commentator');
    }

    public function subscriberNotificationSubscriptions(): MorphMany
    {
        return $this->morphMany(CommentConfig::commentNotificationSubscriptionModelClass(), 'subscriber');
    }

    public function reactions(): MorphMany
    {
        return $this->morphMany(CommentConfig::reactionModelClass(), 'commentator');
    }

    public function commentatorProperties(): CommentatorProperties
    {
        $email = (string) ($this->email ?? '');
        $segment = md5(strtolower($email));
        $defaultImage = CommentConfig::gravatarDefaultImage();
        $nameField = CommentConfig::commentatorModelNameField();
        $avatarField = CommentConfig::commentatorModelAvatarField();
        $name = is_string($this->{$nameField} ?? null) ? $this->{$nameField} : '';
        $avatar = $this->{$avatarField} ?? null;
        $avatarUrl = is_string($avatar) && $avatar !== ''
            ? $avatar
            : "https://www.gravatar.com/avatar/{$segment}?d={$defaultImage}";

        return CommentatorProperties::email($email)
            ->name($name)
            ->avatar($avatarUrl);
    }

    public function subscribeToCommentNotifications(
        Model $hasComment,
        NotificationSubscriptionType $subscriptionType
    ): self {
        $this->subscriberNotificationSubscriptions()->updateOrCreate([
            'commentable_type' => $hasComment->getMorphClass(),
            'commentable_id' => $hasComment->getKey(),
        ], [
            'type' => $subscriptionType->value,
        ]);

        return $this;
    }

    public function unsubscribeFromCommentNotifications(Model $hasComments): self
    {
        $this->subscribeToCommentNotifications($hasComments, NotificationSubscriptionType::None);

        return $this;
    }

    public function unsubscribeFromCommentNotificationsUrl(Model $hasComments): ?string
    {
        $notificationSubscription = $this->subscriberNotificationSubscriptions()
            ->where('commentable_type', $hasComments->getMorphClass())
            ->where('commentable_id', $hasComments->getKey())
            ->first();

        if (! $notificationSubscription) {
            return null;
        }

        return URL::signedRoute(
            'comments::notifications.unsubscribe',
            [$notificationSubscription],
            now()->addWeek(),
        );
    }

    public function unsubscribeFromAllCommentNotifications(): self
    {
        $this->subscriberNotificationSubscriptions()->delete();

        return $this;
    }

    public function unsubscribeFromAllCommentNotificationsUrl(): string
    {
        return URL::signedRoute(
            'comments::notifications.unsubscribeAll',
            [static::class, $this->getKey()],
            now()->addWeek(),
        );
    }

    public function notificationSubscriptionType(Model $hasComments): ?NotificationSubscriptionType
    {
        $subscription = $this
            ->subscriberNotificationSubscriptions()
            ->where('commentable_type', $hasComments->getMorphClass())
            ->where('commentable_id', $hasComments->getKey())
            ->first();

        if ($subscription === null) {
            return null;
        }

        $type = $subscription->getAttribute('type');

        if ($type instanceof NotificationSubscriptionType) {
            return $type;
        }

        if (is_string($type) && $type !== '') {
            return NotificationSubscriptionType::from($type);
        }

        return null;
    }
}
