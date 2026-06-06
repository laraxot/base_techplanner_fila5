<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Datas;

uses(TestCase::class);

use Modules\UI\Data\UserData as DataUserData;
use Modules\UI\Datas\SliderData;
use Modules\UI\Datas\SliderDataCollection;
use Modules\UI\Datas\UserData;
use Modules\UI\Tests\TestCase;
    $collection = new SliderDataCollection();

    expect($collection)->toBeInstanceOf(SliderDataCollection::class);
});

it('SliderDataCollection is a Spatie Data class', function (): void {
    $collection = new SliderDataCollection();
    $collection = new SliderDataCollection();

    expect($collection)->toBeInstanceOf(Spatie\LaravelData\Data::class);
});

// --- Datas/UserData ---

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

    expect($data)->toBeInstanceOf(UserData::class)
        ->and($data->id)->toBe(1)
        ->and($data->name)->toBe('Mario Rossi')
        ->and($data->email)->toBe('mario@example.com')
        ->and($data->avatar)->toBeNull()
        ->and($data->role)->toBe('admin')
        ->and($data->permissions)->toBe(['view', 'edit'])
        ->and($data->settings)->toBe(['theme' => 'dark']);
});

it('UI Datas UserData is a Spatie Data class', function (): void {
    $data = new UserData(1, 'Test', 'test@example.com', null, null, [], []);

    expect($data)->toBeInstanceOf(Spatie\LaravelData\Data::class);
});

// --- Data/UserData ---

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

    expect($data)->toBeInstanceOf(DataUserData::class)
        ->and($data->id)->toBe(42)
        ->and($data->name)->toBe('Luigi Verdi')
        ->and($data->email)->toBe('luigi@example.com')
        ->and($data->avatar)->toBe('avatar.png');
});

it('UI Data UserData is a Spatie Data class', function (): void {
    $data = new DataUserData(1, 'Test', 'test@example.com', null, null, [], []);

    expect($data)->toBeInstanceOf(Spatie\LaravelData\Data::class);
});
