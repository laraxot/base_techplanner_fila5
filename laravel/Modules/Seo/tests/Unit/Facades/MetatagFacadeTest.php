<?php

declare(strict_types=1);

namespace Modules\Seo\Tests\Unit\Facades;

use Modules\Seo\Adapters\MetatagFacadeAdapter;
use Modules\Seo\Facades\Metatag;
use Modules\Seo\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('resolves metatag adapter through facade accessor', function (): void {
    $adapter = app(MetatagFacadeAdapter::class);
use PHPUnit\Framework\Assert;
uses(\Modules\Seo\Tests\TestCase::class);

it('resolves metatag service through facade accessor', function (): void {
use Modules\Seo\Facades\Metatag;
use Modules\Seo\Services\MetatagService;
use Tests\TestCase;

uses(TestCase::class);

it('resolves metatag service through facade accessor', function (): void {
    $service = app(MetatagService::class);

    Metatag::setTitle('Facade Title');
    Metatag::setDescription('Facade Description');

    Assert::assertSame('Facade Title', $service->get()->getTitle());
    Assert::assertSame('Facade Description', $service->get()->getDescription());
});
