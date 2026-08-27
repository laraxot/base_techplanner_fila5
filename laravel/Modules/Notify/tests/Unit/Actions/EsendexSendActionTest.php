<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions;
<<<<<<< .merge_file_Yii6WR
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use Modules\Notify\Actions\EsendexSendAction;
use Modules\Notify\Datas\SmsData;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);

describe('EsendexSendAction', function () {
        it('can be instantiated', function () {
=======

use Modules\Notify\Actions\EsendexSendAction;
use Modules\Notify\Datas\SmsData;
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(TestCase::class)->group('no-notify-db');

describe('EsendexSendAction', function () {
    it('can be instantiated', function () {
>>>>>>> .merge_file_kdewWk
        Assert::assertTrue(class_exists(EsendexSendAction::class));
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(EsendexSendAction::class);
        Assert::assertArrayHasKey(QueueableAction::class, $traits);
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(EsendexSendAction::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    it('execute accepts SmsData parameter', function () {
        $reflection = new \ReflectionClass(EsendexSendAction::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

<<<<<<< .merge_file_Yii6WR
        \assertReflectionTypeName($params[0]->getType(), SmsData::class);
=======
        XotBasePest::assertReflectionTypeName($params[0]->getType(), SmsData::class);
>>>>>>> .merge_file_kdewWk
    });

    it('execute returns array', function () {
        $reflection = new \ReflectionClass(EsendexSendAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

<<<<<<< .merge_file_Yii6WR
        \assertReflectionTypeName($returnType, 'array');
=======
        XotBasePest::assertReflectionTypeName($returnType, 'array');
>>>>>>> .merge_file_kdewWk
    });

    it('has login method', function () {
        $reflection = new \ReflectionClass(EsendexSendAction::class);
        $method = $reflection->getMethod('login');

        Assert::assertTrue($method->isPublic());
    });

    it('has base_endpoint property', function () {
        $reflection = new \ReflectionClass(EsendexSendAction::class);

        Assert::assertTrue($reflection->hasProperty('base_endpoint'));
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(EsendexSendAction::class);
<<<<<<< .merge_file_Yii6WR
        $content = \notifyReflectionSource($reflection);
=======
        $content = TestCase::notifyReflectionSource($reflection);
>>>>>>> .merge_file_kdewWk
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(EsendexSendAction::class);

        Assert::assertSame('Modules\Notify\Actions', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
<<<<<<< .merge_file_Yii6WR
        $content = \notifyReflectionSource(new \ReflectionClass(EsendexSendAction::class));
=======
        $content = TestCase::notifyReflectionSource(new \ReflectionClass(EsendexSendAction::class));
>>>>>>> .merge_file_kdewWk

        Assert::assertStringContainsString('use Modules\Notify\Datas\SmsData', $content);
        Assert::assertStringContainsString('use Spatie\QueueableAction\QueueableAction', $content);
        Assert::assertStringContainsString('use Webmozart\Assert\Assert', $content);
    });
});
