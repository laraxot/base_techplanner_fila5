<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Datas;

<<<<<<< HEAD
=======
uses(TestCase::class);

>>>>>>> c001364 (.)
use Modules\UI\Data\UserData as DataUserData;
use Modules\UI\Datas\SliderData;
use Modules\UI\Datas\SliderDataCollection;
use Modules\UI\Datas\UserData;
use Modules\UI\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
use Spatie\LaravelData\Data;

uses(TestCase::class);
=======

// --- SliderData ---
>>>>>>> c001364 (.)

it('SliderData can be instantiated with all fields', function (): void {
    $data = new SliderData(
        desktop_thumbnail: '/img/desktop.jpg',
        mobile_thumbnail: '/img/mobile.jpg',
        desktop_thumbnail_webp: '/img/desktop.webp',
        mobile_thumbnail_webp: '/img/mobile.webp',
        link: '/events',
        title: 'Laravel Meetup',
        short_description: 'Join us!',
        description: 'Full description here',
        action_text: 'Register Now',
    );

<<<<<<< HEAD
    Assert::assertInstanceOf(SliderData::class, $data);
    Assert::assertSame('/img/desktop.jpg', $data->desktop_thumbnail);
    Assert::assertSame('/img/mobile.jpg', $data->mobile_thumbnail);
    Assert::assertSame('/events', $data->link);
    Assert::assertSame('Laravel Meetup', $data->title);
    Assert::assertSame('Register Now', $data->action_text);
=======
    expect($data)->toBeInstanceOf(SliderData::class)
        ->and($data->desktop_thumbnail)->toBe('/img/desktop.jpg')
        ->and($data->mobile_thumbnail)->toBe('/img/mobile.jpg')
        ->and($data->link)->toBe('/events')
        ->and($data->title)->toBe('Laravel Meetup')
        ->and($data->action_text)->toBe('Register Now');
>>>>>>> c001364 (.)
});

it('SliderData sets short_description from description', function (): void {
    $data = new SliderData(
        desktop_thumbnail: null,
        mobile_thumbnail: null,
        desktop_thumbnail_webp: null,
        mobile_thumbnail_webp: null,
        link: null,
        title: null,
        short_description: null,
        description: 'My description',
        action_text: null,
    );

<<<<<<< HEAD
    Assert::assertSame('My description', $data->short_description);
=======
    expect($data->short_description)->toBe('My description');
>>>>>>> c001364 (.)
});

it('SliderData can be instantiated with nulls', function (): void {
    $data = new SliderData(
        desktop_thumbnail: null,
        mobile_thumbnail: null,
        desktop_thumbnail_webp: null,
        mobile_thumbnail_webp: null,
        link: null,
        title: null,
        short_description: null,
        description: null,
        action_text: null,
    );

<<<<<<< HEAD
    Assert::assertInstanceOf(SliderData::class, $data);
    Assert::assertNull($data->desktop_thumbnail);
});

it('SliderDataCollection can be instantiated', function (): void {
    $collection = new SliderDataCollection();

    Assert::assertInstanceOf(SliderDataCollection::class, $collection);
=======
    expect($data)->toBeInstanceOf(SliderData::class)
        ->and($data->desktop_thumbnail)->toBeNull()
        ->and($data->title)->toBeNull();
});

// --- SliderDataCollection ---

it('SliderDataCollection can be instantiated', function (): void {
    $collection = new SliderDataCollection();
    $collection = new SliderDataCollection();

    expect($collection)->toBeInstanceOf(SliderDataCollection::class);
>>>>>>> c001364 (.)
});

it('SliderDataCollection is a Spatie Data class', function (): void {
    $collection = new SliderDataCollection();
<<<<<<< HEAD

    Assert::assertInstanceOf(Data::class, $collection);
});

=======
    $collection = new SliderDataCollection();

    expect($collection)->toBeInstanceOf(Spatie\LaravelData\Data::class);
});

// --- Datas/UserData ---

>>>>>>> c001364 (.)
it('UI Datas UserData can be instantiated', function (): void {
    $data = new UserData(
        id: 1,
        name: 'Mario Rossi',
        email: 'mario@example.com',
        avatar: null,
        role: 'admin',
        permissions: ['view', 'edit'],
        settings: ['theme' => 'dark'],
    );

<<<<<<< HEAD
    Assert::assertInstanceOf(UserData::class, $data);
    Assert::assertSame(1, $data->id);
    Assert::assertSame('Mario Rossi', $data->name);
    Assert::assertSame('mario@example.com', $data->email);
    Assert::assertNull($data->avatar);
    Assert::assertSame('admin', $data->role);
    Assert::assertSame(['view', 'edit'], $data->permissions);
    Assert::assertSame(['theme' => 'dark'], $data->settings);
=======
    expect($data)->toBeInstanceOf(UserData::class)
        ->and($data->id)->toBe(1)
        ->and($data->name)->toBe('Mario Rossi')
        ->and($data->email)->toBe('mario@example.com')
        ->and($data->avatar)->toBeNull()
        ->and($data->role)->toBe('admin')
        ->and($data->permissions)->toBe(['view', 'edit'])
        ->and($data->settings)->toBe(['theme' => 'dark']);
>>>>>>> c001364 (.)
});

it('UI Datas UserData is a Spatie Data class', function (): void {
    $data = new UserData(1, 'Test', 'test@example.com', null, null, [], []);

<<<<<<< HEAD
    Assert::assertInstanceOf(Data::class, $data);
});

=======
    expect($data)->toBeInstanceOf(Spatie\LaravelData\Data::class);
});

// --- Data/UserData ---

>>>>>>> c001364 (.)
it('UI Data UserData can be instantiated', function (): void {
    $data = new DataUserData(
        id: 42,
        name: 'Luigi Verdi',
        email: 'luigi@example.com',
        avatar: 'avatar.png',
        role: 'user',
        permissions: [],
        settings: [],
    );

<<<<<<< HEAD
    Assert::assertInstanceOf(DataUserData::class, $data);
    Assert::assertSame(42, $data->id);
    Assert::assertSame('Luigi Verdi', $data->name);
    Assert::assertSame('luigi@example.com', $data->email);
    Assert::assertSame('avatar.png', $data->avatar);
=======
    expect($data)->toBeInstanceOf(DataUserData::class)
        ->and($data->id)->toBe(42)
        ->and($data->name)->toBe('Luigi Verdi')
        ->and($data->email)->toBe('luigi@example.com')
        ->and($data->avatar)->toBe('avatar.png');
>>>>>>> c001364 (.)
});

it('UI Data UserData is a Spatie Data class', function (): void {
    $data = new DataUserData(1, 'Test', 'test@example.com', null, null, [], []);

<<<<<<< HEAD
    Assert::assertInstanceOf(Data::class, $data);
=======
    expect($data)->toBeInstanceOf(Spatie\LaravelData\Data::class);
>>>>>>> c001364 (.)
});
