<?php

declare(strict_types=1);

namespace Modules\Tenant\Tests\Unit\Models;

<<<<<<< .merge_file_8dI4zZ
use Modules\Tenant\Models\BaseModel;
use Modules\Tenant\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======
<<<<<<< HEAD
uses(TestCase::class);

use Illuminate\Database\Eloquent\Model;
use Modules\Tenant\Models\BaseModel;
use Modules\Tenant\Tests\TestCase;
=======
use Illuminate\Database\Eloquent\Model;
use Modules\Tenant\Models\BaseModel;
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_YJfiey

function makeTenantTestBaseModel(): BaseModel
{
    return new class extends BaseModel
    {
        protected $table = 'test_tenant_table';
    };
}

test('base model has correct table name', function (): void {
    Assert::assertSame('test_tenant_table', makeTenantTestBaseModel()->getTable());
});

test('base model has timestamps enabled', function (): void {
    Assert::assertTrue(makeTenantTestBaseModel()->usesTimestamps());
});
