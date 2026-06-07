<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

use Modules\Activity\Actions\LogUserLoginAction;
=======
namespace Modules\Activity\Tests\Unit\Actions;

uses(TestCase::class);

use Modules\Activity\Actions\LogUserLoginAction;
use Modules\Activity\Tests\TestCase;
>>>>>>> dev
use Modules\User\Models\User;

test('LogUserLoginAction can be instantiated', function () {
    $user = User::factory()->make();

    $action = new LogUserLoginAction($user);

    expect($action)->toBeObject()
        ->and($action->user)->toBe($user);
});
