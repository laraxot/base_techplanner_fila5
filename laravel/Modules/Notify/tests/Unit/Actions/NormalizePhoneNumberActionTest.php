<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions;

use Modules\Notify\Actions\NormalizePhoneNumberAction;
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;
<<<<<<< .merge_file_cVuMp4
=======
<<<<<<< .merge_file_LU2NhH

use function Safe\class_uses;

uses(TestCase::class);
=======
use Modules\Xot\Tests\XotBasePest;
>>>>>>> .merge_file_Kzy5XR

use function Safe\class_uses;

uses(TestCase::class)->group('no-notify-db');
>>>>>>> .merge_file_RrwhPe

describe('NormalizePhoneNumberAction', function () {
    it('can be instantiated', function () {
        Assert::assertTrue(class_exists(NormalizePhoneNumberAction::class));
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(NormalizePhoneNumberAction::class);
        Assert::assertArrayHasKey(QueueableAction::class, $traits);
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    it('execute accepts nullable string parameter', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

        Assert::assertStringContainsString((string) 'string', (string) $params[0]->getType());
    });

    it('execute returns string', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

<<<<<<< .merge_file_LU2NhH
        \assertReflectionTypeName($returnType, 'string');
=======
        XotBasePest::assertReflectionTypeName($returnType, 'string');
>>>>>>> .merge_file_RrwhPe
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
<<<<<<< .merge_file_LU2NhH
        $content = \notifyReflectionSource($reflection);
=======
        $content = TestCase::notifyReflectionSource($reflection);
>>>>>>> .merge_file_RrwhPe
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);

        Assert::assertSame('Modules\Notify\Actions', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
<<<<<<< .merge_file_LU2NhH
        $content = \notifyReflectionSource(new \ReflectionClass(NormalizePhoneNumberAction::class));
=======
        $content = TestCase::notifyReflectionSource(new \ReflectionClass(NormalizePhoneNumberAction::class));
>>>>>>> .merge_file_RrwhPe

        Assert::assertStringContainsString('use Modules\Xot\Actions\Cast\SafeStringCastAction', $content);
        Assert::assertStringContainsString('use Spatie\QueueableAction\QueueableAction', $content);
    });

    it('implements queueable functionality', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
        Assert::assertTrue($reflection->hasMethod('onQueue'));
    });
});
