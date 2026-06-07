<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogModelDeletedAction;
use Modules\User\Models\User;

<<<<<<< HEAD
=======
namespace Modules\Activity\Tests\Unit\Actions;

uses(TestCase::class);

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogModelDeletedAction;
use Modules\Activity\Tests\TestCase;
use Modules\User\Models\User;

>>>>>>> dev
test('LogModelDeletedAction can be instantiated', function () {
    $model = new class extends Model
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
<<<<<<< HEAD
=======
// Modello fittizio per testare LogModelDeletedAction
class LogModelDeletedActionTestModel extends Model
{
    protected $table = 'test_models';

    protected $fillable = ['name'];
}

test('LogModelDeletedAction can be instantiated', function () {
    $model = new LogModelDeletedActionTestModel;
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
    $user = User::factory()->make();

    $action = new LogModelDeletedAction($model, $user);

    expect($action)->toBeObject()
        ->and($action->model)->toBe($model)
        ->and($action->user)->toBe($user);
});
