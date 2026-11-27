<?php

declare(strict_types=1);

namespace Modules\Comment\Actions;

use Modules\Comment\Events\CommentRejectedEvent;
use Modules\Comment\Models\Comment;
use Spatie\QueueableAction\QueueableAction;

/**
 * Doppione non usato di {@see \Modules\Comment\Actions\Comment\RejectCommentAction}: config, modello, Filament e Folio
 * chiamano quella. Non imitarlo e non aggiungerci logica.
 *
 * @see docs/contracts/reject-comment-action.md contratto dell'Action viva
 * @deprecated usare Modules\Comment\Actions\Comment\RejectCommentAction
 */
class RejectCommentAction
{
    use QueueableAction;

    public function execute(Comment $comment): Comment
    {
        return $this->handle($comment);
    }

    public function handle(Comment $comment): Comment
    {
        $comment->delete();

        event(new CommentRejectedEvent($comment));

        return $comment;
    }
}
