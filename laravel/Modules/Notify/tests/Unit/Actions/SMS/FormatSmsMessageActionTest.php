<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\SMS;
<<<<<<< .merge_file_cRp8vw
use function Safe\file_get_contents;
=======

>>>>>>> .merge_file_TAv7Gf
use Modules\Notify\Actions\SMS\FormatSmsMessageAction;
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;
<<<<<<< .merge_file_l6SrxI
=======
<<<<<<< .merge_file_cRp8vw

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);

describe('FormatSmsMessageAction', function () {
        it('can be instantiated', function () {
                $action = new FormatSmsMessageAction;
=======
use Modules\Xot\Tests\XotBasePest;
>>>>>>> .merge_file_pjZWuN

use function Safe\class_uses;

uses(TestCase::class);

describe('FormatSmsMessageAction', function () {
    it('can be instantiated', function () {
<<<<<<< .merge_file_l6SrxI
        $action = new FormatSmsMessageAction();
=======
        $action = new FormatSmsMessageAction;
>>>>>>> .merge_file_TAv7Gf
>>>>>>> .merge_file_pjZWuN

        Assert::assertInstanceOf(FormatSmsMessageAction::class, $action);
    });

    it('has execute method with correct signature', function () {
<<<<<<< .merge_file_l6SrxI
        $action = new FormatSmsMessageAction();
=======
<<<<<<< .merge_file_cRp8vw
                $action = new FormatSmsMessageAction;
=======
        $action = new FormatSmsMessageAction;
>>>>>>> .merge_file_TAv7Gf
>>>>>>> .merge_file_pjZWuN

        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    it('execute accepts string parameter', function () {
<<<<<<< .merge_file_l6SrxI
        $action = new FormatSmsMessageAction();
=======
<<<<<<< .merge_file_cRp8vw
                $action = new FormatSmsMessageAction;
=======
        $action = new FormatSmsMessageAction;
>>>>>>> .merge_file_TAv7Gf
>>>>>>> .merge_file_pjZWuN

        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

<<<<<<< .merge_file_cRp8vw
        \assertReflectionTypeName($params[0]->getType(), 'string');
    });

    it('execute returns array', function () {
                $action = new FormatSmsMessageAction;
=======
        XotBasePest::assertReflectionTypeName($params[0]->getType(), 'string');
    });

    it('execute returns array', function () {
<<<<<<< .merge_file_l6SrxI
        $action = new FormatSmsMessageAction();
=======
        $action = new FormatSmsMessageAction;
>>>>>>> .merge_file_TAv7Gf
>>>>>>> .merge_file_pjZWuN

        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

<<<<<<< .merge_file_cRp8vw
        \assertReflectionTypeName($returnType, 'array');
    });

    it('uses strict types', function () {
                $action = new FormatSmsMessageAction;

        $reflection = new \ReflectionClass($action);
        $content = \notifyReflectionSource($reflection);
=======
        XotBasePest::assertReflectionTypeName($returnType, 'array');
    });

    it('uses strict types', function () {
        $action = new FormatSmsMessageAction();

        $reflection = new \ReflectionClass($action);
        $content = TestCase::notifyReflectionSource($reflection);
>>>>>>> .merge_file_TAv7Gf
        Assert::assertStringContainsString('declare(strict_types=1)', (string) $content);
    });

    it('has correct namespace', function () {
<<<<<<< .merge_file_l6SrxI
        $action = new FormatSmsMessageAction();
=======
<<<<<<< .merge_file_cRp8vw
                $action = new FormatSmsMessageAction;
=======
        $action = new FormatSmsMessageAction;
>>>>>>> .merge_file_TAv7Gf
>>>>>>> .merge_file_pjZWuN

        $reflection = new \ReflectionClass($action);

        Assert::assertSame('Modules\Notify\Actions\SMS', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
<<<<<<< .merge_file_l6SrxI
        $action = new FormatSmsMessageAction();
=======
<<<<<<< .merge_file_cRp8vw
                $action = new FormatSmsMessageAction;

        $reflection = new \ReflectionClass($action);
        $content = \notifyReflectionSource($reflection);
=======
        $action = new FormatSmsMessageAction;
>>>>>>> .merge_file_pjZWuN

        $reflection = new \ReflectionClass($action);
        $content = TestCase::notifyReflectionSource($reflection);
>>>>>>> .merge_file_TAv7Gf
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('is not using QueueableAction trait', function () {
<<<<<<< .merge_file_l6SrxI
        $action = new FormatSmsMessageAction();
=======
<<<<<<< .merge_file_cRp8vw
                $action = new FormatSmsMessageAction;

        $traits = class_uses(FormatSmsMessageAction::class);

        Assert::assertArrayNotHasKey(QueueableAction::class, $traits);
=======
        $action = new FormatSmsMessageAction;
>>>>>>> .merge_file_pjZWuN

        $traits = class_uses(FormatSmsMessageAction::class);

        Assert::assertArrayHasKey(QueueableAction::class, $traits);
>>>>>>> .merge_file_TAv7Gf
    });
});
