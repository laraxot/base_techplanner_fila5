<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Modules\Tenant\Models\Tenant;
use Modules\User\Models\Permission;
use Modules\User\Models\Profile;
use Modules\User\Models\Role;
use Modules\User\Models\Socialite;
<<<<<<< HEAD
    expect($user->profile)->toBeInstanceOf(Profile::class);
=======
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

it('can create a user with basic attributes', function () {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => bcrypt('password123'),
    ]);

    expect($user)->toBeInstanceOf(User::class);
    expect($user->name)->toBe('John Doe');
    expect($user->email)->toBe('john@example.com');
    expect($user->exists)->toBeTrue();
});

it('can create a user with profile', function () {
    $user = User::factory()->withProfile()->create([
        'name' => 'Jane Smith',
        'email' => 'jane@example.com',
    ]);

    expect($user->profile)->toBeInstanceOf(\Modules\User\Models\Profile::class);
>>>>>>> 8215f950 (.)
    expect($user->profile->user_id)->toBe($user->id);
});

it('can authenticate a user', function () {
    $user = User::factory()->create([
        'email' => 'auth@example.com',
        'password' => bcrypt('secret123'),
    ]);

<<<<<<< HEAD
$this->assertTrue(auth()->attempt([
=======
    $this->assertTrue(auth())
>>>>>>> 8215f950 (.)
        'email' => 'auth@example.com',
        'password' => 'secret123',
    ]));
});

it('can create a user role', function () {
<<<<<<< HEAD
$role = Role::factory()->create([
=======
    $role = \Modules\User\Models\Role::factory()->create([
>>>>>>> 8215f950 (.)
        'name' => 'admin',
        'guard_name' => 'web',
    ]);

<<<<<<< HEAD
expect($role)->toBeInstanceOf(Role::class);
=======
    expect($role)->toBeInstanceOf(\Modules\User\Models\Role::class);
>>>>>>> 8215f950 (.)
    expect($role->name)->toBe('admin');
});

it('can create a user permission', function () {
<<<<<<< HEAD
$permission = Permission::factory()->create([
=======
    $permission = \Modules\User\Models\Permission::factory()->create([
>>>>>>> 8215f950 (.)
        'name' => 'edit_posts',
        'guard_name' => 'web',
    ]);

<<<<<<< HEAD
expect($permission)->toBeInstanceOf(Permission::class);
=======
    expect($permission)->toBeInstanceOf(\Modules\User\Models\Permission::class);
>>>>>>> 8215f950 (.)
    expect($permission->name)->toBe('edit_posts');
});

it('can assign role to user', function () {
    $user = User::factory()->create();
<<<<<<< HEAD
$role = Role::factory()->create([
=======
    $role = \Modules\User\Models\Role::factory()->create([
>>>>>>> 8215f950 (.)
        'name' => 'editor',
        'guard_name' => 'web',
    ]);

    $user->assignRole($role);

    expect($user->hasRole('editor'))->toBeTrue();
});

it('can attach permission to user', function () {
    $user = User::factory()->create();
<<<<<<< HEAD
$permission = Permission::factory()->create([
=======
    $permission = \Modules\User\Models\Permission::factory()->create([
>>>>>>> 8215f950 (.)
        'name' => 'delete_users',
        'guard_name' => 'web',
    ]);

    $user->givePermissionTo($permission);

    expect($user->can('delete_users'))->toBeTrue();
});

it('can create a tenant user', function () {
<<<<<<< HEAD
$tenant = Tenant::factory()->create([
=======
    $tenant = \Modules\Tenant\Models\Tenant::factory()->create([
>>>>>>> 8215f950 (.)
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

<<<<<<< HEAD
expect($user->socialite->first())->toBeInstanceOf(Socialite::class);
=======
    expect($user->socialite->first())->toBeInstanceOf(\Modules\User\Models\Socialite::class);
>>>>>>> 8215f950 (.)
    expect($user->socialite->first()->provider)->toBe('google');
});
