<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(Modules\Geo\Tests\TestCase::class);
=======
namespace Modules\Geo\Tests\Unit\Models\Policies;

uses(TestCase::class);
>>>>>>> dev

use Modules\Geo\Models\Policies\CountyPolicy;
use Modules\Geo\Models\Policies\GeoNamesCapPolicy;
use Modules\Geo\Models\Policies\LocalityPolicy;
use Modules\Geo\Models\Policies\PlacePolicy;
use Modules\Geo\Models\Policies\PlaceTypePolicy;
use Modules\Geo\Models\Policies\StatePolicy;
<<<<<<< HEAD
=======
use Modules\Geo\Tests\TestCase;
>>>>>>> dev

test('StatePolicy can be instantiated', function () {
    $policy = new StatePolicy();

    expect($policy)->toBeInstanceOf(StatePolicy::class);
});

test('CountyPolicy can be instantiated', function () {
    $policy = new CountyPolicy();

    expect($policy)->toBeInstanceOf(CountyPolicy::class);
});

test('LocalityPolicy can be instantiated', function () {
    $policy = new LocalityPolicy();

    expect($policy)->toBeInstanceOf(LocalityPolicy::class);
});

test('PlacePolicy can be instantiated', function () {
    $policy = new PlacePolicy();

    expect($policy)->toBeInstanceOf(PlacePolicy::class);
});

test('PlaceTypePolicy can be instantiated', function () {
    $policy = new PlaceTypePolicy();

    expect($policy)->toBeInstanceOf(PlaceTypePolicy::class);
});

test('GeoNamesCapPolicy can be instantiated', function () {
    $policy = new GeoNamesCapPolicy();

    expect($policy)->toBeInstanceOf(GeoNamesCapPolicy::class);
});
