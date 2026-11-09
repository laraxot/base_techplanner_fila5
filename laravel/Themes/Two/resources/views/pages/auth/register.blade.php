{{--
    Registrazione con consensi: widget Gdpr (privacy, condizioni, marketing separati; limite di frequenza per IP).
    Il widget User\RegisterWidget e' il ripiego senza consensi e non va montato qui.
    Vestito: pub_theme::filament.widgets.auth.register (Themes/Two/resources/views/filament/widgets/auth/register.blade.php).
--}}
<x-layouts.base :title="__('pub_theme::auth_forms.register.title.title')">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="mb-6 text-2xl font-bold text-gray-900">{{ __('pub_theme::auth_forms.register.title.title') }}</h1>
            @livewire(\Modules\Gdpr\Filament\Widgets\Auth\RegisterWidget::class)
        </div>
    </div>
</x-layouts.base>
