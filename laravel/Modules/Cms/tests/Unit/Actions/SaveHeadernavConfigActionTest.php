<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(Modules\Cms\Tests\TestCase::class);
=======
namespace Modules\Cms\Tests\Unit\Actions;
>>>>>>> dev

use Modules\Cms\Actions\SaveHeadernavConfigAction;

test('SaveHeadernavConfigAction can be instantiated', function () {
    $action = new SaveHeadernavConfigAction();

    expect($action)->toBeInstanceOf(SaveHeadernavConfigAction::class);
});

test('SaveHeadernavConfigAction execute method exists', function () {
    $action = new SaveHeadernavConfigAction();

    expect(method_exists($action, 'execute'))->toBeTrue();
});
