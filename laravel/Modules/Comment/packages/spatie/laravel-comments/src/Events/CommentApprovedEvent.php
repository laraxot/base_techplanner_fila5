<?php

declare(strict_types=1);

namespace Spatie\Comments\Events;

use Spatie\Comments\Models\Comment;

class CommentApprovedEvent
{
    public function __construct(public Comment $comment) {}
}
