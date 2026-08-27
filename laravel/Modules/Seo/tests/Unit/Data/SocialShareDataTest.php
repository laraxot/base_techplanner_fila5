<?php

declare(strict_types=1);

namespace Modules\Seo\Tests\Unit\Data;

use Modules\Seo\Data\SocialShareData;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(\Modules\Seo\Tests\TestCase::class);
=======
use Tests\TestCase;

uses(TestCase::class);
>>>>>>> 7ec200b (.)
=======
use Tests\TestCase;

uses(TestCase::class);
>>>>>>> d20252d (.)
=======
use Tests\TestCase;

uses(TestCase::class);
>>>>>>> 77e0353 (.)
=======
use PHPUnit\Framework\Assert;

uses(\Modules\Seo\Tests\TestCase::class);
>>>>>>> fc52fe0 (.)
=======
use PHPUnit\Framework\Assert;

uses(\Modules\Seo\Tests\TestCase::class);
>>>>>>> c101b34 (.)
=======
use PHPUnit\Framework\Assert;

uses(\Modules\Seo\Tests\TestCase::class);
>>>>>>> d0f51b6 (.)

it('creates instance with required url', function (): void {
    $data = new SocialShareData(url: 'https://laravelpizza.com');

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
    Assert::assertSame('https://laravelpizza.com', $data->url);
    Assert::assertNull($data->title);
    Assert::assertNull($data->text);
    Assert::assertNull($data->image);
    Assert::assertNull($data->hashtags);
    Assert::assertNull($data->via);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
    expect($data->url)->toBe('https://laravelpizza.com')
        ->and($data->title)->toBeNull()
        ->and($data->text)->toBeNull()
        ->and($data->image)->toBeNull()
        ->and($data->hashtags)->toBeNull()
        ->and($data->via)->toBeNull();
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

it('has default platforms list', function (): void {
    $data = new SocialShareData(url: 'https://laravelpizza.com');

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
    Assert::assertSame(
        ['facebook', 'twitter', 'linkedin', 'whatsapp', 'telegram', 'copy'],
        $data->platforms,
    );
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    expect($data->platforms)->toBe(['facebook', 'twitter', 'linkedin', 'whatsapp', 'telegram', 'copy']);
>>>>>>> 7ec200b (.)
=======
    expect($data->platforms)->toBe(['facebook', 'twitter', 'linkedin', 'whatsapp', 'telegram', 'copy']);
>>>>>>> d20252d (.)
=======
    expect($data->platforms)->toBe(['facebook', 'twitter', 'linkedin', 'whatsapp', 'telegram', 'copy']);
>>>>>>> 77e0353 (.)
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
});

it('accepts all optional fields', function (): void {
    $data = new SocialShareData(
        url: 'https://laravelpizza.com/events/laravel-pizza-1',
        title: 'Laravel Pizza Meetup',
        text: 'Join us for pizza and Laravel!',
        image: 'https://laravelpizza.com/images/og.png',
        hashtags: 'laravel,php,meetup',
        via: 'laravelpizza',
        platforms: ['twitter', 'linkedin'],
    );

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
    Assert::assertSame('https://laravelpizza.com/events/laravel-pizza-1', $data->url);
    Assert::assertSame('Laravel Pizza Meetup', $data->title);
    Assert::assertSame('Join us for pizza and Laravel!', $data->text);
    Assert::assertSame('https://laravelpizza.com/images/og.png', $data->image);
    Assert::assertSame('laravel,php,meetup', $data->hashtags);
    Assert::assertSame('laravelpizza', $data->via);
    Assert::assertSame(['twitter', 'linkedin'], $data->platforms);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
    expect($data->url)->toBe('https://laravelpizza.com/events/laravel-pizza-1')
        ->and($data->title)->toBe('Laravel Pizza Meetup')
        ->and($data->text)->toBe('Join us for pizza and Laravel!')
        ->and($data->image)->toBe('https://laravelpizza.com/images/og.png')
        ->and($data->hashtags)->toBe('laravel,php,meetup')
        ->and($data->via)->toBe('laravelpizza')
        ->and($data->platforms)->toBe(['twitter', 'linkedin']);
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

it('can override platforms with custom list', function (): void {
    $data = new SocialShareData(
        url: 'https://laravelpizza.com',
        platforms: ['twitter'],
    );

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    Assert::assertSame(['twitter'], $data->platforms);
    Assert::assertCount(1, $data->platforms);
=======
    expect($data->platforms)->toBe(['twitter'])
        ->and($data->platforms)->toHaveCount(1);
>>>>>>> 7ec200b (.)
=======
    expect($data->platforms)->toBe(['twitter'])
        ->and($data->platforms)->toHaveCount(1);
>>>>>>> d20252d (.)
=======
    expect($data->platforms)->toBe(['twitter'])
        ->and($data->platforms)->toHaveCount(1);
>>>>>>> 77e0353 (.)
=======
    Assert::assertSame(['twitter'], $data->platforms);
    Assert::assertCount(1, $data->platforms);
>>>>>>> fc52fe0 (.)
=======
    Assert::assertSame(['twitter'], $data->platforms);
    Assert::assertCount(1, $data->platforms);
>>>>>>> c101b34 (.)
=======
    Assert::assertSame(['twitter'], $data->platforms);
    Assert::assertCount(1, $data->platforms);
>>>>>>> d0f51b6 (.)
});

it('serializes to array via Spatie Data', function (): void {
    $data = new SocialShareData(
        url: 'https://laravelpizza.com',
        title: 'Laravel Pizza',
    );

    $array = $data->toArray();

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
    Assert::assertArrayHasKey('url', $array);
    Assert::assertSame('https://laravelpizza.com', $array['url']);
    Assert::assertArrayHasKey('title', $array);
    Assert::assertSame('Laravel Pizza', $array['title']);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    expect($array)->toHaveKey('url', 'https://laravelpizza.com')
        ->and($array)->toHaveKey('title', 'Laravel Pizza');
>>>>>>> 7ec200b (.)
=======
    expect($array)->toHaveKey('url', 'https://laravelpizza.com')
        ->and($array)->toHaveKey('title', 'Laravel Pizza');
>>>>>>> d20252d (.)
=======
    expect($array)->toHaveKey('url', 'https://laravelpizza.com')
        ->and($array)->toHaveKey('title', 'Laravel Pizza');
>>>>>>> 77e0353 (.)
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
});
