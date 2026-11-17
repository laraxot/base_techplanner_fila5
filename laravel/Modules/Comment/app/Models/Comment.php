<?php

declare(strict_types=1);

namespace Modules\Comment\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Modules\Comment\Database\Factories\CommentFactory;
use function Safe\preg_match_all;
use Modules\Comment\Exceptions\CannotSendPendingCommentNotification;
use Modules\Comment\Models\Concerns\HasComments;
use Modules\Comment\Models\Contracts\CanComment;
use Modules\Comment\Models\Contracts\Commentable;
use Modules\Comment\Support\CommentConfig;
use Modules\Comment\Support\CommentatorProperties;
use Modules\Xot\Models\Traits\HasXotFactory;
use Spatie\Comments\Notifications\PendingCommentNotification;

/**
 * @property int $id
 * @property string $original_text
 * @property string|null $text
 * @property string|null $commentator_type
 * @property int|string|null $commentator_id
 * @property string|null $commentable_type
 * @property int|string|null $commentable_id
 * @property int|null $parent_id
 * @property Carbon|null $approved_at
 * @property array<mixed, mixed>|null $extra
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Model|null $commentable
 * @property-read Model|null $commentator
 *
 * @method static CommentFactory factory($count = null, $state = [])
 * @method static Builder|static newModelQuery()
 * @method static Builder|static newQuery()
 * @method static Builder|static query()
 * @method static Builder|static approved()
 * @method static Builder|static pending()
 */
class Comment extends Model implements Commentable
{
    use HasComments;
    use HasXotFactory;

    protected $connection = 'comment';

