<?php

declare(strict_types=1);

namespace Modules\Employee\Tests\Unit\Models;

use Modules\Employee\Enums\WorkHourStatusEnum;
use Modules\Employee\Enums\WorkHourTypeEnum;
use Modules\Employee\Models\WorkHour;
<<<<<<< .merge_file_D2EsF2
<<<<<<< .merge_file_FQI5lN
use PHPUnit\Framework\Assert;
=======
use Tests\TestCase;
=======
<<<<<<< HEAD
=======
use Tests\TestCase;

>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_PL5D6o

>>>>>>> .merge_file_FP5HoL

test('work hour casts enum and timestamp attributes', function (): void {
    $casts = (new WorkHour())->getCasts();

    Assert::assertSame('datetime', $casts['timestamp']);
    Assert::assertSame(WorkHourTypeEnum::class, $casts['type']);
    Assert::assertSame(WorkHourStatusEnum::class, $casts['status']);
});
