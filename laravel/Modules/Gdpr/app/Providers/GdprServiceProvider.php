<?php

declare(strict_types=1);

namespace Modules\Gdpr\Providers;

use Illuminate\Routing\Router;
use Modules\Gdpr\Datas\GdprData;
<<<<<<< HEAD
use Modules\Xot\Providers\XotBaseServiceProvider;
use Statikbe\CookieConsent\CookieConsentMiddleware;

use function Safe\realpath;

=======
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
use Modules\Xot\Providers\XotBaseServiceProvider;
use Override;
use Statikbe\CookieConsent\CookieConsentMiddleware;

>>>>>>> 6ed19256f (.)
class GdprServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Gdpr';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> 6ed19256f (.)
    public function boot(): void
    {
        parent::boot();

<<<<<<< HEAD
        // cookie-consent namespace: not covered by XotBaseServiceProvider (loads only module nameLower)
        $cookieConsentLangPath = realpath(__DIR__.'/../../lang/cookie-consent');
        if ($cookieConsentLangPath && is_dir($cookieConsentLangPath)) {
            $this->loadTranslationsFrom($cookieConsentLangPath, 'cookie-consent');
        }
=======
        $lang_path = app(GetModulePathByGeneratorAction::class)->execute($this->name, 'lang');
        $this->loadTranslationsFrom($lang_path, 'cookie-consent');
>>>>>>> 6ed19256f (.)

        $router = app('router');
        $this->registerMyMiddleware($router);
    }

    public function registerMyMiddleware(Router $router): void
    {
        $gdpr = GdprData::make();
<<<<<<< HEAD
        if ($gdpr->cookie_banner_on) {
=======
        if ($gdpr->cookie_banner_enabled) {
>>>>>>> 6ed19256f (.)
            $router->pushMiddlewareToGroup('web', CookieConsentMiddleware::class);
        }
    }
}
