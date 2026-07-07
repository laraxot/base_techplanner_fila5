<?php

declare(strict_types=1);

namespace Modules\Job\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Modules\Job\Models\Schedule;
use Webmozart\Assert\Assert;

class ScheduleService
{
    private Schedule $model;

    public function __construct()
    {
<<<<<<< HEAD
        Assert::string($modelClass = config('job::model'), '['.__LINE__.']['.class_basename($this).']');

        $model = app($modelClass);
        Assert::isInstanceOf($model, Schedule::class, '['.__LINE__.']['.class_basename($this).']');
=======
        Assert::string($modelClass = config('job::model'), '[' . __LINE__ . '][' . class_basename($this) . ']');

        $model = app($modelClass);
        Assert::isInstanceOf($model, Schedule::class, '[' . __LINE__ . '][' . class_basename($this) . ']');
>>>>>>> 6ed19256f (.)
        $this->model = $model;
    }

    /**
     * @return Collection<int, Schedule>
     */
    public function getActives(): Collection
    {
        if (config('job::cache.enabled')) {
            return $this->getFromCache();
        }

        return $this->model->active()->get();
    }

    public function clearCache(): void
    {
<<<<<<< HEAD
        Assert::string($store = config('job::cache.store'), '['.__LINE__.']['.class_basename($this).']');
        Assert::string($key = config('job::cache.key'), '['.__LINE__.']['.class_basename($this).']');
=======
        Assert::string($store = config('job::cache.store'), '[' . __LINE__ . '][' . class_basename($this) . ']');
        Assert::string($key = config('job::cache.key'), '[' . __LINE__ . '][' . class_basename($this) . ']');
>>>>>>> 6ed19256f (.)

        Cache::store($store)->forget($key);
    }

    /**
     * @return Collection<int, Schedule>
     */
    private function getFromCache(): Collection
    {
<<<<<<< HEAD
        Assert::string($store = config('job::cache.store'), '['.__LINE__.']['.class_basename($this).']');
        Assert::string($key = config('job::cache.key'), '['.__LINE__.']['.class_basename($this).']');

        $result = Cache::store($store)->rememberForever($key, fn (): Collection => $this->model->active()->get());
        Assert::isInstanceOf($result, Collection::class);

=======
        Assert::string($store = config('job::cache.store'), '[' . __LINE__ . '][' . class_basename($this) . ']');
        Assert::string($key = config('job::cache.key'), '[' . __LINE__ . '][' . class_basename($this) . ']');

        $result = Cache::store($store)->rememberForever($key, fn (): Collection => $this->model->active()->get());
        Assert::isInstanceOf($result, Collection::class);
>>>>>>> 6ed19256f (.)
        /** @var Collection<int, Schedule> $result */
        return $result;
    }
}
