<?php

declare(strict_types=1);

namespace Modules\Comment\Actions\Reaction;

use Modules\Comment\Models\Comment;
use Modules\Comment\Models\Contracts\CanComment;
use Spatie\QueueableAction\QueueableAction;

/**
 * Registra la reazione di un commentatore a un commento.
 *
 * @see docs/contracts/react-to-comment-action.md
 *
 * @contract docs/contracts/react-to-comment-action.md
 */
class ReactToCommentAction
{
    use QueueableAction;

    public function execute(Comment $comment, string $reaction, ?CanComment $commentator = null): Comment
    {
        $commentator ??= auth()->user();

        $comment->reactions()->firstOrCreate([
            'commentator_id' => $commentator?->getKey(),
            'commentator_type' => $commentator?->getMorphClass(),
            'reaction' => $reaction,
        ]);

        return $comment;
    }
}
