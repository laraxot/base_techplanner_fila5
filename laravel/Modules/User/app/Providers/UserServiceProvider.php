<?php

/**
 * ----.
 */

declare(strict_types=1);

namespace Modules\User\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Livewire\Livewire;
use Modules\Notify\Emails\SpatieEmail;
use Modules\User\Datas\PasswordData;
use Modules\User\Filament\Widgets\Auth\ForgotPasswordWidget;
use Modules\User\Filament\Widgets\Auth\LoginWidget;
use Modules\User\Filament\Widgets\Auth\PasswordResetConfirmWidget;
use Modules\User\Filament\Widgets\Auth\PasswordResetWidget;
use Modules\User\Filament\Widgets\Auth\RegisterWidget;
use Modules\User\Filament\Widgets\Auth\ResetPasswordWidget;
use Modules\User\Filament\Widgets\Auth\SocialLoginWidget;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Providers\XotBaseServiceProvider;
use Webmozart\Assert\Assert;

class UserServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'User';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    #[\Override]
    public function boot(): void
    {
        parent::boot();
        $this->registerLivewireAuthWidgets();
        // $this->registerEventListener();
        $this->registerPasswordRules();
        $this->registerPulse();
        $this->registerMailsNotification();
        $this->registerPolicies();
    }

* Registra i widget Livewire auth per le viste Blade/Folio.
     * In Livewire v4, resolveClassComponentClassName con namespace '::' cerca SOLO in classNamespaces
     * (non in classComponents), quindi Livewire::component('user::...', class) non funziona.
     * Usare addComponent($class) che usa hash-based naming, compatibile con @livewire(Class::class).
     */
    protected function registerLivewireAuthWidgets(): void
    {
        $widgets = [
            LoginWidget::class,
            SocialLoginWidget::class,
            RegisterWidget::class,
            ResetPasswordWidget::class,
            PasswordResetWidget::class,
            ForgotPasswordWidget::class,
            PasswordResetConfirmWidget::class,
        ];

        foreach ($widgets as $class) {
            Livewire::addComponent($class);
        }
    }

    /**
     * Register policies (excluding OAuth ones which are handled by PassportServiceProvider).
     */
    protected function registerPolicies(): void
    {
        // OAuth policies are handled by PassportServiceProvider
        // Register other policies here if needed
    }
}
