<?php

declare(strict_types=1);

namespace Modules\Comment\Actions;

use Modules\Comment\Events\CommentApprovedEvent;
use Modules\Comment\Models\Comment;
use Modules\Comment\Support\CommentConfigNotifications;
use Spatie\QueueableAction\QueueableAction;

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

        if (CommentConfigNotifications::enabled()) {
            CommentConfigNotifications::sendApprovedAction()->execute($comment);
        }

        return $comment;
    }
}
