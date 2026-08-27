<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\Telegram;
<<<<<<< .merge_file_uGBEl2
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use Modules\Notify\Actions\Telegram\SendNutgramTelegramAction;
use Modules\Notify\Datas\TelegramData;
use PHPUnit\Framework\Assert;

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);
=======

use Modules\Notify\Actions\Telegram\SendNutgramTelegramAction;
use Modules\Notify\Datas\TelegramData;
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

use function Safe\class_uses;

uses(TestCase::class)->group('no-notify-db');
>>>>>>> .merge_file_tHbMGy

describe('SendNutgramTelegramAction', function () {
    it('can be referenced via ReflectionClass without instantiation', function () {
        $reflection = new \ReflectionClass(SendNutgramTelegramAction::class);
        Assert::assertTrue($reflection->isInstantiable());
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(SendNutgramTelegramAction::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    it('execute accepts TelegramData parameter', function () {
        $reflection = new \ReflectionClass(SendNutgramTelegramAction::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

<<<<<<< .merge_file_uGBEl2
        \assertReflectionTypeName($params[0]->getType(), TelegramData::class);
=======
        XotBasePest::assertReflectionTypeName($params[0]->getType(), TelegramData::class);
>>>>>>> .merge_file_tHbMGy
    });

    it('execute returns array', function () {
        $reflection = new \ReflectionClass(SendNutgramTelegramAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

<<<<<<< .merge_file_uGBEl2
        \assertReflectionTypeName($returnType, 'array');
=======
        XotBasePest::assertReflectionTypeName($returnType, 'array');
>>>>>>> .merge_file_tHbMGy
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(SendNutgramTelegramAction::class);
<<<<<<< .merge_file_uGBEl2
        $content = \notifyReflectionSource($reflection);
=======
        $content = TestCase::notifyReflectionSource($reflection);
>>>>>>> .merge_file_tHbMGy
        Assert::assertStringContainsString('declare(strict_types=1)', (string) $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(SendNutgramTelegramAction::class);

        Assert::assertSame('Modules\Notify\Actions\Telegram', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
        $reflection = new \ReflectionClass(SendNutgramTelegramAction::class);
        $filename = $reflection->getFileName();
<<<<<<< .merge_file_uGBEl2
        $content = \notifyReflectionSource(new \ReflectionClass(SendNutgramTelegramAction::class));
=======
        $content = TestCase::notifyReflectionSource(new \ReflectionClass(SendNutgramTelegramAction::class));
>>>>>>> .merge_file_tHbMGy

        Assert::assertStringContainsString('declare(strict_types=1)', (string) $content);
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(SendNutgramTelegramAction::class);
        Assert::assertArrayHasKey('Spatie\QueueableAction\QueueableAction', $traits);
    });

    it('has protected debug property', function () {
        $reflection = new \ReflectionClass(SendNutgramTelegramAction::class);
        $property = $reflection->getProperty('debug');

        Assert::assertTrue($property->isProtected());
    });

    it('has protected timeout property', function () {
        $reflection = new \ReflectionClass(SendNutgramTelegramAction::class);
        $property = $reflection->getProperty('timeout');

        Assert::assertTrue($property->isProtected());
    });

    it('has private token property', function () {
        $reflection = new \ReflectionClass(SendNutgramTelegramAction::class);
        $property = $reflection->getProperty('token');

        Assert::assertTrue($property->isPrivate());
    });
});
