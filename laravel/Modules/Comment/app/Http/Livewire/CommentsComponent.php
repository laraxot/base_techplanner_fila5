<?php

declare(strict_types=1);

namespace Modules\Comment\Http\Livewire;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Comment\Enums\NotificationSubscriptionType;
use Modules\Comment\Models\Contracts\CanComment;
use Modules\Comment\Models\Contracts\Commentable;
use Modules\Comment\Support\CommentConfig;

class CommentsComponent extends Component
{
    use WithPagination;

    public ?Model $model = null;

    public string $text = '';

    public bool $writable = true;

    public bool $showAvatars = true;

    public bool $showNotificationOptions = false;

    public bool $newestFirst = false;

    public bool $showReplies = false;

    public bool $showReactions = false;

    public string $selectedNotificationSubscriptionType = '';

    public ?string $noCommentsText = null;

    /** @var array<string, string> */
    protected $listeners = [
        'delete' => '$refresh',
        'reply-created' => 'saveNotificationSubscription',
    ];

    public function mount(
        ?Model $model = null,
        bool $readOnly = false,
        ?bool $hideAvatars = null,
        bool $hideNotificationOptions = true,
        bool $newestFirst = false,
        bool $noReplies = true,
        bool $noReactions = true,
    ): void {
        $this->model = $model;
        $this->writable = ! $readOnly;
        $this->showReplies = ! $noReplies;
        $this->showReactions = ! $noReactions;
        $this->newestFirst = $newestFirst;
        $this->showNotificationOptions = ! $hideNotificationOptions;
        $this->showAvatars = $hideAvatars !== null ? ! $hideAvatars : CommentConfig::showAvatars();

        $user = auth()->user();
        if ($user instanceof CanComment && $this->model instanceof Commentable) {
            $notificationType = $user->notificationSubscriptionType($this->model);
        $this->selectedNotificationSubscriptionType = $notificationType !== null
            ? $notificationType->value
            : NotificationSubscriptionType::Participating->value;
        }
    }

    public function comment(): void
    {
        $this->validate(['text' => 'required|string|min:1']);

        $this->resolveCommentable()->comment($this->text);

        $this->text = '';

        $pageName = CommentConfig::paginationPageName();
        if ($this->newestFirst) {
            $this->resetPage($pageName);
        } else {
            $this->gotoPage($this->comments()->lastPage(), $pageName);
        }

        $this->saveNotificationSubscription();

        $this->dispatch('comment-added');
    }

    public function updateSelectedNotificationSubscriptionType(string $type): void
    {
        $this->selectedNotificationSubscriptionType = $type;

        $this->saveNotificationSubscription();
    }

    public function saveNotificationSubscription(): void
    {
        if (! $this->showNotificationOptions || ! $this->model instanceof Commentable) {
            return;
        }

        $currentUser = auth()->user();
        if (! $currentUser instanceof CanComment) {
            return;
        }

        $type = NotificationSubscriptionType::from($this->selectedNotificationSubscriptionType);

        if ($type === NotificationSubscriptionType::None) {
            $currentUser->unsubscribeFromCommentNotifications($this->model);

            return;
        }

        $currentUser->subscribeToCommentNotifications($this->model, $type);
    }

    #[Computed]
    public function comments(): LengthAwarePaginator
    {
        $query = $this->resolveCommentable()
            ->comments()
            ->with([
                'commentator',
                'nestedComments.commentator',
                'reactions.commentator',
                'nestedComments.reactions.commentator',
                'nestedComments' => function ($builder): void {
                    if ($builder instanceof HasMany && $this->newestFirst) {
                        $builder->latest();
                    }
                },
            ])
            ->when(
                $this->newestFirst,
                fn (Builder $builder) => $builder->latest(),
                fn (Builder $builder) => $builder->oldest(),
            );

        return $query->paginate(
            CommentConfig::paginationCount(),
            ['*'],
            CommentConfig::paginationPageName(),
        );
    }

    public function paginationView(): string
    {
        $theme = CommentConfig::paginationTheme();

        if (view()->exists($theme)) {
            return $theme;
        }

        if (view()->exists('livewire::'.$theme)) {
            return 'livewire::'.$theme;
        }

        return 'livewire::tailwind';
    }

    public function render(): View
    {
        /** @var view-string $viewName */
        $viewName = 'comment::livewire.comments';

        return view($viewName, $this->getViewData());
    }

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return [];
    }

    private function resolveCommentable(): Commentable
    {
        if (! $this->model instanceof Commentable) {
            throw new \InvalidArgumentException('CommentsComponent requires a Commentable model.');
        }

        return $this->model;
    }
}
