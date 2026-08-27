<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models\Traits;

use Modules\Notify\Enums\ContactTypeEnum;
use Modules\Notify\Tests\Fixtures\HasContactDummyModel;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< .merge_file_ilTIfS
uses(\Modules\Notify\Tests\TestCase::class);
=======
uses(TestCase::class)->group('no-notify-db');
>>>>>>> .merge_file_JuHdeM

function makeHasContactDummyModel(): HasContactDummyModel
{
    return new HasContactDummyModel();
}

test('has contact trait appends contact type fields to fillable', function (): void {
    $model = makeHasContactDummyModel();
    $model->initContactTrait();

    $fillable = $model->getFillable();

    foreach (ContactTypeEnum::cases() as $case) {
        Assert::assertContains($case->value, $fillable);
    }
});
