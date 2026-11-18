<?php

declare(strict_types=1);

namespace Modules\Comment\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Comment\Models\CommentNotificationSubscription;

/**
 * @extends Factory<CommentNotificationSubscription>
 */
class CommentNotificationSubscriptionFactory extends Factory
{
    /**
     * @var class-string<CommentNotificationSubscription>
     */
    protected $model = CommentNotificationSubscription::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }
}
