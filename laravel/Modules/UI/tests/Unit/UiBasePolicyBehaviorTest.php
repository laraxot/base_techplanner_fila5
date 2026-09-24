<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit;

use Mockery;
use Mockery\MockInterface;
use Modules\UI\Tests\Fixtures\UiBasePolicyBehaviorConcretePolicy;
use Modules\UI\Tests\TestCase;
use Modules\Xot\Contracts\UserContract;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-ui-db');

/**
<<<<<<< HEAD
 * @param list<string> $roles
 *
=======
 * @param  list<string>  $roles
>>>>>>> laraxot/dev
 * @return MockInterface&UserContract
 */
function uiBehaviorUser(array $roles = []): UserContract
{
    /** @var MockInterface&UserContract $user */
    $user = Mockery::mock(UserContract::class);
    TestCase::expectMethod($user, 'hasRole')
        ->andReturnUsing(static function (array|string $richiesti) use ($roles): bool {
            /** @var list<string> $normalizzati */
            $normalizzati = is_array($richiesti) ? $richiesti : [$richiesti];

<<<<<<< HEAD
            return [] !== array_intersect($normalizzati, $roles);
=======
            return array_intersect($normalizzati, $roles) !== [];
>>>>>>> laraxot/dev
        });

    return $user;
}

afterEach(function (): void {
    Mockery::close();
});

test('UiBasePolicy before concede super-admin e ritorna null altrimenti', function (): void {
<<<<<<< HEAD
    $policy = new UiBasePolicyBehaviorConcretePolicy();
=======
    $policy = new UiBasePolicyBehaviorConcretePolicy;
>>>>>>> laraxot/dev
    $super = uiBehaviorUser(['super-admin']);

    Assert::assertTrue($policy->before($super, 'viewAny'));
    Assert::assertNull($policy->before(uiBehaviorUser(), 'viewAny'));
});
