<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\WhatsApp;
<<<<<<< .merge_file_h7YQNF
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use Modules\Notify\Actions\WhatsApp\SendVonageWhatsAppAction;
use Modules\Notify\Datas\WhatsAppData;
use PHPUnit\Framework\Assert;

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);
=======

use Modules\Notify\Actions\WhatsApp\SendVonageWhatsAppAction;
use Modules\Notify\Datas\WhatsAppData;
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

use function Safe\class_uses;

uses(TestCase::class)->group('no-notify-db');
>>>>>>> .merge_file_1ZnULB

describe('SendVonageWhatsAppAction', function () {
    it('can be referenced via ReflectionClass without instantiation', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
        Assert::assertTrue($reflection->isInstantiable());
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    it('execute accepts WhatsAppData parameter', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

<<<<<<< .merge_file_h7YQNF
        \assertReflectionTypeName($params[0]->getType(), WhatsAppData::class);
=======
        XotBasePest::assertReflectionTypeName($params[0]->getType(), WhatsAppData::class);
>>>>>>> .merge_file_1ZnULB
    });

    it('execute returns array', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

<<<<<<< .merge_file_h7YQNF
        \assertReflectionTypeName($returnType, 'array');
=======
        XotBasePest::assertReflectionTypeName($returnType, 'array');
>>>>>>> .merge_file_1ZnULB
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
<<<<<<< .merge_file_h7YQNF
        $content = \notifyReflectionSource($reflection);
=======
        $content = TestCase::notifyReflectionSource($reflection);
>>>>>>> .merge_file_1ZnULB
        Assert::assertStringContainsString('declare(strict_types=1)', (string) $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);

        Assert::assertSame('Modules\Notify\Actions\WhatsApp', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
        $filename = $reflection->getFileName();
<<<<<<< .merge_file_h7YQNF
        $content = \notifyReflectionSource(new \ReflectionClass(SendVonageWhatsAppAction::class));
=======
        $content = TestCase::notifyReflectionSource(new \ReflectionClass(SendVonageWhatsAppAction::class));
>>>>>>> .merge_file_1ZnULB

        Assert::assertStringContainsString('declare(strict_types=1)', (string) $content);
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(SendVonageWhatsAppAction::class);
        Assert::assertArrayHasKey('Spatie\QueueableAction\QueueableAction', $traits);
    });

    it('has protected debug property', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
        $property = $reflection->getProperty('debug');

        Assert::assertTrue($property->isProtected());
    });

    it('has protected timeout property', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
        $property = $reflection->getProperty('timeout');

        Assert::assertTrue($property->isProtected());
    });
});
