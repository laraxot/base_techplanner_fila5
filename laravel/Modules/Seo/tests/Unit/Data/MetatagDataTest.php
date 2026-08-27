<?php

declare(strict_types=1);

namespace Modules\Seo\Tests\Unit\Data;

use Modules\Seo\Data\MetatagData;
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

it('returns sane defaults for empty data', function (): void {
    $data = new MetatagData;

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
    Assert::assertSame('', $data->getTitle());
    Assert::assertSame('', $data->getDescription());
    Assert::assertSame('', $data->getKeywords());
    Assert::assertSame('index, follow', $data->getRobots());
    Assert::assertNull($data->getCanonical());
    Assert::assertNull($data->getImage());
    Assert::assertSame('website', $data->getType());
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
    expect($data->getTitle())->toBe('')
        ->and($data->getDescription())->toBe('')
        ->and($data->getKeywords())->toBe('')
        ->and($data->getRobots())->toBe('index, follow')
        ->and($data->getCanonical())->toBeNull()
        ->and($data->getImage())->toBeNull()
        ->and($data->getType())->toBe('website');
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

it('returns typed colors and falls back for invalid colors', function (): void {
    $data = new MetatagData([
        'colors' => [
            'primary' => '#111111',
            'secondary' => '#222222',
            10 => 123,
        ],
    ]);

    $colors = $data->getColors();

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
    Assert::assertSame('#111111', $colors['primary']);
    Assert::assertSame('#222222', $colors['secondary']);

    $numericKeyValue = null;
    foreach ($colors as $key => $value) {
        if ($key === '10') {
            $numericKeyValue = $value;
            break;
        }
    }
    Assert::assertTrue($numericKeyValue === '' || $numericKeyValue === null);

    $fallback = new MetatagData(['colors' => 'invalid']);
    Assert::assertArrayHasKey('primary', $fallback->getColors());
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
    expect($colors['primary'])->toBe('#111111')
        ->and($colors['secondary'])->toBe('#222222')
        ->and($colors['10'])->toBe('');

    $fallback = new MetatagData(['colors' => 'invalid']);
    expect($fallback->getColors())->toHaveKey('primary');
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

it('reads nested keys and has method works', function (): void {
    $data = new MetatagData([
        'og' => [
            'title' => 'OG Title',
        ],
    ]);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    Assert::assertTrue($data->has('og.title'));
    Assert::assertSame('OG Title', $data->get('og.title'));
    Assert::assertSame('default', $data->get('og.missing', 'default'));
=======
    expect($data->has('og.title'))->toBeTrue()
        ->and($data->get('og.title'))->toBe('OG Title')
        ->and($data->get('og.missing', 'default'))->toBe('default');
>>>>>>> 7ec200b (.)
=======
    expect($data->has('og.title'))->toBeTrue()
        ->and($data->get('og.title'))->toBe('OG Title')
        ->and($data->get('og.missing', 'default'))->toBe('default');
>>>>>>> d20252d (.)
=======
    expect($data->has('og.title'))->toBeTrue()
        ->and($data->get('og.title'))->toBe('OG Title')
        ->and($data->get('og.missing', 'default'))->toBe('default');
>>>>>>> 77e0353 (.)
=======
    Assert::assertTrue($data->has('og.title'));
    Assert::assertSame('OG Title', $data->get('og.title'));
    Assert::assertSame('default', $data->get('og.missing', 'default'));
>>>>>>> fc52fe0 (.)
=======
    Assert::assertTrue($data->has('og.title'));
    Assert::assertSame('OG Title', $data->get('og.title'));
    Assert::assertSame('default', $data->get('og.missing', 'default'));
>>>>>>> c101b34 (.)
=======
    Assert::assertTrue($data->has('og.title'));
    Assert::assertSame('OG Title', $data->get('og.title'));
    Assert::assertSame('default', $data->get('og.missing', 'default'));
>>>>>>> d0f51b6 (.)
});

it('supports livewire serialization cycle', function (): void {
    $original = [
        'title' => 'Serializable',
        'locale' => 'it',
    ];

    $data = new MetatagData($original);
    $livewire = $data->toLivewire();
    $restored = MetatagData::fromLivewire($livewire);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    Assert::assertSame($original, $restored->toArray());
=======
    expect($restored->toArray())->toBe($original);
>>>>>>> 7ec200b (.)
=======
    expect($restored->toArray())->toBe($original);
>>>>>>> d20252d (.)
=======
    expect($restored->toArray())->toBe($original);
>>>>>>> 77e0353 (.)
=======
    Assert::assertSame($original, $restored->toArray());
>>>>>>> fc52fe0 (.)
=======
    Assert::assertSame($original, $restored->toArray());
>>>>>>> c101b34 (.)
=======
    Assert::assertSame($original, $restored->toArray());
>>>>>>> d0f51b6 (.)
});

it('handles non array livewire payload and url fallback', function (): void {
    $restored = MetatagData::fromLivewire('invalid');
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
    Assert::assertSame([], $restored->toArray());

    $data = new MetatagData(['url' => 123]);
    $url = $data->getUrl();
    Assert::assertIsString($url);
});

it('returns explicit locale from data payload', function (): void {
    $data = new MetatagData(['locale' => 'it']);

    Assert::assertSame('it', $data->getLocale());
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
    expect($restored->toArray())->toBe([]);

    $data = new MetatagData(['url' => 123]);
    $url = $data->getUrl();
    expect($url)->toBeString();
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

it('falls back to en when app locale is not a string', function (): void {
    config(['app.locale' => ['it']]);

    $data = new MetatagData([]);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    Assert::assertSame('en', $data->getLocale());
=======
    expect($data->getLocale())->toBe('en');
>>>>>>> 7ec200b (.)
=======
    expect($data->getLocale())->toBe('en');
>>>>>>> d20252d (.)
=======
    expect($data->getLocale())->toBe('en');
>>>>>>> 77e0353 (.)
=======
    Assert::assertSame('en', $data->getLocale());
>>>>>>> fc52fe0 (.)
=======
    Assert::assertSame('en', $data->getLocale());
>>>>>>> c101b34 (.)
=======
    Assert::assertSame('en', $data->getLocale());
>>>>>>> d0f51b6 (.)
});
