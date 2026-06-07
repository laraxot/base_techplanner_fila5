<?php

declare(strict_types=1);

<<<<<<< HEAD
use Filament\Facades\Filament;
=======
namespace Modules\User\Tests\Feature;

use Filament\Facades\Filament;
use Filament\Schemas\SchemasServiceProvider;
>>>>>>> dev
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Modules\User\Filament\Pages\MyProfilePage;
use Modules\User\Models\User;
use Modules\User\Providers\Filament\AdminPanelProvider;
use Modules\User\Tests\TestCase;

use function Pest\Laravel\actingAs;

uses(TestCase::class);

beforeEach(function (): void {
    $this->app->register(AdminPanelProvider::class);
<<<<<<< HEAD
<<<<<<< HEAD
    $this->app->register(\Filament\Schemas\SchemasServiceProvider::class);
=======
>>>>>>> 4b6b99016 (first commit)
=======
    $this->app->register(SchemasServiceProvider::class);
>>>>>>> dev
    Filament::setCurrentPanel(Filament::getPanel('user::admin'));
});

test('can change profile password', function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
    /** @var User $user */
=======
>>>>>>> 4b6b99016 (first commit)
=======
    /** @var User $user */
>>>>>>> dev
    $user = User::factory()->create([
        'password' => Hash::make('old_password'),
    ]);

    actingAs($user);

    Livewire::test(MyProfilePage::class)
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
        ->fill([
            'passwordData.current_password' => 'old_password',
            'passwordData.new_password' => 'new_password',
            'passwordData.password_confirmation' => 'new_password',
        ])
<<<<<<< HEAD
=======
        ->fillForm([
            'Current password' => 'old_password',
            'new_password' => 'new_password',
            'passwordConfirmation' => 'new_password',
        ], 'editPasswordForm')
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ->call('updatePassword')
        ->assertHasNoFormErrors();

    expect(Hash::check('new_password', $user->fresh()?->password))->toBeTrue();
});

test('cannot change password with wrong current password', function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
    /** @var User $user */
=======
>>>>>>> 4b6b99016 (first commit)
=======
    /** @var User $user */
>>>>>>> dev
    $user = User::factory()->create([
        'password' => Hash::make('old_password'),
    ]);

    actingAs($user);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    $testable = Livewire::test(MyProfilePage::class)
        ->fill([
            'passwordData.current_password' => 'wrong_password',
            'passwordData.new_password' => 'new_password',
            'passwordData.password_confirmation' => 'new_password',
        ])
        ->call('updatePassword');

    $testable->assertHasErrors();

    expect(collect($testable->errors()->keys())->contains(fn ($key) => str_contains($key, 'current_password')))->toBeTrue();
<<<<<<< HEAD
=======
    Livewire::test(MyProfilePage::class)
        ->fillForm([
            'Current password' => 'wrong_password',
            'new_password' => 'new_password',
            'passwordConfirmation' => 'new_password',
        ], 'editPasswordForm')
        ->call('updatePassword')
        ->assertHasFormErrors(['Current password' => 'current_password'], 'editPasswordForm');
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

    expect(Hash::check('old_password', $user->fresh()?->password))->toBeTrue();
});
