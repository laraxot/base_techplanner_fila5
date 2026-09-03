<?php

declare(strict_types=1);

namespace Modules\Seo\Tests\Unit\Services;

use Modules\Seo\Adapters\MetatagManager;
use Modules\Seo\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('sets all optional seo fields through service', function (): void {
    $service = new MetatagManager;
    $published = now()->subDay();
    $expected = [
        'title' => 'My title',
        'description' => 'My description',
        'keywords' => 'k1,k2',
        'canonical' => 'https://example.test/canonical',
        'robots' => 'index,follow',
        'og_title' => 'og title',
        'og_description' => 'og description',
        'og_image' => 'https://cdn.test/og.jpg',
        'og_type' => 'article',
        'twitter_card' => 'summary_large_image',
        'twitter_title' => 'tw title',
        'twitter_description' => 'tw desc',
        'twitter_image' => 'https://cdn.test/tw.jpg',
        'author' => 'Jane Doe',
        'published_time' => $published->toIso8601String(),
        'modified_time' => $published->toIso8601String(),
        'section' => 'Tech',
    ];

    $service->setTitle($expected['title']);
    $service->setMeta('description', $expected['description']);
    $service->setKeywords($expected['keywords']);
    $service->setCanonical($expected['canonical']);
    $service->setRobots($expected['robots']);
    $service->setOgTitle($expected['og_title']);
    $service->setOgDescription($expected['og_description']);
    $service->setOgImage($expected['og_image']);
    $service->setOgType($expected['og_type']);
    $service->setTwitterCard($expected['twitter_card']);
    $service->setTwitterTitle($expected['twitter_title']);
    $service->setTwitterDescription($expected['twitter_description']);
    $service->setTwitterImage($expected['twitter_image']);
    $service->setAuthor($expected['author']);
    $service->setPublishedTime($published);
    $service->setModifiedTime($published);
    $service->setSection($expected['section']);

    Assert::assertSame($expected['title'], $service->getTitle());
    Assert::assertSame($expected['description'], $service->getMeta('description'));
});
