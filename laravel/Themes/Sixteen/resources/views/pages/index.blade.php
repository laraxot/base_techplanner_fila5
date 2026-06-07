<?php

use function Laravel\Folio\{middleware, name};
<<<<<<< HEAD
use Filament\Notifications\Notification;
use Filament\Notifications\Livewire\Notifications;
use Filament\Notifications\Actions\Action;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\VerticalAlignment;
use Livewire\Volt\Component;
use Modules\Tenant\Services\TenantService;

/** @var array $base_middleware */
// Per configurazioni avanzate:
// $middleware = TenantService::config('middleware');
// $base_middleware = Arr::get($middleware, 'base', []);
// @var array
=======
use Modules\Cms\Models\Page as CmsPage;

/** @var array $base_middleware */
>>>>>>> dev
$base_middleware = [];

name('home');
middleware($base_middleware);
<<<<<<< HEAD

new class extends Component
{
};

?>

<x-layouts.app>
    @volt('home')
    <div class="min-h-screen bg-gray-100">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 lg:gap-8">
            {{-- Contenuto Principale (3/4 larghezza) - Occupa 3 colonne su 4 --}}
            <div class="lg:col-span-3">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <x-page side="content" slug="home" />
                </div>
            </div>

            {{-- Sidebar Destra (1/4 larghezza) - Occupa 1 colonna su 4 --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <x-page side="sidebar" slug="home" />
                </div>
            </div>
        </div>
    </div>
    @endvolt
=======
?>

@php
    $homePage = CmsPage::query()->where('slug', 'home')->first();
    $homeTitle = (string) __('fixcity::ticket.heading.title.label');
    if ($homePage !== null) {
        $translatedHomeTitle = $homePage->getTranslation('title', app()->getLocale());
        if (is_string($translatedHomeTitle) && $translatedHomeTitle !== '') {
            $homeTitle = $translatedHomeTitle;
        }
    }
@endphp

@php
    $mapLitPreload = null;
    $manifestPath = base_path('Themes/Sixteen/public/manifest.json');
    if (is_readable($manifestPath)) {
        $manifest = json_decode((string) file_get_contents($manifestPath), true);
        $entry = is_array($manifest) ? ($manifest['../../Modules/Geo/resources/js/components/map-lit.js'] ?? null) : null;
        $mapLitPreload = is_array($entry) ? ($entry['file'] ?? null) : null;
    }
@endphp

@if ($mapLitPreload)
    @push('styles')
        <link rel="modulepreload" href="{{ asset('themes/Sixteen/'.$mapLitPreload) }}" crossorigin>
    @endpush
@endif

<x-layouts.app :title="$homeTitle" :meta-description="__('sixteen::home.meta.description')" body-page="segnalazioni-elenco">
    <x-page side="content" slug="home" />
>>>>>>> dev
</x-layouts.app>
