<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Datas;
<<<<<<< .merge_file_XWEOEs
use Modules\Notify\Datas\NotificationData;
use PHPUnit\Framework\Assert;
use Spatie\LaravelData\Data;
=======

use Modules\Notify\Datas\NotificationData;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
use Spatie\LaravelData\Data;
<<<<<<< .merge_file_ZEPeyv
=======
use Modules\Xot\Tests\XotBasePest;
>>>>>>> .merge_file_o1E4Pr
>>>>>>> .merge_file_yzuphh

describe('NotificationData', function () {
    it('can be referenced via reflection without instantiation', function () {
        $reflection = new \ReflectionClass(NotificationData::class);

        Assert::assertTrue($reflection->isInstantiable());
    });

    it('has correct namespace', function () {
        Assert::assertStringStartsWith('Modules\Notify\Datas', (string) NotificationData::class);
    });

    it('extends Spatie Data', function () {
        $reflection = new \ReflectionClass(NotificationData::class);

        Assert::assertTrue($reflection->isSubclassOf(Data::class));
    });

    it('has required properties', function () {
        $reflection = new \ReflectionClass(NotificationData::class);
        $properties = $reflection->getProperties();

<<<<<<< .merge_file_XWEOEs
        $propertyNames = array_map(fn ($p) => $p->getName(), $properties);

        \assertListContains('from', $propertyNames);
        \assertListContains('recipient', $propertyNames);
        \assertListContains('body', $propertyNames);
        \assertListContains('channels', $propertyNames);
    });

    it('has getSmsData method', function () {
            });

    it('has routeNotificationFor method', function () {
            });

    it('has from method', function () {
            });
=======
        $propertyNames = array_map(static fn (\ReflectionProperty $p): string => $p->getName(), $properties);

        XotBasePest::assertListContains('from', $propertyNames);
        XotBasePest::assertListContains('recipient', $propertyNames);
        XotBasePest::assertListContains('body', $propertyNames);
        XotBasePest::assertListContains('channels', $propertyNames);
    });

    it('has getSmsData method', function () {
        $reflection = new \ReflectionClass(NotificationData::class);

        Assert::assertTrue($reflection->hasMethod('getSmsData'));
    });

    it('has routeNotificationFor method', function () {
        $reflection = new \ReflectionClass(NotificationData::class);

        Assert::assertTrue($reflection->hasMethod('routeNotificationFor'));
    });

    it('has from method', function () {
        $reflection = new \ReflectionClass(NotificationData::class);

        Assert::assertTrue($reflection->hasMethod('from'));
    });
>>>>>>> .merge_file_o1E4Pr
});
