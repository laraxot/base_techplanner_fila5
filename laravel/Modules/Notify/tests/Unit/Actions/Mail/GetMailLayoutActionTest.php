<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\Mail;
<<<<<<< .merge_file_Eu6y3R
use function Safe\file_get_contents;
use function Safe\class_uses;
=======

>>>>>>> .merge_file_kbEeMS
use Modules\Notify\Actions\Mail\GetMailLayoutAction;
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;
<<<<<<< .merge_file_rpH0YA
=======
<<<<<<< .merge_file_Eu6y3R

uses(\Modules\Notify\Tests\TestCase::class);
=======
use Modules\Xot\Tests\XotBasePest;
>>>>>>> .merge_file_LygWSQ

use function Safe\class_uses;

uses(TestCase::class)->group('no-notify-db');
>>>>>>> .merge_file_kbEeMS

describe('GetMailLayoutAction', function () {
    it('can be instantiated', function () {
        $action = new GetMailLayoutAction();

        Assert::assertInstanceOf(GetMailLayoutAction::class, $action);
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(GetMailLayoutAction::class);

        Assert::assertArrayHasKey(QueueableAction::class, $traits);
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(GetMailLayoutAction::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    it('execute accepts string parameter', function () {
        $reflection = new \ReflectionClass(GetMailLayoutAction::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

<<<<<<< .merge_file_Eu6y3R
        \assertReflectionTypeName($params[0]->getType(), 'string');
=======
        XotBasePest::assertReflectionTypeName($params[0]->getType(), 'string');
>>>>>>> .merge_file_kbEeMS
    });

    it('execute returns string', function () {
        $reflection = new \ReflectionClass(GetMailLayoutAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

<<<<<<< .merge_file_Eu6y3R
        \assertReflectionTypeName($returnType, 'string');
=======
        XotBasePest::assertReflectionTypeName($returnType, 'string');
>>>>>>> .merge_file_kbEeMS
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(GetMailLayoutAction::class);
<<<<<<< .merge_file_Eu6y3R
        $content = \notifyReflectionSource($reflection);
=======
        $content = TestCase::notifyReflectionSource($reflection);
>>>>>>> .merge_file_kbEeMS
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(GetMailLayoutAction::class);

        Assert::assertSame('Modules\Notify\Actions\Mail', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
<<<<<<< .merge_file_Eu6y3R
        $content = \notifyReflectionSource(new \ReflectionClass(GetMailLayoutAction::class));
=======
        $content = TestCase::notifyReflectionSource(new \ReflectionClass(GetMailLayoutAction::class));
>>>>>>> .merge_file_kbEeMS
        Assert::assertStringContainsString('use Modules\Xot\Actions\Cast\SafeStringCastAction;', $content);
        Assert::assertStringContainsString('use Modules\Xot\Actions\Theme\GetThemeContextAction;', $content);
        Assert::assertStringContainsString('use Modules\Xot\Datas\XotData;', $content);
    });

    it('implements queueable functionality', function () {
<<<<<<< .merge_file_Eu6y3R
            });
=======
        $traits = class_uses(GetMailLayoutAction::class);

        Assert::assertArrayHasKey(QueueableAction::class, $traits);
    });
>>>>>>> .merge_file_kbEeMS
});
