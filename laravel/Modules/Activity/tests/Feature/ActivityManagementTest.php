<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Feature;

use Modules\Activity\Models\Activity;
use Modules\Activity\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(\Modules\Activity\Tests\TestCase::class);

beforeEach(function () {
    // Skip if database not available
    try {
        \DB::connection()->getPdo();
    } catch (\Exception $e) {
        $this->markTestSkipped('Database not available: '.$e->getMessage());
    }
});

test('user can create activity', function () {
<<<<<<< .merge_file_5IvMkt
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(User::class, $user);
=======
    $user = User::factory()->create(); // @phpstan-ignore-line method.nonObject
    \assert($user instanceof User);
    expect($user)->not->toBeNull();
<<<<<<< HEAD
>>>>>>> .merge_file_yhOXTN

=======
    
>>>>>>> 6ed19256f (.)
    $activity = Activity::create([
        'log_name' => 'test',
        'description' => 'Test Description',
        'causer_type' => User::class,
        'causer_id' => $user->id,
    ]);
<<<<<<< .merge_file_5IvMkt
    Assert::assertNotNull($activity);

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame('Test Description', $activity->description);
    Assert::assertSame($user->id, $activity->causer_id);
=======
    \assert($activity instanceof Activity);
    expect($activity)->not->toBeNull();
<<<<<<< HEAD

=======
    
>>>>>>> 6ed19256f (.)
    expect($activity)
        ->toBeInstanceOf(Activity::class)
        ->and($activity->description)->toBe('Test Description')
        ->and($activity->causer_id)->toBe($user->id);
>>>>>>> .merge_file_yhOXTN
});

test('activity can be updated', function () {
    $activity = Activity::create([
        'log_name' => 'test',
        'description' => 'Original Description',
    ]);
<<<<<<< .merge_file_5IvMkt
=======
    \assert($activity instanceof Activity);
    expect($activity)->not->toBeNull();
<<<<<<< HEAD

>>>>>>> .merge_file_yhOXTN
    $activity->update([
        'description' => 'Updated Description',
    ]);

=======
    
    $activity->update([
        'description' => 'Updated Description',
    ]);
    
>>>>>>> 6ed19256f (.)
    $freshActivity = $activity->fresh();
    Assert::assertNotNull($freshActivity);
    Assert::assertSame('Updated Description', $freshActivity->description);
});

test('activity can be deleted', function () {
    $activity = Activity::create([
        'log_name' => 'test',
        'description' => 'Test Description',
    ]);
<<<<<<< .merge_file_5IvMkt
    Assert::assertNotNull($activity);
=======
    \assert($activity instanceof Activity);
    expect($activity)->not->toBeNull();
<<<<<<< HEAD
>>>>>>> .merge_file_yhOXTN

    $activityId = $activity->id;
    $activity->delete();

<<<<<<< .merge_file_5IvMkt
    Assert::assertNull(Activity::find($activityId));
=======
=======
    
    $activityId = $activity->id;
    $activity->delete();
    
>>>>>>> 6ed19256f (.)
    expect(Activity::find($activityId))->toBeNull();
>>>>>>> .merge_file_yhOXTN
});

test('activity belongs to user', function () {
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(User::class, $user);

    $activity = Activity::create([
        'log_name' => 'test',
        'description' => 'Test Description',
        'causer_type' => User::class,
        'causer_id' => $user->id,
    ]);
<<<<<<< .merge_file_5IvMkt
    Assert::assertNotNull($activity);
=======
    \assert($activity instanceof Activity);
    expect($activity)->not->toBeNull();
<<<<<<< HEAD
>>>>>>> .merge_file_yhOXTN

=======
    
>>>>>>> 6ed19256f (.)
    $causer = $activity->causer;
    Assert::assertInstanceOf(User::class, $causer);
    Assert::assertSame($user->id, $causer->id);
});
