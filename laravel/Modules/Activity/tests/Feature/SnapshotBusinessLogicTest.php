<?php

declare(strict_types=1);

<<<<<<< .merge_file_zTgVhW
namespace Modules\Activity\Tests\Feature;

use Illuminate\Support\Carbon;
=======
<<<<<<< HEAD
>>>>>>> .merge_file_JdGk0D
use Illuminate\Support\Str;
use Modules\Activity\Database\Factories\SnapshotFactory;
use Modules\Activity\Models\Snapshot;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< .merge_file_zTgVhW
test('can create snapshot with basic information', function (): void {
    $snapshot = SnapshotFactory::new()->createOne([
=======
it('can create snapshot with basic information', function (): void {
=======
use Modules\Activity\Models\Snapshot;
use Modules\Activity\Tests\TestCase;
use Illuminate\Support\Str;

uses(TestCase::class);

it('can create snapshot with basic information', function (): void
{
>>>>>>> 6ed19256f (.)
    $snapshot = Snapshot::factory()->create([
>>>>>>> .merge_file_JdGk0D
        'aggregate_uuid' => Str::uuid()->toString(),
        'aggregate_version' => 1,
        'state' => ['name' => 'Test Aggregate', 'status' => 'active'],
    ]);
    Assert::assertInstanceOf(Snapshot::class, $snapshot);

    Assert::assertIsString($snapshot->aggregate_uuid);
    Assert::assertSame(1, $snapshot->aggregate_version);

    $state = $snapshot->state;
    Assert::assertIsArray($state);
    Assert::assertSame('Test Aggregate', $state['name']);
    Assert::assertSame('active', $state['status']);
});

<<<<<<< .merge_file_zTgVhW
test('can create snapshot with complex state', function (): void {
=======
<<<<<<< HEAD
it('can create snapshot with complex state', function (): void {
=======
it('can create snapshot with complex state', function (): void
{
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_JdGk0D
    $complexState = [
        'user_info' => [
            'id' => 123,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'profile' => [
                'avatar' => '/avatars/john.jpg',
                'bio' => 'Software Developer',
                'preferences' => [
                    'theme' => 'dark',
                    'language' => 'en',
                    'notifications' => true,
                ],
            ],
        ],
        'account_status' => [
            'is_active' => true,
            'last_login' => now()->subHours(2)->toISOString(),
            'login_count' => 45,
            'subscription' => [
                'plan' => 'premium',
                'expires_at' => now()->addYear()->toISOString(),
                'features' => ['api_access', 'priority_support', 'advanced_analytics'],
            ],
        ],
        'metadata' => [
            'created_by' => 'system',
            'source' => 'web_registration',
            'tags' => ['verified', 'premium_user'],
        ],
    ];

    $snapshot = SnapshotFactory::new()->createOne([
        'aggregate_uuid' => Str::uuid()->toString(),
        'aggregate_version' => 5,
        'state' => $complexState,
    ]);
    Assert::assertInstanceOf(Snapshot::class, $snapshot);

    Assert::assertSame(5, $snapshot->aggregate_version);

    $state = $snapshot->state;
    Assert::assertIsArray($state);

    /** @var array<array-key, mixed> $userInfo */
    $userInfo = $state['user_info'];
    Assert::assertIsArray($userInfo);
    Assert::assertSame('John Doe', $userInfo['name']);

    /** @var array<array-key, mixed> $accountStatus */
    $accountStatus = $state['account_status'];
    Assert::assertIsArray($accountStatus);

    /** @var array<array-key, mixed> $subscription */
    $subscription = $accountStatus['subscription'];
    Assert::assertIsArray($subscription);
    Assert::assertSame('premium', $subscription['plan']);
    Assert::assertTrue($accountStatus['is_active']);

    /** @var array<array-key, mixed> $meta */
    $meta = $state['metadata'];
    Assert::assertIsArray($meta);
    Assert::assertIsArray($meta['tags']);
    Assert::assertContains('verified', $meta['tags']);
});

<<<<<<< .merge_file_zTgVhW
test('can manage snapshot versioning', function (): void {
=======
<<<<<<< HEAD
it('can manage snapshot versioning', function (): void {
=======
it('can manage snapshot versioning', function (): void
{
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_JdGk0D
    $aggregateUuid = Str::uuid()->toString();

    $snapshot1 = SnapshotFactory::new()->createOne([
        'aggregate_uuid' => $aggregateUuid,
        'aggregate_version' => 1,
        'state' => ['version' => 1, 'data' => 'Initial state'],
    ]);
    Assert::assertInstanceOf(Snapshot::class, $snapshot1);

    $snapshot2 = SnapshotFactory::new()->createOne([
        'aggregate_uuid' => $aggregateUuid,
        'aggregate_version' => 2,
        'state' => ['version' => 2, 'data' => 'Updated state'],
    ]);
    Assert::assertInstanceOf(Snapshot::class, $snapshot2);

    $snapshot3 = SnapshotFactory::new()->createOne([
        'aggregate_uuid' => $aggregateUuid,
        'aggregate_version' => 3,
        'state' => ['version' => 3, 'data' => 'Final state'],
    ]);
    Assert::assertInstanceOf(Snapshot::class, $snapshot3);

    Assert::assertSame($snapshot1->aggregate_uuid, $aggregateUuid);
    Assert::assertSame($snapshot2->aggregate_uuid, $aggregateUuid);
    Assert::assertSame($snapshot3->aggregate_uuid, $aggregateUuid);

    Assert::assertSame($snapshot1->aggregate_version, 1);
    Assert::assertSame($snapshot2->aggregate_version, 2);
    Assert::assertSame($snapshot3->aggregate_version, 3);
});

<<<<<<< .merge_file_zTgVhW
test('can query snapshots by aggregate uuid', function (): void {
=======
<<<<<<< HEAD
it('can query snapshots by aggregate uuid', function (): void {
=======
it('can query snapshots by aggregate uuid', function (): void
{
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_JdGk0D
    $uuid1 = Str::uuid()->toString();
    $uuid2 = Str::uuid()->toString();

    SnapshotFactory::new()->createOne([
        'aggregate_uuid' => $uuid1,
        'aggregate_version' => 1,
        'state' => ['aggregate' => 'first', 'version' => 1],
    ]);

    SnapshotFactory::new()->createOne([
        'aggregate_uuid' => $uuid1,
        'aggregate_version' => 2,
        'state' => ['aggregate' => 'first', 'version' => 2],
    ]);

    SnapshotFactory::new()->createOne([
        'aggregate_uuid' => $uuid2,
        'aggregate_version' => 1,
        'state' => ['aggregate' => 'second', 'version' => 1],
    ]);

    $snapshots1 = Snapshot::where('aggregate_uuid', $uuid1)->get();
    $snapshots2 = Snapshot::where('aggregate_uuid', $uuid2)->get();

    Assert::assertCount(2, $snapshots1);
    Assert::assertCount(1, $snapshots2);

    $first1 = $snapshots1->first();
    $first2 = $snapshots2->first();
    Assert::assertNotNull($first1);
    Assert::assertNotNull($first2);
    Assert::assertSame($uuid1, $first1->aggregate_uuid);
    Assert::assertSame($uuid2, $first2->aggregate_uuid);
});

<<<<<<< .merge_file_zTgVhW
test('can query snapshots by version', function (): void {
=======
<<<<<<< HEAD
it('can query snapshots by version', function (): void {
=======
it('can query snapshots by version', function (): void
{
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_JdGk0D
    $uuid = Str::uuid()->toString();

    SnapshotFactory::new()->createOne([
        'aggregate_uuid' => $uuid,
        'aggregate_version' => 1,
        'state' => ['version' => 1],
    ]);

    SnapshotFactory::new()->createOne([
        'aggregate_uuid' => $uuid,
        'aggregate_version' => 5,
        'state' => ['version' => 5],
    ]);

    SnapshotFactory::new()->createOne([
        'aggregate_uuid' => $uuid,
        'aggregate_version' => 10,
        'state' => ['version' => 10],
    ]);

    $version1Snapshot = Snapshot::where('aggregate_uuid', $uuid)
        ->where('aggregate_version', 1)
        ->first();

    $version5Snapshot = Snapshot::where('aggregate_uuid', $uuid)
        ->where('aggregate_version', 5)
        ->first();

    $version10Snapshot = Snapshot::where('aggregate_uuid', $uuid)
        ->where('aggregate_version', 10)
        ->first();

    Assert::assertNotNull($version1Snapshot);
    Assert::assertNotNull($version5Snapshot);
    Assert::assertNotNull($version10Snapshot);

    Assert::assertSame($version1Snapshot->aggregate_version, 1);
    Assert::assertSame($version5Snapshot->aggregate_version, 5);
    Assert::assertSame($version10Snapshot->aggregate_version, 10);
});

<<<<<<< .merge_file_zTgVhW
test('can handle snapshot with empty state', function (): void {
    $snapshot = SnapshotFactory::new()->createOne([
=======
<<<<<<< HEAD
it('can handle snapshot with empty state', function (): void {
=======
it('can handle snapshot with empty state', function (): void
{
>>>>>>> 6ed19256f (.)
    $snapshot = Snapshot::factory()->create([
>>>>>>> .merge_file_JdGk0D
        'aggregate_uuid' => Str::uuid()->toString(),
        'aggregate_version' => 1,
        'state' => [],
    ]);
    Assert::assertInstanceOf(Snapshot::class, $snapshot);

    $state = $snapshot->state;
    Assert::assertIsArray($state);
    Assert::assertEmpty($state);
});

<<<<<<< .merge_file_zTgVhW
test('can handle snapshot with empty array state', function (): void {
    $snapshot = SnapshotFactory::new()->createOne([
=======
<<<<<<< HEAD
it('can handle snapshot with empty array state', function (): void {
=======
it('can handle snapshot with empty array state', function (): void
{
>>>>>>> 6ed19256f (.)
    $snapshot = Snapshot::factory()->create([
>>>>>>> .merge_file_JdGk0D
        'aggregate_uuid' => Str::uuid()->toString(),
        'aggregate_version' => 1,
        'state' => [],
    ]);
    Assert::assertInstanceOf(Snapshot::class, $snapshot);

    $state = $snapshot->state;
    Assert::assertIsArray($state);
    Assert::assertEmpty($state);
});

<<<<<<< .merge_file_zTgVhW
test('can restore state from snapshot', function (): void {
=======
<<<<<<< HEAD
it('can restore state from snapshot', function (): void {
=======
it('can restore state from snapshot', function (): void
{
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_JdGk0D
    $originalState = [
        'user_id' => 456,
        'settings' => [
            'theme' => 'light',
            'language' => 'it',
            'notifications' => false,
        ],
        'preferences' => [
            'timezone' => 'Europe/Rome',
            'date_format' => 'd/m/Y',
            'currency' => 'EUR',
        ],
    ];

    $snapshot = SnapshotFactory::new()->createOne([
        'aggregate_uuid' => Str::uuid()->toString(),
        'aggregate_version' => 7,
        'state' => $originalState,
    ]);
    Assert::assertInstanceOf(Snapshot::class, $snapshot);

    $restoredState = $snapshot->state;
    Assert::assertIsArray($restoredState);
    // Parità strutturale col payload originale: prova lo scopo dello snapshot (round-trip state).
    Assert::assertSame($originalState, $restoredState);
});

<<<<<<< .merge_file_zTgVhW
test('can compare snapshot versions', function (): void {
=======
<<<<<<< HEAD
it('can compare snapshot versions', function (): void {
=======
it('can compare snapshot versions', function (): void
{
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_JdGk0D
    $uuid = Str::uuid()->toString();

    $snapshot1 = SnapshotFactory::new()->createOne([
        'aggregate_uuid' => $uuid,
        'aggregate_version' => 1,
        'state' => ['value' => 100, 'status' => 'initial'],
    ]);
    Assert::assertInstanceOf(Snapshot::class, $snapshot1);

    $snapshot2 = SnapshotFactory::new()->createOne([
        'aggregate_uuid' => $uuid,
        'aggregate_version' => 2,
        'state' => ['value' => 200, 'status' => 'updated'],
    ]);
    Assert::assertInstanceOf(Snapshot::class, $snapshot2);

    $snapshot3 = SnapshotFactory::new()->createOne([
        'aggregate_uuid' => $uuid,
        'aggregate_version' => 3,
        'state' => ['value' => 300, 'status' => 'final'],
    ]);
    Assert::assertInstanceOf(Snapshot::class, $snapshot3);

    Assert::assertLessThan($snapshot2->aggregate_version, $snapshot1->aggregate_version);
    Assert::assertLessThan($snapshot3->aggregate_version, $snapshot2->aggregate_version);

    /** @var array<array-key, mixed> $state1 */
    $state1 = $snapshot1->state;
    /** @var array<array-key, mixed> $state2 */
    $state2 = $snapshot2->state;
    /** @var array<array-key, mixed> $state3 */
    $state3 = $snapshot3->state;

    Assert::assertSame(100, $state1['value']);
    Assert::assertSame(200, $state2['value']);
    Assert::assertSame(300, $state3['value']);

    Assert::assertSame('initial', $state1['status']);
    Assert::assertSame('updated', $state2['status']);
    Assert::assertSame('final', $state3['status']);
});

<<<<<<< .merge_file_zTgVhW
test('can handle snapshot with timestamps', function (): void {
    $now = now();

    $snapshot = SnapshotFactory::new()->createOne([
=======
<<<<<<< HEAD
it('can handle snapshot with timestamps', function (): void {
    $now = now();

=======
it('can handle snapshot with timestamps', function (): void
{
    $now = now();
    
>>>>>>> 6ed19256f (.)
    $snapshot = Snapshot::factory()->create([
>>>>>>> .merge_file_JdGk0D
        'aggregate_uuid' => Str::uuid()->toString(),
        'aggregate_version' => 1,
        'state' => ['created_at' => $now->toISOString()],
    ]);
    Assert::assertInstanceOf(Snapshot::class, $snapshot);

    Assert::assertIsString($snapshot->aggregate_uuid);
    Assert::assertSame(1, $snapshot->aggregate_version);
    Assert::assertInstanceOf(Carbon::class, $snapshot->created_at);
});

<<<<<<< .merge_file_zTgVhW
test('can query snapshots by date range', function (): void {
=======
<<<<<<< HEAD
it('can query snapshots by date range', function (): void {
=======
it('can query snapshots by date range', function (): void
{
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_JdGk0D
    $yesterday = now()->subDay();
    $today = now();
    $tomorrow = now()->addDay();

    $yesterdaySnapshot = SnapshotFactory::new()->createOne([
        'aggregate_uuid' => Str::uuid()->toString(),
        'aggregate_version' => 1,
        'state' => ['date' => 'yesterday'],
        'created_at' => $yesterday,
    ]);

    $todaySnapshotRecord = SnapshotFactory::new()->createOne([
        'aggregate_uuid' => Str::uuid()->toString(),
        'aggregate_version' => 1,
        'state' => ['date' => 'today'],
        'created_at' => $today,
    ]);

    $tomorrowSnapshot = SnapshotFactory::new()->createOne([
        'aggregate_uuid' => Str::uuid()->toString(),
        'aggregate_version' => 1,
        'state' => ['date' => 'tomorrow'],
        'created_at' => $tomorrow,
    ]);
    $snapshotIds = [$yesterdaySnapshot->id, $todaySnapshotRecord->id, $tomorrowSnapshot->id];

    $todaySnapshots = Snapshot::whereKey($snapshotIds)->whereDate('created_at', today())->get();
    Assert::assertCount(1, $todaySnapshots);
    $todaySnapshot = $todaySnapshots->first();
    Assert::assertNotNull($todaySnapshot);

    /** @var array<array-key, mixed> $todayState */
    $todayState = $todaySnapshot->state;
    Assert::assertSame('today', $todayState['date']);

    $recentSnapshots = Snapshot::whereKey($snapshotIds)->where('created_at', '>=', $yesterday)->get();
    Assert::assertCount(3, $recentSnapshots);
});

<<<<<<< .merge_file_zTgVhW
test('can handle snapshot with metadata', function (): void {
=======
<<<<<<< HEAD
it('can handle snapshot with metadata', function (): void {
=======
it('can handle snapshot with metadata', function (): void
{
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_JdGk0D
    $metadata = [
        'source' => 'user_action',
        'user_id' => 789,
        'action' => 'profile_update',
        'timestamp' => now()->toISOString(),
        'ip_address' => '192.168.1.100',
        'user_agent' => 'Mozilla/5.0',
        'session_id' => Str::random(40),
    ];

    $snapshot = SnapshotFactory::new()->createOne([
        'aggregate_uuid' => Str::uuid()->toString(),
        'aggregate_version' => 1,
        'state' => [
            'profile' => [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
            ],
            'metadata' => $metadata,
        ],
    ]);
<<<<<<< .merge_file_zTgVhW
    Assert::assertInstanceOf(Snapshot::class, $snapshot);

    /** @var array<array-key, mixed> $state */
    $state = $snapshot->state;

    /** @var array<array-key, mixed> $profile */
    $profile = $state['profile'];
    Assert::assertIsArray($profile);
    Assert::assertSame('Alice Johnson', $profile['name']);
    Assert::assertSame('alice@example.com', $profile['email']);

    /** @var array<array-key, mixed> $meta */
    $meta = $state['metadata'];
    Assert::assertIsArray($meta);
    Assert::assertSame('user_action', $meta['source']);
    Assert::assertSame(789, $meta['user_id']);
    Assert::assertSame('profile_update', $meta['action']);
=======

    expect('Alice Johnson')->toBe($snapshot->state['profile']['name']);
    expect('alice@example.com')->toBe($snapshot->state['profile']['email']);
    expect('user_action')->toBe($snapshot->state['metadata']['source']);
    expect(789)->toBe($snapshot->state['metadata']['user_id']);
    expect('profile_update')->toBe($snapshot->state['metadata']['action']);
<<<<<<< HEAD
});
=======
>>>>>>> .merge_file_JdGk0D
});
>>>>>>> 6ed19256f (.)
