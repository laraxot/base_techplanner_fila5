<?php

declare(strict_types=1);

namespace Modules\Seo\Tests\Feature;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Seo\Adapters\MetatagManager;
use PHPUnit\Framework\Assert;

it('can set title', function (): void {
<<<<<<< HEAD
    $service = new MetatagManager();
=======
    $service = new MetatagManager;
>>>>>>> cf01f0b (.)
=======
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
use Modules\Seo\Services\MetatagService;
use PHPUnit\Framework\Assert;

it('can set title', function (): void {
    $service = new MetatagService;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
    $service->setTitle('Test Title');
    Assert::assertSame('Test Title', $service->get()->getTitle());
});

it('can set description', function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    $service = new MetatagManager();
=======
    $service = new MetatagManager;
>>>>>>> cf01f0b (.)
=======
    $service = new MetatagService;
>>>>>>> fc52fe0 (.)
=======
    $service = new MetatagService;
>>>>>>> c101b34 (.)
=======
    $service = new MetatagService;
>>>>>>> d0f51b6 (.)
    $service->setDescription('Test Description');
    Assert::assertSame('Test Description', $service->get()->getDescription());
});

it('can set keywords', function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    $service = new MetatagManager();
=======
    $service = new MetatagManager;
>>>>>>> cf01f0b (.)
=======
    $service = new MetatagService;
>>>>>>> fc52fe0 (.)
=======
    $service = new MetatagService;
>>>>>>> c101b34 (.)
=======
    $service = new MetatagService;
>>>>>>> d0f51b6 (.)
    $service->setKeywords('seo, test, laravel');
    Assert::assertSame('seo, test, laravel', $service->get()->getKeywords());
});

it('can set robots', function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    $service = new MetatagManager();
=======
    $service = new MetatagManager;
>>>>>>> cf01f0b (.)
=======
    $service = new MetatagService;
>>>>>>> fc52fe0 (.)
=======
    $service = new MetatagService;
>>>>>>> c101b34 (.)
=======
    $service = new MetatagService;
>>>>>>> d0f51b6 (.)
    $service->setRobots('index, follow');
    Assert::assertSame('index, follow', $service->get()->getRobots());
});

it('can set canonical url', function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    $service = new MetatagManager();
=======
    $service = new MetatagManager;
>>>>>>> cf01f0b (.)
=======
    $service = new MetatagService;
>>>>>>> fc52fe0 (.)
=======
    $service = new MetatagService;
>>>>>>> c101b34 (.)
=======
    $service = new MetatagService;
>>>>>>> d0f51b6 (.)
    $service->setCanonical('https://example.com');
    Assert::assertSame('https://example.com', $service->get()->getCanonical());
});

it('can set colors', function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    $service = new MetatagManager();
=======
    $service = new MetatagManager;
>>>>>>> cf01f0b (.)
    $colors = ['primary' => '#000000', 'secondary' => '#ffffff'];
    $service->setColors($colors);
    Assert::assertSame($colors, $service->get()->getColors());
=======
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
use Modules\Seo\Services\MetatagService;

it('can set title', function () {
    $service = new MetatagService;
    $service->setTitle('Test Title');
    expect($service->get()->getTitle())->toBe('Test Title');
});

it('can set description', function () {
    $service = new MetatagService;
    $service->setDescription('Test Description');
    expect($service->get()->getDescription())->toBe('Test Description');
});

it('can set keywords', function () {
    $service = new MetatagService;
    $service->setKeywords('seo, test, laravel');
    expect($service->get()->getKeywords())->toBe('seo, test, laravel');
});

it('can set robots', function () {
    $service = new MetatagService;
    $service->setRobots('index, follow');
    expect($service->get()->getRobots())->toBe('index, follow');
});

it('can set canonical url', function () {
    $service = new MetatagService;
    $service->setCanonical('https://example.com');
    expect($service->get()->getCanonical())->toBe('https://example.com');
});

it('can set colors', function () {
    $service = new MetatagService;
    $colors = ['primary' => '#000000', 'secondary' => '#ffffff'];
    $service->setColors($colors);
    expect($service->get()->getColors())->toBe($colors);
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
    $service = new MetatagService;
    $colors = ['primary' => '#000000', 'secondary' => '#ffffff'];
    $service->setColors($colors);
    Assert::assertSame($colors, $service->get()->getColors());
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
});
