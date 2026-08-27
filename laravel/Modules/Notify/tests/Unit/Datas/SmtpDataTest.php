<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Datas;
<<<<<<< .merge_file_Klsz3K
use Modules\Notify\Datas\SmtpData;
use PHPUnit\Framework\Assert;
use Spatie\LaravelData\Data;
=======

use Modules\Notify\Datas\SmtpData;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
use Spatie\LaravelData\Data;
<<<<<<< .merge_file_bIl3SE
=======
use Modules\Xot\Tests\XotBasePest;
>>>>>>> .merge_file_aNfbCQ
>>>>>>> .merge_file_FP7AvY

describe('SmtpData', function () {
    it('can be referenced via reflection without instantiation', function () {
        $reflection = new \ReflectionClass(SmtpData::class);

        Assert::assertTrue($reflection->isInstantiable());
    });

    it('has correct namespace', function () {
        Assert::assertStringStartsWith('Modules\Notify\Datas', (string) SmtpData::class);
    });

    it('extends Spatie Data', function () {
        $reflection = new \ReflectionClass(SmtpData::class);

        Assert::assertTrue($reflection->isSubclassOf(Data::class));
    });

    it('has required properties', function () {
        $reflection = new \ReflectionClass(SmtpData::class);
        $properties = $reflection->getProperties();

<<<<<<< .merge_file_Klsz3K
        $propertyNames = array_map(fn ($p) => $p->getName(), $properties);

        \assertListContains('transport', $propertyNames);
        \assertListContains('host', $propertyNames);
        \assertListContains('port', $propertyNames);
        \assertListContains('username', $propertyNames);
        \assertListContains('password', $propertyNames);
    });

    it('has make static method', function () {
            });

    it('has toArray method', function () {
            });

    it('has getTransport method', function () {
            });

    it('has send method', function () {
            });

    it('has getMailer method', function () {
            });
=======
        $propertyNames = array_map(static fn (\ReflectionProperty $p): string => $p->getName(), $properties);

        XotBasePest::assertListContains('transport', $propertyNames);
        XotBasePest::assertListContains('host', $propertyNames);
        XotBasePest::assertListContains('port', $propertyNames);
        XotBasePest::assertListContains('username', $propertyNames);
        XotBasePest::assertListContains('password', $propertyNames);
    });

    it('has make static method', function () {
        $reflection = new \ReflectionClass(SmtpData::class);

        Assert::assertTrue($reflection->hasMethod('make'));
    });

    it('has toArray method', function () {
        $reflection = new \ReflectionClass(SmtpData::class);

        Assert::assertTrue($reflection->hasMethod('toArray'));
    });

    it('has getTransport method', function () {
        $reflection = new \ReflectionClass(SmtpData::class);

        Assert::assertTrue($reflection->hasMethod('getTransport'));
    });

    it('has send method', function () {
        $reflection = new \ReflectionClass(SmtpData::class);

        Assert::assertTrue($reflection->hasMethod('send'));
    });

    it('has getMailer method', function () {
        $reflection = new \ReflectionClass(SmtpData::class);

        Assert::assertTrue($reflection->hasMethod('getMailer'));
    });
>>>>>>> .merge_file_aNfbCQ
});
