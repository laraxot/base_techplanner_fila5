<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Traits;

use Modules\Notify\Traits\HasNotificationRateLimiting;

final class NotifyRateLimitDummy
{
    use HasNotificationRateLimiting;

<<<<<<< .merge_file_GBNp5U
    public function key(string $type, mixed $identifier): string
=======
    public function key(string $type, int|string $identifier): string
>>>>>>> .merge_file_1GYdjy
    {
        return $this->getNotificationRateLimitKey($type, $identifier);
    }

    public function reset(string $key): void
    {
        $this->resetNotificationRateLimit($key);
    }

    public function shouldSend(string $key): bool
    {
        return $this->shouldSendNotification($key);
    }

    public function remaining(string $key): int
    {
        return $this->getNotificationRateLimitRemainingAttempts($key);
    }

    public function retryAfter(string $key): int
    {
        return $this->getNotificationRateLimitRetryAfter($key);
    }
<<<<<<< .merge_file_GBNp5U
}
=======
}
>>>>>>> .merge_file_1GYdjy
