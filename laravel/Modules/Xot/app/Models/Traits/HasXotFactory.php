<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory as EloquentHasFactory;
use Modules\Xot\Actions\Factory\GetFactoryAction;

/**
 * @template TModel of \Illuminate\Database\Eloquent\Model
 */
trait HasXotFactory
{
    /** @use EloquentHasFactory<Factory<TModel>> */
    use EloquentHasFactory {
        newFactory as parentNewFactory;
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory<TModel>
     */
    protected static function newFactory(): Factory
    {
        /** @var Factory<TModel> $factory */
        $factory = app(GetFactoryAction::class)->execute(static::class);

        return $factory;
    }
}
