<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Unit\Policies;

use Mockery;
use Modules\Gdpr\Models\Consent;
use Modules\Gdpr\Models\Event;
use Modules\Gdpr\Models\Policies\ConsentPolicy;
use Modules\Gdpr\Models\Policies\EventPolicy;
use Modules\Gdpr\Models\Policies\ProfilePolicy;
use Modules\Gdpr\Models\Policies\TreatmentPolicy;
use Modules\Gdpr\Models\Profile;
use Modules\Gdpr\Models\Treatment;
use Modules\Xot\Contracts\UserContract;
use PHPUnit\Framework\Assert;

/**
 * Audit prompt 35 (policies-permissions-audit): copertura positiva/negativa
 * mancante per le Policy Gdpr. Verifica solo il livello Policy (permessi
 * `hasPermissionTo`), non `before()` — che in GdprBasePolicy confronta
 * `XotData::make()->super_admin` con l'email utente invece di `hasRole('super-admin')`
 * come tutte le altre BasePolicy del monorepo: vedi nota nel prompt 35 stesso.
 *
 * @param list<string> $permissions
 *
 * @return Mockery\MockInterface&UserContract
 */
function gdprPolicyUser(array $permissions = []): UserContract
{
    /** @var Mockery\MockInterface&UserContract $user */
    $user = \Mockery::mock(UserContract::class);
    $user->shouldReceive('hasPermissionTo')
        ->andReturnUsing(static fn (string $permission): bool => in_array($permission, $permissions, true));

    return $user;
}

afterEach(function (): void {
    \Mockery::close();
});

test('TreatmentPolicy nega senza permesso e concede con permesso puntuale', function (): void {
    $policy = new TreatmentPolicy();
    $treatment = new Treatment();
    $denied = gdprPolicyUser();
    $allowed = gdprPolicyUser([
        'treatment.viewAny', 'treatment.view', 'treatment.create', 'treatment.update',
        'treatment.delete', 'treatment.restore', 'treatment.forceDelete',
    ]);

    Assert::assertFalse($policy->viewAny($denied));
    Assert::assertFalse($policy->view($denied, $treatment));
    Assert::assertFalse($policy->create($denied));
    Assert::assertFalse($policy->update($denied, $treatment));
    Assert::assertFalse($policy->delete($denied, $treatment));
    Assert::assertFalse($policy->restore($denied, $treatment));
    Assert::assertFalse($policy->forceDelete($denied, $treatment));

    Assert::assertTrue($policy->viewAny($allowed));
    Assert::assertTrue($policy->view($allowed, $treatment));
    Assert::assertTrue($policy->create($allowed));
    Assert::assertTrue($policy->update($allowed, $treatment));
    Assert::assertTrue($policy->delete($allowed, $treatment));
    Assert::assertTrue($policy->restore($allowed, $treatment));
    Assert::assertTrue($policy->forceDelete($allowed, $treatment));
});

test('ConsentPolicy nega senza permesso e concede con permesso puntuale', function (): void {
    $policy = new ConsentPolicy();
    $consent = new Consent();
    $denied = gdprPolicyUser();
    $allowed = gdprPolicyUser(['consent.viewAny', 'consent.view', 'consent.create']);

    Assert::assertFalse($policy->viewAny($denied));
    Assert::assertFalse($policy->view($denied, $consent));
    Assert::assertFalse($policy->create($denied));

    Assert::assertTrue($policy->viewAny($allowed));
    Assert::assertTrue($policy->view($allowed, $consent));
    Assert::assertTrue($policy->create($allowed));
});

test('ProfilePolicy nega senza permesso e concede con permesso puntuale', function (): void {
    $policy = new ProfilePolicy();
    $profile = new Profile();
    $denied = gdprPolicyUser();
    $allowed = gdprPolicyUser(['profile.update', 'profile.delete']);

    Assert::assertFalse($policy->update($denied, $profile));
    Assert::assertFalse($policy->delete($denied, $profile));

    Assert::assertTrue($policy->update($allowed, $profile));
    Assert::assertTrue($policy->delete($allowed, $profile));
});

test('EventPolicy nega senza permesso e concede con permesso puntuale', function (): void {
    $policy = new EventPolicy();
    $event = new Event();
    $denied = gdprPolicyUser();
    $allowed = gdprPolicyUser(['event.viewAny', 'event.forceDelete']);

    Assert::assertFalse($policy->viewAny($denied));
    Assert::assertFalse($policy->forceDelete($denied, $event));

    Assert::assertTrue($policy->viewAny($allowed));
    Assert::assertTrue($policy->forceDelete($allowed, $event));
});
