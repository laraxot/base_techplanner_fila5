<?php

declare(strict_types=1);

namespace Modules\Comment\Support;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Collection;
use Modules\Comment\Actions\ApproveCommentAction;
use Modules\Comment\Actions\ProcessCommentAction;
use Modules\Comment\Actions\RejectCommentAction;
use Modules\Comment\Models\Contracts\CanComment;
use Modules\Comment\Models\Comment;
use Modules\Comment\Models\CommentNotificationSubscription;
use Modules\Comment\Models\Reaction;
use Modules\Comment\Transformers\CommentTransformer;
use Webmozart\Assert\Assert;

/**
 * SSOT configurazione motore commenti (core + livewire UI).
 *
 * Durante la migrazione le action/policy possono ancora risolvere classi Spatie via config.
 */
class CommentConfig
{
    /** @return list<string> */
    public static function allowedReactions(): array
    {
        $reactions = config('comments.allowed_reactions', []);
        if (! is_array($reactions)) {
            return [];
        }

        return array_values(array_filter($reactions, is_string(...)));
    }

    public static function allowAnonymousComments(): bool
    {
        return (bool) config('comments.allow_anonymous_comments', false);
    }

    public static function automaticallyApproveAllComments(): bool
    {
        return (bool) config('comments.automatically_approve_all_comments');
    }

    /** @return class-string<CanComment>|null */
    public static function commentatorModelClass(): ?string
    {
        $class = config('comments.models.commentator');
        if (! is_string($class) || $class === '') {
            return null;
        }
        Assert::classExists($class);

        /** @var class-string<CanComment> $class */
        return $class;
    }

    public static function commentatorModelNameField(): string
    {
        return (string) config('comments.models.name', 'name');
    }

    public static function commentatorModelAvatarField(): string
    {
        return (string) config('comments.models.avatar', 'avatar');
    }

    /** @return class-string<Comment> */
    public static function commentModelClass(): string
    {
        return self::resolveModelClass(
            'comments.models.comment',
            Comment::class,
            Comment::class,
        );
    }

    /** @return class-string<CommentNotificationSubscription> */
    public static function commentNotificationSubscriptionModelClass(): string
    {
        return self::resolveModelClass(
            'comments.models.comment_notification_subscription',
            CommentNotificationSubscription::class,
            CommentNotificationSubscription::class,
        );
    }

    public static function gravatarDefaultImage(): string
    {
        return (string) config('comments.gravatar.default_image', 'mp');
    }

    /** @return class-string<Reaction> */
    public static function reactionModelClass(): string
    {
        return self::resolveModelClass(
            'comments.models.reaction',
            Reaction::class,
            Reaction::class,
        );
    }

    public static function processCommentAction(): ProcessCommentAction
    {
        $action = self::resolveAction('comments.actions.process_comment');
        Assert::isInstanceOf($action, ProcessCommentAction::class);

        return $action;
    }

    public static function approveCommentAction(): ApproveCommentAction
    {
        $action = self::resolveAction('comments.actions.approve_comment');
        Assert::isInstanceOf($action, ApproveCommentAction::class);

        return $action;
    }

    public static function rejectCommentAction(): RejectCommentAction
    {
        $action = self::resolveAction('comments.actions.reject_comment');
        Assert::isInstanceOf($action, RejectCommentAction::class);

        return $action;
    }

    public static function sendNotificationsForPendingCommentAction(): object
    {
        return self::resolveAction('comments.actions.send_notifications_for_pending_comment');
    }

    public static function sendNotificationsForApprovedCommentAction(): object
    {
        return self::resolveAction('comments.actions.send_notifications_for_approved_comment');
    }

    public static function resolveMentionsAutocompleteAction(): object
    {
        return self::resolveAction('comments.actions.resolve_mentions_autocomplete');
    }

    /** @return Collection<int, CommentTransformer> */
    public static function commentTransformers(): Collection
    {
        $transformers = config('comments.comment_transformers', []);
        if (! is_array($transformers)) {
            /** @var Collection<int, CommentTransformer> $empty */
            $empty = collect();

            return $empty;
        }

        /** @var list<CommentTransformer> $resolved */
        $resolved = [];
        foreach ($transformers as $class) {
            if (! is_string($class)) {
                continue;
            }
            $instance = app($class);
            Assert::isInstanceOf($instance, CommentTransformer::class);
            $resolved[] = $instance;
        }

        return self::transformerCollection($resolved);
    }

