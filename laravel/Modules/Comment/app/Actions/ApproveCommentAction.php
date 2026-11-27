<?php

declare(strict_types=1);

namespace Modules\Comment\Actions;

use Modules\Comment\Actions\Notification\NotifyApprovedCommentAction;
use Modules\Comment\Datas\CommentConfigData;
use Modules\Comment\Events\CommentApprovedEvent;
use Modules\Comment\Models\Comment;
use Spatie\QueueableAction\QueueableAction;

/**
 * Doppione non usato di {@see \Modules\Comment\Actions\Comment\ApproveCommentAction}: config, modello, Filament e Folio
 * chiamano quella. Non imitarlo e non aggiungerci logica.
 *
 * @see docs/contracts/approve-comment-action.md contratto dell'Action viva
 * @deprecated usare Modules\Comment\Actions\Comment\ApproveCommentAction
 */
class ApproveCommentAction
{
    use QueueableAction;

    public function execute(Comment $comment): Comment
    {
        return $this->handle($comment);
    }

    public function handle(Comment $comment): Comment
    {
        if ($comment->isApproved()) {
            return $comment;
        }

        $comment->update([
            'approved_at' => now(),
        ]);

        event(new CommentApprovedEvent($comment));

        $config = CommentConfigData::make();
        if ($config->notifications['enabled'] ?? true) {
            app(NotifyApprovedCommentAction::class)->onQueue()->execute($comment);
        }

        return $comment;
    }
}
