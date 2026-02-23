<?php

declare(strict_types=1);

uses(\Modules\Activity\Tests\TestCase::class);

use Modules\Activity\Events\ActivityEvent;

test('ActivityEvent can be instantiated', function () {
    $event = new ActivityEvent();

    expect($event)->toBeObject();
});

test('ActivityEvent has expected properties', function () {
    $event = new ActivityEvent();

    expect(class_exists(ActivityEvent::class))->toBeTrue();
});
