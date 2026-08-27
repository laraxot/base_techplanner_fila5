<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Filament\Pages;

use Modules\Notify\Filament\Pages\SettingPage;
use Modules\Notify\Tests\TestCase;
<<<<<<< .merge_file_1fPlxy

uses(\Modules\Notify\Tests\TestCase::class);
=======
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-notify-db');
>>>>>>> .merge_file_kKpAgx

test('setting page returns env widget in header', function () {
    $page = new SettingPage();

    $widgets = $page->getHeaderWidgets();

<<<<<<< .merge_file_1fPlxy
=======
    Assert::assertNotEmpty($widgets);
>>>>>>> .merge_file_kKpAgx
});
