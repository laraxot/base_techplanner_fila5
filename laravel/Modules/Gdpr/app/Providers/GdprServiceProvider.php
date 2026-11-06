<?php

declare(strict_types=1);

namespace Modules\Gdpr\Providers;

use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Kernel;
use Illuminate\Routing\Router;
<<<<<<< .merge_file_SKbWDq
use Illuminate\Support\Facades\View;
use Illuminate\Translation\Translator;
use Modules\Gdpr\Http\Middleware\InjectCookieBanner;
=======
use Modules\Gdpr\Datas\GdprData;
<<<<<<< HEAD
>>>>>>> .merge_file_kfOnBt
use Modules\Xot\Providers\XotBaseServiceProvider;

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

<<<<<<< .merge_file_SKbWDq
        // cookie-consent namespace: not covered by XotBaseServiceProvider (loads only module nameLower).
        // Per le traduzioni vince l'ultimo namespace registrato e statikbe/laravel-cookie-consent registra il suo (solo en, es, fr, nl, oc) dopo
        // questo provider: a boot concluso il namespace del modulo (it, en, de, es) torna a prevalere. Senza, in /it il banner mostrava le chiavi.
=======
<<<<<<< HEAD
        // cookie-consent namespace: not covered by XotBaseServiceProvider (loads only module nameLower)
>>>>>>> .merge_file_kfOnBt
        $cookieConsentLangPath = realpath(__DIR__.'/../../lang/cookie-consent');
        if ($cookieConsentLangPath && is_dir($cookieConsentLangPath)) {
            $this->app->booted(function () use ($cookieConsentLangPath): void {
                $this->loadTranslationsFrom($cookieConsentLangPath, 'cookie-consent');
                $translator = $this->app->make(Translator::class);
                foreach (['it', 'en', 'de', 'es'] as $locale) {
                    $file = $cookieConsentLangPath.'/'.$locale.'/texts.php';
                    if (is_file($file)) {
                        /** @var array<string, string> $lines */
                        $lines = require $file;
                        $translator->addLines(
                            array_combine(array_map(static fn (string $key): string => 'texts.'.$key, array_keys($lines)), array_values($lines)),
                            $locale,
                            'cookie-consent',
                        );
                    }
                }
            });
        }

        // La vista del banner e' del modulo (DCP-153): prependNamespace la fa prevalere su quella di statikbe/laravel-cookie-consent.
        $cookieViewPath = realpath(__DIR__.'/../../resources/views/cookie-consent');
        if ($cookieViewPath) {
            View::prependNamespace('cookie-consent', $cookieViewPath);
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
<<<<<<< .merge_file_SKbWDq
        // Sempre registrato: il flag `cookie_banner_on` del tenant lo valuta il middleware a ogni richiesta (InjectCookieBanner).
        // Sul kernel e non solo sul router: il kernel risincronizza i gruppi sul router e un push fatto solo sul router puo' andare perso.
        $kernel = $this->app->make(HttpKernel::class);
        if ($kernel instanceof Kernel) {
            $kernel->appendMiddlewareToGroup('web', InjectCookieBanner::class);

            return;
=======
        $gdpr = GdprData::make();
<<<<<<< HEAD
        if ($gdpr->cookie_banner_on) {
=======
        if ($gdpr->cookie_banner_enabled) {
>>>>>>> 6ed19256f (.)
            $router->pushMiddlewareToGroup('web', CookieConsentMiddleware::class);
>>>>>>> .merge_file_kfOnBt
        }
        $router->pushMiddlewareToGroup('web', InjectCookieBanner::class);
    }
}
