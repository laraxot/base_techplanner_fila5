<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogModelUpdatedAction;
use Modules\User\Models\User;

<<<<<<< HEAD
=======
namespace Modules\Activity\Tests\Unit\Actions;

uses(TestCase::class);

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogModelUpdatedAction;
use Modules\Activity\Tests\TestCase;
use Modules\User\Models\User;

>>>>>>> dev
test('LogModelUpdatedAction can be instantiated', function () {
    $model = new class extends Model
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
<<<<<<< HEAD
=======
// Modello fittizio per testare LogModelUpdatedAction
class LogModelUpdatedActionTestModel extends Model
{
    protected $table = 'test_models';

    protected $fillable = ['name'];
}

test('LogModelUpdatedAction can be instantiated', function () {
    $model = new LogModelUpdatedActionTestModel;
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
    $user = User::factory()->make();

    $action = new LogModelUpdatedAction($model, $user);

    expect($action)->toBeObject()
        ->and($action->model)->toBe($model)
        ->and($action->user)->toBe($user);
});
