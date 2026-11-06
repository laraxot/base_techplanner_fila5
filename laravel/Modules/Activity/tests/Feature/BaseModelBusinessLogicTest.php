<?php

declare(strict_types=1);

<<<<<<< .merge_file_pPckHj
namespace Modules\Activity\Tests\Feature;

=======
<<<<<<< HEAD
=======
use function Safe\class_uses;

>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_nZ3jcx
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Modules\Activity\Tests\TestCase;
use Modules\Xot\Traits\Updater;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('it can create base model instance', function (): void {
    $model = new TestActivityModel;

    Assert::assertSame('test_models', $model->getTable());
});

test('it has correct connection setting', function (): void {
    $model = new TestActivityModel;

    Assert::assertSame('activity', $model->getConnectionName());
});

test('it has correct primary key setting', function (): void {
    $model = new TestActivityModel;

    Assert::assertSame('id', $model->getKeyName());
    Assert::assertSame('int', $model->getKeyType());
    Assert::assertTrue($model->getIncrementing());
});

test('it has correct timestamps setting', function (): void {
    $model = new TestActivityModel;

    Assert::assertTrue($model->usesTimestamps());
    Assert::assertTrue($model->timestamps);
});

test('it has correct per page setting', function (): void {
    $model = new TestActivityModel;

    Assert::assertSame(30, $model->getPerPage());
});

test('it has correct snake attributes setting', function (): void {
    Assert::assertTrue(TestActivityModel::$snakeAttributes);
});

test('it has correct casts configuration', function (): void {
    $model = new TestActivityModel;
    $casts = $model->getCasts();

    Assert::assertIsArray($casts);
    Assert::assertArrayHasKey('created_at', $casts);
    Assert::assertSame('datetime', $casts['created_at']);
    Assert::assertArrayHasKey('updated_at', $casts);
    Assert::assertSame('datetime', $casts['updated_at']);
    Assert::assertArrayHasKey('deleted_at', $casts);
    Assert::assertSame('datetime', $casts['deleted_at']);
    Assert::assertArrayHasKey('id', $casts);
    Assert::assertSame('string', $casts['id']);
    Assert::assertArrayHasKey('published_at', $casts);
    Assert::assertSame('datetime', $casts['published_at']);
});

test('it has updater trait when configured', function (): void {
    $model = new TestActivityModel;
    /** @var array<class-string, class-string> $traits */
    $traits = class_uses_recursive($model::class);

    if (in_array(Updater::class, $traits, true)) {
        Assert::assertContains(Updater::class, $traits);

        return;
    }

    Assert::assertNotContains(Updater::class, $traits);
});

test('it has has factory trait', function (): void {
    $model = new TestActivityModel;
    /** @var array<class-string, class-string> $traits */
    $traits = class_uses_recursive($model::class);

    Assert::assertContains(HasFactory::class, $traits);
});

test('it can handle uuid generation', function (): void {
    $model = new TestActivityModel;
    $uuid = Str::uuid()->toString();
    $model->uuid = $uuid;
    $model->name = 'Test Model';

    Assert::assertSame($uuid, $model->uuid);
    Assert::assertSame('Test Model', $model->name);
});

test('it can handle timestamps', function (): void {
    $model = new TestActivityModel;
    $now = now();
    $model->created_at = $now;
    $model->updated_at = $now;

    Assert::assertSame($now->timestamp, $model->created_at->timestamp);
    Assert::assertSame($now->timestamp, $model->updated_at->timestamp);
});

test('it can handle soft deletes', function (): void {
    $model = new TestActivityModel;
    $now = now();
    $model->deleted_at = $now;

    Assert::assertSame($now->timestamp, $model->deleted_at->timestamp);
});

test('it can handle published at timestamp', function (): void {
    $model = new TestActivityModel;
    $now = now();
    $model->published_at = $now;

    Assert::assertSame($now->timestamp, $model->published_at->timestamp);
});

test('it can handle user tracking fields', function (): void {
    $model = new TestActivityModel;
    $model->created_by = 123;
    $model->updated_by = 456;
    $model->deleted_by = 789;

    Assert::assertSame('123', $model->created_by);
    Assert::assertSame('456', $model->updated_by);
    Assert::assertSame('789', $model->deleted_by);
});

test('it has correct hidden attributes', function (): void {
    $model = new TestActivityModel;
    $hidden = $model->getHidden();

    Assert::assertIsArray($hidden);
    Assert::assertNotContains('password', $hidden);
});

test('it can use connection methods', function (): void {
    $model = new TestActivityModel;

    Assert::assertSame('activity', $model->getConnectionName());
    Assert::assertInstanceOf(ConnectionInterface::class, $model->getConnection());
});

