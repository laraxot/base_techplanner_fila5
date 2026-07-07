<<<<<<< HEAD
{{-- LoginWidget — vestito Sixteen; logica in Modules\User\Filament\Widgets\Auth\LoginWidget --}}

<x-filament-widgets::widget>
    <x-filament::section class="rounded-none border-0 shadow-none">
        <div class="space-y-6 p-5 sm:p-7">
            @php
                $loginError = $errors->first('data.email') ?: $errors->first('email');
            @endphp

            @if ($loginError)
                <div
                    class="rounded-xl border-2 border-red-300 bg-red-50 px-4 py-4 shadow-sm"
                    role="alert"
                    aria-live="assertive"
                >
                    <div class="flex items-start gap-3">
                        <span class="mt-0.5 inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-700" aria-hidden="true">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10A8 8 0 114.293 4.293 8 8 0 0118 10zm-8.75-3.25a.75.75 0 011.5 0v3.5a.75.75 0 01-1.5 0v-3.5zm.75 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-red-800">
                                {{ __('user::login.actions.login.error') }}
                            </p>
                            <p class="mt-1 text-sm text-red-700">
                                {{ $loginError }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <form
                wire:submit="login"
                class="space-y-6"
                aria-labelledby="auth-login-heading"
                novalidate
            >
                <div
                    @class([
                        'fo-filament-form-shell rounded-xl border border-slate-200 p-4 transition-colors',
                        'border-red-300 bg-red-50/40' => (bool) $loginError,
                    ])
                >
                    {{ $this->form }}
                </div>

                <x-filament::button
                    type="submit"
                    color="primary"
                    class="w-full"
                    wire:loading.attr="disabled"
                >
                    {{ __('user::auth.login.submit') }}
                </x-filament::button>
            </form>

            <nav class="mt-2 space-y-3 border-t border-slate-200 pt-4 text-sm" aria-label="{{ __('user::auth.login.page.support_title.label') }}">
                <p class="text-slate-600">
                    {{ __('user::login.no_account') }}
                    <a
                        href="{{ url('/' . app()->getLocale() . '/auth/register') }}"
                        class="font-semibold text-italia-blue-700 underline decoration-italia-blue-500 underline-offset-2 hover:text-italia-blue-800"
=======
{{-- Vista per il LoginWidget nel tema Sixteen --}}
{{-- Design ispirato a https://docs.italia.it/accounts/login/ --}}
{{-- Conforme AGID Bootstrap Italia + Filament 4.x --}}

<x-filament-widgets::widget>
    <x-filament::section>
        <div class="space-y-6">
            {{-- Header del form --}}
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-italia-gray-900 dark:text-white">
                    {{ __('user::auth.login.title') }}
                </h2>
                <p class="mt-2 text-sm text-italia-gray-600 dark:text-gray-400">
                    {{ __('user::auth.login.subtitle') }}
                </p>
            </div>
            {{-- Form renderizzato dal widget Filament 4 --}}
            <form wire:submit="login" class="space-y-6">
                {{ $this->form }}

                {{-- Submit Button AGID Style --}}
                <div class="mt-6">
                    <button 
                        type="submit" 
                        wire:loading.attr="disabled"
                        class="w-full flex justify-center items-center gap-2 py-3 px-4 border border-transparent text-base font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200"
                    >
                        <svg wire:loading class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>{{ __('user::auth.login.submit') }}</span>
                    </button>
                </div>
            </form>

            {{-- Links AGID Style --}}
            <div class="mt-6 space-y-4 text-center text-sm">
                <p class="text-italia-gray-600 dark:text-gray-400">
                    {{ __('user::login.no_account') }}
                    <a 
                        href="{{ url('/' . app()->getLocale() . '/auth/register') }}" 
                        class="font-medium text-primary-600 hover:text-primary-500 underline"
>>>>>>> 6ed19256f (.)
                    >
                        {{ __('user::login.register_now') }}
                    </a>
                </p>
<<<<<<< HEAD

                <p class="text-slate-600">
                    {{ __('user::login.forgot_password_text') }}
                    <a
                        href="{{ url('/' . app()->getLocale() . '/auth/password/reset') }}"
                        class="font-semibold text-italia-blue-700 underline decoration-italia-blue-500 underline-offset-2 hover:text-italia-blue-800"
=======
                
                <p class="text-italia-gray-600 dark:text-gray-400">
                    {{ __('user::login.forgot_password_text') }}
                    <a 
                        href="{{ url('/' . app()->getLocale() . '/auth/password/reset') }}" 
                        class="font-medium text-primary-600 hover:text-primary-500 underline"
>>>>>>> 6ed19256f (.)
                    >
                        {{ __('user::login.reset_it') }}
                    </a>
                </p>
<<<<<<< HEAD
            </nav>
=======
            </div>
>>>>>>> 6ed19256f (.)
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
