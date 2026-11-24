<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Services;

use Modules\Job\Actions\Schedule\ClearScheduleCacheAction;
use Modules\Job\Actions\Schedule\GetActiveSchedulesAction;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

/*
 * ScheduleService e' SUPERSEDED (residuo on-disk). Questo file non lo istanzia piu':
 * verifica le Action canoniche in Actions/Schedule/ (stesso perimetro del vecchio Service).
 * Mirror di tests/Unit/Actions/Schedule/ScheduleActionsTest.php — file tenuto perche'
 * no-delete senza autorizzazione.
 */

uses(\Modules\Job\Tests\TestCase::class);

describe('ScheduleService superseded by Schedule Actions', function () {
    it('GetActiveSchedulesAction uses QueueableAction and has execute', function () {
        $reflection = new \ReflectionClass(GetActiveSchedulesAction::class);
        Assert::assertContains(QueueableAction::class, $reflection->getTraitNames());
        Assert::assertTrue($reflection->hasMethod('execute'));
    });

    it('ClearScheduleCacheAction uses QueueableAction and has execute', function () {
        $reflection = new \ReflectionClass(ClearScheduleCacheAction::class);
        Assert::assertContains(QueueableAction::class, $reflection->getTraitNames());
        Assert::assertTrue($reflection->hasMethod('execute'));
    });
});
