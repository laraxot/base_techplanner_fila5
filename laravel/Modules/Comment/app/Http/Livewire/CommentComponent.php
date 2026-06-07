<?php

declare(strict_types=1);

namespace Modules\Comment\Http\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Modules\Comment\Models\Comment;
use Modules\Comment\Support\CommentConfig;

class CommentComponent extends Component
{
    use AuthorizesRequests;

    public ?Comment $comment = null;

    public int $commentId = 0;

    public bool $showAvatar = true;

    public bool $newestFirst = false;

    public bool $writable = true;

    public string $replyText = '';

    public bool $isEditing = false;

    public string $editText = '';

    public bool $showReplies = false;

    public bool $showReactions = false;

    public function mount(
        Comment $comment,
        bool $showAvatar = true,
        bool $newestFirst = false,
        bool $writable = true,
        bool $showReplies = false,
        bool $showReactions = false,
    ): void {
        $this->commentId = $comment->id;
        $this->comment = $comment;
        $this->showAvatar = $showAvatar;
        $this->newestFirst = $newestFirst;
        $this->writable = $writable;
        $this->showReplies = $showReplies;
        $this->showReactions = $showReactions;
    }

    public function startEditing(): void
    {
        if (! $this->comment) {
            return;
        }

        $this->isEditing = true;
        $this->editText = $this->comment->original_text;
    }

    public function stopEditing(): void
    {
        $this->isEditing = false;
    }

    public function edit(): void
    {
        if (! $this->comment) {
            return;
        }

        $this->authorize('update', $this->comment);

        $this->validate(['editText' => 'required|string|min:1']);

        $this->comment->update([
            'original_text' => $this->editText,
        ]);

        $this->isEditing = false;
    }

    public function reply(): void
    {
        if (! $this->comment) {
            return;
        }

        $this->validate(['replyText' => 'required|string|min:1']);

        $this->comment->comment($this->replyText);
        $this->comment->load('nestedComments.commentator');

        $this->replyText = '';
        $this->dispatch('reply-created');
    }

    public function delete(): void
    {
        if (! $this->comment) {
            return;
        }

        $this->authorize('delete', $this->comment);

        $this->comment->delete();
        $this->comment = null;

        $this->dispatch('delete');
    }

    public function approve(): void
    {
        if (! $this->comment) {
            return;
        }

        $this->authorize('approve', $this->comment);

        $this->comment->approve();
    }

    public function reject(): void
    {
        if (! $this->comment) {
            return;
        }

        $this->authorize('reject', $this->comment);

        $this->comment->reject();
        $this->comment = null;

        $this->dispatch('delete');
    }

    public function toggleReaction(string $reaction): void
    {
        if (! $this->comment || ! in_array($reaction, CommentConfig::allowedReactions(), true)) {
            return;
        }

        $reactionModel = $this->comment->findReaction($reaction);

        if ($reactionModel) {
            $reactionModel->delete();
        } else {
            $this->comment->react($reaction);
        }

        $this->comment->load('reactions');
    }

    public function render(): View|string
    {
        if (! $this->comment) {
            return <<<'blade'
                <div></div>
            blade;
        }

        /** @var view-string $viewName */
        $viewName = 'comment::livewire.comment';

        return view($viewName, [
            'comment' => $this->comment,
        ]);
    }
}
