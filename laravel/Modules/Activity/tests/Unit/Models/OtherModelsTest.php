<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

use Modules\Activity\Models\BaseModel;
use Modules\Activity\Models\Snapshot;
use Modules\Activity\Models\StoredEvent;
=======
namespace Modules\Activity\Tests\Unit\Models;

uses(TestCase::class);

use Modules\Activity\Models\Snapshot;
use Modules\Activity\Models\StoredEvent;
use Modules\Activity\Tests\TestCase;
>>>>>>> dev

test('Snapshot model can be instantiated', function () {
    $snapshot = new Snapshot;

    expect($snapshot)->toBeInstanceOf(Snapshot::class);
});

test('StoredEvent model can be instantiated', function () {
    $storedEvent = new StoredEvent;

    expect($storedEvent)->toBeInstanceOf(StoredEvent::class);
});

<<<<<<< HEAD
test('BaseModel model can be instantiated', function () {
    $baseModel = new BaseModel;

    expect($baseModel)->toBeInstanceOf(BaseModel::class);
});

=======
>>>>>>> dev
test('Snapshot model has correct connection', function () {
    $snapshot = new Snapshot;

    expect($snapshot->getConnectionName())->toBeString();
});

test('StoredEvent model has correct connection', function () {
    $storedEvent = new StoredEvent;

    expect($storedEvent->getConnectionName())->toBeString();
});
<<<<<<< HEAD

test('BaseModel model has correct connection', function () {
    $baseModel = new BaseModel;

    expect($baseModel->getConnectionName())->toBeString();
});
=======
>>>>>>> dev
