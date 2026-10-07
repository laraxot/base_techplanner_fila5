<?php

declare(strict_types=1);

namespace Modules\Job\Actions\Schedule;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Modules\Job\Models\Schedule;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetActiveSchedulesAction
{
    use QueueableAction;

    /**
     * @return Collection<int, Schedule>
     */
    public function execute(): Collection
    {
        if (config('job::cache.enabled')) {
            return $this->getFromCache();
        }

        /** @var Collection<int, Schedule> $result */
        $result = Schedule::query()
            ->active()
            ->get();

        return $result;
    }

    /**
     * @return Collection<int, Schedule>
     */
    private function getFromCache(): Collection
    {
        Assert::string($store = config('job::cache.store'), '['.__LINE__.']['.class_basename($this).']');
        Assert::string($key = config('job::cache.key'), '['.__LINE__.']['.class_basename($this).']');

        $result = Cache::store($store)->rememberForever(
            $key,
            fn (): Collection => Schedule::query()
                ->active()
                ->get()
        );
        Assert::isInstanceOf($result, Collection::class);

        /** @var Collection<int, Schedule> $result */
        return $result;
    }
}
