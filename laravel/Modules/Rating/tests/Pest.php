<?php

declare(strict_types=1);

use Modules\Rating\Tests\Support\Ensure;
use Modules\Rating\Tests\TestCase;

uses(TestCase::class)->in('Feature', 'Unit');

function ensure(mixed $value): Ensure
{
    return new Ensure($value);
}
