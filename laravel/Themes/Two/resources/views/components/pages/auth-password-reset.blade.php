{{--
    Componente del tema attivo per la richiesta di reset password.
    La pagina Folio vive nel modulo User, mentre il guscio e la resa appartengono al tema.
    Il nome del componente è il contratto condiviso con User::pages/auth/password/reset.
--}}
<div class="mx-auto w-full max-w-md space-y-8">
    <div class="text-center">
        <a href="{{ route('home') }}" class="inline-flex justify-center text-xl font-bold text-primary-800" aria-label="{{ __('pub_theme::header.brand.name') }}">
            {{ __('pub_theme::header.brand.name') }}
        </a>

        <h1 id="auth-password-reset-heading" class="mt-6 text-3xl font-extrabold leading-9 text-gray-900">
            {{ __('user::password_recovery.title') }}
        </h1>
        <p class="mt-2 text-sm leading-6 text-gray-700">
            {{ __('user::password_recovery.intro') }}
        </p>
    </div>

    <div class="rounded-lg bg-white px-4 py-8 shadow sm:px-10">
        <div aria-labelledby="auth-password-reset-heading">
            @livewire(\Modules\User\Filament\Widgets\Auth\ForgotPasswordWidget::class)
        </div>
    </div>

    <p class="text-center text-sm text-gray-700">
        <a href="{{ route('login') }}" class="font-medium text-primary-700 underline decoration-2 underline-offset-2 hover:text-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-700 focus:ring-offset-2">
            {{ __('user::password_recovery.back_to_login') }}
        </a>
    </p>
</div>
