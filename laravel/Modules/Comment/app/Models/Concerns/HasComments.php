<?php

declare(strict_types=1);

namespace Modules\Comment\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;
use Modules\Comment\Models\Contracts\CanComment;
use Modules\Comment\Enums\NotificationSubscriptionType;
use Modules\Comment\Exceptions\CannotCreateComment;
use Modules\Comment\Models\Comment;
use Modules\Comment\Models\CommentNotificationSubscription;
use Modules\Comment\Support\CommentConfig;

trait HasComments
{
    public function comments(): MorphMany
    {
        return $this->morphMany(CommentConfig::commentModelClass(), 'commentable');
    }

    public function notificationSubscriptions(): MorphMany
    {
        return $this->morphMany(CommentConfig::commentNotificationSubscriptionModelClass(), 'commentable');
    }

    public function subscribers(?NotificationSubscriptionType $type = null): Collection
    {
        $subscriptions = $this
            ->notificationSubscriptions()
            ->when($type, fn (Builder $builder) => $builder->where('type', $type))
            ->with('subscriber')
            ->get();

        $subscribers = [];
        foreach ($subscriptions as $subscription) {
            if (! $subscription instanceof CommentNotificationSubscription) {
                continue;
            }

            $subscriber = $subscription->subscriber;
            if ($subscriber instanceof Model) {
                $subscribers[] = $subscriber;
            }
        }

        return collect($subscribers);
    }

    public function comment(string $text, ?CanComment $commentator = null): Comment
    {
        $commentator ??= auth()->user();

        if (! CommentConfig::allowAnonymousComments()) {
            if (! $commentator) {
                throw CannotCreateComment::userIsRequired();
            }
        }

        $parentId = $this::class === CommentConfig::commentModelClass()
            ? $this->getKey()
            : null;

        /** @var Comment $comment */
        $comment = $this->comments()->create([
            'commentator_id' => $commentator?->getKey() ?? null,
            'commentator_type' => $commentator?->getMorphClass() ?? null,
            'original_text' => $text,
            'parent_id' => $parentId,
        ]);

        if ($comment->shouldBeAutomaticallyApproved() && ! $comment->isApproved()) {
            $comment->forceFill(['approved_at' => now()])->save();
        }

        if ($comment->shouldBeAutomaticallyApproved()) {
            return $comment->refresh();
        }

        return $comment;
    }

    /**
     * @return Collection<int, CanComment>
     */
    public function participatingCommentators(): Collection
    {
        return $this->comments()
            ->distinct('commentator_id', 'commentator_type')
            ->get()
            ->map(function (Comment $comment): array {
                return [
                    'commentator_id' => $comment->commentator_id,
                    'commentator_type' => $comment->commentator_type,
                ];
            })
            ->filter(function (array $related): bool {
                return $related['commentator_type'] !== null;
            })
            ->groupBy('commentator_type')
            ->map(fn (Collection $related) => $related->pluck('commentator_id')->toArray())
            ->flatMap(function (array $ids, string $class) {
                if (! class_exists($class)) {
                    $resolved = Relation::getMorphedModel($class);
                    $class = is_string($resolved) ? $resolved : $class;
                }

                return $class::query()->whereIn((new $class)->getKeyName(), $ids)->get();
            });
    }

    abstract public function commentableName(): string;

    abstract public function commentUrl(): string;
}
