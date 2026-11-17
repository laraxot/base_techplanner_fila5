{{--
    404 del tema Two. Il router risponde 404 e `laravel/resources/views/errors/404.blade.php` rende questa vista se il tema attivo la offre
    (altrimenti resta la pagina grigia di Laravel). Non passa da `x-cms::head`: quel componente decide l'indicizzazione dal percorso e
    una pagina inesistente risulterebbe indicizzabile; qui la direttiva e' fissa (`noindex`), senza canonical, hreflang o dati strutturati.
    Header e footer sono le sezioni CMS di ogni altra pagina; nessun dato dell'eccezione arriva al markup.
--}}
@php
    use Illuminate\Support\Facades\Lang;
    use Laravel\Head\Facades\Head;
    use Modules\Cms\Actions\Head\ComposeDocumentTitleAction;

    $brandKey = 'pub_theme::header.brand.name';
    $brand = Lang::has($brandKey) ? trim((string) __($brandKey)) : '';

    Head::title(app(ComposeDocumentTitleAction::class)->execute((string) __('pub_theme::error_page.not_found.page_title.title'), $brand), exact: true)
        ->viewport('width=device-width, initial-scale=1.0')
        ->robots('noindex, follow');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    @include('cms::components.head')
    <body class="antialiased font-sans bg-white text-gray-900">
        <a href="#main-content" class="skip-link sr-only">{{ __('pub_theme::navigation.actions.skip_to_main.label') }}</a>

        <x-section slug="header"/>

        <main id="main-content" role="main" tabindex="-1" class="pt-[var(--site-header-h)]">
            <section class="bg-gray-50">
                <div class="mx-auto flex min-h-[calc(100dvh-var(--site-header-h))] max-w-3xl flex-col items-start justify-center gap-6 px-4 py-16 sm:px-6 lg:px-8">
                    <p class="text-sm font-semibold uppercase tracking-wider text-gray-600">{{ __('pub_theme::error_page.not_found.code.label') }}</p>
                    <h1 class="text-4xl font-bold text-brand-blue sm:text-5xl">{{ __('pub_theme::error_page.not_found.heading.title') }}</h1>
                    <p class="max-w-prose text-lg text-gray-700">{{ __('pub_theme::error_page.not_found.intro.description') }}</p>

                    <nav aria-label="{{ __('pub_theme::error_page.suggestions.intro.label') }}">
                        <ul class="flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                            <li>
                                <a href="{{ route('home') }}" class="inline-flex min-h-[44px] w-full items-center justify-center rounded-lg bg-brand-green px-6 py-3 font-semibold text-white hover:bg-brand-green-dark sm:w-auto">{{ __('pub_theme::error_page.actions.home.label') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('container0.index', ['container0' => 'services']) }}" class="inline-flex min-h-[44px] w-full items-center justify-center rounded-lg border-2 border-brand-blue bg-white px-6 py-3 font-semibold text-brand-blue hover:bg-gray-100 sm:w-auto">{{ __('pub_theme::error_page.actions.services.label') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('container0.index', ['container0' => 'contacts']) }}" class="inline-flex min-h-[44px] w-full items-center justify-center rounded-lg border-2 border-brand-blue bg-white px-6 py-3 font-semibold text-brand-blue hover:bg-gray-100 sm:w-auto">{{ __('pub_theme::error_page.actions.contacts.label') }}</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </section>
        </main>

        <x-section slug="footer"/>

        @livewireScripts
        @vite(['resources/js/app.js'], 'themes/Two')
    </body>
</html>
