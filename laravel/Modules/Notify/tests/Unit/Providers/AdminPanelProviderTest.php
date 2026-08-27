<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Providers;

use Filament\Panel;
use Modules\Notify\Providers\Filament\AdminPanelProvider;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< .merge_file_h3RBbh
uses(\Modules\Notify\Tests\TestCase::class);
=======
uses(TestCase::class)->group('no-notify-db');
>>>>>>> .merge_file_2mA4ss

test('admin panel provider returns a panel instance', function () {
    $provider = new AdminPanelProvider(app());

    $panel = $provider->panel(Panel::make());

    Assert::assertInstanceOf(Panel::class, $panel);
});
