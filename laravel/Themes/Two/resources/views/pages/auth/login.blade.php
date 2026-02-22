@if (auth()->check())
    @php
        redirect()->intended('/')->send();
        return;
    @endphp
@endif

<x-pub_theme::layouts.guest :title="__('user::auth.login.title')">
    <div class="w-full">
        <a
            href="{{ url('/') }}"
            class="mb-6 inline-flex items-center gap-2 text-sm font-medium text-gray-600 transition hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 rounded"
            aria-label="{{ __('pub_theme::auth.login.back_to_home') }}"
        >
            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            {{ __('pub_theme::auth.login.back_to_home') }}
        </a>

        <section aria-labelledby="login-heading" id="login-form-section">
            <h1 id="login-heading" class="sr-only">
                {{ __('user::auth.login.title') }}
            </h1>
            @livewire(\Modules\User\Filament\Widgets\Auth\LoginWidget::class)
        </section>
    </div>
</x-pub_theme::layouts.guest>
