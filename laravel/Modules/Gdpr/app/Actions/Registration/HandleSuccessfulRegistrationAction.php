<?php

declare(strict_types=1);

namespace Modules\Gdpr\Actions\Registration;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Modules\User\Actions\Auth\GetPostLoginUrlAction;
use Modules\User\Actions\Auth\ResendEmailVerificationAction;
use Modules\User\Models\User;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Widgets\XotBaseWidget; // Use the base widget for type hinting
use Spatie\QueueableAction\QueueableAction;

/**
 * Dopo una registrazione riuscita: login, mail di verifica (un errore non la annulla), notifica e redirect.
 *
 * @see docs/contracts/handle-successful-registration-action.md
 *
 * @contract docs/contracts/handle-successful-registration-action.md
 */
class HandleSuccessfulRegistrationAction
{
    use QueueableAction;

    public function execute(User $user, XotBaseWidget $widget): void
    {
        Auth::login($user);

        // Mail con il link di verifica (PRD-02). Un errore del server di posta non deve far fallire una registrazione gia' salvata:
        // il cittadino puo' chiedere un nuovo link dalla pagina `verification.notice`.
        try {
            app(ResendEmailVerificationAction::class)->execute($user);
        } catch (\Throwable $exception) {
            report($exception);
        }

        $cast = app(SafeStringCastAction::class);

        Notification::make()
            ->title($cast->execute(\__('gdpr::register.success')))
            ->body($cast->execute(\__('gdpr::register.success_message')))
            ->success()
            ->send();

        // Come il login: si torna alla pagina che richiedeva l'accesso, altrimenti all'area personale localizzata.
        // Non `route('dashboard')`: nel front office `/{lang}/dashboard` risponde 404 (la pagina Folio del tema la intercetta).
        $widget->redirectIntended(default: app(GetPostLoginUrlAction::class)->execute());
    }
}
