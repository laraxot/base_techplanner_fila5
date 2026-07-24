<?php

declare(strict_types=1);

namespace Modules\Seo\Providers;

use Modules\Seo\Adapters\MetatagFacadeAdapter;
use Modules\Seo\Adapters\MetatagState;
use Modules\Xot\Providers\XotBaseServiceProvider;

class SeoServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Seo';

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        parent::register();

        $this->app->singleton(MetatagState::class);
        $this->app->singleton(MetatagFacadeAdapter::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<string>
     */
    public function provides(): array
    {
        return [
            MetatagFacadeAdapter::class,
            MetatagState::class,
        ];
    }
}
