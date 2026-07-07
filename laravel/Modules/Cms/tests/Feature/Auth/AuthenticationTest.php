<?php

declare(strict_types=1);

namespace Modules\Cms\Tests\Feature\Auth;

<<<<<<< HEAD
=======
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
>>>>>>> 6ed19256f (.)
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Volt as LivewireVolt;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Tests\TestCase;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

uses(TestCase::class);

test('login screen can be rendered', function (): void {
    $lang = app()->getLocale();
<<<<<<< HEAD
    /** @var class-string<Model> $userClass */
=======
>>>>>>> 6ed19256f (.)
    get('/'.$lang.'/auth/login')->assertStatus(200);
});

test('users can authenticate using the login screen', function (): void {
<<<<<<< HEAD
=======
    /** @var class-string<Model> $userClass */
>>>>>>> 6ed19256f (.)
    $userClass = XotData::make()->getUserClass();
    $factory = $userClass::factory();
    /*
     * $connection_name=app($userClass)->getConnectionName();
     * dddx([
     * 'connection_name' => $connection_name,
     * 'factory'=>$factory->raw(),
     * //'config'=>config('database'),
     *
     * ]);
     */
<<<<<<< HEAD
=======
    /** @var Authenticatable&Model $user */
>>>>>>> 6ed19256f (.)
    $user = $factory->create();

    $response = LivewireVolt::test('auth.login')
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('authenticate');

    $response->assertHasNoErrors(); // ->assertRedirect(route('dashboard', absolute: false))

    // expect(Auth::user())->not->toBeNull();
});

/*
<<<<<<< HEAD
=======
 * test('users cannot authenticate with invalid password', function (): void {
>>>>>>> 6ed19256f (.)
 * $userClass = XotData::make()->getUserClass();
 * $user = $userClass::factory()->create();
 *
 * $response = LivewireVolt::test('auth.login')
 * ->set('email', $user->email)
 * ->set('password', 'wrong-password')
 * ->call('login');
 *
 * $response->assertHasErrors('email');
 *
 * expect(Auth::guest())->toBeTrue();
 * });
 *
<<<<<<< HEAD
=======
 * test('users can logout', function (): void {
>>>>>>> 6ed19256f (.)
 * $userClass = XotData::make()->getUserClass();
 * $user = $userClass::factory()->create();
 *
 * $response = actingAs($user)->post('/logout');
 *
 * $response->assertRedirect('/');
 *
 * expect(Auth::guest())->toBeTrue();
 * });
 */
