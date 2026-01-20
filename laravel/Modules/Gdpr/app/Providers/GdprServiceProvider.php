<?php

declare(strict_types=1);

namespace Modules\Gdpr\Providers;

use Illuminate\Routing\Router;
use Modules\Gdpr\Datas\GdprData;
<<<<<<< HEAD
=======
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
>>>>>>> 4b6b99016 (first commit)
use Modules\Xot\Providers\XotBaseServiceProvider;
use Statikbe\CookieConsent\CookieConsentMiddleware;

class GdprServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Gdpr';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    #[\Override]
    public function boot(): void
    {
        parent::boot();

<<<<<<< HEAD
        // Load translations for both cookie-consent and gdpr namespaces
        // Cookie-consent translations are in Modules/Gdpr/lang/cookie-consent/{locale}/texts.php
        $cookieConsentLangPath = realpath(__DIR__.'/../../lang/cookie-consent');
        if ($cookieConsentLangPath && is_dir($cookieConsentLangPath)) {
            $this->loadTranslationsFrom($cookieConsentLangPath, 'cookie-consent');
        }
        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'gdpr');
=======
        $lang_path = app(GetModulePathByGeneratorAction::class)->execute($this->name, 'lang');
        $this->loadTranslationsFrom($lang_path, 'cookie-consent');
>>>>>>> 4b6b99016 (first commit)

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
