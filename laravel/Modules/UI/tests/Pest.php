<?php

declare(strict_types=1);

<<<<<<< HEAD
use Modules\UI\Database\Factories\CategoryFactory;
use Modules\UI\Database\Factories\CollectionFactory;
use Modules\UI\Models\Category;
use Modules\UI\Models\Collection;

/*
 * Bootstrap Pest — modulo UI.
 * Ogni file test dichiara uses(\Modules\UI\Tests\TestCase::class).
 * Vietato expect()->extend() / uses()->in() qui (PHPStan method.internalClass).
 */

/**
 * @param array<string, mixed> $attributes
 */
function createCategory(array $attributes = []): Category
{
    return CategoryFactory::new()->createOne($attributes);
}

/**
 * @param array<string, mixed> $attributes
 */
function makeCategory(array $attributes = []): Category
{
    return CategoryFactory::new()->makeOne($attributes);
}

/**
 * @param array<string, mixed> $attributes
 */
function createCollection(array $attributes = []): Collection
{
    return CollectionFactory::new()->createOne($attributes);
}

/**
 * @param array<string, mixed> $attributes
 */
function makeCollection(array $attributes = []): Collection
{
    return CollectionFactory::new()->makeOne($attributes);
=======
namespace Modules\UI\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\UI\Models\Asset;
use Modules\UI\Models\Component;
use Modules\UI\Models\Theme;

/*
 * |--------------------------------------------------------------------------
 * | Test Case
 * |--------------------------------------------------------------------------
 * |
 * | Il TestCase di default per tutti i test del modulo UI.
 * | Estende il TestCase specifico del modulo che fornisce il setup necessario.
 * |
 */

uses(TestCase::class)->uses(DatabaseTransactions::class)->in('Feature', 'Unit');

/*
 * |--------------------------------------------------------------------------
 * | Expectations
 * |--------------------------------------------------------------------------
 * |
 * | Aspettative globali per il modulo UI.
 * | Quando definisci expectation globali, saranno disponibili
 * | in tutti i test del modulo.
 * |
 */

expect()->extend('toBeComponent', fn () => $this->toBeInstanceOf(Component::class));

expect()->extend('toBeTheme', fn () => $this->toBeInstanceOf(Theme::class));

expect()->extend('toBeAsset', fn () => $this->toBeInstanceOf(Asset::class));

/*
 * |--------------------------------------------------------------------------
 * | Functions
 * |--------------------------------------------------------------------------
 * |
 * | Funzioni helper globali per i test del modulo UI.
 * | Queste funzioni saranno disponibili in tutti i test.
 * |
 */

function createTheme(array $attributes = []): Theme
{
    return Theme::factory()->create($attributes);
}

function makeTheme(array $attributes = []): Theme
{
    return Theme::factory()->make($attributes);
}

function createComponent(array $attributes = []): Component
{
    return Component::factory()->create($attributes);
}

function makeComponent(array $attributes = []): Component
{
    return Component::factory()->make($attributes);
}

function createAsset(array $attributes = []): Asset
{
    return Asset::factory()->create($attributes);
}

function makeAsset(array $attributes = []): Asset
{
    return Asset::factory()->make($attributes);
>>>>>>> c001364 (.)
}
