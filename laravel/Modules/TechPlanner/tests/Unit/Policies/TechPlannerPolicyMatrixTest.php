<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Modules\TechPlanner\Models\Client;
use Modules\TechPlanner\Models\Device;
use Modules\TechPlanner\Models\DeviceVerification;
use Modules\TechPlanner\Models\Policies\ClientPolicy;
use Modules\TechPlanner\Models\Policies\DevicePolicy;
use Modules\TechPlanner\Models\Policies\DeviceVerificationPolicy;
use Modules\TechPlanner\Models\Policies\TechPlannerBasePolicy;
use Modules\TechPlanner\Tests\TestCase;
use Modules\Xot\Contracts\UserContract;

uses(TestCase::class);

/*
 * TPL-04: senza policy chiunque entrasse nel pannello poteva cancellare clienti, apparecchi e verifiche.
 * Matrice ruolo × abilità, senza database: l'utente risponde a hasRole() come uno Spatie reale.
 */

/** @param list<string> $roles */
function tpUser(array $roles): UserContract
{
    /** @var UserContract&Mockery\MockInterface $user */
    $user = Mockery::mock(UserContract::class);
    $user->shouldReceive('hasRole')->andReturnUsing(
        static function (string|array $wanted) use ($roles): bool {
            if (is_string($wanted)) {
                return in_array($wanted, $roles, true);
            }

            foreach ($wanted as $role) {
                if (is_string($role) && in_array($role, $roles, true)) {
                    return true;
                }
            }

            return false;
        },
    );

    return $user;
}

/**
 * @return list<array{0: TechPlannerBasePolicy, 1: Model}>
 */
function tpPolicyCases(): array
{
    return [
        [new ClientPolicy(), new Client()],
        [new DevicePolicy(), new Device()],
        [new DeviceVerificationPolicy(), new DeviceVerification()],
    ];
}

it('lets the admin role do everything', function (): void {
    $user = tpUser([TechPlannerBasePolicy::ROLE_ADMIN]);
    foreach (tpPolicyCases() as [$policy, $record]) {
        expect($policy->viewAny($user))->toBeTrue();
        expect($policy->view($user, $record))->toBeTrue();
        expect($policy->create($user))->toBeTrue();
        expect($policy->update($user, $record))->toBeTrue();
        expect($policy->delete($user, $record))->toBeTrue();
        expect($policy->deleteAny($user))->toBeTrue();
        expect($policy->forceDelete($user, $record))->toBeTrue();
    }
});

it('lets the operator work but not delete', function (): void {
    $user = tpUser([TechPlannerBasePolicy::ROLE_OPERATOR]);
    foreach (tpPolicyCases() as [$policy, $record]) {
        expect($policy->viewAny($user))->toBeTrue();
        expect($policy->view($user, $record))->toBeTrue();
        expect($policy->create($user))->toBeTrue();
        expect($policy->update($user, $record))->toBeTrue();
        expect($policy->delete($user, $record))->toBeFalse();
        expect($policy->deleteAny($user))->toBeFalse();
        expect($policy->restore($user, $record))->toBeFalse();
        expect($policy->forceDelete($user, $record))->toBeFalse();
    }
});

it('denies users without a TechPlanner role', function (): void {
    $user = tpUser(['user::admin']);
    foreach (tpPolicyCases() as [$policy, $record]) {
        expect($policy->viewAny($user))->toBeFalse();
        expect($policy->view($user, $record))->toBeFalse();
        expect($policy->create($user))->toBeFalse();
        expect($policy->update($user, $record))->toBeFalse();
        expect($policy->delete($user, $record))->toBeFalse();
    }
});

it('lets the super-admin through before any ability', function (): void {
    expect((new ClientPolicy())->before(tpUser(['super-admin']), 'delete'))->toBeTrue()
        ->and((new ClientPolicy())->before(tpUser([TechPlannerBasePolicy::ROLE_OPERATOR]), 'delete'))->toBeNull();
});

it('is discovered by the gate for every panel model', function (): void {
    expect(Gate::getPolicyFor(Client::class))->toBeInstanceOf(ClientPolicy::class);
    expect(Gate::getPolicyFor(Device::class))->toBeInstanceOf(DevicePolicy::class);
    expect(Gate::getPolicyFor(DeviceVerification::class))->toBeInstanceOf(DeviceVerificationPolicy::class);
});
