<?php

declare(strict_types=1);

namespace Modules\Seo\Tests\Unit\Providers;
<<<<<<< HEAD
use Modules\Seo\Adapters\MetatagFacadeAdapter;
use Modules\Seo\Providers\EventServiceProvider;
use Modules\Seo\Providers\SeoServiceProvider;
use PHPUnit\Framework\Assert;
uses(\Modules\Seo\Tests\TestCase::class);

it('registers metatag adapter singleton and provides list', function (): void {
    $provider = new SeoServiceProvider(app());
    $provider->register();

    $instanceA = app(MetatagFacadeAdapter::class);
    $instanceB = app(MetatagFacadeAdapter::class);

    Assert::assertInstanceOf(MetatagFacadeAdapter::class, $instanceA);
    Assert::assertSame($instanceA, $instanceB);
    Assert::assertContains(MetatagFacadeAdapter::class, $provider->provides());
});

it('event service provider enables event discovery', function (): void {
    $reflection = new \ReflectionClass(EventServiceProvider::class);
=======

use Modules\Seo\Adapters\MetatagFacadeAdapter;
use Modules\Seo\Adapters\MetatagState;
use Modules\Seo\Providers\EventServiceProvider;
use Modules\Seo\Providers\SeoServiceProvider;
use PHPUnit\Framework\Assert;
use ReflectionClass;

it('registers metatag adapter and state singletons', function (): void {
    $provider = new SeoServiceProvider(app());
    $provider->register();

    $adapter = app(MetatagFacadeAdapter::class);
    $state = app(MetatagState::class);

    Assert::assertSame($adapter, app(MetatagFacadeAdapter::class));
    Assert::assertSame($state, app(MetatagState::class));
    Assert::assertContains(MetatagFacadeAdapter::class, $provider->provides());
    Assert::assertContains(MetatagState::class, $provider->provides());
});

it('event service provider enables event discovery', function (): void {
    $reflection = new ReflectionClass(EventServiceProvider::class);
>>>>>>> laraxot/dev
    $property = $reflection->getProperty('shouldDiscoverEvents');
    $property->setAccessible(true);

    Assert::assertTrue($property->getValue());
});
