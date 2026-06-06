<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Traits\Updater;
<<<<<<< HEAD
if ($snakeType !== null) {
        expect($snakeType->getName())->toBe('bool');
=======
use Tests\TestCase;

uses(TestCase::class);        expect($snakeType->getName())->toBe('bool');
>>>>>>> 8215f950 (.)
    } else {
        expect(XotBaseModel::$snakeAttributes)->toBeTrue();
    }

<<<<<<< HEAD
if ($perPageType !== null) {
        expect($perPageType->getName())->toBe('int');
=======
    if (null !== $perPageType) {        expect($perPageType->getName())->toBe('int');
>>>>>>> 8215f950 (.)
    } else {
        expect($perPageProperty->getDefaultValue())->toBe(30);
    }
});

test('xot base model has correct property visibility', function (): void {
    $reflection = new ReflectionClass(XotBaseModel::class);

    $snakeAttributesProperty = $reflection->getProperty('snakeAttributes');
    $perPageProperty = $reflection->getProperty('perPage');

    expect($snakeAttributesProperty->isPublic())->toBeTrue();
    expect($perPageProperty->isProtected())->toBeTrue();
});
