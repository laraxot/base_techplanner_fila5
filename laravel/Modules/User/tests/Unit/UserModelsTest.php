<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Modules\Tenant\Models\Tenant;
use Modules\User\Models\Permission;
use Modules\User\Models\Profile;
use Modules\User\Models\Role;
use Modules\User\Models\Socialite;
    expect($user->profile)->toBeInstanceOf(Profile::class);
    expect($user->profile->user_id)->toBe($user->id);
});

it('can authenticate a user', function () {
    $user = User::factory()->create([
        'email' => 'auth@example.com',
        'password' => bcrypt('secret123'),
    ]);

$this->assertTrue(auth()->attempt([
        'email' => 'auth@example.com',
        'password' => 'secret123',
    ]));
});

it('can create a user role', function () {
$role = Role::factory()->create([
        'name' => 'admin',
        'guard_name' => 'web',
    ]);

expect($role)->toBeInstanceOf(Role::class);
    expect($role->name)->toBe('admin');
});

it('can create a user permission', function () {
$permission = Permission::factory()->create([
        'name' => 'edit_posts',
        'guard_name' => 'web',
    ]);

expect($permission)->toBeInstanceOf(Permission::class);
    expect($permission->name)->toBe('edit_posts');
});

it('can assign role to user', function () {
    $user = User::factory()->create();
$role = Role::factory()->create([
        'name' => 'editor',
        'guard_name' => 'web',
    ]);

    $user->assignRole($role);

    expect($user->hasRole('editor'))->toBeTrue();
});

it('can attach permission to user', function () {
    $user = User::factory()->create();
$permission = Permission::factory()->create([
        'name' => 'delete_users',
        'guard_name' => 'web',
    ]);

    $user->givePermissionTo($permission);

    expect($user->can('delete_users'))->toBeTrue();
});

it('can create a tenant user', function () {
$tenant = Tenant::factory()->create([
        'name' => 'Test Tenant',
        'domain' => 'tenant.example.com',
    ]);

    $user = User::factory()->forTenant($tenant)->create([
        'name' => 'Tenant User',
        'email' => 'tenant@example.com',
    ]);

    expect($user->tenant_id)->toBe($tenant->id);
    expect($user->tenant->name)->toBe('Test Tenant');
});

it('can create a user with socialite data', function () {
    $user = User::factory()->create([
        'name' => 'Social User',
        'email' => 'social@example.com',
    ]);

    $user->socialite()->create([
        'provider' => 'google',
        'provider_id' => 'google_12345',
        'token' => 'google_token',
    ]);

expect($user->socialite->first())->toBeInstanceOf(Socialite::class);
    expect($user->socialite->first()->provider)->toBe('google');
});
