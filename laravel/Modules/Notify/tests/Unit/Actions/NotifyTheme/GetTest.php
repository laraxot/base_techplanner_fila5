<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\NotifyTheme;
<<<<<<< .merge_file_m7KCCn
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use Modules\Notify\Actions\NotifyTheme\Get;
use Modules\Notify\Datas\NotifyThemeData;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);

describe('NotifyTheme\Get', function () {
        it('can be instantiated', function () {
=======

use Modules\Notify\Actions\NotifyTheme\Get;
use Modules\Notify\Datas\NotifyThemeData;
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(TestCase::class)->group('notify-db');

describe('NotifyTheme\Get', function () {
    it('can be instantiated', function () {
>>>>>>> .merge_file_h0DFlZ
        Assert::assertTrue(class_exists(Get::class));
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(NotifyThemeData::class);
        Assert::assertArrayHasKey(QueueableAction::class, $traits);
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(Get::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(3, $method->getNumberOfParameters());
    });

    it('execute accepts string parameters and array', function () {
        $reflection = new \ReflectionClass(Get::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

<<<<<<< .merge_file_m7KCCn
        \assertReflectionTypeName($params[0]->getType(), 'string');
        \assertReflectionTypeName($params[1]->getType(), 'string');
        \assertReflectionTypeName($params[2]->getType(), 'array');
=======
        XotBasePest::assertReflectionTypeName($params[0]->getType(), 'string');
        XotBasePest::assertReflectionTypeName($params[1]->getType(), 'string');
        XotBasePest::assertReflectionTypeName($params[2]->getType(), 'array');
>>>>>>> .merge_file_h0DFlZ
    });

    it('execute returns NotifyThemeData', function () {
        $reflection = new \ReflectionClass(Get::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

<<<<<<< .merge_file_m7KCCn
        \assertReflectionTypeName($returnType, NotifyThemeData::class);
=======
        XotBasePest::assertReflectionTypeName($returnType, NotifyThemeData::class);
>>>>>>> .merge_file_h0DFlZ
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(Get::class);
<<<<<<< .merge_file_m7KCCn
        $content = \notifyReflectionSource($reflection);
=======
        $content = TestCase::notifyReflectionSource($reflection);
>>>>>>> .merge_file_h0DFlZ
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(Get::class);

        Assert::assertSame('Modules\Notify\Actions\NotifyTheme', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
<<<<<<< .merge_file_m7KCCn
        $content = \notifyReflectionSource(new \ReflectionClass(Get::class));
=======
        $content = TestCase::notifyReflectionSource(new \ReflectionClass(Get::class));
>>>>>>> .merge_file_h0DFlZ

        Assert::assertStringContainsString('use Modules\Notify\Datas\NotifyThemeData', $content);
        Assert::assertStringContainsString('use Modules\Notify\Models\NotifyTheme', $content);
        Assert::assertStringContainsString('use Modules\Xot\Datas\XotData', $content);
    });

    it('implements queueable functionality', function () {
        $reflection = new \ReflectionClass(Get::class);
        Assert::assertTrue($reflection->hasMethod('onQueue'));
    });
});
