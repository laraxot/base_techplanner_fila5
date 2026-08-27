<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Unit\Actions;

use Modules\Gdpr\Actions\Registration\HandleRegistrationErrorAction;
use PHPUnit\Framework\Assert;

test('HandleRegistrationErrorAction can be instantiated', function (): void {
    $action = new HandleRegistrationErrorAction();
    Assert::assertInstanceOf(HandleRegistrationErrorAction::class, $action);
});

test('HandleRegistrationErrorAction execute method exists', function (): void {
    $action = new HandleRegistrationErrorAction();
    Assert::assertTrue((new \ReflectionClass($action))->hasMethod('execute'));
});
