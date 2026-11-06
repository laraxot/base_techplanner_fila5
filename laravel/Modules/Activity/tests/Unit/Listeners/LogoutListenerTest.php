<?php

declare(strict_types=1);

use Illuminate\Auth\Events\Logout;
<<<<<<< .merge_file_LQauLG
use Modules\Activity\Providers\EventServiceProvider;
use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Tests\TestCase;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;
uses(TestCase::class);

test('logout listener is registered for logout event', function () {
    $reflection = new ReflectionClass(EventServiceProvider::class);
    $properties = $reflection->getDefaultProperties();
    $listen = $properties['listen'] ?? null;
    Assert::assertIsArray($listen);
    $handlers = $listen[Logout::class] ?? [];
    Assert::assertIsArray($handlers);

    Assert::assertContains(LogoutListener::class, $handlers);
});
=======
<<<<<<< HEAD
use Illuminate\Support\Facades\Event;
use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Tests\TestCase;
=======
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Event;
use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Models\Activity;
use Modules\Activity\Tests\TestCase;
use Modules\User\Models\User;
>>>>>>> 6ed19256f (.)

uses(TestCase::class);

test('logout listener is registered for logout event', function () {
    Event::fake();

    Event::assertListening(
        Logout::class,
        LogoutListener::class
    );
<<<<<<< HEAD
})->skip('LogoutListener may not be registered in EventServiceProvider');
>>>>>>> .merge_file_0TQMRy

test('logout listener can be instantiated', function () {
    Assert::assertTrue((new ReflectionClass(LogoutListener::class))->isInstantiable());
});

test('logout listener has handle method', function () {
    $listener = new LogoutListener;
    $reflection = new ReflectionClass($listener);

    Assert::assertTrue($reflection->hasMethod('handle'));
});

test('logout listener handle method accepts logout event', function () {
    $listener = new LogoutListener;
    $reflection = new ReflectionClass($listener);
    $method = $reflection->getMethod('handle');
    $parameters = $method->getParameters();

<<<<<<< .merge_file_LQauLG
    Assert::assertCount(1, $parameters);
    $parameterType = $parameters[0]->getType();
    Assert::assertInstanceOf(\ReflectionNamedType::class, $parameterType);
    Assert::assertSame(Logout::class, $parameterType->getName());
=======
    expect($parameters)->toHaveCount(1);
    expect($parameters[0]->getType()?->getName())->toBe(Logout::class);
=======
});

test('logout listener handles logout event and creates activity', function () {
    $user = User::factory()->create(); // @phpstan-ignore-line method.nonObject
    \assert($user instanceof User);
    $event = new Logout('web', $user);

    $listener = new LogoutListener;
    $listener->handle($event);

    $activity = Activity::where('causer_type', User::class)
        ->where('causer_id', $user->id)
        ->where('event', 'logout')
        ->first();

    \assert($activity instanceof Activity);
    expect($activity)->not->toBeNull();
    expect($activity->description)->toContain('logout');
    expect($activity->causer_id)->toBe($user->id);
    expect($activity->causer_type)->toBe(User::class);
    expect($activity->properties)->toHaveKey('guard', 'web');
});

test('logout listener creates activity with correct properties', function () {
    $user = User::factory()->create(); // @phpstan-ignore-line method.nonObject
    \assert($user instanceof User);
    $event = new Logout('api', $user);

    $listener = new LogoutListener;
    $listener->handle($event);

    $activity = Activity::where('causer_id', $user->id)->latest()->first();
    \assert($activity instanceof Activity);

    expect($activity->properties)
        ->toHaveKey('guard', 'api')
        ->toHaveKey('ip_address')
        ->toHaveKey('user_agent')
        ->toHaveKey('timestamp');
});

