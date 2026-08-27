<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\SMS;
<<<<<<< .merge_file_xzCMEG
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use Modules\Notify\Actions\SMS\NormalizePhoneNumberAction;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);

describe('SMS\NormalizePhoneNumberAction', function () {
        it('can be instantiated', function () {
=======

use Modules\Notify\Actions\SMS\NormalizePhoneNumberAction;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(TestCase::class);

describe('SMS\NormalizePhoneNumberAction', function () {
    it('can be instantiated', function () {
>>>>>>> .merge_file_C4umtx
        Assert::assertTrue(class_exists(NormalizePhoneNumberAction::class));
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    it('execute accepts string parameter', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

<<<<<<< .merge_file_xzCMEG
        \assertReflectionTypeName($params[0]->getType(), 'string');
=======
        XotBasePest::assertReflectionTypeName($params[0]->getType(), 'string');
>>>>>>> .merge_file_C4umtx
    });

    it('execute returns string', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

<<<<<<< .merge_file_xzCMEG
        \assertReflectionTypeName($returnType, 'string');
=======
        XotBasePest::assertReflectionTypeName($returnType, 'string');
>>>>>>> .merge_file_C4umtx
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
<<<<<<< .merge_file_xzCMEG
        $content = \notifyReflectionSource($reflection);
=======
        $content = TestCase::notifyReflectionSource($reflection);
>>>>>>> .merge_file_C4umtx
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);

        Assert::assertSame('Modules\Notify\Actions\SMS', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
<<<<<<< .merge_file_xzCMEG
        $content = \notifyReflectionSource(new \ReflectionClass(NormalizePhoneNumberAction::class));
=======
        $content = TestCase::notifyReflectionSource(new \ReflectionClass(NormalizePhoneNumberAction::class));
>>>>>>> .merge_file_C4umtx

        Assert::assertStringContainsString('use Webmozart\Assert\Assert', $content);
        Assert::assertStringContainsString('use function Safe\preg_replace', $content);
    });

    it('is not using QueueableAction trait', function () {
        $traits = class_uses(NormalizePhoneNumberAction::class);

<<<<<<< .merge_file_xzCMEG
        Assert::assertArrayNotHasKey(QueueableAction::class, $traits);
=======
        Assert::assertArrayHasKey(QueueableAction::class, $traits);
>>>>>>> .merge_file_C4umtx
    });
});
