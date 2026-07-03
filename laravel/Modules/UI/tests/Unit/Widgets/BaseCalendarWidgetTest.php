<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\UI\Tests\Unit\Widgets;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Modules\Lang\Actions\SaveTransAction;
use Modules\UI\Filament\Widgets\UserCalendarWidget;
use Modules\UI\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

function createTestCalendarWidget(): UserCalendarWidget
{
    $widget = new class extends UserCalendarWidget {
=======

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Modules\UI\Filament\Widgets\UserCalendarWidget;

beforeEach(function () {
    $this->widget = new class extends UserCalendarWidget {
>>>>>>> c001364 (.)
        public function getActionName(string $function): string
        {
            unset($function);

            return 'Modules\\UI\\Tests\\Unit\\Widgets\\NonExistingAction';
        }
    };
<<<<<<< HEAD
    $widget->type = 'test';

    return $widget;
}

beforeEach(function (): void {
    /* @var \Modules\UI\Tests\TestCase $this */
    $this->mockService(SaveTransAction::class, static function (\Mockery\MockInterface $mock): void {
        /** @var \Mockery\ExpectationInterface $expectation */
        $expectation = $mock->shouldReceive('execute');
        $expectation->andReturn(null);
    });
});

describe('Base Calendar Widget', function (): void {
    test('is auser calendar widget', function (): void {
        /* @var \Modules\UI\Tests\TestCase $this */
        Assert::assertInstanceOf(UserCalendarWidget::class, createTestCalendarWidget());
    });

    test('returns empty events if action class does not exist', function (): void {
        $widget = createTestCalendarWidget();
=======

    $this->widget->type = 'test';
});

describe('UserCalendarWidget Basics', function () {
    it('is a UserCalendarWidget', function () {
        expect($this->widget)->toBeInstanceOf(UserCalendarWidget::class);
    });
});

describe('UserCalendarWidget Event Management', function () {
    it('returns empty events if action class does not exist', function () {
>>>>>>> c001364 (.)
        $fetchInfo = [
            'start' => '2025-01-01T00:00:00',
            'end' => '2025-01-31T23:59:59',
        ];

<<<<<<< HEAD
        $events = $widget->fetchEvents($fetchInfo);

        Assert::assertCount(0, $events);
    });

    test('falls back to aminimal schema if action does not exist', function (): void {
        $widget = createTestCalendarWidget();
        $formSchema = $widget->getFormSchema();

        Assert::assertCount(2, $formSchema);
        Assert::assertInstanceOf(TextInput::class, $formSchema[0]);
        Assert::assertInstanceOf(Grid::class, $formSchema[1]);
        Assert::assertSame('title', $formSchema[0]->getName());
    });

    test('fallback schema contains agrid for datetime pickers', function (): void {
        $widget = createTestCalendarWidget();
        $formSchema = $widget->getFormSchema();

        $grid = $formSchema[1];
        Assert::assertInstanceOf(Grid::class, $grid);
=======
        $events = $this->widget->fetchEvents($fetchInfo);

        expect($events)->toBeArray();
        expect($events)->toHaveCount(0);
    });
});

describe('UserCalendarWidget Form Schema', function () {
    it('falls back to a minimal schema if action does not exist', function () {
        $formSchema = $this->widget->getFormSchema();

        expect($formSchema)->toBeArray();
        expect($formSchema)->toHaveCount(2);

        expect($formSchema[0])->toBeInstanceOf(TextInput::class);
        expect($formSchema[1])->toBeInstanceOf(Grid::class);

        expect($formSchema[0]->getName())->toBe('title');
    });

    it('fallback schema contains datetime pickers', function () {
        $formSchema = $this->widget->getFormSchema();

        $grid = $formSchema[1];
        expect($grid)->toBeInstanceOf(Grid::class);

        $gridSchema = $grid->getChildComponents();
        expect($gridSchema)->toBeArray();
        expect($gridSchema)->toHaveCount(2);

        expect($gridSchema[0])->toBeInstanceOf(DateTimePicker::class);
        expect($gridSchema[1])->toBeInstanceOf(DateTimePicker::class);

        expect($gridSchema[0]->getName())->toBe('starts_at');
        expect($gridSchema[1]->getName())->toBe('ends_at');
>>>>>>> c001364 (.)
    });
});