    public static function commentSanitizer(): CommentSanitizer
    {
        $className = config('comments.comment_sanitizer', CommentSanitizer::class);
        $resolved = is_string($className) ? $className : CommentSanitizer::class;
        $sanitizer = app($resolved);
        Assert::isInstanceOf($sanitizer, CommentSanitizer::class);

        return $sanitizer;
    }

    /** @return array<string, list<string>> */
    public static function allowedAttributes(): array
    {
        $attributes = config('comments.allowed_attributes', []);
        if (! is_array($attributes)) {
            return [];
        }

        $normalized = [];
        foreach ($attributes as $attribute => $elements) {
            if (! is_string($attribute) || ! is_array($elements)) {
                continue;
            }
            $normalized[$attribute] = array_values(array_filter($elements, is_string(...)));
        }

        return $normalized;
    }

    public static function notificationsEnabled(): bool
    {
        return (bool) config('comments.notifications.enabled', true);
    }

    public static function pendingCommentNotification(Comment $comment): Notification
    {
        $notificationClass = self::resolveNotificationClass('comments.notifications.notifications.pending_comment');
        $notification = app($notificationClass, ['comment' => $comment]);
        Assert::isInstanceOf($notification, Notification::class);

        return $notification;
    }

    public static function approvedCommentNotification(Comment $comment, CanComment $commentator): Notification
    {
        $notificationClass = self::resolveNotificationClass('comments.notifications.notifications.approved_comment');
        $notification = app($notificationClass, compact('comment', 'commentator'));
        Assert::isInstanceOf($notification, Notification::class);

        return $notification;
    }

    public static function notificationMailFromAddress(): string
    {
        return (string) config('comments.notifications.mail.from.address', config('mail.from.address', ''));
    }

    public static function notificationMailFromName(): string
    {
        return (string) config('comments.notifications.mail.from.name', config('mail.from.name', ''));
    }

    public static function mentionsEnabled(): bool
    {
        return (bool) config('comments.mentions.enabled');
    }

    public static function autoloadFontAwesome(): bool
    {
        return (bool) config('comments.ui.autoload_fontawesome', true);
    }

    public static function showAvatarsInMentionsAutocomplete(): bool
    {
        return (bool) config('comments.ui.show_avatars_in_mentions_autocomplete', true);
    }

    public static function editor(): string
    {
        return (string) config('comments.ui.editor', 'comments::editors.easymde');
    }

    /** @return class-string */
    public static function commentPolicyClass(): string
    {
        return self::resolveClassString(
            'comments.policies.comment',
            \Modules\Comment\Policies\CommentPolicy::class,
        );
    }

    /** @return class-string */
    public static function reactionPolicyClass(): string
    {
        return self::resolveClassString(
            'comments.policies.reaction',
            \Modules\Comment\Policies\ReactionPolicy::class,
        );
    }

    public static function showAvatars(): bool
    {
        return (bool) config('comments.ui.show_avatars', true);
    }

    public static function paginationCount(): int
    {
        return (int) config('comments.pagination.results', 10_000);
    }

    public static function paginationPageName(): string
    {
        return (string) config('comments.pagination.page_name', 'page');
    }

    public static function paginationTheme(): string
    {
        return (string) config('comments.pagination.theme', 'tailwind');
    }

    /**
     * @template T of object
     *
     * @param  class-string<T>  $default
     *
     * @return class-string<T>
     */
    private static function resolveModelClass(string $key, string $default, string $_expected): string
    {
        $class = config($key, $default);
        if (! is_string($class) || $class === '') {
            return $default;
        }
        Assert::classExists($class);

        /** @var class-string<T> $class */
        return $class;
    }

    /**
     * @param class-string $default
     * @return class-string
     */
    private static function resolveClassString(string $key, string $default): string
    {
        $class = config($key, $default);
        if (! is_string($class) || $class === '') {
            return $default;
        }
        if (! class_exists($class)) {
            throw new \InvalidArgumentException("Configured class does not exist: {$class}");
        }

        return $class;
    }

    /**
     * @param list<CommentTransformer> $items
     * @return Collection<int, CommentTransformer>
     */
    private static function transformerCollection(array $items): Collection
    {
        return new Collection($items);
    }

    private static function resolveAction(string $key): object
    {
        $class = config($key);
        if (! is_string($class) || $class === '') {
            throw new \InvalidArgumentException("Missing config key: {$key}");
        }
        Assert::classExists($class);
        $action = app($class);
        Assert::object($action);

        return $action;
    }

    /** @return class-string */
    private static function resolveNotificationClass(string $key): string
    {
        $class = config($key);
        if (! is_string($class) || $class === '') {
            throw new \InvalidArgumentException("Missing config key: {$key}");
        }
        Assert::classExists($class);

        return $class;
    }

}
