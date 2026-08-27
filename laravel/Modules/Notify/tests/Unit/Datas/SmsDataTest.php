<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Datas;
<<<<<<< .merge_file_VXAWNG
use Modules\Notify\Datas\SmsData;
use PHPUnit\Framework\Assert;
=======

use Modules\Notify\Datas\SmsData;
use Modules\Xot\Tests\XotBasePest;
<<<<<<< .merge_file_JSVLH6
use PHPUnit\Framework\Assert;
=======
>>>>>>> .merge_file_CnRlX0
>>>>>>> .merge_file_OtnUsy

describe('SmsData', function () {
    it('can be referenced via reflection without instantiation', function () {
        $reflection = new \ReflectionClass(SmsData::class);

        Assert::assertTrue($reflection->isInstantiable());
    });

    it('has correct namespace', function () {
        Assert::assertStringStartsWith('Modules\Notify\Datas', (string) SmsData::class);
    });

    it('has required properties', function () {
        $reflection = new \ReflectionClass(SmsData::class);
        $properties = $reflection->getProperties();

<<<<<<< .merge_file_VXAWNG
        $propertyNames = array_map(fn ($p) => $p->getName(), $properties);

        \assertListContains('from', $propertyNames);
        \assertListContains('recipient', $propertyNames);
        \assertListContains('body', $propertyNames);
    });

    it('has from method', function () {
            });
=======
        $propertyNames = array_map(static fn (\ReflectionProperty $p): string => $p->getName(), $properties);

        XotBasePest::assertListContains('from', $propertyNames);
        XotBasePest::assertListContains('recipient', $propertyNames);
        XotBasePest::assertListContains('body', $propertyNames);
    });

    it('has from method', function () {
        $reflection = new \ReflectionClass(SmsData::class);

        Assert::assertTrue($reflection->hasMethod('from'));
    });
>>>>>>> .merge_file_CnRlX0

    it('from method is static', function () {
        $reflection = new \ReflectionClass(SmsData::class);
        $fromMethod = $reflection->getMethod('from');

        Assert::assertTrue($fromMethod->isStatic());
    });

    it('has constructor', function () {
        $reflection = new \ReflectionClass(SmsData::class);

        Assert::assertNotNull($reflection->getConstructor());
    });

    it('constructor accepts array parameter', function () {
        $reflection = new \ReflectionClass(SmsData::class);
        $constructor = $reflection->getConstructor();
        Assert::assertNotNull($constructor);
        $params = $constructor->getParameters();

        Assert::assertCount(1, $params);
        Assert::assertSame('data', $params[0]->getName());
<<<<<<< .merge_file_VXAWNG
        Assert::assertTrue($params[0]->isArray());
=======
        $type = $params[0]->getType();
        Assert::assertInstanceOf(\ReflectionNamedType::class, $type);
        Assert::assertSame('array', $type->getName());
>>>>>>> .merge_file_CnRlX0
    });
});
