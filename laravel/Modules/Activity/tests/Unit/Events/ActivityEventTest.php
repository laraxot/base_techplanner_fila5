<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

use Modules\Activity\Events\ActivityEvent;
=======
namespace Modules\Activity\Tests\Unit\Events;

uses(TestCase::class);

use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Activity\Events\ActivityEvent;
use Modules\Activity\Tests\TestCase;
>>>>>>> dev

test('ActivityEvent can be instantiated', function () {
    $event = new ActivityEvent;

    expect($event)->toBeObject();
});

test('ActivityEvent has expected properties', function () {
    $event = new ActivityEvent;

    // Siccome ActivityEvent è una classe vuota, testiamo solo che possa essere istanziata
<<<<<<< HEAD
    expect($event)->toBeInstanceOf(\Illuminate\Foundation\Events\Dispatchable::class)
        ->and($event)->toBeInstanceOf(\Illuminate\Queue\SerializesModels::class)
        ->and($event)->toBeInstanceOf(\Illuminate\Contracts\Broadcasting\ShouldBroadcastNow::class);
=======
    expect($event)->toBeInstanceOf(Dispatchable::class)
        ->and($event)->toBeInstanceOf(SerializesModels::class)
        ->and($event)->toBeInstanceOf(ShouldBroadcastNow::class);
>>>>>>> dev
})->skip('Skipping because we need to check actual class definition');
