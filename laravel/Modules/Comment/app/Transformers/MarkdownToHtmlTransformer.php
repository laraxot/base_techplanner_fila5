<?php

declare(strict_types=1);

namespace Modules\Comment\Transformers;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\DisallowedRawHtml\DisallowedRawHtmlExtension;
use League\CommonMark\MarkdownConverter;
use Modules\Comment\Models\Comment;

class MarkdownToHtmlTransformer implements CommentTransformer
{
    private MarkdownConverter $converter;

    public function __construct()
    {
        $environment = new Environment();
        $environment->addExtension(new CommonMarkCoreExtension);
        $environment->addExtension(new DisallowedRawHtmlExtension);
        $this->converter = new MarkdownConverter($environment);
    }

    public function handle(Comment $comment): void
    {
        $comment->text = $this->converter->convert($comment->original_text)->getContent();
    }
}
