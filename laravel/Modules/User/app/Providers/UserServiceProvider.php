<?php

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
        $this->registerPasswordRules();
        $this->registerPulse();
        $this->registerMailsNotification();
        $this->registerPolicies();
    }

    #[\Override]
    public function register(): void
    {
        parent::register();
    }

    public function registerMailsNotification(): void
    {
        ResetPassword::toMailUsing(function ($notifiable, string $token): SpatieEmail {
            Assert::isInstanceOf($notifiable, Model::class);
            $email = new SpatieEmail($notifiable, 'reset-password');
            $email->mergeData([
                'token' => $token,
                'reset_password_url' => url(route('password.reset', ['token' => $token], false)),
            ]);

            if (method_exists($notifiable, 'getEmailForPasswordReset')) {
                $emailAddress = $notifiable->getEmailForPasswordReset();
                if (is_string($emailAddress)) {
                    $email->to($emailAddress);
                } else {
                    throw new \InvalidArgumentException('Email address must be a string.');
                }
            } elseif (isset($notifiable->email)) {
                $emailAddress = $notifiable->email;
                if (is_string($emailAddress)) {
                    $email->to($emailAddress);
                } else {
                    throw new \InvalidArgumentException('Email address must be a string.');
                }
            } else {
                Log::error('SpatieEmail: Destinatario email non trovato', [
                    'notifiable_class' => $notifiable::class,
                    'notifiable_id' => $notifiable->id ?? 'unknown',
                ]);
            }

            return $email;
        });

        VerifyEmail::toMailUsing(function ($notifiable, string $url): SpatieEmail {
            Assert::isInstanceOf($notifiable, Model::class);
            $email = new SpatieEmail($notifiable, 'verify-email');
            $email->mergeData([
                'verification_url' => $url,
            ]);
            if (method_exists($notifiable, 'getEmailForPasswordReset')) {
                $emailAddress = $notifiable->getEmailForPasswordReset();
                if (is_string($emailAddress)) {
                    $email->to($emailAddress);
                } else {
                    throw new \InvalidArgumentException('Email address must be a string.');
                }
            } elseif (isset($notifiable->email)) {
                $emailAddress = $notifiable->email;
                if (is_string($emailAddress)) {
                    $email->to($emailAddress);
                } else {
                    throw new \InvalidArgumentException('Email address must be a string.');
                }
            }

            return $email;
        });
    }

    public function registerPulse(): void
    {
        Config::set('pulse.path', 'pulse/admin');
        Gate::define('viewPulse', fn (UserContract $user): bool => $user->hasRole('super-admin'));
    }

    public function registerPasswordRules(): void
    {
        Password::defaults(function (): Password {
            $pwd = PasswordData::make();

            return $pwd->getPasswordRule();
        });
    }

    /**
     * Registra i widget Livewire auth per le viste Blade/Folio.
     */
    protected function registerLivewireAuthWidgets(): void
    {
        $widgets = [
            LoginWidget::class,
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

    protected function registerPolicies(): void
    {
        // OAuth policies are handled by PassportServiceProvider
    }
}
