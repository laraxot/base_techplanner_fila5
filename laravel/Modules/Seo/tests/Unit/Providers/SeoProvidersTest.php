<?php

declare(strict_types=1);

namespace Modules\Seo\Tests\Unit\Providers;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

use Modules\Seo\Adapters\MetatagFacadeAdapter;
use Modules\Seo\Providers\EventServiceProvider;
use Modules\Seo\Providers\SeoServiceProvider;
use Modules\Seo\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('registers metatag adapter singleton and provides list', function (): void {
    $provider = new SeoServiceProvider(app());
    $provider->register();

    $instanceA = app(MetatagFacadeAdapter::class);
    $instanceB = app(MetatagFacadeAdapter::class);

    Assert::assertInstanceOf(MetatagFacadeAdapter::class, $instanceA);
    Assert::assertSame($instanceA, $instanceB);
    Assert::assertContains(MetatagFacadeAdapter::class, $provider->provides());
=======
use Modules\Seo\Providers\EventServiceProvider;
use Modules\Seo\Providers\SeoServiceProvider;
use Modules\Seo\Adapters\MetatagManager;
use PHPUnit\Framework\Assert;
uses(\Modules\Seo\Tests\TestCase::class);

=======
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)

use Modules\Seo\Providers\EventServiceProvider;
use Modules\Seo\Providers\SeoServiceProvider;
use Modules\Seo\Services\MetatagService;
use Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 7ec200b (.)
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
=======
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
use Modules\Seo\Providers\EventServiceProvider;
use Modules\Seo\Providers\SeoServiceProvider;
use Modules\Seo\Services\MetatagService;
use PHPUnit\Framework\Assert;
uses(\Modules\Seo\Tests\TestCase::class);

<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
it('registers metatag service singleton and provides list', function (): void {
    $provider = new SeoServiceProvider(app());
    $provider->register();

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    $instanceA = app(MetatagManager::class);
    $instanceB = app(MetatagManager::class);

    Assert::assertInstanceOf(MetatagManager::class, $instanceA);
    Assert::assertSame($instanceA, $instanceB);
    Assert::assertContains(MetatagManager::class, $provider->provides());
>>>>>>> cf01f0b (.)
=======
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
    $instanceA = app(MetatagService::class);
    $instanceB = app(MetatagService::class);

    Assert::assertInstanceOf(MetatagService::class, $instanceA);
    Assert::assertSame($instanceA, $instanceB);
    Assert::assertContains(MetatagService::class, $provider->provides());
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
});

it('event service provider enables event discovery', function (): void {
    $reflection = new \ReflectionClass(EventServiceProvider::class);
    $property = $reflection->getProperty('shouldDiscoverEvents');
    $property->setAccessible(true);

    Assert::assertTrue($property->getValue());
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
    $instanceA = app(MetatagService::class);
    $instanceB = app(MetatagService::class);

    expect($instanceA)->toBeInstanceOf(MetatagService::class)
        ->and($instanceA)->toBe($instanceB)
        ->and($provider->provides())->toContain(MetatagService::class);
});

it('event service provider enables event discovery', function (): void {
    $reflection = new ReflectionClass(EventServiceProvider::class);
    $property = $reflection->getProperty('shouldDiscoverEvents');
    $property->setAccessible(true);

    expect($property->getValue())->toBeTrue();
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 7ec200b (.)
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
});
