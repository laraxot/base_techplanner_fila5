<?php

use function Laravel\Folio\{middleware, name};
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
$base_middleware = [];

name('home');
middleware($base_middleware);

new class extends Component
{
};

?>

<x-layouts.app>
    @volt('home')
    <div class="min-h-screen bg-gray-100">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <x-page side="content" slug="home" />
                </div>

            
    </div>
    @endvolt
</x-layouts.app>
