<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Feature;

use Filament\Widgets\Widget;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\UI\Filament\Widgets\GroupWidget;
use Modules\UI\Filament\Widgets\HeroWidget;
use Modules\UI\Filament\Widgets\OverlookWidget;
use Modules\UI\Filament\Widgets\RedirectWidget;
use Modules\UI\Filament\Widgets\RowWidget;
use Modules\UI\Filament\Widgets\StatsOverviewWidget;
use Modules\UI\Filament\Widgets\StatWithIconWidget;
use Modules\UI\Filament\Widgets\TestChartWidget;
use Modules\UI\Filament\Widgets\UserCalendarWidget;
use Modules\UI\Tests\TestCase;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use PHPUnit\Framework\Assert;

uses(TestCase::class, DatabaseTransactions::class);

function concreteRowWidget(): RowWidget
{
<<<<<<< HEAD
    return new class extends RowWidget {
    };
=======
    return new class extends RowWidget {};
>>>>>>> laraxot/dev
}

it('widgets instantiate and extend filament base', function (): void {
    $widgets = [
<<<<<<< HEAD
        new StatWithIconWidget(),
        new OverlookWidget(),
        new HeroWidget(),
        new TestChartWidget(),
        new StatsOverviewWidget(),
        new GroupWidget(),
        new RedirectWidget(),
        new UserCalendarWidget(),
=======
        new StatWithIconWidget,
        new OverlookWidget,
        new HeroWidget,
        new TestChartWidget,
        new StatsOverviewWidget,
        new GroupWidget,
        new RedirectWidget,
        new UserCalendarWidget,
>>>>>>> laraxot/dev
        concreteRowWidget(),
    ];

    foreach ($widgets as $widget) {
        Assert::assertInstanceOf(Widget::class, $widget);
    }
});

it('schema widgets expose empty form schema by default', function (): void {
    $widgets = [
<<<<<<< HEAD
        new StatWithIconWidget(),
        new GroupWidget(),
        new RedirectWidget(),
=======
        new StatWithIconWidget,
        new GroupWidget,
        new RedirectWidget,
>>>>>>> laraxot/dev
        concreteRowWidget(),
    ];

    foreach ($widgets as $widget) {
        Assert::assertInstanceOf(XotBaseSchemaWidget::class, $widget);
        Assert::assertSame([], $widget->getFormSchema());
    }
});

it('row widget exposes grid configuration', function (): void {
    $widget = concreteRowWidget();
    $widget->grid = ['md' => 2];
    $widget->widgets = [StatWithIconWidget::class];

    Assert::assertSame(['md' => 2], $widget->grid);
    Assert::assertSame([StatWithIconWidget::class], $widget->widgets);
});
