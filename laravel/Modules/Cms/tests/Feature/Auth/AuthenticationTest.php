<?php

declare(strict_types=1);

namespace Modules\Cms\Tests\Feature\Auth;

<<<<<<< .merge_file_XIE7if
=======
<<<<<<< HEAD
=======
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
>>>>>>> 6ed19256f (.)
use Illuminate\Support\Facades\Auth;
>>>>>>> .merge_file_wDSkUj
use Livewire\Volt\Volt as LivewireVolt;

use function Pest\Laravel\get;

test('login screen can be rendered', function (): void {
    $lang = app()->getLocale();
<<<<<<< .merge_file_XIE7if
=======
<<<<<<< HEAD
    /** @var class-string<Model> $userClass */
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_wDSkUj
    get('/'.$lang.'/auth/login')->assertStatus(200);
});

test('users can authenticate using the login screen', function (): void {
<<<<<<< .merge_file_XIE7if
    $user = $this->createTestUser();
=======
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
>>>>>>> .merge_file_wDSkUj

    $response = LivewireVolt::test('auth.login')
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('authenticate');

    $response->assertHasNoErrors(); // ->assertRedirect(route('dashboard', absolute: false))

    // expect(Auth::user())->not->toBeNull();
});

/*
<<<<<<< .merge_file_XIE7if
 * test('users cannot authenticate with invalid password', function (): void {
 * $user = $this->createTestUser();
=======
<<<<<<< HEAD
=======
 * test('users cannot authenticate with invalid password', function (): void {
>>>>>>> 6ed19256f (.)
 * $userClass = XotData::make()->getUserClass();
 * $user = $userClass::factory()->create();
>>>>>>> .merge_file_wDSkUj
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
<<<<<<< .merge_file_XIE7if
 * test('users can logout', function (): void {
 * $user = $this->createTestUser();
=======
<<<<<<< HEAD
=======
 * test('users can logout', function (): void {
>>>>>>> 6ed19256f (.)
 * $userClass = XotData::make()->getUserClass();
 * $user = $userClass::factory()->create();
>>>>>>> .merge_file_wDSkUj
 *
 * $response = actingAs($user)->post('/logout');
 *
 * $response->assertRedirect('/');
 *
 * expect(Auth::guest())->toBeTrue();
 * });
 */
