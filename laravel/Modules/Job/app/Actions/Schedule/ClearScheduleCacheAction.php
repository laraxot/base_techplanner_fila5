<?php

declare(strict_types=1);

namespace Modules\Job\Actions\Schedule;

use Illuminate\Support\Facades\Cache;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Invalidates the configured schedule cache entry.
 *
 * @see docs/contracts/clear-schedule-cache-action.md
 * @contract docs/contracts/clear-schedule-cache-action.md
 */
class ClearScheduleCacheAction
{
    use QueueableAction;

    public function execute(): void
    {
        Assert::string($store = config('job::cache.store'), '['.__LINE__.']['.class_basename($this).']');
        Assert::string($key = config('job::cache.key'), '['.__LINE__.']['.class_basename($this).']');

        Cache::store($store)->forget($key);
    }
}
