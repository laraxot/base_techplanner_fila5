<?php

declare(strict_types=1);

namespace Modules\Seo\Providers;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Seo\Adapters\MetatagFacadeAdapter;
use Modules\Seo\Adapters\MetatagState;
=======
use Modules\Seo\Adapters\MetatagManager;
>>>>>>> cf01f0b (.)
=======
use Modules\Seo\Services\MetatagService;
>>>>>>> 7ec200b (.)
=======
use Modules\Seo\Services\MetatagService;
>>>>>>> d20252d (.)
=======
use Modules\Seo\Services\MetatagService;
>>>>>>> dbf8b8d (.)
=======
use Modules\Seo\Services\MetatagService;
>>>>>>> 77e0353 (.)
=======
use Modules\Seo\Services\MetatagService;
>>>>>>> fc52fe0 (.)
=======
use Modules\Seo\Services\MetatagService;
>>>>>>> c101b34 (.)
=======
use Modules\Seo\Services\MetatagService;
>>>>>>> d0f51b6 (.)
=======
use Modules\Seo\Services\MetatagService;
>>>>>>> a771e9c (.)
use Modules\Xot\Providers\XotBaseServiceProvider;

class SeoServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Seo';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> d20252d (.)
=======
>>>>>>> dbf8b8d (.)
=======
>>>>>>> 77e0353 (.)
=======
>>>>>>> a771e9c (.)
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 7ec200b (.)
=======
>>>>>>> d20252d (.)
=======
>>>>>>> dbf8b8d (.)
=======
>>>>>>> 77e0353 (.)
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
=======
>>>>>>> a771e9c (.)
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        parent::register();

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->app->singleton(MetatagState::class);
        $this->app->singleton(MetatagFacadeAdapter::class);
=======
        $this->app->singleton(MetatagManager::class, function () {
            return new MetatagManager();
        });
>>>>>>> cf01f0b (.)
=======
        $this->app->singleton(MetatagService::class, function ($app) {
            return new MetatagService;
        });
>>>>>>> 7ec200b (.)
=======
        $this->app->singleton(MetatagService::class, function ($app) {
            return new MetatagService;
        });
>>>>>>> d20252d (.)
=======
        $this->app->singleton(MetatagService::class, function ($app) {
            return new MetatagService;
        });
>>>>>>> dbf8b8d (.)
=======
        $this->app->singleton(MetatagService::class, function ($app) {
            return new MetatagService;
        });
>>>>>>> 77e0353 (.)
=======
        $this->app->singleton(MetatagService::class, function () {
            return new MetatagService();
        });
>>>>>>> fc52fe0 (.)
=======
        $this->app->singleton(MetatagService::class, function () {
            return new MetatagService();
        });
>>>>>>> c101b34 (.)
=======
        $this->app->singleton(MetatagService::class, function () {
            return new MetatagService();
        });
>>>>>>> d0f51b6 (.)
=======
        $this->app->singleton(MetatagService::class, function ($app) {
            return new MetatagService;
        });
>>>>>>> a771e9c (.)
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<string>
     */
    public function provides(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            MetatagFacadeAdapter::class,
            MetatagState::class,
=======
            MetatagManager::class,
>>>>>>> cf01f0b (.)
=======
            MetatagService::class,
>>>>>>> 7ec200b (.)
=======
            MetatagService::class,
>>>>>>> d20252d (.)
=======
            MetatagService::class,
>>>>>>> dbf8b8d (.)
=======
            MetatagService::class,
>>>>>>> 77e0353 (.)
=======
            MetatagService::class,
>>>>>>> fc52fe0 (.)
=======
            MetatagService::class,
>>>>>>> c101b34 (.)
=======
            MetatagService::class,
>>>>>>> d0f51b6 (.)
=======
            MetatagService::class,
>>>>>>> a771e9c (.)
        ];
    }
}
