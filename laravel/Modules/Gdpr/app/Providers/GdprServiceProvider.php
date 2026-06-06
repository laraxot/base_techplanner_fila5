<?php

declare(strict_types=1);

namespace Modules\Gdpr\Providers;

use Illuminate\Routing\Router;
use Modules\Gdpr\Datas\GdprData;
use Modules\Xot\Providers\XotBaseServiceProvider;
use Statikbe\CookieConsent\CookieConsentMiddleware;

use function Safe\realpath;

class GdprServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Gdpr';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    #[\Override]
    public function boot(): void
    {
        parent::boot();

        // cookie-consent: caricare in booted() dopo Statikbe così il path del modulo (con it/) vince sul vendor.
        $cookieConsentLangPath = realpath(__DIR__.'/../../lang/cookie-consent');
        if ($cookieConsentLangPath !== false && is_dir($cookieConsentLangPath)) {
            $this->app->booted(function () use ($cookieConsentLangPath): void {
                $this->loadTranslationsFrom($cookieConsentLangPath, 'cookie-consent');
            });
        }

        $router = app('router');
        $this->registerMyMiddleware($router);
    }

    public function registerMyMiddleware(Router $router): void
    {
        $gdpr = GdprData::make();
        if ($gdpr->cookie_banner_on) {
            $router->pushMiddlewareToGroup('web', CookieConsentMiddleware::class);
        }
    }
}
