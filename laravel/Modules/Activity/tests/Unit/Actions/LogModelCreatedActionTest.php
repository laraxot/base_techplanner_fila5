<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogModelCreatedAction;
use Modules\User\Models\User;

<<<<<<< HEAD
=======
namespace Modules\Activity\Tests\Unit\Actions;

uses(TestCase::class);

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogModelCreatedAction;
use Modules\Activity\Tests\TestCase;
use Modules\User\Models\User;

>>>>>>> dev
test('LogModelCreatedAction can be instantiated', function () {
    $model = new class extends Model
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
<<<<<<< HEAD
=======
// Modello fittizio per testare LogModelCreatedAction
class LogModelCreatedActionTestModel extends Model
{
    protected $table = 'test_models';

    protected $fillable = ['name'];
}

test('LogModelCreatedAction can be instantiated', function () {
    $model = new LogModelCreatedActionTestModel;
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
    $user = User::factory()->make();

    $action = new LogModelCreatedAction($model, $user);

    expect($action)->toBeObject()
        ->and($action->model)->toBe($model)
        ->and($action->user)->toBe($user);
});

test('LogModelCreatedAction can execute', function () {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    $modelClass = get_class(new class extends Model
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    });
    $model = new $modelClass(['name' => 'Test']);
<<<<<<< HEAD
=======
    $model = new LogModelCreatedActionTestModel(['name' => 'Test']);
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
    $user = User::factory()->create();

    $action = new LogModelCreatedAction($model, $user);

    // Siccome LogModelCreatedAction chiama LogActivityAction,
    // testiamo che l'execute non generi errori
    expect($action)->toBeObject();
});
