@if (auth()->check())
    <?php return redirect()->intended('/dashboard'); ?>
@endif

<x-pub_theme::layouts.guest title="Accedi - Sottana Service">
    <div class="text-center mb-8">
        <a href="{{ route('pages.view', ['slug' => 'home']) }}" class="inline-block mb-4">
            <x-pub_theme::ui.logo class="h-16 w-auto" />
        </a>
        <h2 class="text-2xl font-bold text-gray-900">Accedi al tuo account</h2>
        <p class="mt-2 text-sm text-gray-600">Inserisci le tue credenziali per continuare</p>
    </div>

    @livewire(\Modules\User\Filament\Widgets\Auth\LoginWidget::class)

    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
            Non hai un account?
            <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-500 transition-colors">
                Registrati ora
            </a>
        </p>
    </div>
</x-pub_theme::layouts.guest>
