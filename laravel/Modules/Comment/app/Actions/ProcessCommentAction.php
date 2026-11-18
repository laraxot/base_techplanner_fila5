<?php

declare(strict_types=1);

namespace Modules\Comment\Actions;

use Modules\Comment\Models\Comment;
use Modules\Comment\Support\CommentConfig;
use Modules\Comment\Transformers\CommentTransformer;
use Spatie\QueueableAction\QueueableAction;

class ProcessCommentAction
{
    use QueueableAction;

    public function execute(Comment $comment): void
    {
        $this->handle($comment);
    }

    public function handle(Comment $comment): void
    {
        CommentConfig::commentTransformers()->each(
            fn (CommentTransformer $transformer) => $transformer->handle($comment),
        );

        if (CommentConfig::commentTransformers()->isEmpty()) {
            $comment->text = $comment->original_text;
        }

        $comment->text = CommentConfig::commentSanitizer()->sanitize($comment->text ?? '');
    }
}
