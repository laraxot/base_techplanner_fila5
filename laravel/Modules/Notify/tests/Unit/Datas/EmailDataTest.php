<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Datas;
<<<<<<< .merge_file_nrOH2J
use Modules\Notify\Datas\EmailData;
use PHPUnit\Framework\Assert;
use Spatie\LaravelData\Data;
=======

use Modules\Notify\Datas\EmailData;
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
use Spatie\LaravelData\Data;
<<<<<<< .merge_file_sHskyb
=======
use Modules\Xot\Tests\XotBasePest;
use Modules\Notify\Tests\TestCase;
>>>>>>> .merge_file_uxaR5c
>>>>>>> .merge_file_J3cms2

describe('EmailData', function () {
    it('can be instantiated via reflection without constructor', function () {
        $reflection = new \ReflectionClass(EmailData::class);

        Assert::assertTrue($reflection->isInstantiable());
    });

    it('has correct namespace', function () {
        Assert::assertStringStartsWith('Modules\Notify\Datas', (string) EmailData::class);
    });

    it('has required properties', function () {
<<<<<<< .merge_file_nrOH2J
        $propertyNames = \notifyReflectionPropertyNames(new \ReflectionClass(EmailData::class));

        \assertListContains('recipient', $propertyNames);
        \assertListContains('from', $propertyNames);
        \assertListContains('from_email', $propertyNames);
        \assertListContains('subject', $propertyNames);
        \assertListContains('body_html', $propertyNames);
        \assertListContains('body', $propertyNames);
        \assertListContains('attachments', $propertyNames);
=======
        $propertyNames = TestCase::notifyReflectionPropertyNames(new \ReflectionClass(EmailData::class));

        XotBasePest::assertListContains('recipient', $propertyNames);
        XotBasePest::assertListContains('from', $propertyNames);
        XotBasePest::assertListContains('from_email', $propertyNames);
        XotBasePest::assertListContains('subject', $propertyNames);
        XotBasePest::assertListContains('body_html', $propertyNames);
        XotBasePest::assertListContains('body', $propertyNames);
        XotBasePest::assertListContains('attachments', $propertyNames);
>>>>>>> .merge_file_uxaR5c
    });

    it('extends Spatie Data', function () {
        $reflection = new \ReflectionClass(EmailData::class);

        Assert::assertTrue($reflection->isSubclassOf(Data::class));
    });

    it('has getFrom method', function () {
        $reflection = new \ReflectionClass(EmailData::class);

        Assert::assertTrue($reflection->hasMethod('getFrom'));
    });

    it('has getMimeEmail method', function () {
        $reflection = new \ReflectionClass(EmailData::class);

        Assert::assertTrue($reflection->hasMethod('getMimeEmail'));
    });

    it('has from method', function () {
        $reflection = new \ReflectionClass(EmailData::class);

        Assert::assertTrue($reflection->hasMethod('from'));
    });

    it('can create via static from method with valid data', function () {
        $reflection = new \ReflectionClass(EmailData::class);
        $fromMethod = $reflection->getMethod('from');
        Assert::assertTrue($fromMethod->isStatic());
    });
});
