<?php

declare(strict_types=1);

namespace Modules\Comment\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Comment\Models\Comment;

/**
 * Modello che accetta commenti (commentable).
 */
interface Commentable
{
    public function comments(): MorphMany;

    public function comment(string $text, ?CanComment $commentator = null): Comment;
}
