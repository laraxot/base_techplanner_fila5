<?php

declare(strict_types=1);

namespace Modules\Comment\Tests\Support;

use Illuminate\Database\Eloquent\Model;
use Modules\Comment\Models\Concerns\InteractsWithComments;
use Modules\Comment\Models\Contracts\CanComment;

/**
 * Stub di test: tiene vivo InteractsWithComments (trait consumer-side, non usato da User in questa base).
 */
final class CanCommentStub extends Model implements CanComment
{
    use InteractsWithComments;

    protected $table = 'users';

    public $timestamps = false;

    /**
     * @param  mixed  $instance
     */
    public function notify($instance): void
    {
        // no-op stub
    }
}
