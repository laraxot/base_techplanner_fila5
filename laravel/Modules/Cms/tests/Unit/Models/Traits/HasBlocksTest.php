<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(Modules\Cms\Tests\TestCase::class);

use Modules\Cms\Models\Traits\HasBlocks;

<<<<<<< HEAD
=======
namespace Modules\Cms\Tests\Unit\Models\Traits;

use Modules\Cms\Models\Traits\HasBlocks;

>>>>>>> dev
test('HasBlocks trait can be used', function () {
    // Create an anonymous class that uses the trait
    $model = new class extends Modules\Cms\Models\BaseModel {
        use HasBlocks;

        protected $table = 'pages'; // Use existing table
    };
<<<<<<< HEAD
=======
// Create a test model that uses the trait
class TestModelWithBlocks extends Modules\Cms\Models\BaseModel
{
    use HasBlocks;

    protected $table = 'pages'; // Use existing table
}

test('HasBlocks trait can be used', function () {
    $model = new TestModelWithBlocks();
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

    // Check if the trait methods exist
    expect(method_exists($model, 'getBlocks'))->toBeTrue()
        ->and(method_exists($model, 'compile'))->toBeTrue();
});

test('HasBlocks trait has static method getBlocksBySlug', function () {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    // Create an anonymous class that uses the trait
    $modelClass = new class extends Modules\Cms\Models\BaseModel {
        use HasBlocks;

        protected $table = 'pages'; // Use existing table
    };

    // Check if the static trait method exists on the trait itself
    expect(method_exists(HasBlocks::class, 'getBlocksBySlug'))->toBeTrue();
<<<<<<< HEAD
=======
    // Check if the static trait method exists
    expect(method_exists(TestModelWithBlocks::class, 'getBlocksBySlug'))->toBeTrue();
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
});
