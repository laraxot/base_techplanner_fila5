<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Datas;
<<<<<<< .merge_file_Nbaydu
use Modules\Notify\Datas\EmailAttachmentData;
use PHPUnit\Framework\Assert;
use Spatie\LaravelData\Data;
=======

use Modules\Notify\Datas\EmailAttachmentData;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
use Spatie\LaravelData\Data;
<<<<<<< .merge_file_RbXUC4
=======
use Modules\Xot\Tests\XotBasePest;
>>>>>>> .merge_file_JjGSS9
>>>>>>> .merge_file_RXTsgU

describe('EmailAttachmentData', function () {
    it('can be referenced via reflection without instantiation', function () {
        $reflection = new \ReflectionClass(EmailAttachmentData::class);

        Assert::assertTrue($reflection->isInstantiable());
    });

    it('has correct namespace', function () {
        Assert::assertStringStartsWith('Modules\Notify\Datas', (string) EmailAttachmentData::class);
    });

    it('extends Spatie Data', function () {
        $reflection = new \ReflectionClass(EmailAttachmentData::class);

        Assert::assertTrue($reflection->isSubclassOf(Data::class));
    });

    it('has required properties', function () {
        $reflection = new \ReflectionClass(EmailAttachmentData::class);
        $properties = $reflection->getProperties();

<<<<<<< .merge_file_Nbaydu
        $propertyNames = array_map(fn ($p) => $p->getName(), $properties);

        \assertListContains('name', $propertyNames);
        \assertListContains('contentType', $propertyNames);
    });

    it('has getContent method', function () {
            });
=======
        $propertyNames = array_map(static fn (\ReflectionProperty $p): string => $p->getName(), $properties);

        XotBasePest::assertListContains('name', $propertyNames);
        XotBasePest::assertListContains('contentType', $propertyNames);
    });

    it('has getContent method', function () {
        $reflection = new \ReflectionClass(EmailAttachmentData::class);

        Assert::assertTrue($reflection->hasMethod('getContent'));
    });
>>>>>>> .merge_file_JjGSS9

    it('has constructor with required parameters', function () {
        $reflection = new \ReflectionClass(EmailAttachmentData::class);
        $constructor = $reflection->getConstructor();

        Assert::assertNotNull($constructor);
        $params = $constructor->getParameters();
        Assert::assertCount(3, $params);
    });
});
