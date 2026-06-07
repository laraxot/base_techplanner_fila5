<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(Modules\Geo\Tests\TestCase::class);

use Modules\Geo\Filament\Actions\UpdateCoordinatesBulkAction;
use Modules\Geo\Filament\Forms\Components\AddressField;
use Modules\Geo\Filament\Widgets\LatLngWidget;
use Modules\Geo\Filament\Widgets\LocationWidget;
=======
namespace Modules\Geo\Tests\Unit\Filament;

uses(TestCase::class);

use Modules\Geo\Filament\Actions\UpdateCoordinatesBulkAction;
use Modules\Geo\Filament\Forms\Components\AddressField;
use Modules\Geo\Filament\Forms\Components\MapPicker;
use Modules\Geo\Filament\Widgets\GeoMapWidget;
use Modules\Geo\Filament\Widgets\LatLngWidget;
use Modules\Geo\Filament\Widgets\LocationWidget;
use Modules\Geo\Tests\TestCase;
>>>>>>> dev

test('AddressField can be instantiated', function () {
    $field = AddressField::make('address');

    expect($field)->toBeObject();
});

<<<<<<< HEAD
=======
test('MapPicker can be instantiated', function () {
    $field = MapPicker::make('map_picker')
        ->latitude('latitude')
        ->longitude('longitude');

    expect($field)->toBeObject();
});

>>>>>>> dev
test('LocationWidget can be instantiated', function () {
    expect(class_exists(LocationWidget::class))->toBeTrue();
});

test('LatLngWidget can be instantiated', function () {
    expect(class_exists(LatLngWidget::class))->toBeTrue();
});

<<<<<<< HEAD
=======
test('GeoMapWidget can be instantiated', function () {
    expect(class_exists(GeoMapWidget::class))->toBeTrue();
});

>>>>>>> dev
test('UpdateCoordinatesBulkAction can be instantiated', function () {
    $action = UpdateCoordinatesBulkAction::make('update_coordinates');

    expect($action)->toBeObject();
});