    protected $guarded = [];

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'extra' => 'array',
            'approved_at' => 'datetime',
        ];
    }

    public static function booted(): void
    {
        static::saving(function (Comment $comment): void {
            CommentConfig::processCommentAction()->execute($comment);

            $connection = $comment->getConnectionName();
            if (! is_string($connection) || $connection === '') {
                $default = config('database.default');
                $connection = is_string($default) ? $default : 'sqlite';
            }
            $table = $comment->getTable();

            if (Schema::connection($connection)->hasColumn($table, 'comment')) {
                $comment->setAttribute(
                    'comment',
                    $comment->text ?? $comment->original_text,
                );
            }

            if (Schema::connection($connection)->hasColumn($table, 'post_id') && $comment->getAttribute('post_id') === null) {
                $comment->setAttribute('post_id', 0);
            }

            if (Schema::connection($connection)->hasColumn($table, 'user_id') && $comment->getAttribute('user_id') === null) {
                $comment->setAttribute('user_id', 0);
            }
        });
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function commentator(): MorphTo
    {
        return $this->morphTo();
    }

    public function parentComment(): BelongsTo
    {
        return $this->belongsTo(CommentConfig::commentModelClass(), 'parent_id');
    }

    public function nestedComments(): HasMany
    {
        return $this->hasMany(CommentConfig::commentModelClass(), 'parent_id');
    }

    public function topLevel(): self
    {
        if ($this->isTopLevel()) {
            return $this;
        }

        $commentable = $this->commentable;

        if ($commentable instanceof self) {
            $result = $commentable->topLevel();

            return $result;
        }

        return $this;
    }

    public function isTopLevel(): bool
    {
        return $this->parent_id === null;
    }

    public function scopeTopLevel(Builder $builder): void
    {
        $builder->whereNull('parent_id');
    }

    public function scopePending(Builder $query): void
    {
        $query->whereNull('approved_at');
    }

    public function scopeApproved(Builder $query): void
    {
        $query->whereNotNull('approved_at');
    }

    public function reactions(): HasMany
    {
        return $this->hasMany(CommentConfig::reactionModelClass());
    }

    public function findReaction(string $reaction, ?CanComment $commentator = null): ?Reaction
    {
        $commentator ??= auth()->user();

        if (! $commentator instanceof CanComment) {
            return null;
        }

        $found = $this->reactions()
            ->where('commentator_id', $commentator->getKey())
            ->where('commentator_type', $commentator->getMorphClass())
            ->where('reaction', $reaction)
            ->first();

        return $found instanceof Reaction ? $found : null;
    }

    public function unsortedReactionCounts(): HasMany
    {
        return $this->reactions()
            ->select('reaction', DB::raw('count(*) as count'))
            ->groupBy('reaction');
    }

    /** @return list<array{reaction: string, count: int}> */
    public function reactionCounts(): array
    {
        $allowedReactions = CommentConfig::allowedReactions();

        /** @var \Illuminate\Database\Eloquent\Collection<int, Reaction> $reactions */
        $reactions = $this->unsortedReactionCounts()->get();

        $sorted = $reactions
            ->sortBy(function (Reaction $reaction) use ($allowedReactions): int {
                $index = array_search($reaction->reaction, $allowedReactions, true);

                return $index === false ? PHP_INT_MAX : $index;
            })
            ->values();

        $counts = [];
        foreach ($sorted as $reaction) {
            $rawCount = $reaction->getAttribute('count');
            $counts[] = [
                'reaction' => $reaction->reaction,
                'count' => is_numeric($rawCount) ? (int) $rawCount : 0,
            ];
        }

        return $counts;
    }

    public function react(string $reaction, ?CanComment $commentator = null): self
    {
        $commentator ??= auth()->user();

        $this->reactions()->firstOrCreate([
            'commentator_id' => $commentator?->getKey(),
            'commentator_type' => $commentator?->getMorphClass(),
            'reaction' => $reaction,
        ]);

        return $this;
    }

    public function deleteReaction(string $reaction, ?CanComment $commentator = null): self
    {
        $commentator ??= auth()->user();

        if (! $commentator instanceof CanComment) {
            return $this;
        }

        $this
            ->reactions()
            ->where('commentator_id', $commentator->getKey())
            ->where('commentator_type', $commentator->getMorphClass())
            ->where('reaction', $reaction)
            ->delete();

        return $this;
    }

    /**
     * @return Collection<int, CanComment>
     */
    public function participatingCommentators(): Collection
    {
        $commentable = $this->commentable;
        if (! is_object($commentable) || ! method_exists($commentable, 'getKey') || ! method_exists($commentable, 'getMorphClass')) {
            /** @var Collection<int, CanComment> $empty */
            $empty = collect();

            return $empty;
        }

        $comments = self::query()
            ->distinct('commentator_id', 'commentator_type')
            ->where('commentable_id', $commentable->getKey())
            ->where('commentable_type', $commentable->getMorphClass())
            ->approved()
            ->get();

        $idsByClass = [];
        foreach ($comments as $comment) {
            $class = $comment->commentator_type;
            if (! is_string($class) || $class === '') {
                continue;
            }
            if ($class === $this->commentator_type && $comment->commentator_id === $this->commentator_id) {
                continue;
            }
            $idsByClass[$class][] = $comment->commentator_id;
        }

        $commentators = [];
        foreach ($idsByClass as $class => $ids) {
            $resolvedClass = str_contains($class, '\\') ? $class : Relation::getMorphedModel($class);
            if (! is_string($resolvedClass) || ! is_a($resolvedClass, Model::class, true)) {
                continue;
            }

            $model = new $resolvedClass;
            foreach ($resolvedClass::query()->whereIn($model->getKeyName(), $ids)->get() as $commentator) {
                if ($commentator instanceof CanComment) {
                    $commentators[] = $commentator;
                }
            }
        }

        /** @var Collection<int, CanComment> $result */
        $result = collect($commentators);

        return $result;
    }

    public function commentableName(): string
    {
        $commentable = $this->commentable;
        if (is_object($commentable) && method_exists($commentable, 'commentableName')) {
            $name = $commentable->commentableName();

            return is_string($name) ? $name : '';
        }

        return '';
    }

    public function commentUrl(): string
    {
        $top = $this->topLevel();
        $commentable = $top->commentable;
        $base = '';
        if (is_object($commentable) && method_exists($commentable, 'commentUrl')) {
            $base = (string) $commentable->commentUrl();
        }

        return $base."#comment-{$this->id}";
    }

    public function commentatorProperties(): ?CommentatorProperties
    {
        $commentator = $this->commentator;

        if (! $commentator instanceof CanComment) {
            return null;
        }

        return $commentator->commentatorProperties();
    }

    public function madeBy(?CanComment $commentator): bool
    {
        $ownCommentator = $this->commentator;
        if (! $ownCommentator instanceof CanComment || ! $commentator instanceof CanComment) {
            return false;
        }

        return $commentator->getMorphClass() === $ownCommentator->getMorphClass()
            && $commentator->getKey() === $ownCommentator->getKey();
    }

    public function wasMadeByDeletedCommentator(): bool
    {
        if ($this->wasMadeAnonymously()) {
            return false;
        }

        return $this->commentator === null;
    }

    public function wasMadeAnonymously(): bool
    {
        return $this->commentator_id === null;
    }

    public function approve(): self
    {
        CommentConfig::approveCommentAction()->execute($this);

        return $this;
    }

    public function reject(): self
    {
        CommentConfig::rejectCommentAction()->execute($this);

        return $this;
    }

    public function isPending(): bool
    {
        return ! $this->isApproved();
    }

    public function isApproved(): bool
    {
        return $this->approved_at !== null;
    }

    public function approveUrl(): string
    {
        return URL::signedRoute('comments::comment.approve', $this, now()->addWeek());
    }

    public function rejectUrl(): string
    {
        return URL::signedRoute('comments::comment.reject', $this, now()->addWeek());
    }

    public function shouldBeAutomaticallyApproved(): bool
    {
        return CommentConfig::automaticallyApproveAllComments();
    }

    public function getApprovingUsers(): Collection
    {
        $sendToClosure = PendingCommentNotification::$sendTo;

        if (! is_callable($sendToClosure)) {
            return collect();
        }

        $users = once(fn () => $sendToClosure($this));

        if (is_iterable($users)) {
            $notifiableUsers = [];
            foreach ($users as $user) {
                if (! is_object($user) || ! self::implementsNotifiable($user)) {
                    throw CannotSendPendingCommentNotification::doesNotImplementNotifiable();
                }

                $notifiableUsers[] = $user;
            }

            /** @var Collection<int, Model> $result */
            $result = collect($notifiableUsers);

            return $result;
        }

        if (is_object($users)) {
            if (! self::implementsNotifiable($users)) {
                throw CannotSendPendingCommentNotification::doesNotImplementNotifiable();
            }

            return collect([$users]);
        }

        throw CannotSendPendingCommentNotification::doesNotImplementNotifiable();
    }

    public function getMentionees(): Collection
    {
        preg_match_all('/data-mention="([^"]+)"/', $this->original_text, $matches);
        $mentioneeIds = $matches[1];
        if ($mentioneeIds === []) {
            return collect();
        }

        $modelClass = CommentConfig::commentatorModelClass();
        if ($modelClass === null || ! is_a($modelClass, Model::class, true)) {
            return collect();
        }

        return $modelClass::query()
            ->whereIn((new $modelClass)->getKeyName(), $mentioneeIds)
            ->get();
    }

    protected static function implementsNotifiable(object $object): bool
    {
        $traitsUsed = trait_uses_recursive($object);

        return in_array(Notifiable::class, $traitsUsed, true);
    }

    protected static function newFactory(): CommentFactory
    {
        return CommentFactory::new();
    }
}
