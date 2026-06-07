<?php

declare(strict_types=1);

namespace Spatie\Comments\Actions;

use Spatie\Comments\Jobs\SendNotificationsForPendingCommentJob;
use Spatie\Comments\Models\Comment;

class SendNotificationsForPendingCommentAction
{
    public function execute(Comment $comment): void
    {
        dispatch(new SendNotificationsForPendingCommentJob($comment));
    }
}
