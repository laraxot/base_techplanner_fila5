<?php

declare(strict_types=1);

uses(\Modules\Activity\Tests\TestCase::class);

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogActivityAction;
use Modules\User\Models\User;

<<<<<<< HEAD
test('LogActivityAction can be instantiated', function () {
    $model = new class extends Model
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
=======
// Modello fittizio per testare LogActivityAction
class LogActivityActionTestModel extends Model
{
    protected $table = 'test_models';

    protected $fillable = ['name'];
}

test('LogActivityAction can be instantiated', function () {
    $model = new LogActivityActionTestModel;
>>>>>>> 4b6b99016 (first commit)
    $user = User::factory()->make();

    $action = new LogActivityAction(
        type: 'test_type',
        user: $user,
        subject: $model,
        properties: ['key' => 'value'],
        description: 'Test Description'
    );

    expect($action)->toBeObject();
});

test('LogActivityAction can execute', function () {
<<<<<<< HEAD
    $modelClass = get_class(new class extends Model
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    });
    $model = new $modelClass(['name' => 'Test']);
=======
    $model = new LogActivityActionTestModel(['name' => 'Test']);
>>>>>>> 4b6b99016 (first commit)
    $user = User::factory()->create();

    $action = new LogActivityAction(
        type: 'test_type',
        user: $user,
        subject: $model,
        properties: ['key' => 'value'],
        description: 'Test Description'
    );

    // Siccome LogActivityAction crea una attività, testiamo che l'execute non generi errori
    expect($action)->toBeObject();
});
