<?php

declare(strict_types=1);

namespace Tests\Unit;

test('password confirmation page remains a Volt page', function (): void {
    $path = dirname(__DIR__, 2).'/Modules/User/resources/views/pages/auth/password/confirm.blade.php';

    expect(is_file($path))->toBeTrue()
        ->and(file_get_contents($path))->toContain('new class extends Component');
});

test('AutoLabelAction getComponentName method simplification', function (): void {
    $action = new \Modules\Xot\Actions\Filament\AutoLabelAction();
    $reflection = new \ReflectionClass($action);
    expect($reflection->hasMethod('getComponentName'))->toBeTrue();
});

test('GetModulesNavigationItems action exists without phpstan-ignore', function (): void {
    $action = new \Modules\Xot\Actions\Filament\GetModulesNavigationItems();
    expect($action)->toBeInstanceOf(\Modules\Xot\Actions\Filament\GetModulesNavigationItems::class);
});

test('XotBasePage getModel method exists', function (): void {
    $reflection = new \ReflectionClass(\Modules\Xot\Filament\Pages\XotBasePage::class);
    expect($reflection->hasMethod('getModel'))->toBeTrue();
});

test('XotBaseState getName method exists', function (): void {
    $reflection = new \ReflectionClass(\Modules\Xot\States\XotBaseState::class);
    expect($reflection->hasMethod('getName'))->toBeTrue();
});

test('Extra table migration file exists', function (): void {
    $migrationFile = 'Modules/Xot/database/migrations/2024_01_01_000015_create_extra_table.php';
    expect(file_exists($migrationFile))->toBeTrue();
});
