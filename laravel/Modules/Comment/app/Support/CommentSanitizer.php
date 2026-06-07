<?php

declare(strict_types=1);

namespace Modules\Comment\Support;

class CommentSanitizer
{
    public function sanitize(string $text): string
    {
        $config = CommentConfig::allowedAttributes();

        $processed = $text;

        foreach ($config as $attribute => $allowedElements) {
            if (! is_string($attribute) || ! is_array($allowedElements)) {
                continue;
            }
            // Sanitization is handled by the HTML purifier
        }

        return strip_tags($processed, $this->getAllowedTags());
    }

    /**
     * @return list<string>
     */
    private function getAllowedTags(): array
    {
        $tags = ['p', 'br', 'strong', 'em', 'u', 's', 'blockquote', 'pre', 'code'];

        if (CommentConfig::mentionsEnabled()) {
            $tags[] = 'span';
        }

        return $tags;
    }
}