test('it can use table methods', function (): void {
    $model = new TestActivityModel;

    Assert::assertSame('test_models', $model->getTable());
});

test('it can use per page methods', function (): void {
    $model = new TestActivityModel;

    Assert::assertSame(30, $model->getPerPage());
    $model->setPerPage(50);
    Assert::assertSame(50, $model->getPerPage());
});

test('it can use snake attributes methods', function (): void {
    $model = new TestActivityModel;

    Assert::assertTrue($model::$snakeAttributes);
    $model::$snakeAttributes = false;
    Assert::assertFalse($model::$snakeAttributes);
    $model::$snakeAttributes = true;
    Assert::assertTrue($model::$snakeAttributes);
});

test('it can use fillable methods', function (): void {
    $model = new TestActivityModel;
    $fillable = $model->getFillable();

    Assert::assertIsArray($fillable);
    Assert::assertContains('name', $fillable);
    Assert::assertContains('value', $fillable);

    $newFillable = ['new_field'];
    $model->fillable($newFillable);
    Assert::assertSame($newFillable, $model->getFillable());
});

test('it can use hidden methods', function (): void {
    $model = new class extends TestActivityModel
    {
        /** @var list<string> */
        protected $hidden = ['secret_field'];
    };

    $hidden = $model->getHidden();
    Assert::assertContains('secret_field', $hidden);
    Assert::assertIsArray($hidden);

<<<<<<< .merge_file_pPckHj
    $newHidden = ['new_secret'];
    $model->setHidden($newHidden);
    Assert::assertSame($newHidden, $model->getHidden());
=======
uses(\Modules\Activity\Tests\TestCase::class)->group('activity', 'base-model');

describe('BaseModel Business Logic', function () {
    test('it can create base model instance', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';

            /** @var list<string> */
            protected $fillable = ['name', 'value'];
        };

        expect($concreteModel)->toBeInstanceOf(BaseModel::class)
            ->and($concreteModel)->toBeInstanceOf(Model::class);
    });

    test('it has correct connection setting', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        expect($concreteModel->getConnectionName())->toBe('activity');
    });

    test('it has correct primary key setting', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        expect($concreteModel->getKeyName())->toBe('id')
            ->and($concreteModel->getKeyType())->toBe('int')
            ->and($concreteModel->getIncrementing())->toBeTrue();
    });

    test('it has correct timestamps setting', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        expect($concreteModel->usesTimestamps())->toBeTrue()
            ->and($concreteModel->timestamps)->toBeTrue();
    });

    test('it has correct per page setting', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        expect($concreteModel->getPerPage())->toBe(30);
    });

    test('it has correct snake attributes setting', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        expect($concreteModel::$snakeAttributes)->toBeTrue();
    });

    test('it has correct casts configuration', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        $casts = $concreteModel->getCasts();

        expect($casts)->toHaveKey('id')
            ->and($casts['id'])->toBe('string')
            ->and($casts)->toHaveKey('uuid')
            ->and($casts['uuid'])->toBe('string')
            ->and($casts)->toHaveKey('created_at')
            ->and($casts['created_at'])->toBe('datetime')
            ->and($casts)->toHaveKey('updated_at')
            ->and($casts['updated_at'])->toBe('datetime')
            ->and($casts)->toHaveKey('deleted_at')
            ->and($casts['deleted_at'])->toBe('datetime')
            ->and($casts)->toHaveKey('updated_by')
            ->and($casts['updated_by'])->toBe('string')
            ->and($casts)->toHaveKey('created_by')
            ->and($casts['created_by'])->toBe('string')
            ->and($casts)->toHaveKey('deleted_by')
            ->and($casts['deleted_by'])->toBe('string')
            ->and($casts)->toHaveKey('published_at')
            ->and($casts['published_at'])->toBe('datetime');
    });

    test('it can use factory', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';

            /** @var list<string> */
            protected $fillable = ['name', 'value'];
        };

        expect(method_exists($concreteModel, 'factory'))->toBeTrue()
            ->and(method_exists($concreteModel, 'newFactory'))->toBeTrue();
    });

    test('it has updater trait', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        $traits = class_uses_recursive($concreteModel::class);
        if (in_array(Updater::class, $traits, true)) {
            expect($traits)->toContain(Updater::class);
<<<<<<< HEAD

=======
>>>>>>> 6ed19256f (.)
            return;
        }

        expect(true)->toBeTrue();
    });

    test('it has has factory trait', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        $traits = class_uses_recursive($concreteModel::class);
        expect($traits)->toContain(HasFactory::class);
    });

    test('it can handle uuid generation', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';

            /** @var list<string> */
            protected $fillable = ['uuid', 'name'];
        };

        $uuid = Str::uuid()->toString();
        $concreteModel->uuid = $uuid;
        $concreteModel->name = 'Test Model';

        expect($concreteModel->uuid)->toBe($uuid)
            ->and($concreteModel->name)->toBe('Test Model');
    });

    test('it can handle timestamps', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';

            /** @var list<string> */
            protected $fillable = ['name'];
        };

        $now = now();
        $concreteModel->created_at = $now;
        $concreteModel->updated_at = $now;

        expect($concreteModel->created_at->timestamp)->toBe($now->timestamp)
            ->and($concreteModel->updated_at->timestamp)->toBe($now->timestamp);
    });

    test('it can handle soft deletes', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';

            /** @var list<string> */
            protected $fillable = ['name'];
        };

        $now = now();
        $concreteModel->deleted_at = $now;

        expect($concreteModel->deleted_at->timestamp)->toBe($now->timestamp);
    });

    test('it can handle published at timestamp', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';

            /** @var list<string> */
            protected $fillable = ['name'];
        };

        $now = now();
        $concreteModel->published_at = $now;

        expect($concreteModel->published_at->timestamp)->toBe($now->timestamp);
    });

    test('it can handle user tracking fields', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';

            /** @var list<string> */
            protected $fillable = ['name'];
        };

        $concreteModel->created_by = 'user-123';
        $concreteModel->updated_by = 'user-456';
        $concreteModel->deleted_by = 'user-789';

        expect($concreteModel->created_by)->toBe('user-123')
            ->and($concreteModel->updated_by)->toBe('user-456')
            ->and($concreteModel->deleted_by)->toBe('user-789');
    });

    test('it has correct hidden attributes', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        $hidden = $concreteModel->getHidden();

        expect($hidden)->toBeArray()
            ->and($hidden)->not->toContain('password');
    });

    test('it can use connection methods', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        expect($concreteModel->getConnectionName())->toBe('activity')
            ->and($concreteModel->getConnection())->toBeInstanceOf(ConnectionInterface::class);
    });

    test('it can use table methods', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        expect($concreteModel->getTable())->toBe('test_models');
    });

    test('it can use key methods', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        expect($concreteModel->getKeyName())->toBe('id')
            ->and($concreteModel->getKeyType())->toBe('int')
            ->and($concreteModel->getIncrementing())->toBeTrue();
    });

    test('it can use timestamp methods', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        expect($concreteModel->usesTimestamps())->toBeTrue()
            ->and($concreteModel->timestamps)->toBeTrue()
            ->and($concreteModel->getCreatedAtColumn())->toBe('created_at')
            ->and($concreteModel->getUpdatedAtColumn())->toBe('updated_at');
    });

    test('it can use per page methods', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        expect($concreteModel->getPerPage())->toBe(30);

        $concreteModel->setPerPage(50);
        expect($concreteModel->getPerPage())->toBe(50);
    });

    test('it can use snake attributes methods', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        expect($concreteModel::$snakeAttributes)->toBeTrue();

        $concreteModel::$snakeAttributes = false;
        expect($concreteModel::$snakeAttributes)->toBeFalse();

        $concreteModel::$snakeAttributes = true;
        expect($concreteModel::$snakeAttributes)->toBeTrue();
    });

    test('it can use casts methods', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';
        };

        $casts = $concreteModel->getCasts();
        expect($casts)->toBeArray()
            ->and($casts)->toHaveKey('id')
            ->and($casts)->toHaveKey('created_at')
            ->and($casts)->toHaveKey('updated_at');
    });

    test('it can use fillable methods', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';

            /** @var list<string> */
            protected $fillable = ['name', 'value'];
        };

        $fillable = $concreteModel->getFillable();
        expect($fillable)->toBeArray()
            ->and($fillable)->toContain('name')
            ->and($fillable)->toContain('value');

        $newFillable = ['new_field'];
        $concreteModel->fillable($newFillable);
        expect($concreteModel->getFillable())->toBe($newFillable);
    });

    test('it can use hidden methods', function () {
<<<<<<< HEAD
        $concreteModel = new class extends BaseModel
=======
        $concreteModel = new class() extends BaseModel
>>>>>>> 6ed19256f (.)
        {
            protected $table = 'test_models';

            /** @var list<string> */
            protected $hidden = ['secret_field'];
        };

        $hidden = $concreteModel->getHidden();
        expect($hidden)->toBeArray()
            ->and($hidden)->toContain('secret_field');

        $newHidden = ['new_secret'];
        $concreteModel->setHidden($newHidden);
        expect($concreteModel->getHidden())->toBe($newHidden);
    });
>>>>>>> .merge_file_nZ3jcx
});
