<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Feature;

<<<<<<< HEAD
beforeEach(function () {
    // Clean database before each test
    \Modules\User\Models\User::query()->delete();
});

it('can access database connection', function () {
    $count = \Modules\User\Models\User::count();
=======
use Modules\User\Models\User;

beforeEach(function () {
    // Clean database before each test
    User::query()->delete();
});

it('can access database connection', function () {
    $count = User::count();
>>>>>>> dev
    expect($count)->toBeInt();
});

it('can create user via factory', function () {
<<<<<<< HEAD
    $user = \Modules\User\Models\User::factory()->create([
=======
    $user = User::factory()->create([
>>>>>>> dev
        'email' => 'test@example.com',
        'first_name' => 'Test',
        'last_name' => 'User',
    ]);

    expect($user->email)->toBe('test@example.com');
});
