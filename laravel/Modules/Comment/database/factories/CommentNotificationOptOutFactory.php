<?php

declare(strict_types=1);

namespace Modules\Comment\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Comment\Models\CommentNotificationOptOut;

/**
 * @extends Factory<CommentNotificationOptOut>
 */
class CommentNotificationOptOutFactory extends Factory
{
    /**
     * @var class-string<CommentNotificationOptOut>
     */
    protected $model = CommentNotificationOptOut::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }
}
