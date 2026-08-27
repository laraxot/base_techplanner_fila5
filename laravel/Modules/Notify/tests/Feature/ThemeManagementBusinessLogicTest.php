<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Feature;

use Modules\Notify\Tests\TestCase;
<<<<<<< .merge_file_umQHSY
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);
=======

uses(TestCase::class)->group('notify-db');
>>>>>>> .merge_file_9D5EiE

/**
 * Theme Management Business Logic Tests.
 *
 * These tests are skipped because the Theme model does not exist in the codebase.
 * The tests reference Modules\Notify\Models\Theme which is not implemented.
 *
 * When the Theme model is implemented, uncomment and update these tests.
 */
<<<<<<< .merge_file_umQHSY
test('theme management tests are skipped', function () {
});
=======
it('theme management tests are skipped')->skip('Theme model not implemented');
>>>>>>> .merge_file_9D5EiE
