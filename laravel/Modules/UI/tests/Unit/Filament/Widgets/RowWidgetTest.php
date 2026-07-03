<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Filament\Widgets;

use Filament\Widgets\Widget;
<<<<<<< HEAD
use Modules\UI\Filament\Widgets\RowWidget;
use Modules\UI\Tests\TestCase;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('row widget extends filament widget', function (): void {
    $widget = new class extends RowWidget {
    };
    Assert::assertInstanceOf(Widget::class, $widget);
    Assert::assertInstanceOf(XotBaseSchemaWidget::class, $widget);
});

test('row widget can be instantiated via concrete subclass', function (): void {
    $widget = new class extends RowWidget {
    };
    Assert::assertInstanceOf(RowWidget::class, $widget);
});

test('row widget returns empty form schema', function (): void {
    $widget = new class extends RowWidget {
    };
    Assert::assertSame([], $widget->getFormSchema());
});

test('row widget exposes grid and widgets arrays', function (): void {
    $widget = new class extends RowWidget {
    };
    Assert::assertSame([], $widget->grid);
    Assert::assertSame([], $widget->widgets);
=======
use Illuminate\Contracts\View\View;
use Modules\UI\Filament\Widgets\RowWidget;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function () {
    $this->widget = new RowWidget();
});

test('row widget extends filament widget', function () {
    expect($this->widget)->toBeInstanceOf(Widget::class);
});

test('row widget can be instantiated', function () {
    expect($this->widget)->toBeInstanceOf(RowWidget::class);
});

test('row widget has correct view', function () {
    expect($this->widget->getViewName())->toBe('ui::filament.widgets.row-widget');
});

test('row widget has proper properties', function () {
    expect($this->widget)->toHaveProperty('heading');
    expect($this->widget)->toHaveProperty('description');
});

test('row widget can render', function () {
    $view = $this->widget->render();

    expect($view)->toBeInstanceOf(View::class);
>>>>>>> c001364 (.)
});
