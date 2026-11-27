<?php

declare(strict_types=1);

namespace Modules\Comment\Actions\Reaction;

use Modules\Comment\Models\Comment;
use Modules\Comment\Models\Contracts\CanComment;
use Spatie\QueueableAction\QueueableAction;

/**
 * Cancella la reazione di un commentatore a un commento.
 *
 * @see docs/contracts/delete-comment-reaction-action.md
 *
 * @contract docs/contracts/delete-comment-reaction-action.md
 */
class DeleteCommentReactionAction
{
    use QueueableAction;

    public function execute(Comment $comment, string $reaction, ?CanComment $commentator = null): Comment
    {
        $commentator ??= auth()->user();

        if (! $commentator instanceof CanComment) {
            return $comment;
        }

        $comment
            ->reactions()
            ->where('commentator_id', $commentator->getKey())
            ->where('commentator_type', $commentator->getMorphClass())
            ->where('reaction', $reaction)
            ->delete();

        return $comment;
    }
}
