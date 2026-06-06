<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Rules;

<<<<<<< HEAD
uses(TestCase::class);

use Modules\User\Models\User;
use Modules\User\Rules\CheckOtpExpiredRule;
use Modules\User\Tests\TestCase;

=======
uses(\Modules\User\Tests\TestCase::class);

use Modules\User\Models\User;
use Modules\User\Rules\CheckOtpExpiredRule;
>>>>>>> 8215f950 (.)
test('CheckOtpExpiredRule can be instantiated', function () {
    $user = User::factory()->make();
    $rule = new CheckOtpExpiredRule($user);

    expect($rule)->toBeInstanceOf(CheckOtpExpiredRule::class);
});

test('CheckOtpExpiredRule has validate and message methods', function () {
    $user = User::factory()->make();
    $rule = new CheckOtpExpiredRule($user);

    expect(method_exists($rule, 'validate'))->toBeTrue()
        ->and(method_exists($rule, 'message'))->toBeTrue();
});
