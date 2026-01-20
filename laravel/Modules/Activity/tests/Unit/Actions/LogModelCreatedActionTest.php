<?php

declare(strict_types=1);

uses(\Modules\Activity\Tests\TestCase::class);

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogModelCreatedAction;
use Modules\User\Models\User;

<<<<<<< HEAD
test('LogModelCreatedAction can be instantiated', function () {
    $model = new class extends Model
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
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
    $user = User::factory()->make();

    $action = new LogModelCreatedAction($model, $user);

    expect($action)->toBeObject()
        ->and($action->model)->toBe($model)
        ->and($action->user)->toBe($user);
});

test('LogModelCreatedAction can execute', function () {
<<<<<<< HEAD
    $modelClass = get_class(new class extends Model
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    });
    $model = new $modelClass(['name' => 'Test']);
=======
    $model = new LogModelCreatedActionTestModel(['name' => 'Test']);
>>>>>>> 4b6b99016 (first commit)
    $user = User::factory()->create();

    $action = new LogModelCreatedAction($model, $user);

    // Siccome LogModelCreatedAction chiama LogActivityAction,
    // testiamo che l'execute non generi errori
    expect($action)->toBeObject();
});