test('logout listener handles multiple logout events correctly', function () {
    $user1 = User::factory()->create(); // @phpstan-ignore-line method.nonObject
    \assert($user1 instanceof User);
    $user2 = User::factory()->create(); // @phpstan-ignore-line method.nonObject
    \assert($user2 instanceof User);

    $event1 = new Logout('web', $user1);
    $event2 = new Logout('api', $user2);

    $listener = new LogoutListener;
    $listener->handle($event1);
    $listener->handle($event2);

    $activities = Activity::whereIn('causer_id', [$user1->id, $user2->id])->get();

    expect($activities)->toHaveCount(2);

    $user1Activity = $activities->where('causer_id', $user1->id)->first();
    \assert($user1Activity instanceof Activity);
    $user2Activity = $activities->where('causer_id', $user2->id)->first();
    \assert($user2Activity instanceof Activity);

    expect($user1Activity->properties['guard'])->toBe('web');
    expect($user2Activity->properties['guard'])->toBe('api');
});

test('logout listener includes session duration when available', function () {
    $user = User::factory()->create(); // @phpstan-ignore-line method.nonObject
    \assert($user instanceof User);

    $loginTime = now()->subHours(2);
    $user->last_login_at = $loginTime;
    $user->save();

    $event = new Logout('web', $user);

    $listener = new LogoutListener;
    $listener->handle($event);

    $activity = Activity::where('causer_id', $user->id)->first();
    \assert($activity instanceof Activity);

    expect($activity->properties)->toHaveKey('session_duration');
    expect($activity->properties['session_duration'])->toBeGreaterThanOrEqual(7200);
});

test('logout listener uses correct log name for activities', function () {
    $user = User::factory()->create(); // @phpstan-ignore-line method.nonObject
    \assert($user instanceof User);
    $event = new Logout('web', $user);

    $listener = new LogoutListener;
    $listener->handle($event);

    $activity = Activity::where('causer_id', $user->id)->first();
    \assert($activity instanceof Activity);

    expect($activity->log_name)->toBe('auth');
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_0TQMRy
});

test('logout listener handles event without user gracefully', function () {
    $user = new User;
    $user->exists = true;
    $event = new Logout('web', $user);
    (new ReflectionClass(Logout::class))->getProperty('user')->setValue($event, null);

    $listener = new LogoutListener;
<<<<<<< .merge_file_LQauLG
    $listener->handle($event);
=======

    expect(fn () => $listener->handle($event))->not->toThrow(Exception::class);
<<<<<<< HEAD
=======

    $activities = Activity::where('event', 'logout')->get();
    expect($activities)->toBeEmpty();
});

test('logout listener creates unique activities for same user different sessions', function () {
    $user = User::factory()->create(); // @phpstan-ignore-line method.nonObject
    \assert($user instanceof User);

    $event1 = new Logout('web', $user);
    $event2 = new Logout('api', $user);

    $listener = new LogoutListener;
    $listener->handle($event1);
    $listener->handle($event2);

    $activities = Activity::where('causer_id', $user->id)->get();

    expect($activities)->toHaveCount(2);

    $firstActivity = $activities->first();
    \assert($firstActivity instanceof Activity);
    $lastActivity = $activities->last();
    \assert($lastActivity instanceof Activity);

    expect($firstActivity->properties['guard'])->toBe('web');
    expect($lastActivity->properties['guard'])->toBe('api');
    expect($firstActivity->id)->not->toBe($lastActivity->id);
});

test('logout listener tracks logout reason when provided', function () {
    $user = User::factory()->create(); // @phpstan-ignore-line method.nonObject
    \assert($user instanceof User);
    $event = new Logout('web', $user);

    // Assuming implementation checks request()
    request()->merge(['logout_reason' => 'user_initiated']);

    $listener = new LogoutListener;
    $listener->handle($event);

    $activity = Activity::where('causer_id', $user->id)->first();
    \assert($activity instanceof Activity);

    expect($activity->properties)->toHaveKey('logout_reason', 'user_initiated');
});

test('logout listener handles concurrent logout events', function () {
    $users = User::factory()->count(5)->create(); // @phpstan-ignore-line method.nonObject
    \assert($users instanceof Collection);

    $events = $users->map(fn ($user) => new Logout('web', $user));

    $listener = new LogoutListener;

    foreach ($events as $event) {
        \assert($event instanceof Logout);
        $listener->handle($event);
    }

    $activities = Activity::where('event', 'logout')->get();

    expect($activities)->toHaveCount(5);

    $userIds = $activities->pluck('causer_id')->unique();
    expect($userIds)->toHaveCount(5);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_0TQMRy
});
