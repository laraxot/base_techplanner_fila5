<?php

declare(strict_types=1);

namespace Modules\Seo\Tests\Unit\Services;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Seo\Adapters\MetatagManager;
<<<<<<< HEAD
use Modules\Seo\Tests\TestCase;
use PHPUnit\Framework\Assert;
=======
use Modules\Seo\Services\MetatagService;
use Tests\TestCase;
>>>>>>> 7ec200b (.)
=======
use Modules\Seo\Services\MetatagService;
use Tests\TestCase;
>>>>>>> d20252d (.)
=======
use Modules\Seo\Services\MetatagService;
use Tests\TestCase;
>>>>>>> 77e0353 (.)

uses(TestCase::class);

it('sets all optional seo fields through service', function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    $service = new MetatagManager();
=======
=======
use Modules\Seo\Services\MetatagService;
>>>>>>> fc52fe0 (.)
=======
use Modules\Seo\Services\MetatagService;
>>>>>>> c101b34 (.)
=======
use Modules\Seo\Services\MetatagService;
>>>>>>> d0f51b6 (.)
use PHPUnit\Framework\Assert;
uses(\Modules\Seo\Tests\TestCase::class);

it('sets all optional seo fields through service', function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    $service = new MetatagManager;
>>>>>>> cf01f0b (.)
=======
    $service = new MetatagService;
>>>>>>> 7ec200b (.)
=======
    $service = new MetatagService;
>>>>>>> d20252d (.)
=======
    $service = new MetatagService;
>>>>>>> 77e0353 (.)
=======
    $service = new MetatagService;
>>>>>>> fc52fe0 (.)
=======
    $service = new MetatagService;
>>>>>>> c101b34 (.)
=======
    $service = new MetatagService;
>>>>>>> d0f51b6 (.)
    $published = now()->subDay();
    $modified = now();

    $service->setImage('https://example.test/image.png');
    $service->setLocale('it');
    $service->setType('article');
    $service->setSiteName('LaravelPizza');
    $service->setUrl('https://example.test/post');
    $service->setAuthor('Mario');
    $service->setPublishedTime($published);
    $service->setModifiedTime($modified);

    $meta = $service->get();

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
    Assert::assertSame('https://example.test/image.png', $meta->getImage());
    Assert::assertSame('it', $meta->getLocale());
    Assert::assertSame('article', $meta->getType());
    Assert::assertSame('LaravelPizza', $meta->getSiteName());
    Assert::assertSame('https://example.test/post', $meta->getUrl());
    Assert::assertSame('Mario', $meta->getAuthor());
    Assert::assertSame($published->format('c'), $meta->getPublishedTime()?->format('c'));
    Assert::assertSame($modified->format('c'), $meta->getModifiedTime()?->format('c'));
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
    expect($meta->getImage())->toBe('https://example.test/image.png')
        ->and($meta->getLocale())->toBe('it')
        ->and($meta->getType())->toBe('article')
        ->and($meta->getSiteName())->toBe('LaravelPizza')
        ->and($meta->getUrl())->toBe('https://example.test/post')
        ->and($meta->getAuthor())->toBe('Mario')
        ->and($meta->getPublishedTime()?->format('c'))->toBe($published->format('c'))
        ->and($meta->getModifiedTime()?->format('c'))->toBe($modified->format('c'));
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 7ec200b (.)
});
=======
});

>>>>>>> d20252d (.)
=======
});

>>>>>>> 77e0353 (.)
=======
});
>>>>>>> fc52fe0 (.)
=======
});
>>>>>>> c101b34 (.)
=======
});
>>>>>>> d0f51b6 (.)
