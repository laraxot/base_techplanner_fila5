<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Channels;

use Modules\Notify\Channels\NetfunChannel;
<<<<<<< .merge_file_oTEoe3
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
=======
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_MCwlOg
=======
use Modules\Notify\Tests\TestCase;
>>>>>>> .merge_file_7YHxex
>>>>>>> .merge_file_XA5gH9

describe('NetfunChannel', function () {
    it('can be instantiated', function () {
        $reflection = new \ReflectionClass(NetfunChannel::class);
        Assert::assertTrue($reflection->isInstantiable());
    });

    it('has send method', function () {
        $reflection = new \ReflectionClass(NetfunChannel::class);
        $method = $reflection->getMethod('send');

        Assert::assertTrue($method->isPublic());
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(NetfunChannel::class);

        Assert::assertSame('Modules\Notify\Channels', $reflection->getNamespaceName());
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(NetfunChannel::class);
<<<<<<< .merge_file_MCwlOg
        $content = \notifyReflectionSource($reflection);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has private factory dependency', function () {
        $reflection = new \ReflectionClass(NetfunChannel::class);
        $property = $reflection->getProperty('factory');

        Assert::assertTrue($property->isPrivate());
=======
        $content = TestCase::notifyReflectionSource($reflection);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has send method with notifiable parameter', function () {
        $reflection = new \ReflectionClass(NetfunChannel::class);
        $method = $reflection->getMethod('send');
        Assert::assertTrue($method->isPublic());
        Assert::assertGreaterThanOrEqual(2, $method->getNumberOfParameters());
>>>>>>> .merge_file_7YHxex
    });
});
