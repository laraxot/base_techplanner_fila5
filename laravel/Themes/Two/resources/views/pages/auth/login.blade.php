@if (auth()->check())
    @php
        redirect()->intended('/')->send();
        return;
    @endphp
@endif

<x-pub_theme::layouts.guest :title="__('user::auth.login.title')">
    <div class="w-full">
        <section aria-labelledby="login-heading" id="login-form-section">
            <h1 id="login-heading" class="sr-only">
                {{ __('user::auth.login.title') }}
            </h1>
            @livewire(\Modules\User\Filament\Widgets\Auth\LoginWidget::class)
        </section>
    </div>
</x-pub_theme::layouts.guest>
